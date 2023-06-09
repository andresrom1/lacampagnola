<?php

namespace App\Models;

use Illuminate\Support\Str;
use Backpack\CRUD\CrudTrait;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model implements Searchable
{
    use CrudTrait;
    use SoftDeletes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'recipes';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['title','icon_image','ingredients','preparation','youtube_video','images','in_home','position','meta_title','meta_description','meta_image','meta_keywords'];
    // protected $hidden = [];
    protected $dates = ['created_at','updated_at','deleted_at'];
    protected $casts = [
        'images' => 'array'
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public static function boot()
    {
        parent::boot();
        static::deleting(function($obj) {
            if (count((array)$obj->images)) {
                foreach ($obj->images as $file_path) {
                    \Storage::disk( config('backpack.base.root_disk_name') )->delete($file_path);
                }
            }
        });
    }

    public function uploadMultipleFilesToDisk($value, $attribute_name, $disk, $destination_path)
    {
        $request = \Request::instance();
        $attribute_value = (array) $this->{$attribute_name};
        $files_to_clear = $request->get('clear_'.$attribute_name);
        // if a file has been marked for removal,
        // delete it from the disk and from the db
        if ($files_to_clear) {
            $attribute_value = (array) $this->{$attribute_name};
            foreach ($files_to_clear as $key => $filename) {
                \Storage::disk($disk)->delete($filename);
                $attribute_value = array_where($attribute_value, function ($value, $key) use ($filename) {
                    return $value != $filename;
                });
            }
        }
        // if a new file is uploaded, store it on disk and its filename in the database
        if ($request->hasFile($attribute_name)) {
            foreach ($request->file($attribute_name) as $file) {
                if ($file->isValid()) {
                    // 1. Generate a new file name
                    $new_file_name = uniqid().'.'.File::extension($file->getClientOriginalName());
                    // 2. Move the new file to the correct path
                    $file_path = $file->storeAs($destination_path, $new_file_name, $disk);
                    // 3. Add the public path to the database
                    // but first, remove "public/" from the path, since we're pointing to it from the root folder
                    // that way, what gets saved in the database is the user-accesible URL
                    $attribute_value[] = Str::replaceFirst('public/', '', $file_path);
                }
            }
        }
        $this->attributes[$attribute_name] = json_encode($attribute_value);
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('recipe.details', $this->slug);

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->title,
            $url
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'recipe_tag', 'recipe_id', 'tag_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'recipe_product', 'recipe_id', 'product_id');
    }


    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopeFilterProductCategory($query, $productCategory)
    {
        if( !is_null($productCategory) && !empty($productCategory) ) {
            return $query->whereHas('products', function($q) use($productCategory) {
                if( is_array($productCategory) ) {
                    $q->whereIn('category_id', $productCategory);
                }
                else {
                    $q->where('category_id', $productCategory);
                }
            });
        }

        return $query;
    }

    public function scopeFilterTags($query, $tags)
    {
        if( !is_null($tags) && !empty($tags) ) {
            return $query->whereHas('tags', function($q) use($tags) {
                $q->whereIn('id', $tags);
            });
        }

        return $query;
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    public function getYoutubeVideoAttribute($value)
    {
        return json_decode($value);
    }

    public function getImagesAttribute($value)
    {
        return json_decode($value);
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function setIconImageAttribute($value)
    {
        $attribute_name = "icon_image";
        $disk = config('backpack.base.root_disk_name'); // or use your own disk, defined in config/filesystems.php
        $destination_path = "public/uploads/recipes"; // path relative to the disk above

        // if the image was erased
        if ($value==null) {
            // delete the image from disk
            \Storage::disk($disk)->delete($this->{$attribute_name});

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        // if a base64 was sent, store it in the db
        if (starts_with($value, 'data:image'))
        {
            // 0. Make the image
            $image = \Image::make($value)->resize(314, 314)->encode('jpg', 90);
            // 1. Generate a filename.
            $filename = md5($value.time()).'.jpg';
            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            // 3. Save the public path to the database
            // but first, remove "public/" from the path, since we're pointing to it from the root folder
            // that way, what gets saved in the database is the user-accesible URL
            $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
            $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
        }
    }

    public function setMetaImageAttribute($value)
    {
        $attribute_name = "meta_image";
        $disk = config('backpack.base.root_disk_name'); // or use your own disk, defined in config/filesystems.php
        $destination_path = "public/uploads/recipes"; // path relative to the disk above

        // if the image was erased
        if ($value==null) {
            // delete the image from disk
            \Storage::disk($disk)->delete($this->{$attribute_name});

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        // if a base64 was sent, store it in the db
        if (starts_with($value, 'data:image'))
        {
            // 0. Make the image
            $image = \Image::make($value)->resize(1260, 940)->encode('jpg', 90);
            // 1. Generate a filename.
            $filename = md5($value.time()).'.jpg';
            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            // 3. Save the public path to the database
            // but first, remove "public/" from the path, since we're pointing to it from the root folder
            // that way, what gets saved in the database is the user-accesible URL
            $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
            $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
        }
    }

    public function setImagesAttribute($value)
    {
        $attribute_name = "images";
        $disk = config('backpack.base.root_disk_name');
        $destination_path = "public/uploads/recipes";

        $this->uploadMultipleFilesToDisk($value, $attribute_name, $disk, $destination_path);
    }
}
