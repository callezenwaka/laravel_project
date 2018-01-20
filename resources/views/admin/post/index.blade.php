@extends('admin.layouts.dashboard')

@section('title', '| Admin | Posts')

@section('content')
    
<div>  
  <div>
    <div>
        <a href="{{route('post.create')}}"><button type="submit" class="btn btn-primary">Add a Post</button></a>
    </div>
  </div>      

  <div>
    <table style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Body</th>
          <th>Time posted</th>
          <th>Actions</th>
        </tr>
      </thead>

      <!-- <div class="">

        <ul class="list-group"> -->
        <tbody>

          @foreach($posts as $post)
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $post->title }}</td>
                  <td>{{ substr(strip_tags($post->body), 0, 20) }}{{ strlen(strip_tags($post->body)) > 20 ? "..." : "" }}
                  <a href="#"><i class="fa fa-external-link-square" aria-hidden="true"></i></a></td>
                  <td><strong>{{ $post->created_at->diffForHumans() }}</strong></td>
                    <td>
                      <a href="{{ route('post.show',$post->slug) }}"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
                      <a class="" href="{{ route('post.edit', $post->slug) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                      <a href="#" onclick="
                      if (confirm('Are you sure, you want to delete {{ $post->slug}}?')) {
                        event.preventDefault();
                        document.getElementById('delete-form-{{$post->id}}').submit();
                      }
                        else{
                          event.preventDefault();
                        }">
                        <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        <form id="delete-form-{{ $post->id}}" method="POST" action="{{ route('post.destroy',$post->id) }}" style="display: none;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </td>
                </tr>
          @endforeach
        </tbody>
        <!-- </ul>
      </div>  -->
    </table>
  </div>
<div class="row">
  {{ $posts->links() }}
</div>
</div><!-- /.post-main -->

@endsection