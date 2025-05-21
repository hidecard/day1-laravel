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
           
                <tr>
                    <td>1</td>
                    <td>Html Basic</td>
                    <td>Html</td>
                    <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti possimus aperiam ullam praesentium dolor officia magni, corrupti cupiditate temporibus consequatur? Eveniet labore temporibus itaque, aut totam eaque. Quis, assumenda fugit.</td>
                    <td>
                        <img src="" alt="Post Image" width="80">
                    </td>
                    <td>
                        <a href="" class="btn btn-warning btn-sm">Edit</a>
                        <form action="" method="POST" style="display:inline-block;">
                          
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
          
        </tbody>
    </table>
</div>

@endsection
