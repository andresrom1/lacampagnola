<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\HomeBannerRequest as StoreRequest;
use App\Http\Requests\HomeBannerRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class HomeBannerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class HomeBannerCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\HomeBanner');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/home-banner');
        $this->crud->setEntityNameStrings('Banner home', 'Banners home');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        // add asterisk for fields that are required in HomeBannerRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');

        // columns
        $this->crud->modifyColumn('title', [
            'label' => "Título", // Table column heading
        ]);
        $this->crud->modifyColumn('text', [
            'label' => "Texto", // Table column heading
        ]);
        $this->crud->modifyColumn('desktop_image', [
            'name' => 'desktop_image', // The db column name
            'label' => "Imagen background (desktop)", // Table column heading
            'type' => 'image',
            // 'prefix' => 'folder/subfolder/',
            // optional width/height if 25px is not ok with you
            'height' => '100px',
            'width' => '100px',
        ]);
        $this->crud->modifyColumn('mobile_image', [
            'name' => 'mobile_image', // The db column name
            'label' => "Imagen background (mobile)", // Table column heading
            'type' => 'image',
            // 'prefix' => 'folder/subfolder/',
            // optional width/height if 25px is not ok with you
            'height' => '100px',
            'width' => '100px',
        ]);
        $this->crud->addColumn([
            // n-n relationship (with pivot table)
            'label' => "Tags", // Table column heading
            'type' => "select_multiple",
            'name' => 'tags', // the method that defines the relationship in your Model
            'entity' => 'tags', // the method that defines the relationship in your Model
            'attribute' => "title", // foreign key attribute that is shown to user
            'model' => "App\Models\Tag", // foreign key model
        ])->afterColumn('mobile_image');
        $this->crud->removeColumn('link');
        $this->crud->removeColumn('youtube_video');
        $this->crud->modifyColumn('is_visible', [
            'label' => "¿Visible?", // Table column heading
        ]);
        $this->crud->modifyColumn('position', [
            'label' => "Posición", // Table column heading
        ]);

        // Fields
        $this->crud->modifyField('title', [
            'label' => "Título",
        ]);
        $this->crud->modifyField('text', [
            'label' => "Texto",
        ]);
        $this->crud->addField([ // image
            'label' => "Imagen background (desktop) - 1280 x 700px",
            'name' => "desktop_image",
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 0, // ommit or set to 0 to allow any aspect ratio
            // 'disk' => 's3_bucket', // in case you need to show images from a different disk
            // 'prefix' => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
        ]);
        $this->crud->addField([ // image
            'label' => "Imagen background (mobile) - 2048 x 1638px",
            'name' => "mobile_image",
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 0, // ommit or set to 0 to allow any aspect ratio
            // 'disk' => 's3_bucket', // in case you need to show images from a different disk
            // 'prefix' => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
        ]);
        $this->crud->modifyField('link', [
            'label' => "Enlace",
            'type' => "url",
        ]);
        $this->crud->addField([   // URL
            'name' => 'youtube_video',
            'label' => 'Enlace a video YouTube',
            'type' => 'urlOrJson',
        ]);
        $this->crud->addField([  // Select2
            'label' => "Tags",
            'type' => 'select2_multiple',
            'name' => 'tags', // the method that defines the relationship in your Model
            'entity' => 'tags', // the method that defines the relationship in your Model
            'attribute' => 'title', // foreign key attribute that is shown to user
            'model' => "App\Models\Tag", // foreign key model
            'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
            // 'select_all' => true, // show Select All and Clear buttons?

        'options' => (function ($query) {
                return $query->orderBy('title', 'ASC')->get();
            }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
        ])->afterField('youtube_video');
        $this->crud->modifyField('is_visible', [
            'label' => "Visible"
        ]);
        $this->crud->modifyField('position', [
            'label' => "Posición"
        ]);
    }

    public function store(StoreRequest $request)
    {
      	$videoUrl = $request->input('youtube_video');
	if(!empty($videoUrl)){
	  $video_data = [
	    'provider' => 'youtube',
	    'id' => null,
	    'title' => null,
	    'image' => null,
	    'url' => $videoUrl
	  ];
	  $request->request->set('youtube_video', json_encode($video_data));
	}
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
      	$videoUrl = $request->input('youtube_video');
	if(!empty($videoUrl)){
	  $video_data = [
	    'provider' => 'youtube',
	    'id' => null,
	    'title' => null,
	    'image' => null,
	    'url' => $videoUrl
	  ];
	  $request->request->set('youtube_video', json_encode($video_data));
	}
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
