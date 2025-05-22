@extends('backend.app')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

<div class="container">
    <h2>Edit Post</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('post.update', $posts->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="{{ $posts->title }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Category</label>
            <select name="category_id" class="form-control" required>
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $posts->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" id="summernote" class="form-control">{!! $posts->description !!}</textarea>
        </div>

        <div class="form-group">
            <label>Old Image</label><br>
            <img src="{{ asset('storage/' . $posts->cover) }}" width="100">
        </div>

        <div class="form-group">
            <label>New Image (optional)</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('post.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({ height: 200 });
    });
</script>

@endsection
