@extends('admin.layouts.dashboard')

@section('title', '| Admin | Tags')

@section('content')
    
<div>  
  <div>
      <a href="{{route('tag.create')}}">Add Tag</a>
  </div>      

  <div>
    <table style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;">
      <thead>
        <tr>
          <th>#</th>
          <th>Tag Name</th>
          <th>Created</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

          @foreach($tags as $tag)
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $tag->name }}</td>
                  <td><strong>{{ $tag->created_at->diffForHumans() }}</strong></td>
                    <td>
                      <a href="{{ route('tag.show',$tag->slug) }}"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
                      <a class="" href="{{ route('tag.edit', $tag->slug) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                      <a href="#" onclick="
                      if (confirm('Are you sure, you want to delete {{ $tag->slug}}?')) {
                        event.preventDefault();
                        document.getElementById('delete-form-{{$tag->id}}').submit();
                      }
                        else{
                          event.preventDefault();
                        }">
                        <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        <form id="delete-form-{{ $tag->id}}" method="POST" action="{{ route('tag.destroy',$tag->id) }}" style="display: none;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </td>
                </tr>
              </tbody>

          @endforeach
    </table>
  </div>
</div><!-- /.post-main -->

@endsection