@php
  if(isset($field['value']) && is_array($field['value'])){
    $field['value'] = $field['value']['url'];
  }

 if(isset($field['value']) && isJson($field['value'])){
    $_value = json_decode($field['value']);
    $field['value'] = $_value->url;
 }

 if(isset($field['value']) && is_object($field['value'])){
   $field['value'] = isset($field['value']->url) ? $field['value']->url : '';
 }

  function isJson($str){
    if(!is_string($str)) return false;
    $result = json_decode($str);
    return json_last_error() === 0;
  }
@endphp
<div @include('crud::inc.field_wrapper_attributes') >
    <label>{!! $field['label'] !!}</label>
    @include('crud::inc.field_translatable_icon')
    <input
    	type="url"
    	name="{{ $field['name'] }}"
        value="{{ old($field['name']) ?? $field['value'] ?? $field['default'] ?? '' }}"
        @include('crud::inc.field_attributes')
    	>

    {{-- HINT --}}
    @if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif
</div>
