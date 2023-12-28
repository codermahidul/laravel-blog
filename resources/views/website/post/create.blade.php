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
                <h4 class="m-b-0 text-white">Create New Post</h4>
                <a href="{{route('post.index')}}" class="btn btn-secondary">All Post</a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <span class="alert alert-success">{{session('success')}}</span>
                @endif
                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row p-t-20">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Post Title <span class="text-danger">*</span></label>
                                    <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Post Title" name="title" value="{{old('title')}}">
                                    @error('title')
                                    <small class="form-control-feedback text-danger"> {{$message}} </small>
                                    @enderror
                                 </div>
                            </div>
   
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Slug</label>
                                    <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Slug" name="slug" value="{{old('slug')}}">
                                    @error('slug')
                                    <small class="form-control-feedback text-danger"> {{$message}} </small>
                                    @enderror
                                 </div>
                            </div>                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Category</label>
                                    <select name="category_id" id="" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                 </div>
                            </div>                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="published">Published</option>
                                        <option value="review">Review</option>
                                        <option value="draft">Draft</option>
                                    </select>
                                 </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Content</label>
                                    <textarea id="summernote" name="content">Write Your Post</textarea>
                                    @error('content')
                                    <small class="form-control-feedback text-danger"> {{$message}} </small>
                                    @enderror
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thumbnail</label>
                                    <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail" value="{{old('thumbnail')}}">
                                    @error('thumbnail')
                                    <small class="form-control-feedback text-danger"> {{$message}} </small>
                                    @enderror
                                 </div>
                            </div>                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Tags</label>
                                    <input type="text" class="form-control @error('tags') is-invalid @enderror" placeholder="Food,Juice,Rice" name="tags" value="{{old('tags')}}">
                                    @error('tags')
                                    <small class="form-control-feedback text-danger"> {{$message}} </small>
                                    @enderror
                                 </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>Create Post</button>
                        <a href="{{route('post.index')}}" class="btn btn-inverse">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection