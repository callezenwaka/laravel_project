@extends('admin.layouts.dashboard')

@section('title', '| Admin | Categories')

@section('content')
    
<div>
  <div>
      <a href="{{route('category.create')}}">Add category</a>
  </div>      

  <div>
    <table style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;">
      <thead>
        <tr>
          <th>#</th>
          <th>Category Name</th>
          <th>Created</th>
          <th>Actions</th>
        </tr>
      </thead>

          @foreach($categories as $category)

              <tbody>
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $category->name }}</td>
                  <td><strong>{{ $category->created_at->diffForHumans() }}</strong></td>
                    <td>
                      <a href="{{ route('category.show',$category->slug) }}"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
                      <a class="" href="{{ route('category.edit', $category->slug) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                      <a href="#" onclick="
                      if (confirm('Are you sure, you want to delete {{ $category->slug}}?')) {
                        event.preventDefault();
                        document.getElementById('delete-form-{{$category->id}}').submit();
                      }
                        else{
                          event.preventDefault();
                        }">
                        <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        <form id="delete-form-{{ $category->id}}" method="POST" action="{{ route('category.destroy',$category->id) }}" style="display: none;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </td>
                </tr>
              </tbody>

          @endforeach
    </table>
  </div>
<div class="row">
  {{ $categories->links() }}
</div>
</div><!-- /.category-main -->

@endsection