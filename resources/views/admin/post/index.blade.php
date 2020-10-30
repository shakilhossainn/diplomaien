@extends('layouts.admin')

@section('content')


 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">posts</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">posts list</li>
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

                      <h3 class="card-title">posts list</h3>
                  <a href="{{route('post.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>

                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 20px">#</th>
                      <th style="width: 30%">posts Name</th>
                      <th>posts image</th>
                      <th>Post Category</th>
                      <th>Author</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php
                          $i = 1
                      @endphp
                      @if ($posts->count())
                    @foreach ($posts as $post)
                    <tr >

                    <td>{{$i++}}</td>
                        <td>
                            {{-- {{ Str::limit($post->title, $limit = 20) }} --}}

                            {{$post->title}}
                        <td>
                            <div style="max-width:70px;overflow:hidden;">
                            <img src="{{$post->image}}" alt="User Image">

                            </div>
                        </td>
                        <td>
                            {{$post->category->name}}
                        </td>
                        <td>
                            {{$post->user->name}}
                        </td>
                        <td class="d-flex">
                               <a href="{{route('post.show',[$post->id])}}"  style="margin-right: 10px;"  class="btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                        <a href="{{route('post.edit',[$post->id])}}"  class="btn-sm btn-success"><i class="fas fa-edit"></i></a>
                        <form action="{{route('post.destroy',[$post->id])}}" method="POST" >
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn-sm btn-danger ml-2"> <i class="fas fa-trash"></i></button>
                        </form>

                        </td>
                    </tr>

                    @endforeach
                    @else
                    <tr>
                        <td colspan="6">
                            <h5 style="text-align: center;">NO Posts data forund</h5>
                        </td>
                    </tr>
                    @endif
                  </tbody>
                </table>
              </div>
              <div class="row text-center pt-5 border-top">
                  <div class="com-md-12">
                        <div  class="d-flex">

                            {{$posts->links()}}
                        </div>
                  </div>
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

<style>
.h-5{
    display: none;
}
.shadow-sm{
    display: none;
}
.flex-1{
    padding-left: 12px;
    margin-bottom: 12px;
}

.leading-5{ padding-left: 22px;}
</style>
          @endsection
