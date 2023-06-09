<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\SettingRequest as StoreRequest;
use App\Http\Requests\SettingRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class SettingCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class SettingCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Setting');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/setting');
        $this->crud->setEntityNameStrings('Configuración', 'Configuraciones');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        // add asterisk for fields that are required in SettingRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');

        $this->crud->removeButton('create');
        $this->crud->removeButton('delete');

        // columns
        $this->crud->modifyColumn('key', [
            'label' => "Clave", // Table column heading
        ]);
        $this->crud->modifyColumn('value', [
            'label' => "Valor", // Table column heading
        ]);

        // fields
        $this->crud->addField([
            'name' => "key",
            'label' => "Clave",
            'attributes' => ['readonly' => 'readonly']
        ]);
        $this->crud->addField([
            'name' => "value",
            'label' => "Valor",
            'hint' => 'En caso de ser una imagen, cargue la misma a través del File Manager (carpeta settings) y copie la ruta aquí'
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
