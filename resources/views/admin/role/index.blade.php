@extends('admin.layouts.dashboard')

@section('title', '| Admin | Roles')

@section('content')
    
<div>  
  <div>
    @include('admin.includes.messages')
    <div>
      <a href="{{route('role.create')}}">Create Role</a>
    </div>  

  <div>
    <table style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Time posted</th>
          <th>Actions</th>
        </tr>
      </thead>

      <!-- <div class="">

        <ul class="list-group"> -->

          @foreach($roles as $role)

              <tbody>
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $role->name }}</td>
                  <td><strong>{{ $role->created_at->diffForHumans() }}</strong></td>
                  <td>
                      <a href="{{ route('role.show',$role->slug) }}"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
                      <a class="" href="{{ route('role.edit', $role->slug) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                      <a href="#" onclick="
                      if (confirm('Are you sure, you want to delete this?')) {
                        event.preventDefault();
                        document.getElementById('delete-form-{{$role->id}}').submit();
                      }
                        else{
                          event.preventDefault();
                        }">
                        <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        <form id="delete-form-{{ $role->id}}" action="{{ route('role.destroy',$role->id) }}" style="display: none;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                      </form>
                  </td>
                </tr>
              </tbody>

          @endforeach

        <!-- </ul>
      </div>  -->
    </table>
  </div>

</div><!-- /.post-main -->

@endsection