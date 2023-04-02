@extends('layouts.app')

@section('content')
<div class="container">
			<div class="row">
				<div class="col-md-12">
        <span class="contact100-form-title">Update a site</span>
                    <form action="{{ route('post.update', ['id'=>$post->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label for="post_name"> Post Name </label>
                            <input type="text" name="post_name" id="post_name" value="{{ $post->post_name}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="comment"> Comment </label>
                            <input type="text" name="comment" id="comment" value="{{ $post->comment}}" class="form-control">
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