@if (session()->has('message'))

	<div class="alert alert-success" style="background-color: Green;padding: 5px;border-radius: 5px;"><i class="fa fa-check-circle-o" aria-hidden="true"></i> {{ session('message') }}</div>

@endif