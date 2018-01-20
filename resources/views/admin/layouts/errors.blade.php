@if (count($errors) > 0)
	<ul>
		@foreach ($errors->all() as $error)
            <div class="alert alert-danger" style="background-color: red;padding: 5px;border-radius: 5px;margin-top: 3px;">
            	<li><i class="fa fa-times-circle-o" aria-hidden="true"></i>  {{ $error }}</li>
            </div>
		@endforeach
	</ul>
@endif

<!-- @if (session()->has('message'))

	<p class="alert alert-success">{{ session('message') }}</p>

@endif -->