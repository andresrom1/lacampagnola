@extends('backpack::layout')

@section('header')
	<section class="content-header">
	  <h1>
        <span class="text-capitalize">{!! $crud->getHeading() ?? $crud->entity_name_plural !!}</span>
        <small>Importar.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ url(config('backpack.base.route_prefix'), 'dashboard') }}">{{ trans('backpack::crud.admin') }}</a></li>
	    <li><a href="{{ url($crud->route) }}" class="text-capitalize">{{ $crud->entity_name_plural }}</a></li>
	    <li class="active">Importar</li>
	  </ol>
	</section>
@endsection


@section('content')
@if ($crud->hasAccess('list'))
	<a href="{{ url($crud->route) }}" class="hidden-print"><i class="fa fa-angle-double-left"></i> {{ trans('backpack::crud.back_to_all') }} <span>{{ $crud->entity_name_plural }}</span></a>
@endif

<div class="row m-t-20">
	<div class="{{ $crud->getCreateContentClass() }}">
		<!-- Default box -->

		@include('crud::inc.grouped_errors')

        <form method="post" action="{{ route('products.do-import') }}" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="col-md-12">

            <div class="row display-flex-wrap">
                <div class="box col-md-12 padding-10 p-t-20">
                    <div class="form-group col-xs-12">
                        <a href="{{ asset('assets/templates/productos.csv') }}"><i class="fa fa-download"></i> Descargar template</a>
                    </div>
                    <div class="form-group col-xs-12 required">
                        <label for="file">CSV de productos</label>
                        <input type="file" name="file" id="" required>
                    </div>
                </div>
            </div><!-- /.box-body -->
            <div>
                <button type="submit" class="btn btn-success">
                    <span class="fa fa-upload" role="presentation" aria-hidden="true"></span> &nbsp;
                    <span>Importar</span>
                </button>
            </div><!-- /.box-footer-->

            </div><!-- /.box -->
        </form>
	</div>
</div>
@endsection
