<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\RecipeRequest as StoreRequest;
use App\Http\Requests\RecipeRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class RecipeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class RecipeCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Recipe');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/recipe');
        $this->crud->setEntityNameStrings('Receta', 'Recetas');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        // add asterisk for fields that are required in RecipeRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');

        // columns
        $this->crud->modifyColumn('title', [
            'label' => "Título", // Table column heading
        ]);
        $this->crud->addColumn('slug', [
            'label' => "Slug", // Table column heading
        ])->afterColumn('title');
        $this->crud->addColumn([
            // n-n relationship (with pivot table)
            'label' => "Tags", // Table column heading
            'type' => "select_multiple",
            'name' => 'tags', // the method that defines the relationship in your Model
            'entity' => 'tags', // the method that defines the relationship in your Model
            'attribute' => "title", // foreign key attribute that is shown to user
            'model' => "App\Models\Tag", // foreign key model
        ])->afterColumn('slug');
        $this->crud->removeColumn('icon_image');
        $this->crud->removeColumn('ingredients');
        $this->crud->removeColumn('preparation');
        $this->crud->removeColumn('youtube_video');
        $this->crud->removeColumn('images');
        $this->crud->removeColumn('meta_title');
        $this->crud->removeColumn('meta_description');
        $this->crud->removeColumn('meta_keywords');
        $this->crud->modifyColumn('in_home', [
            'label' => "Destacada", // Table column heading
        ]);
        $this->crud->modifyColumn('position', [
            'label' => "Posición", // Table column heading
        ]);

        // fields
        $this->crud->modifyField('title', [
            'label' => "Título"
        ]);
        $this->crud->addField([ // image
            'label' => "Imagen - 314 x 314px",
            'name' => "icon_image",
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1, // ommit or set to 0 to allow any aspect ratio
            // 'disk' => 's3_bucket', // in case you need to show images from a different disk
            // 'prefix' => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
        ]);
        $this->crud->modifyField('ingredients', [
            'label' => "Ingredientes",
            'type' => 'wysiwyg'
        ]);
        $this->crud->modifyField('preparation', [
            'label' => "Preparación",
            'type' => 'wysiwyg'
        ]);
        $this->crud->addField([   // URL
            'name' => 'youtube_video',
            'label' => 'Enlace a video YouTube',
            'type' => 'urlOrJson',
        ]);
        $this->crud->addField([ // Upload
            'name' => 'images',
            'label' => 'Imágenes - 1260 x 940px',
            'type' => 'upload_multiple',
            'upload' => true,
        ], 'both');
        $this->crud->addField([       // Select2Multiple = n-n relationship (with pivot table)
            'label' => "Productos relacionados",
            'type' => 'select2_multiple',
            'name' => 'products', // the method that defines the relationship in your Model
            'entity' => 'products', // the method that defines the relationship in your Model
            'attribute' => 'title', // foreign key attribute that is shown to user
            'model' => "App\Models\Product", // foreign key model
            'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
            // 'select_all' => true, // show Select All and Clear buttons?

           // optional
           'options'   => (function ($query) {
                return $query->orderBy('title', 'ASC')->get();
            }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
        ])->afterField('images');
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
        ])->afterField('products');
        $this->crud->modifyField('position', [
            'label' => "Posición"
        ]);
        $this->crud->modifyField('in_home', [
            'label' => "Destacada en la home"
        ]);
        $this->crud->modifyField('meta_title', [
            'label' => "Meta título"
        ]);
        $this->crud->modifyField('meta_description', [
            'label' => "Meta descripción"
        ]);
        $this->crud->modifyField('meta_keywords', [
            'label' => "Meta keywords"
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
