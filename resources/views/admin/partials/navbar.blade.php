<ul id="Menu" class="Menu">
	<form method="POST" action="/" class="search" id="search">
		<i class="fa fa-search" style="margin-left: 3px;" aria-hidden="true"></i>
		<input placeholder="search"/>
		<input type="hidden" name="submit">
	</form>
	<li class="{{ Request::is('admin/dashboard') ? 'active' : '' }} dashboard"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a></li>
	<li class="{{ Request::is('admin/assistChaplain') ? 'active' : '' }}"><a href="{{route('assistChaplain.index')}}"><i class="fa fa-list" aria-hidden="true"></i>  Assist. Chaplain</a></li>
	<li class="{{ Request::is('admin/chaplain') ? 'active' : '' }}"><a href="{{route('chaplain.index')}}"><i class="fa fa-list" aria-hidden="true"></i>  Chaplain</a></li>
	<li class="{{ Request::is('admin/homily') ? 'active' : '' }}"><a href="{{route('homily.index')}}"><i class="fa fa-list" aria-hidden="true"></i>  Homily</a></li>
	<li class="{{ Request::is('admin/executive') ? 'active' : '' }}"><a href="{{route('executive.index')}}"><i class="fa fa-list" aria-hidden="true"></i>  Executive</a></li>
	<li class="{{ Request::is('admin/blog') ? 'active' : '' }}"><a href="{{route('blog.index')}}"><i class="fa fa-list" aria-hidden="true"></i>  Blog</a></li>
	<li class="{{ Request::is('admin/post') ? 'active' : '' }}"><a href="{{route('post.index')}}"><i class="fa fa-list" aria-hidden="true"></i>  Post</a></li>
	<li class="{{ Request::is('admin/category') ? 'active' : '' }}"><a href="{{route('category.index')}}"><i class="fa fa-list" aria-hidden="true"></i>  Category</a></li>
	<li class="{{ Request::is('admin/tag') ? 'active' : '' }}"><a href="{{route('tag.index')}}"><i class="fa fa-list" aria-hidden="true"></i>  Tag</a></li>
	<li class="{{ Request::is('admin/admin') ? 'active' : '' }}"><a href="{{route('admin.index')}}"><i class="fa fa-users" aria-hidden="true"></i>  Admins</a></li>
	<li class="{{ Request::is('user') ? 'active' : '' }}"><a href="{{route('user.index')}}"><i class="fa fa-users" aria-hidden="true"></i>  Users</a></li>
	<li class="{{ Request::is('admin/permission') ? 'active' : '' }}"><a href="{{route('permission.index')}}"><i class="fa fa-list" aria-hidden="true"></i>  Permission</a></li>
	<li class="{{ Request::is('admin/role') ? 'active' : '' }}"><a href="{{route('role.index')}}"><i class="fa fa-list" aria-hidden="true"></i>  Role</a></li>
	<li class="{{ Request::is('admin/society') ? 'active' : '' }}"><a href="{{route('society.index')}}"><i class="fa fa-list" aria-hidden="true"></i>  Society</a></li>
</ul>