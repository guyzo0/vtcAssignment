@extends('layouts.app')

@section('content')
<div class="container">
			<div class="row">
				<div class="col-md-12">
        <span class="contact100-form-title">Update your profil</span>
                    <form action="{{ route('user.update', ['id'=>$user->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label for="name"> User Name </label>
                            <input type="text" name="name" id="name" value="{{ $user->name}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email"> Email </label>
                            <input type="text" name="email" id="email" value="{{ $user->email}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password"> Password </label>
                            <input type="password" name="password" id="password" value="{{ $user->password}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="repeat_password"> Repeat Password </label>
                            <input type="password" name="repeat_password" id="repeat_password" class="form-control">
                        </div>
                        
                        <div class="form-group">
                        <center>
                            <button type="submit" class="btn btn-success btn-lg">save</button>
                        </center>
                        </div>
                    </form>
            <div class="col-md-2">
            @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span>
                    </button>
                        <strong> Erreur! </strong> {{Session::get('error')}}
                </div>
            @endif
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span>
                    </button>
                        <strong> Succes! </strong> {{Session::get('success')}}
            </div>
            @endif
        </div>
        </div>
    </div>
@endsection