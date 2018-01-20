@extends('admin.layouts.dashboard')

@section('title', '| Admin | Chaplains')


@section('content')
    
<div>  
  @include('admin.includes.messages')
  <div>
    <div class="">
      <a href="{{route('chaplain.create')}}">Add a chaplain</a>
    </div>
  </div>      

  <div class="">
    <table style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Name</th>
          <th>Created</th>
          <th>Actions</th>
        </tr>
      </thead>

      <div class="">

        <ul class="list-group">
           <tbody>
          @foreach($chaplains as $chaplain)

             
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $chaplain->title }}</td>
                  <td>{{ $chaplain->first_name }} {{ $chaplain->last_name }}</td>
                  <td>{{ $chaplain->created_at->diffForHumans() }}</td>
                  <td>
                      <a href="{{ route('chaplain.show',$chaplain->slug) }}"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
                      <a class="" href="{{ route('chaplain.edit', $chaplain->slug) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                      <a href="#" onclick="
                      if (confirm('Are you sure, you want to delete {{ $chaplain->slug}}?')) {
                        event.preventDefault();
                        document.getElementById('delete-form-{{$chaplain->id}}').submit();
                      }
                        else{
                          event.preventDefault();
                        }">
                        <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        <form id="delete-form-{{ $chaplain->id}}" method="POST" action="{{ route('chaplain.destroy',$chaplain->id) }}" style="display: none;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                      </form>
                </tr>
              

          @endforeach
          </tbody>
        </ul>
      </div> 
    </table>
  </div>
<div class="row">
  {{ $chaplains->links() }}
</div>
</div><!-- /.blog-main -->

@endsection