@extends('layouts.admin_layout')
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">All Users</h1>
</div>

<!-- Content Row -->

<div class="row">

  <!-- Area Chart -->
  <div class="col-xl-12">
    <div class="card shadow mb-4">
      <!-- Card Body -->
      <div class="card-body">
        <form method="post" action="{{ url("admin/store-products") }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="row">

            <div class="col-sm-6">
              <label>Product Name:</label>
              <input type="text" name="p_name" class="form-control">
            </div>
            
            <div class="col-sm-6">
              <label>Price:</label>
              <input type="text" name="p_price" class="form-control">
            </div>
            
            <div class="col-sm-3 mt-3">
              <label>Category:</label>
              <select name="p_category" class="form-control">
                <option selected disabled value="">Select Category</option>
                @foreach($cat as $key => $c)
                  <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-sm-3 mt-3">
              <label>File1:</label>
              <input type="file" name="p_file1" class="form-control">
            </div>
            <div class="col-sm-3 mt-3">
              <label>File2:</label>
              <input type="file" name="p_file2" class="form-control">
            </div>


            <div class="col-sm-8 mt-3">
              <label>Desc:</label>
              <textarea style="height:100px" name="p_desc" class="form-control"></textarea>
            </div>


          </div>
          <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
      </div>
    </div>
  </div>

</div>
@endsection

