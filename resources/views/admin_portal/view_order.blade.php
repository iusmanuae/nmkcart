@extends('layouts.admin_layout')
@section('content')
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 24px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
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
        <table class="table" id="allUserTable" >
            <thead>
              <tr>
                  <th>Sr.</th>
                  <th>Image</th>
                  <th>Product Name</th>
                  <th>Price</th>
                  <th>Qty</th>
                  <th>Total</th>
              </tr>
            </thead>
            <tbody></tbody>
        </table>
      </div>
    </div>
  </div>

</div>
@endsection
@section('jquery')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/jq-3.3.1/dt-1.10.21/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/ju/jq-3.3.1/dt-1.10.21/datatables.min.js"></script>
<script>
  $('#allUserTable').DataTable({
         "ajax": "{{ url('admin/view-orders') }}/{{ $id }}",
  });

  function changeStatus(e,user_id) {

      if ($(e).is(':checked')){
        statusAjax('active',user_id);
      }else{
        statusAjax('deactive',user_id);
      }
      x++;
  }
  function statusAjax(status,user_id) {
      
      $.ajax({
        url: '{{ url("admin/change-status") }}/'+user_id+'/'+status,
        type: 'post',
        dataType: 'json',
        data: {_token: 'yTpDTW9u22FrxsZNVcrWF8pnYupyplAeqk0mV9A1'},
      })
      .done(function() {
        console.log("success");
      });
      
  }
</script>
@endsection
