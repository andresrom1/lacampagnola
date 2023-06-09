<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\BenefitRequest as StoreRequest;
use App\Http\Requests\BenefitRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class BenefitCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class BenefitCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Benefit');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/benefit');
        $this->crud->setEntityNameStrings('bondad', 'bondades');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        // add asterisk for fields that are required in BenefitRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');

        // Columns
        $this->crud->modifyColumn('title', [
            'label' => "Título", // Table column heading
        ]);
        $this->crud->modifyColumn('short_description', [
            'label' => "Descripción", // Table column heading
        ]);
        $this->crud->modifyColumn('image', [
            'name' => 'image', // The db column name
            'label' => "Imagen principal/ícono", // Table column heading
            'type' => 'image',
            // 'prefix' => 'folder/subfolder/',
            // optional width/height if 25px is not ok with you
            'height' => '100px',
            'width' => '100px',
        ]);

        // Fields
        $this->crud->modifyField('title', [
            'label' => "Título",
        ]);
        $this->crud->modifyField('short_description', [
            'label' => "Descripción",
        ]);
        $this->crud->addField([ // image
            'label' => "Imagen principal/ícono",
            'name' => "image",
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1, // ommit or set to 0 to allow any aspect ratio
            // 'disk' => 's3_bucket', // in case you need to show images from a different disk
            // 'prefix' => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
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
