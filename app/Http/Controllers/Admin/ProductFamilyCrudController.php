<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ProductFamilyRequest as StoreRequest;
use App\Http\Requests\ProductFamilyRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class ProductFamilyCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ProductFamilyCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\ProductFamily');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/product-family');
        $this->crud->setEntityNameStrings('Familia de productos', 'Familias de productos');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        // add asterisk for fields that are required in ProductFamilyRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');

        // columns
        $this->crud->modifyColumn('title', [
            'label' => "Título", // Table column heading
        ]);
        $this->crud->addColumn('slug', [
            'label' => "Slug", // Table column heading
        ])->afterColumn('title');
        $this->crud->modifyColumn('icon_image', [
            'name' => 'icon_image', // The db column name
            'label' => "Imagen ícono", // Table column heading
            'type' => 'image',
            // 'prefix' => 'folder/subfolder/',
            // optional width/height if 25px is not ok with you
            'height' => '100px',
            'width' => '100px',
        ]);
        $this->crud->removeColumn('description');
        $this->crud->removeColumn('desktop_header_image');
        $this->crud->removeColumn('mobile_header_image');
        $this->crud->removeColumn('desktop_header_video');
        $this->crud->removeColumn('mobile_header_video');
        $this->crud->removeColumn('meta_title');
        $this->crud->removeColumn('meta_description');
        $this->crud->removeColumn('meta_keywords');
        $this->crud->modifyColumn('position', [
            'label' => "Posición", // Table column heading
        ]);

        // Fields
        $this->crud->modifyField('title', [
            'label' => "Título",
        ]);
        $this->crud->modifyField('description', [
            'label' => "Descripción",
            'type' => 'wysiwyg'
        ]);
        $this->crud->addField([ // image
            'label' => "Imagen ícono - 314 x 314px",
            'name' => "icon_image",
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1, // ommit or set to 0 to allow any aspect ratio
            // 'disk' => 's3_bucket', // in case you need to show images from a different disk
            // 'prefix' => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
        ]);
        $this->crud->addField([ // image
            'label' => "Imagen header (desktop) - 3840 x 702px",
            'name' => "desktop_header_image",
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 0, // ommit or set to 0 to allow any aspect ratio
            // 'disk' => 's3_bucket', // in case you need to show images from a different disk
            // 'prefix' => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
        ]);
        $this->crud->addField([ // image
            'label' => "Imagen header (mobile) - 2048 x 820px",
            'name' => "mobile_header_image",
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 0, // ommit or set to 0 to allow any aspect ratio
            // 'disk' => 's3_bucket', // in case you need to show images from a different disk
            // 'prefix' => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
        ]);
        $this->crud->addField([
            'label' => "Video header (desktop) - 3840 x 702px",
            'name' => "desktop_header_video",
            'type' => 'upload',
            'upload' => true,
            // 'disk' => 's3_bucket', // in case you need to show images from a different disk
            // 'prefix' => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
        ]);
        $this->crud->addField([
            'label' => "Video header (mobile) - 2048 x 820px",
            'name' => "mobile_header_video",
            'type' => 'upload',
            'upload' => true,
            // 'disk' => 's3_bucket', // in case you need to show images from a different disk
            // 'prefix' => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
        ]);
        $this->crud->addField([       // Select2Multiple = n-n relationship (with pivot table)
            'label' => "Bondades",
            'type' => 'select2_multiple',
            'name' => 'benefits', // the method that defines the relationship in your Model
            'entity' => 'benefits', // the method that defines the relationship in your Model
            'attribute' => 'title', // foreign key attribute that is shown to user
            'model' => "App\Models\Benefit", // foreign key model
            'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
            // 'select_all' => true, // show Select All and Clear buttons?

           // optional
           'options'   => (function ($query) {
                return $query->orderBy('title', 'ASC')->get();
            }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
        ])->beforeField('meta_title');
        $this->crud->addField([
            'label' => "Posición",
            'type' => 'number',
            'name' => 'position',
            'default' => 0
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
        $this->crud->addField([
            'label' => "Descripcion Vegetales",
            'type' => 'text',
            'name' => 'vegetables_description',
        ]);
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
