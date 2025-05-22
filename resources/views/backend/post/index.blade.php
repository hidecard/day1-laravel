@extends('backend.app')
@section('content')

<div class="container">
    <h2 class="text-center">Post List</h2>

  
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Category</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($posts as $post)
               
         
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->category->name}}</td>
                    <td>{{$post->description}}</td>
                    <td>
                        <img src="{{ asset('storage/' . $post->cover) }}" alt="Post Image" width="80">
                    </td>
                    <td>
                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="" method="POST" style="display:inline-block;">
                          
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
