 @extends('admin.layouts.dashboard')

@section('title', '|Admin | Edit | Admin')


@section('content')
    
<div>
    <div class="wrapper center">
    <div class="head">
      <a href="{{route('admin.index')}}"><button type="submit" class="btn btn-primary">Back</button></a>
      <h1 class="head_margin">Editing a Post</h1>
    </div>
       <hr>

        @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

       <form method="POST" action="{{route('admin.update', $user->slug)}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="row {{ $errors->has('first_name') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="first_name" class="col-md-4 control-label" style="text-align: right;">First Name: </label>
                        <input id="first_name" type="text" class="input" name="first_name" value="{{ $user->first_name }}" placeholder="First Name" required autofocus>
                    </div>
                    <div class="col-md-6">
                        @if ($errors->has('first_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

          <div class="row {{ $errors->has('last_name') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="last_name" class="col-md-4 control-label" style="text-align: right;">Last Name: </label>
                        <input id="last_name" type="text" class="input" name="last_name" value="@if (old('last_name')){{ old('last_name') }}@else{{ $user->last_name }}@endif" placeholder="Last Name" required autofocus>
                    </div>
                    <div class="col-md-6">
                        @if ($errors->has('last_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

          <div class="row {{ $errors->has('image') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="image" class="col-md-4 control-label" style="text-align: right;">Image: </label>
                        <input id="image" type="file" class="input" name="image" value="{{ $user->image }}" placeholder="Last Name" autofocus>
                    </div>
                    <div class="col-md-6">
                        @if ($errors->has('image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                 <div class="row {{ $errors->has('phone') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="phone" class="col-md-4 control-label" style="text-align: right;">Phone: </label>
                        <input id="phone" type="text" class="input" name="phone" value="{{ $user->phone }}" placeholder="Phone Number" required autofocus>
                    </div>
                    <div class="col-md-6">
                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

            <div class="row {{ $errors->has('status') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="status" class="" style="text-align: right;">Status: </label>
                        <div class="checkbox">
                            <label><input id="" type="checkbox" class="" name="status" @if (old('status') == 1 || $user->status == 1) checked @endif value="1">Status</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @if ($errors->has('status'))
                            <span class="help-block">
                                <strong>{{ $errors->first('status') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>


          <div class="row {{ $errors->has('email') ? 'has-error' : '' }}">
                    <div class="input1">
                        <label for="email" class="col-md-4 control-label" style="text-align: right;">Email: </label>
                        <input id="email" type="email" class="input" name="email" value="{{ $user->email }}" placeholder="Email" required autofocus>
                    </div>
                    <div class="col-md-6">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="input1">
                        <label for="password" class="">Password: </label>
                        <input id="password" type="password" class="input" name="password" placeholder="Password" required>
                    </div>
                    <div class="col-md-6">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="input1">
                        <label for="password-confirm" class="">Confirm Password: </label>
                        <input id="password-confirm" type="password" class="input" name="password_confirmation" placeholder="Confirm Password" required>
                    </div>
                </div> -->

                <div class="row">
                    <label for="role" class="">Assigned Roles: </label>
                    <div style="display: flex;justify-content: space-between;">
                    @foreach ($roles as $role)
                        <div class="input1">
                            <div class="checkbox">
                                <label><input type="checkbox" name="role[]" value="{{ $role->id}}"
                                    @foreach ($user->roles as $user_role)
                                        @if ($user_role->id == $role->id)
                                            checked
                                        @endif
                                    @endforeach>{{$role->name}}</label>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
                
          <div class="row">
              <button type="submit" class="buttons">Update User</button>
          </div>
       </form>
   </div>
</div>

@endsection