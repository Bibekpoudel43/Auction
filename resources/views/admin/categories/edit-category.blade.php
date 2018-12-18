@extends('admin.layouts.admin-app')
@section('title', 'Add Category')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <form class="form-horizontal" id="categoryForm" method="POST" action="{{ url('/admin/edit-category/'.$details->id)}}">
                @csrf
                <div class="card-body">
                    <h4 class="card-title">Add Category</h4>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 text-right control-label col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" value="{{$details->name}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-3 text-right control-label col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select class="select2 form-control custom-select" style="width: 100%; height:36px;" required>
                                <optgroup label="Category Status">
                                    <option value="{{$details->status == 'active' ? 'active' : ''}}"></option>
                                    <option value="{{$details->status == 'inactive' ? 'inactive' : ''}}"></option>
                                </optgroup>                                          
                            </select>
                        </div>
                    </div>
                    <div class="form-group row border-top">
                        <div class="col-sm-3"></div>      
                       <div class="col-sm-9 mt-3">
                        <button type="submit" class="btn btn-primary" id="categoryButton">Submit</button>
                        </div>
                     </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection