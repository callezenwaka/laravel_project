@extends('admin.layouts.dashboard')

@section('title', '| Admin | Executives')


@section('content')
    
<div>
  @include('admin.includes.messages')
    <div class="">
      <a href="{{route('executive.create')}}">Add Executive</a>
    </div>
  <div class="">
    <table style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Portfolio</th>
          <th>Phone</th>
          <th>Time posted</th>
          <th>Actions</th>
        </tr>
      </thead>

      <tbody>

          @foreach($executives as $executive)
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $executive->first_name }} {{ $executive->last_name }}</td>
                  <td>{{ $executive->Portfolio}}</td>
                  <td>{{ $executive->phone}}</td>
                  <td><strong>{{ $executive->created_at->diffForHumans() }}</strong></td>
                    <td>
                      <a href="{{ route('executive.show',$executive->slug) }}"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
                      <a class="" href="{{ route('executive.edit', $executive->slug) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                      <a href="#" onclick="
                      if (confirm('Are you sure, you want to delete {{ $executive->slug}}?')) {
                        event.preventDefault();
                        document.getElementById('delete-form-{{$executive->id}}').submit();
                      }
                        else{
                          event.preventDefault();
                        }">
                        <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        <form id="delete-form-{{ $executive->id}}" method="POST" action="{{ route('executive.destroy',$executive->id) }}" style="display: none;">
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
  {{ $executives->links() }}
</div>
</div><!-- /.executive-main -->

@endsection