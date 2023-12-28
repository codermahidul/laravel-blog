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
                        <li class="breadcrumb-item active">Category</li>
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
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div id="example23_wrapper" class="dataTables_wrapper"><div id="example23_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="example23"></label></div><table id="example23" class="display nowrap table table-hover table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example23_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 214px;">Category Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 318px;">Category Slug</th>
                                <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 163px;">Description</th>
                                <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 163px;">Post's</th>
                                <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 118px;">Created At</th><th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 118px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>   
                        @if ($total == 0)
                            <tr>
                                <td colspan="6" class="text-center py-4">No Category</td>
                            </tr>
                        @else
                        @foreach ($categories as $category)
                        <tr role="row" class="odd">
                            <td class="sorting_1">{{$category->category_name}}</td>
                            <td>{{$category->category_slug}}</td>
                            <td>{{$category->description}}</td>
                            <td>0</td>
                            <td>{{$category->created_at}}</td>
                            <td class="d-flex align-items-center">
                                <a href="{{route('category.edit',$category->id)}}"><i class="fa fa-edit mr-2"></i></a>

                                 |<form action="{{route('category.destroy',$category->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-transparent d-inline"><i class="fa fa-trash-o"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    </table><div class="dataTables_info" id="example23_info" role="status" aria-live="polite">Showing 1 to 10 of {{$total}} entries</div><div class="dataTables_paginate paging_simple_numbers" id="example23_paginate"><a class="paginate_button previous" aria-controls="example23" data-dt-idx="0" tabindex="0" id="example23_previous">Previous</a><span><a class="paginate_button " aria-controls="example23" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="example23" data-dt-idx="2" tabindex="0">2</a><a class="paginate_button " aria-controls="example23" data-dt-idx="3" tabindex="0">3</a><a class="paginate_button " aria-controls="example23" data-dt-idx="4" tabindex="0">4</a><a class="paginate_button " aria-controls="example23" data-dt-idx="5" tabindex="0">5</a><a class="paginate_button current" aria-controls="example23" data-dt-idx="6" tabindex="0">6</a></span><a class="paginate_button next disabled" aria-controls="example23" data-dt-idx="7" tabindex="0" id="example23_next">Next</a></div></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection