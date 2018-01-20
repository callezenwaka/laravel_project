@extends('admin.layouts.dashboard')

@section('title', '| Admin | Create | Homily')

@section('content')

<div>

	<div>
    <div class="form-group ">
      <a href="{{route('homily.index')}}"><button type="submit" class="buttons">Back</button></a>
    </div>
  </div>  

       <h1>Publish Homily</h1>
       
       <hr>

       <form method="POST" action="{{ route('homily.store')}}" enctype="multipart/form-data">
                {{ csrf_field() }}


	       	<div class="row">
	       		<label for="title">Title:</label>
	       		<input type="text" class="input" name="title" id="title" value="{{ old('title') }}" placeholder="Title" required="">
	       	</div>

	       	<div class="row">	       		
	       		<label for="body">Body:</label>
	       		<textarea class="input" name="body" id="editor" placeholder="Body">{{ old('body') }}</textarea>	
	       	</div>

	       	<div class="row">
	       		<label for="published_at">Published on:</label>
	       		<input type="date('Y-m-d')" class="input" name="published_at" id="published_at" value="{{date('Y-m-d')}}" required="">
	       	</div>

	       	<div class="row">
	       	    <button type="submit" class="buttons">Publish</button>
	       	</div>

	       	@include('admin.layouts.errors')

       </form>

</div><!-- homily-main -->

@endsection

@section('footer')
	
@endsection