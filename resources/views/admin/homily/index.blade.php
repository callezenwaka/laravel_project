@extends('admin.layouts.dashboard')

@section('title', '| Admin | Homilies')

@section('content')
    
<div>
  @include('admin.includes.messages')
    <div>
      <a href="{{route('homily.create')}}">Publish Homily</a>
    </div>

  <div>
    <table style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Status</th>
          <th>Time Added</th>
          <th>Actions</th>
        </tr>
      </thead>

      <!-- <div class="">

        <ul class="list-group"> -->

          @foreach($homilies as $homily)

              <tbody>
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $homily->title }}</td>
                  <td>{{ $loop->index + 1 }}</td>
                  <!-- <td>{{ substr(strip_tags($homily->body), 0, 20) }}{{ strlen(strip_tags($homily->body)) > 20 ? "..." : "" }}
                  <a href="#">Read More</a></td> -->
                  <td><strong>{{ $homily->created_at->diffForHumans() }}</strong></td>
                    <td>
                      <a href="{{ route('homily.show',$homily->slug) }}"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
                      <a class="" href="{{ route('homily.edit', $homily->slug) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                      <a href="#" onclick="
                      if (confirm('Are you sure, you want to delete this?')) {
                        event.preventDefault();
                        document.getElementById('delete-form-{{$homily->id}}').submit();
                      }
                        else{
                          event.preventDefault();
                        }">
                        <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        <form id="delete-form-{{ $homily->id}}" action="{{ route('homily.destroy',$homily->id) }}" style="display: none;">
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
<div class="row">
  {{ $homilies->links() }}
</div>
</div><!-- /.post-main -->

@endsection