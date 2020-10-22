@extends('layouts.admin')

@section('content')


 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Tag</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tag list</li>
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

                      <h3 class="card-title">tag list</h3>
                  <a href="{{route('tag.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>

                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 20px">#</th>
                      <th>Tag Name</th>
                      <th>Tag Slug</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php
                          $i = 1
                      @endphp
                    @foreach ($tags as $tag)
                    <tr>
                    <td>{{$i++}}</td>
                        <td>{{$tag->name}}</td>
                        <td>{{$tag->slug}}</td>
                        <td class="d-flex">
                        <a href="{{route('tag.edit',[$tag->id])}}"  class="btn-sm btn-success"><i class="fas fa-edit"></i></a>

                        <form action="{{route('tag.destroy',[$tag->id])}}" method="POST" >

                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn-sm btn-danger ml-2"> <i class="fas fa-trash"></i></button>


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
