@extends('backend.app')
@section('content')

<div class="container p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold text-primary">Category List</h4>
       
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th style="width: 10%">No</th>
                            <th>Name</th>
                            <th style="width: 25%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample static rows -->

                        @foreach ($categories as $category)
                            
                     
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-edit me-1"></i> Edit
                                    </a>
                                    <button class="btn btn-outline-danger btn-sm">
                                        <i class="fas fa-trash me-1"></i> Delete
                                    </button>
                                </div>
                            </td>
                        </tr>

                           @endforeach
                      
                        <!-- More rows as needed -->
                    </tbody>
                </table>

               
            </div>

            <!-- Static pagination (optional) -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center mt-3">
                    <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>


@endsection