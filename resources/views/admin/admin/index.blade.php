@extends('admin.layouts.dashboard')

@section('title', '| Admin | Admins')

@section('content')
    
<div>  
  <div>
    @include('admin.includes.messages')
    <div>
      <a href="{{ route('admin.create') }}">Add User</a>
    </div>
  </div>      

  <div>
    <table style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;">
      <thead>
        <tr>
          <th>#</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Role(s)</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>

      <!-- <div class="">

        <ul class="list-group"> route('user.show')-->
      <tbody>
        @foreach($users as $user)
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->phone }}</td>
                  <td>
                    @foreach ($user->roles as $role)
                      {{ $role->name }},
                    @endforeach
                  </td>
                  <td>{{ $user->status? 'Active':'Inactive' }}</td>
                  <!-- <td><strong>{{ $user->created_at->diffForHumans() }}</strong></td> -->
                    <td>
                      <a href="{{ route('admin.show',$user->slug) }}"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
                      <a class="" href="{{ route('admin.edit', $user->slug) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                      <a href="#" onclick="
                      if (confirm('Are you sure, you want to delete {{ $user->slug}}?')) {
                        event.preventDefault();
                        document.getElementById('delete-form-{{$user->id}}').submit();
                      }
                        else{
                          event.preventDefault();
                        }">
                        <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        <form id="delete-form-{{ $user->id}}" method="POST" action="{{ route('admin.destroy',$user->id) }}" style="display: none;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                      </form>
                    </td>
                </tr>
              @endforeach
            </tbody>
        <!-- </ul>
      </div>  -->
    </table>
  </div>
<div class="row">
  {{ $users->links() }}
</div>
</div><!-- /.post-main -->

@endsection