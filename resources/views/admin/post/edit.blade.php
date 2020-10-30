@extends('layouts.admin')

@section('content')

 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit post</h1>
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
    <form action="{{route('post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">

                @method('put')
                @csrf

            <label for="name">Post Title</label>
            <input type="text" class="form-control" value="{{$post->title}}" id="name" placeholder="Enter post name" name="title">
            </div>

            <div class="form-group">
            <label for="category">Post Category</label>
            <select name="category" class="form-control">
                <option value="" style="display:none;">Select Category</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}" @if($post->category_id == $category->id) selected @endif >{{$category->name}}</option>
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
                              <option value="{{$tag->id}}"
                                @foreach ($post->tags as $t)
                                  @if ($tag->id == $t->id)
                                    selected
                                  @endif
                                @endforeach

                                 >{{$tag->name}}</option>
                          @endforeach
                      </select>
                      </div>
                  </div>

                  {{-- tags input --}}
                </div>
              </div>

            <div class="form-group">
            <label for="Describtion">Describtion</label>
            <textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            <textarea type="text" class="form-control" id="Describtion" placeholder="Enter describtion" name="description">{{$post->description}}</textarea>
            </div>
            <div class="form-group col-sm-6 ">
            <label for="image">Image</label>
            <div class="d-flex justify-content-between">
                <input type="file" class="form-control" name="image">
            <img src="{{$post->image}}" alt="post image" style="max-width: 40em;max-height:60em">
            </div>

              </div>
              <input type="hidden" class="form-control" name="user" value="{{Auth::user()->id}}">
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
  </div>
  </div>

@endsection
