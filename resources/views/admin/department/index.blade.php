@extends('layouts.back_master')

{{-- @push('vendor-styles')
  <link href="{{asset('backend2')}}/vendors/select2/dist/css/select2.css" rel="stylesheet" />
  <!--Data Tables -->
  <link href="{{asset('backend2')}}/vendors/bootstrap-datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="{{asset('backend2')}}/vendors/bootstrap-datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endpush

@push('page-styles')
  <link rel="stylesheet" type="text/css" href="{{asset('backend2')}}/dist/css/toggle.css">
  <link rel="stylesheet" type="text/css" href="{{asset('backend2')}}/vendors/toastrjs/toastr.min.css">
  <link rel="stylesheet" type="text/css" href="{{asset('backend2')}}/vendors/sweetalert2/sweetalert2.min.css">
  <style>
    input.ace-switch.ace-switch-yesno:checked::before {
      content: "Yes";
    }
    input.ace-switch.ace-switch-yesno::before {
      content: "No";
    }
    input.ace-switch.ace-switch-onoff:checked::before {
      content: "No";
    }
    input.ace-switch.ace-switch-onoff::before {
      content: "Off";
    }
  </style>
@endpush --}}

@section('admin_content')
  @section('breadcrumb')
    <div class="page-header mb-2 pb-2 flex-column flex-sm-row align-items-start align-items-sm-center py-25 px-1">
      <h1 class="page-title text-primary-d2 text-140">
        Home
        <small class="page-info text-dark-m3">
          <i class="fa fa-angle-double-right text-80"></i>
          Manage Department
        </small>
      </h1>
    </div>
  @endsection

  {{-- add new department modal start --}}
<div class="modal fade" id="addDepartmentModal" tabindex="-1" aria-labelledby="departmentModalLabel"
data-bs-backdrop="static" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="departmentModalLabel">Add New Department</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="#" method="POST" id="add_department_form" enctype="multipart/form-data">
      @csrf
      <div class="modal-body p-4 bg-light">
        <div class="row">

          <div class="col-lg">
            <label for="name">Department Name</label>
            <input type="text" name="name" class="form-control" placeholder="Department Name" required>
          </div>

          <div class="col-lg">
            <label for="slug">Slug Name</label>
            <input type="text" name="slug" class="form-control" placeholder="Slug Name" required>
          </div>

        </div>
       
        <div class="my-2">
          <label for="image">Select Avatar</label>
          <input type="file" name="image" class="form-control" required>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="add_department_btn" class="btn btn-primary">Add Department</button>
      </div>
    </form>
  </div>
</div>
</div>
{{-- add new department modal end --}}

{{-- edit department modal start --}}
<div class="modal fade" id="editDepartmentModal" tabindex="-1" aria-labelledby="departmentModalLabel"
data-bs-backdrop="static" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="departmentModalLabel">Edit Department</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="#" method="POST" id="edit_department_form" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="dep_id" id="dep_id">
      <input type="hidden" name="dep_image" id="dep_image">
      <div class="modal-body p-4 bg-light">
        <div class="row">

          <div class="col-lg">
            <label for="name">Department Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Department Name" required>
          </div>

          <div class="col-lg">
            <label for="slug">Slug Name</label>
            <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug Name" required>
          </div>

        </div>
       
        <div class="my-2">
          <label for="image">Select Avatar</label>
          <input type="file" name="image" class="form-control" required>
        </div>
        <div class="mt-2" id="image">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="edit_department_btn" class="btn btn-success">Update Department</button>
      </div>
    </form>
  </div>
</div>
</div>
{{-- edit department modal end --}}

<body class="bg-light">
<div class="container">
  <div class="row my-5">
    <div class="col-lg-12">
      <div class="card shadow">
        <div class="card-header bg-danger d-flex justify-content-between align-items-center">
          <h3 class="text-light">Manage Department</h3>
          <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addDepartmentModal"><i
              class="bi-plus-circle me-2"></i>Add New Department</button>
        </div>
        <div class="card-body" id="show_all_departments">
          <h1 class="text-center text-secondary my-5">Loading...</h1>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

