@extends('admin.layouts.dashboard')

@section('title', '| Admin | Blogs')


@section('content')
    
<div>  
    @include('admin.includes.messages')
  <div>
    <div class="">
      <a href="{{route('blog.create')}}">Add a Post</a>
    </div>
  </div>      

  <div class="">
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

          @foreach($blogs as $blog)

              <tbody>
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $blog->title }}</td>
                  <td>{{ substr(strip_tags($blog->body), 0, 20) }}{{ strlen(strip_tags($blog->body)) > 20 ? "..." : "" }}
                  <a href="#"><i class="fa fa-external-link-square" aria-hidden="true"></i></a></td>
                  <td><strong>{{ $blog->created_at->diffForHumans() }}</strong></td>
                    <td>
                      <a href="{{ route('blog.show',$blog->slug) }}"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
                      <a class="" href="{{ route('blog.edit', $blog->slug) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                      <a href="#" onclick="
                      if (confirm('Are you sure, you want to delete {{ $blog->slug}}?')) {
                        event.preventDefault();
                        document.getElementById('delete-form-{{$blog->id}}').submit();
                      }
                        else{
                          event.preventDefault();
                        }">
                        <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        <form id="delete-form-{{ $blog->id}}" method="POST" action="{{ route('blog.destroy',$blog->id) }}" style="display: none;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </td>
                </tr>
              </tbody>

          @endforeach

        </ul>
      </div> 
    </table>
  </div>
<div class="row">
  {{ $blogs->links() }}
</div>
</div><!-- /.blog-main -->

@endsection