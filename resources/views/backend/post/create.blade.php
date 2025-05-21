@extends('backend.app')
@section('content')

<!-- Bootstrap 3 -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- Summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

<div class="container">
    <h2 class="text-center">Add New Post</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Title -->
        <div class="form-group">
            <label for="title">Post Title:</label>
            <input type="text" name="title" class="form-control" placeholder="Enter title" required>
        </div>

        <!-- Category -->
        <div class="form-group">
            <label for="category">Category:</label>
            <select name="category" class="form-control" required>
                <option value="">Select Category</option>
                <option value="news">News</option>
                <option value="tech">Tech</option>
                <option value="lifestyle">Lifestyle</option>
                <!-- Add more categories as needed -->
            </select>
        </div>

        <!-- Description -->
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="summernote" name="description" class="form-control"></textarea>
        </div>

        <!-- Image -->
        <div class="form-group">
            <label for="image">Upload Image:</label>
            <input type="file" name="image" class="form-control" accept="image/*" required>
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-primary">Add Post</button>
    </form>
</div>

<!-- Summernote Activation -->
<script>
    $(document).ready(function () {
        $('#summernote').summernote({
            height: 200
        });
    });
</script>

@endsection
