@extends('layouts.app')

@section('content')
<section class="ftco-section">
		<div class="container">
			<div class="row">
            <div class="col-md-12">
					<div class="table">
						<table class="table">
                            <span>List of the available posts</span>
                            <a href="{{ route('post.create')}}" class="btn btn-xs pull-right btn-success"> create a post </a>

                        <thead class="table-dark">
                            <th>Index</th>
                            <th>Post name</th>
                            <th>Detail</th>
                            <th>Edit</th>
                            <th>delete</th>
                        </thead>

                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <th>{{ $post->id }}</th>
                                    <th>{{ $post->post_name }}</th>
                                   
                                    <th>
                                        <a href="{{route('post.show', ['id'=>$post->id])}}" class="btn btn-sm btn-primary">Detail</a>
                                    </th>
                                    <th>
                                        <a href="{{ route('post.edit', ['id'=>$post->id])}}" class="btn btn-sm btn-warning">Edit</a>
                                    </th>
                                    <th>
                                        <a href="{{ route('post.delete', ['id'=>$post->id])}}" method="DELETE" class="btn btn-sm btn-danger">delete</a>
                                    </th>
                                </tr>
                            @endforeach
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