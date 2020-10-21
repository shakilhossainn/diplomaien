@extends('layouts.admin')

@section('content')


 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Category</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Category list</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>


        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">



                      <div class="card">
              <div class="card-header">
                  <div class=" d-flex justify-content-between">

                      <h3 class="card-title">Category list</h3>
                  <a href="{{route('category.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>

                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 20px">#</th>
                      <th>Category Name</th>
                      <th>Post Count</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php
                          $i = 1
                      @endphp
                    @foreach ($categoryies as $category)

                    <tr>
                    <td>{{$i++}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->id}}</td>
                        <td class="d-flex">
                        <a href="{{route('category.edit',[$category->id])}}" class="btn-sm btn-success"><i class="fas fa-edit"></i></a>
                        <form action="{{route('category.destroy',[$category->id])}}" method="POST" class="btn-sm btn-danger ml-2">
                            @csrf
                            @method('delete')
                            <i class="fas fa-trash"></i>
                        </form>
                        </td>
                    </tr>

                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

                          </div>
                       </div>
                   </div>
                </div>
             </div>
        </div>
          <!--Mein  content -->


          @endsection
