@extends('admin.layouts.dashboard')

@section('title', '| Admin | Edit | Homily')


@section('content')
    
<div>

  <div>
    <div class="form-group main">
      <a href="{{ route('homily.index') }}"><button type="submit" class="btn btn-primary">Back</button></a>
    </div>
  </div>  

       <h1>Editing Homily</h1>
       
       <hr>

       <form method="POST" action="{{ route('homily.update',$homily->slug) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

          <div class="row">
            <label for="title">Title:</label>
            <input type="text" class="input" name="title" id="title" value="{{ $homily->title }}" required="">
          </div>

          <div class="row">            
            <label for="body">Body:</label>
            <textarea class="input inputBody" name="body" id="editor">{{ $homily->body }}</textarea> 
          </div>

          <div class="row">
            <label for="published_at">Published on:</label>
            <input type="date" class="input" name="published_at" id="published_at" value="{{ $homily->published_at->format('Y-m-d') }}" required="">
            <!-- <input type="date('Y-m-d')" class="input" name="published_at" id="published_at" value="{{date('Y-m-d')}}" required=""> -->
          </div>

          <div class="row">
              <button type="submit" class="buttons">Publish</button>
          </div>

          @include('admin.layouts.errors')

       </form>

</div><!-- /.blog-main -->

@endsection