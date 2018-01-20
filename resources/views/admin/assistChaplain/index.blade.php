@extends('admin.layouts.dashboard')

@section('title', '| Admin | AssistChaplains')


@section('content')
    
<div>  
  @include('admin.includes.messages')
  <div>
    <div class="">
      <a href="{{route('assistChaplain.create')}}"><button>Add a AssistChaplain</button></a>
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
          @foreach($assistChaplains as $assistChaplain)

             
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $assistChaplain->title }}</td>
                  <td>{{ $assistChaplain->first_name }} {{ $assistChaplain->last_name }}</td>
                  <td>{{ $assistChaplain->created_at->diffForHumans() }}</td>
                  <td>
                      <a href="{{ route('assistChaplain.show',$assistChaplain->slug) }}"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
                      <a class="" href="{{ route('assistChaplain.edit', $assistChaplain->slug) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                      <a href="#" onclick="
                      if (confirm('Are you sure, you want to delete {{ $assistChaplain->slug}}?')) {
                        event.preventDefault();
                        document.getElementById('delete-form-{{$assistChaplain->id}}').submit();
                      }
                        else{
                          event.preventDefault();
                        }">
                        <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        <form id="delete-form-{{ $assistChaplain->id}}" method="POST" action="{{ route('assistChaplain.destroy',$assistChaplain->id) }}" style="display: none;">
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
  {{ $assistChaplains->links() }}
</div>
</div><!-- /.blog-main -->

@endsection