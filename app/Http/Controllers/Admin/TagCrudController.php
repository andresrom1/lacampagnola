<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\TagRequest as StoreRequest;
use App\Http\Requests\TagRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class TagCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class TagCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Tag');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/tag');
        $this->crud->setEntityNameStrings('tag', 'tags');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        // add asterisk for fields that are required in TagRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');

        // columns
        $this->crud->modifyColumn('title', [
            'label' => "Título", // Table column heading
        ]);
        $this->crud->modifyColumn('icon_image', [
            'name' => 'icon_image', // The db column name
            'label' => "Ícono", // Table column heading
            'type' => 'image',
            // 'prefix' => 'folder/subfolder/',
            // optional width/height if 25px is not ok with you
            'height' => '50px',
            'width' => '50px',
        ]);
        $this->crud->modifyColumn('is_moment_tag', [
            'name' => 'is_moment_tag',
            'label' => 'Momento'
        ]);
        $this->crud->modifyColumn('is_difficulty_tag', [
            'name' => 'is_difficulty_tag',
            'label' => 'Dificultad'
        ]);
        $this->crud->modifyColumn('is_duration_tag', [
            'name' => 'is_duration_tag',
            'label' => 'Duración'
        ]);
        $this->crud->modifyColumn('is_special_need_tag', [
            'name' => 'is_special_need_tag',
            'label' => 'Necesidades especiales'
        ]);
        $this->crud->modifyColumn('position', [
            'label' => "Posición", // Table column heading
        ]);

        // Fields
        $this->crud->modifyField('title', [
            'label' => "Título",
        ]);
        $this->crud->modifyField('icon_image', [ // image
            'label' => "Ícono",
            'name' => "icon_image",
            'type' => 'upload',
            'upload' => true
        ]);
        $this->crud->modifyField('is_moment_tag', [
            'label' => "Tag momento",
        ]);
        $this->crud->modifyField('is_difficulty_tag', [
            'label' => "Tag dificultad",
        ]);
        $this->crud->modifyField('is_duration_tag', [
            'label' => "Tag duración",
        ]);
        $this->crud->modifyField('is_special_need_tag', [
            'label' => "Tag necesidades especiales",
        ]);
        $this->crud->modifyField('position', [
            'label' => "Posición",
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
