@extends('layouts.admin')

@section('content')

 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Category</h1>
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

  <div class="col-sm-10 m-0 m-auto">
  <div class="card card-primary">
    <div class="card-header">
        <a href="{{route('category.index')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
    </div>
    @include('admin.includes.error')
    <!-- /.card-header -->
    <!-- form start -->
<form action="{{route('category.update',[$category->id])}}" method="POST">
      <div class="card-body">
        <div class="form-group">
            @csrf

            @method('PUT')

          <label for="name">Categoy Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter category name" name="name" value="{{$category->name}}">
        </div>
        <div class="form-group">
          <label for="Describtion">Describtion</label>
        <textarea type="text" class="form-control" id="Describtion" placeholder="Enter describtion" name="describtion">{{$category->describtion}}</textarea>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>
  </div>

@endsection
