@extends('layouts.app')

@section('breadcrumb')
    <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Category</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">New Category</li>
                    </ol>
                </div>
                <div>
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="m-b-0 text-white">Create New Category</h4>
                <a href="{{route('category.index')}}" class="btn btn-secondary">All Category</a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <span class="alert alert-success">{{session('success')}}</span>
                @endif
                <form action="{{route('category.store')}}" method="POST">
                    @csrf
                    <div class="form-body">
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Category Name <span class="text-danger">*</span></label>
                                    <input type="text" id="categoryName" class="form-control @error('category_name') is-invalid @enderror" placeholder="Category Name" name="category_name" value="{{old('category_name')}}">
                                    @error('category_name')
                                    <small class="form-control-feedback text-danger"> {{$message}} </small>
                                    @enderror
                                 </div>
                            </div>
   
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Slug</label>
                                    <input type="text" id="categorySlug" class="form-control @error('categorySlug') is-invalid @enderror" placeholder="Slug" name="category_slug" value="{{old('category_slug')}}">
                                    @error('category_slug')
                                    <small class="form-control-feedback text-danger"> {{$message}} </small>
                                    @enderror
                                 </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description"  rows="4" placeholder="Description" name="description">{{old('description')}}</textarea>
                                    @error('description')
                                    <small class="form-control-feedback text-danger"> {{$message}} </small>
                                    @enderror
                                 </div>
                            </div>

                        </div>
                        
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Create</button>
                        <a href="{{route('category.index')}}" class="btn btn-inverse">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection