@extends('admin.layouts.admin-app')
@section('title', 'View Category')
@section('content')
<div class="row">
    <div class="col-md-10">
    @if(Session::has('category_added'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> {{ Session::get('category_added') }}</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    </div>
</div>
<div class="row">
    <div class="col-md-10">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Showing Categories</h4>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->slug}}</td>
                            <td>{{$category->status}}</td>
                            <td class="text-center">
                                 <a href="{{ url('/admin/edit-category/'.$category->id)}}" class="btn btn-primary">Edit</a> 
                                <a href="" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
    </div>
</div>
<script>
 $('#zero_config').DataTable();
</script>
@endsection