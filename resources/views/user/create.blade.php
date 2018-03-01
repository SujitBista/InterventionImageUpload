@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Post
      </h1>
      <br>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ Session::get('success') }}
            </div>
        @endif

 <form method="post" action="{{ route('user.post.store')}}" enctype="multipart/form-data">

   {{ csrf_field() }}
        
          <div class="form-group">
            <label for="code">Title</label>
            <input class="form-control" type="text" name="title" placeholder="Enter Name" required>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <input class="form-control" type="text" name="description" placeholder="Enter Description" required>
          </div>
           <div class="form-group">
              <label for="location">Location</label>
              <input class="form-control" type="text" name="location" placeholder="Enter location" required>
          </div>
          <div class="form-group">
              <label for="numberOfRooms">Number Of Rooms</label>
              <input class="form-control" type="text" name="numberOfRooms" placeholder="Enter number of rooms" required>
          </div>
          <div class="form-group">
              <label for="price">Price</label>
              <input class="form-control" type="text" name="price" placeholder="Enter Price" required>
          </div>
          <div class="form-group">
             <label for="file">Upload File</label>
             <input type="file" name="file" required>
          </div>
  
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="" class="btn btn-default">Cancel</a>
    </form>
</section>
</div>  <!--end contain wrapper -->
@endsection
