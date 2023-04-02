@extends('layouts.app')

@section('content')

<section class="ftco-section">
		<div class="container">
            <div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
                        <table class="table table-info">
                            <h1 class="row justify-content-center">Displaying of the post detail</h1>
                            <thead class="table-dark">
                                <th>Index</th>
                                <th>post Name</th>
                                <th>comment</th>
                                <th>Created At</th>
                                <th>Update At</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>{{ $post->id }}</th>
                                    <th>{{ $post->post_name }}</th>
                                    <th>{{ $post->comment }}</th>
                                    <th>{{ $post->createdAt }}</th>
                                    <th>{{ $post->updatedAt }}</th>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
                                    
        <div class="col-md-2">
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span>
                    </button>
                        <strong> success! </strong> {{Session::get('success')}}
            </div>  
            @endif
        </div>
    </div>
</section>
    @endsection