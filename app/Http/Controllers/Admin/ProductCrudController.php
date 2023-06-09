<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

// VALIDATION: change the requests to match your own file names if you need form validation
use Backpack\CRUD\CrudPanel;
use Illuminate\Http\Request;
use App\Imports\ProductsImport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductImportRequest;
use App\Http\Requests\ProductRequest as StoreRequest;
use App\Http\Requests\ProductRequest as UpdateRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ProductCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Product');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/product');
        $this->crud->setEntityNameStrings('Producto', 'Productos');
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        // add asterisk for fields that are required in ProductRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');

        // columns
        $this->crud->addColumn([
            // 1-n relationship
            'label' => "Familia de productos", // Table column heading
            'type' => "select",
            'name' => 'product_family_id', // the column that contains the ID of that connected entity;
            'entity' => 'productFamily', // the method that defines the relationship in your Model
            'attribute' => "title", // foreign key attribute that is shown to user
            'model' => "App\Models\ProductFamily", // foreign key model
        ]);
        $this->crud->addColumn([
            // 1-n relationship
            'label' => "Subfamilia de productos", // Table column heading
            'type' => "select",
            'name' => 'product_subfamily_id', // the column that contains the ID of that connected entity;
            'entity' => 'productSubfamily', // the method that defines the relationship in your Model
            'attribute' => "title", // foreign key attribute that is shown to user
            'model' => "App\Models\ProductSubfamily", // foreign key model
        ])->afterColumn('product_family_id');
        $this->crud->addColumn([
            // 1-n relationship
            'label' => "Categoria de productos", // Table column heading
            'type' => "select",
            'name' => 'category_id', // the column that contains the ID of that connected entity;
            'entity' => 'category', // the method that defines the relationship in your Model
            'attribute' => "title", // foreign key attribute that is shown to user
            'model' => "App\Models\Category", // foreign key model
        ])->afterColumn('product_subfamily_id');
        $this->crud->modifyColumn('title', [
            'label' => "Título", // Table column heading
        ]);
        $this->crud->modifyColumn('presentation', [
            'label' => "Presentación", // Table column heading
        ]);
        $this->crud->modifyColumn('image', [
            'name' => 'image', // The db column name
            'label' => "Imagen", // Table column heading
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
        ])->afterColumn('image');
        $this->crud->removeColumn('youtube_video');

        // fields
        $this->crud->addField([  // Select2
            'label' => "Familia de productos",
            'type' => 'select2',
            'name' => 'product_family_id', // the db column for the foreign key
            'entity' => 'productFamily', // the method that defines the relationship in your Model
            'attribute' => 'title', // foreign key attribute that is shown to user
            'model' => "App\Models\ProductFamily", // foreign key model

            // optional
            'options'   => (function ($query) {
                 return $query->orderBy('title', 'ASC')->get();
             }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
        ]);
        $this->crud->addField([  // Select2
            'label' => "Subfamilia de productos",
            'type' => 'select2',
            'name' => 'product_subfamily_id', // the db column for the foreign key
            'entity' => 'productSubfamily', // the method that defines the relationship in your Model
            'attribute' => 'title', // foreign key attribute that is shown to user
            'model' => "App\Models\ProductSubfamily", // foreign key model

            // optional
            'options'   => (function ($query) {
                 return $query->orderBy('title', 'ASC')->get();
             }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
        ]);
        $this->crud->addField([  // Select2
            'label' => "Categoria",
            'type' => 'select2',
            'name' => 'category_id', // the db column for the foreign key
            'entity' => 'category', // the method that defines the relationship in your Model
            'attribute' => 'title', // foreign key attribute that is shown to user
            'model' => "App\Models\Category", // foreign key model

            // optional
            'options'   => (function ($query) {
                 return $query->orderBy('title', 'ASC')->get();
             }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
        ]);
        $this->crud->modifyField('title', [
            'label' => "Título",
        ]);
        $this->crud->modifyField('presentation', [
            'label' => "Presentación",
        ]);
        $this->crud->addField([ // image
            'label' => "Imagen - 420 x 420px",
            'name' => "image",
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1, // ommit or set to 0 to allow any aspect ratio
            // 'disk' => 's3_bucket', // in case you need to show images from a different disk
            // 'prefix' => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
        ]);
        $this->crud->addField([   // URL
            'name' => 'youtube_video',
            'label' => 'Enlace a video YouTube',
            'type' => 'video',
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
        ]);
        $this->crud->addField([
            'name' => 'position',
            'label' => 'Orden',
            'type' => 'number',
        ]);

        // buttons
        $this->crud->allowAccess('import');
        $this->crud->addButtonFromView('top', 'import', 'products-import', 'end');
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

    public function import()
    {
        $this->crud->hasAccessOrFail('import');
        $this->crud->setOperation('Import');
        $this->data['crud'] = $this->crud;

        return view('crud.products.import', $this->data);
    }

    public function doImport(ProductImportRequest $request)
    {
        $path = Storage::disk(config('backpack.base.root_disk_name'))->putFile('public/uploads/products', $request->file('file'));

        try {
            Excel::import(new ProductsImport, public_path(Str::replaceFirst('public/', '', $path)));
        }
        catch(\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
        }

        \Alert::success('El listado de productos ha sido importado con éxito.')->flash();
        return redirect('admin/product');
    }
}