{{-- @push('vendor-scripts')
  <script src="{{asset('backend2')}}/vendors/select2/dist/js/select2.js"></script>
    <!--Data Tables js-->
  <script src="{{asset('backend2')}}/vendors/bootstrap-datatable/js/jquery.dataTables.min.js"></script>
  <script src="{{asset('backend2')}}/vendors/bootstrap-datatable/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{asset('backend2')}}/vendors/bootstrap-datatable/js/dataTables.buttons.min.js"></script>
  <script src="{{asset('backend2')}}/vendors/bootstrap-datatable/js/buttons.bootstrap4.min.js"></script>
  <script src="{{asset('backend2')}}/vendors/bootstrap-datatable/js/jszip.min.js"></script>
  <script src="{{asset('backend2')}}/vendors/bootstrap-datatable/js/pdfmake.min.js"></script>
  <script src="{{asset('backend2')}}/vendors/bootstrap-datatable/js/vfs_fonts.js"></script>
  <script src="{{asset('backend2')}}/vendors/bootstrap-datatable/js/buttons.html5.min.js"></script>
  <script src="{{asset('backend2')}}/vendors/bootstrap-datatable/js/buttons.print.min.js"></script>
  <script src="{{asset('backend2')}}/vendors/bootstrap-datatable/js/buttons.colVis.min.js"></script>
@endpush --}}

@push('page-scripts')
  <script src="{{asset('backend2')}}/vendors/toastrjs/toastr.min.js"></script>
  <script src="{{asset('backend2')}}/vendors/sweetalert2/sweetalert2.all.min.js"></script>
  {{-- <script src="{{asset('backend2')}}//views/pages/table-datatables/@page-script.js"></script> --}}
  <script>
    $(function() {

      // add new department ajax request
      $("#add_department_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_department_btn").text('Adding...');
        $.ajax({
          url: '{{ route('store') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'Added!',
                'Department Added Successfully!',
                'success'
              )
              fetchAllDepartments();
            }
            $("#add_department_btn").text('Add Department');
            $("#add_department_form")[0].reset();
            $("#addDepartmentModal").modal('hide');
          }
        });
      });

      // edit department ajax request
      $(document).on('click', '.editIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
          url: '{{ route('edit') }}',
          method: 'get',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            $("#name").val(response.name);
            $("#slug").val(response.slug);
            $("#image").html(
              `<img src="storage/images_department/${response.image}" width="100" hight="auto" class="img-fluid img-thumbnail">`);
            $("#dep_id").val(response.id);
            $("#dep_image").val(response.image);
          }
        });
      });

      // update department ajax request
      $("#edit_department_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#edit_department_btn").text('Updating...');
        $.ajax({
          url: '{{ route('update') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'Updated!',
                'Department Updated Successfully!',
                'success'
              )
              fetchAllDepartments();
            }
            $("#edit_department_btn").text('Update Department');
            $("#edit_department_form")[0].reset();
            $("#editDepartmentModal").modal('hide');
          }
        });
      });

      // delete employee ajax request
      $(document).on('click', '.deleteIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let csrf = '{{ csrf_token() }}';
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '{{ route('delete') }}',
              method: 'delete',
              data: {
                id: id,
                _token: csrf
              },
              success: function(response) {
                console.log(response);
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
                fetchAllDepartments();
              }
            });
          }
        })
      });

      // fetch all department ajax request
      fetchAllDepartments();

      function fetchAllDepartments() {
        $.ajax({
          url: '{{ route('fetchAll') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_departments").html(response);
            $("table").DataTable({
              order: [0, 'desc']
            });
          }
        });
      }
    });
  </script>



  <script>

    // -------------Browse photo------------------
    $('.show-photo').on('click',function(e){
      $('#image').click();
    })
    $('#image').on('change',function(e){
      showFile(this,'#showPhoto');
    })


    // ======================================
    function showFile(fileInput,img,showName){
      if (fileInput.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
          $(img).attr('src',e.target.result);
        }
        reader.readAsDataURL(fileInput.files[0]);
      }
      $(showName).text(fileInput.files[0].name)
    };


  </script>
@endpush



