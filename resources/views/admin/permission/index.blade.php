@extends('admin.layouts.dashboard')

@section('title', '| Admin | Permission')

@section('content')
    
<div>  
  <div>
    @include('admin.includes.messages')
    <div>
      <a href="{{route('permission.create')}}">Create Permission</a>
    </div>
  <div>
    <table style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>For</th>
          <th>Created</th>
          <th>Actions</th>
        </tr>
      </thead>

      <!-- <div class="">

        <ul class="list-group"> -->

          @foreach($permissions as $permission)

              <tbody>
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $permission->name }}</td>
                  <td>{{ $permission->for }}</td>
                  <td><strong>{{ $permission->created_at->diffForHumans() }}</strong></td>
                  <td>
                      <a href="{{ route('permission.show',$permission->slug) }}"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
                      <a class="" href="{{ route('permission.edit', $permission->slug) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                      <a href="#" onclick="
                      if (confirm('Are you sure, you want to delete this?')) {
                        event.preventDefault();
                        document.getElementById('delete-form-{{$permission->id}}').submit();
                      }
                        else{
                          event.preventDefault();
                        }">
                        <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        <form id="delete-form-{{ $permission->id}}" action="{{ route('permission.destroy',$permission->id) }}" style="display: none;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                      </form>
                  </td>
                </tr>
              </tbody>

          @endforeach
    </table>
  </div>
  {{ $permissions->links() }}
</div><!-- /.post-main -->

@endsection
