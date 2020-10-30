@extends('layouts.admin')

@section('content')

 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Create post</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">post list</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="col-sm-10 m-0 m-auto">
  <div class="card card-primary">
    <div class="card-header">
        <a href="{{route('post.index')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
    </div>
    @include('admin.includes.error')
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                @csrf


            <label for="name">Post Title</label>
            <input type="text" class="form-control" value="{{old('title')}}" id="name" placeholder="Enter post name" name="title">
            </div>

            <div class="form-group">
            <label for="category">Post Category</label>
            <select name="category" class="form-control">
                <option value="" style="display:none;">Select Category</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
            </select>
            </div>
            <div class="form-group">
              <label for="Describtion">Post tags</label>
              <div class="col-sm-12">
                {{-- tags input --}}

                <div class="form-group">
                    <div class="select2-purple">
                        <select class="select2 select2-hidden-accessible" name="tags[]" multiple="" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;" data-select2-id="15" tabindex="-1" aria-hidden="true">
                            @foreach ($tags as $tag)
                            <option value="{{$tag->id}} ">{{$tag->name}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>

                {{-- tags input --}}
              </div>
            </div>
            <div class="form-group">
            <label for="Describtion">Describtion</label>
            <textarea type="text" class="form-control" id="Describtion" placeholder="Enter describtion" name="description">{{old('description')}}</textarea>
            </div>
            <div class="form-group">
            <label for="image">Image</label>
                <input type="file" class="form-control" name="image">

            <input type="hidden" class="form-control" name="user" value="{{Auth::user()->id}}">
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
  </div>
  </div>


@endsection

@section('style')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
{{-- <link rel="stylesheet" href="{{asset('admin/css/summernote-bs4.css')}}"> --}}
@endsection

@section('script')
{{-- <script src="{{asset('admin/js/summernote-bs4.js')}}"></script> --}}
<script>
    $('#Describtion').summernote({
      placeholder: 'Hello Bootstrap 4',
      tabsize: 2,
      height: 100
    });
  </script>
@endsection

