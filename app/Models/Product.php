<?php

namespace App\Models;

use Illuminate\Support\Str;
use Backpack\CRUD\CrudTrait;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model implements Searchable
{
    use CrudTrait;
    use SoftDeletes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'products';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['product_family_id','product_subfamily_id','title','presentation','image','youtube_video','position'];
    // protected $hidden = [];
    protected $dates = ['created_at','updated_at','deleted_at'];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function getSearchResult(): SearchResult
    {
        $url = route('product.details', $this->productFamily->slug);

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
    public function recipes()
    {
        return $this->belongsToMany('App\Models\Recipe', 'recipe_product');
    }
    

    public function productFamily()
    {
        return $this->belongsTo('App\Models\ProductFamily');
    }

    public function productSubfamily()
    {
        return $this->belongsTo('App\Models\ProductSubfamily');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'product_tag', 'product_id', 'tag_id');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopeFilterProductCategory($query, $productCategory)
    {
        if( !is_null($productCategory) ) {
            if( is_array($productCategory) ) {
                return $query->whereIn('category_id', $productCategory);
            }
            else {
                return $query->where('category_id', $productCategory);
            }
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

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = config('backpack.base.root_disk_name'); // or use your own disk, defined in config/filesystems.php
        $destination_path = "public/uploads/products"; // path relative to the disk above

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
            $image = \Image::make($value)->resize(420, 420)->encode('jpg', 90);
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
}
