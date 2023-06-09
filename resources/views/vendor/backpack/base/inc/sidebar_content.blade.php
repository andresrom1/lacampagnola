<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
<li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
<li><a href='{{ backpack_url('home-banner') }}'><i class='fa fa-image'></i> <span>Banners home</span></a></li>
<li><a href='{{ backpack_url('tag') }}'><i class='fa fa-tags'></i> <span>Tags</span></a></li>
<li><a href='{{ backpack_url('benefit') }}'><i class='fa fa-list'></i> <span>Bondades</span></a></li>
<li><a href='{{ backpack_url('product-family') }}'><i class='fa fa-list'></i> <span>Familia de productos</span></a></li>
<li><a href='{{ backpack_url('product-subfamily') }}'><i class='fa fa-list'></i> <span>Subfamilia de productos</span></a></li>
<li><a href='{{ backpack_url('product') }}'><i class='fa fa-list'></i> <span>Productos</span></a></li>
<li><a href='{{ backpack_url('recipe') }}'><i class='fa fa-list'></i> <span>Recetas</span></a></li>
<li><a href='{{ backpack_url('category') }}'><i class='fa fa-list'></i> <span>Categorias</span></a></li>
<li><a href='{{ backpack_url('setting') }}'><i class='fa fa-gears'></i> <span>Configuraciones</span></a></li>

@if( backpack_user()->hasRole('superadmin') )
<!-- Users, Roles Permissions -->
  <li class="treeview">
    <a href="#"><i class="fa fa-group"></i> <span>Users, Roles, Permissions</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
      <li><a href="{{ backpack_url('user') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
      <li><a href="{{ backpack_url('role') }}"><i class="fa fa-group"></i> <span>Roles</span></a></li>
      <li><a href="{{ backpack_url('permission') }}"><i class="fa fa-key"></i> <span>Permissions</span></a></li>
    </ul>
  </li>
@endif
