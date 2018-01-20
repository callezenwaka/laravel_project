@extends('admin.layouts.dashboard')

@section('title', '| Admin | Societies')


@section('content')
    
<div>
  @include('admin.includes.messages')
  <div class="">
    <a href="{{route('society.create')}}">Add Society</a>
    </div>
  <div class="">
    <table style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Time Posted</th>
          <th>Actions</th>
        </tr>
      </thead>

      <tbody>

          @foreach($societies as $society)

              
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $society->name }}</td>
                  <td>{{ $society->phone }}</td>
                  <td><strong>{{ $society->created_at->diffForHumans() }}</strong></td>
                    <td>
                      <a href="{{ route('society.show',$society->slug) }}"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
                      <a class="" href="{{ route('society.edit', $society->slug) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                      <a href="#" onclick="
                      if (confirm('Are you sure, you want to delete {{ $society->slug}}?')) {
                        event.preventDefault();
                        document.getElementById('delete-form-{{$society->id}}').submit();
                      }
                        else{
                          event.preventDefault();
                        }">
                        <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        <form id="delete-form-{{ $society->id}}" method="society" action="{{ route('society.destroy',$society->id) }}" style="display: none;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </td>
                </tr>
              

          @endforeach

       </tbody>
      </div> 
    </table>
  </div>
<div class="row">
  {{ $societies->links() }}
</div>
</div><!-- /.blog-main -->

@endsection