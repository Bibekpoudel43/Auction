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
    @if(Session::has('category_updated'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> {{ Session::get('category_updated') }}</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(Session::has('category-deleted'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> {{ Session::get('category-deleted') }}</strong> 
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
        <h4 class="card-title">Categories List</h4>
        <div class="card-body">
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped text-center table-bordered">
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
                                 <a href="{{ url('/admin/edit-category/'.$category->id)}}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a> 
                                <a href="{{ url('/admin/delete-category/'.$category->id)}}" id="delCat" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    </div>
</div>
<script>
 $('#zero_config').DataTable();
</script>
<script>
    $("#delCat").click(function(){
        if(confirm('Are you sure want to Delete this category?'))
        {
            return true;
        }
        else{
            return false;
        }
    });

</script>
@endsection