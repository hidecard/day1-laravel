@extends('backend.app')
@section('content')
<div class="container-fluid p-3">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h3 class="m-0 fw-bold text-primary">Create Category</h3>
        </div>
        <div class="card-body">
            <form action="{{route('category.update',$categories->id)}}" method="POST"> {{-- Replace '#' with action route --}}
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="categoryName" class="form-label">Name</label>
                    <input type="text" class="form-control" value="{{$categories->name}}" name="categoryName" id="categoryName" placeholder="Name">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus me-1"></i> Cancel
                    </button>
                     <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus me-1"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
