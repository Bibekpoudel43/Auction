@extends('admin.layouts.admin-app')
@section('title', 'View Products')
@section('content')
<div class="row">
    <div class="col-md-10">
    <!-- @if(Session::has('category_added'))
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
    @endif -->
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
        <h4 class="card-title p-4">Products List</h4>
        <div class="card-body">
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped text-center table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Initial Price</th>
                            <th>Market Price</th>
                            <th>Auction End Date/Time</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->initial_price}}</td>
                            <td>{{$item->market_price}}</td>
                            <td>{{$item->end_date_time}}</td>
                            <td>
                                @if (Storage::disk('local')->has($item->image_name))
                                <img src="{{Storage::url($item->image_name)}}" alt="" class="card-img-top" style="width:100%; height:100px;">
                                @endif
                            </td>
                            <td>{{$item->category_id}}
                            </td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->updated_at}}</td>
                            <td class="text-center">
                                <a href="{{ url" id="delCat" class="btn btn-danger">
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