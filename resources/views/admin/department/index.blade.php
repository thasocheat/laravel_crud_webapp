@extends('layouts.back_master')

@push('vendor-styles')
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
@endpush

@section('admin_content')
  @section('breadcrumb')
    <div class="page-header mb-2 pb-2 flex-column flex-sm-row align-items-start align-items-sm-center py-25 px-1">
      <h1 class="page-title text-primary-d2 text-140">
        Home
        <small class="page-info text-dark-m3">
          <i class="fa fa-angle-double-right text-80"></i>
          {{-- {{trans('cruds.user.title')}} --}}
          Manage Department
        </small>
      </h1>
    </div>
  @endsection

  <div class="card bcard">
    <div class="card-header bgc-info-d1 text-white border-0">
      <h4><span><i class="fas fa-cog"></i></span> Manage Department</h4>
      <div class="mb-2 mb-sm-0">
        <a id="addNewObject" href="javascript:void(0)" class="btn btn-blue px-3 d-block w-100 text-95 radius-round border-2 brc-black-tp10">
          <i class="fa fa-plus mr-1"></i>
          Add <span class="d-sm-none d-md-inline"></span>
          {{-- {{ trans('cruds.user.title_singular') }} --}}
          Department Title
        </a>
      </div>
    </div>
    <div class="card-body p-0 border-x-1 border-b-1 brc-default-m4 radius-0 overflow-hidden">
      <table id="my_datatable" class="table text-dark-m2 text-95 bgc-white ml-n1px" id="table">
        <thead class="bgc-white text-white text-uppercase text-100">
          <tr class="bgc-primary text-white brc-black-tp10">
            <th>ID</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Photo</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="objectList">
          @foreach ($departments as $row)
            <tr id="tr_object_id_{{ $row->id }}" class="bgc-h-orange-l4">
              <td>{{ $row->id }}</td>
              <td>{{ $row->name }}</td>
              <td>{{ $row->slug }}</td>
              <td><img width="48" src="{{ asset('uploads') . '/' . $row->image }}" alt="{{ $row->image }}"></td>
              <td>{{ date('d-M-Y',strtotime($row->created_at)) }}</td>
              <td>
                @include('admin.templates.crudAction')
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  @include('admin.department.templates.crudModal')
@endsection

@push('vendor-scripts')
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
@endpush

@push('page-scripts')
  <script src="{{asset('backend2')}}/vendors/toastrjs/toastr.min.js"></script>
  <script src="{{asset('backend2')}}/vendors/sweetalert2/sweetalert2.all.min.js"></script>
  {{-- <script src="{{asset('backend2')}}//views/pages/table-datatables/@page-script.js"></script> --}}
  <script>
    $(document).ready(function() {
     //Default data table
      var table = $('#my_datatable').DataTable( {
       lengthChange: false,
       buttons: [ 'copy', 'excel', 'pdf', 'print','colvis' ]
      } );
      table.buttons().container()
        .appendTo( '#my_datatable_wrapper .col-md-6:eq(0)' );
      $(function () {
        "use strict";
        $('[data-bs-toggle="tooltip"]').tooltip();

        // ពេលប្រើ Select2
        // $('#frmCrudObject').find('.select2').select2({
        //   allowClear: true,
        //   dropdownParent: $('#select2-parent'),
        //   width:'100%'
        // });

      });
    });
  </script>

  <script>
    $(document).ready(function () {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $('#addNewObject').on('click',function(e){
        e.preventDefault();
        $('#crudObjectModal').find('.modal-title').html('Add Department');
        $('#frmCrudObject').find('#object_id').val('');
        $('#frmCrudObject').find('#btnObjectSave').html(`<i class="far fa-save text-danger-tp1 radius-round mr-1 align-middle pt-10"></i>
                                                        <span class="align-middle pl-1 pr-2">Save</span>`);
        $('#frmCrudObject').find('#btnObjectSave').removeClass('d-none');
        $('#frmCrudObject').find('#btnObjectUpdate').addClass('d-none');
        $('#frmCrudObject').trigger('reset');
        $('#crudObjectModal').modal('show');
      });

      $('#frmCrudObject').on('submit',function(e){
        e.preventDefault();

        var actionUrl = $(this).attr('action');
        var method = $(this).attr('method')
        $('#btnObjectSave').html('Processing..');
        $('#btnObjectUpdate').html('Processing..');
        $.ajax({
          type: method,
          url: actionUrl,
          data: new FormData(this),
          processData:false,
          dataType:'json',
          contentType:false,
          beforeSend:function(){
            $(document).find('span.error-text').text('');
          },
          success: function (res) {
            console.log(res)
            if(res.status==400){
              $.each(res.error, function(prefix, val){
                $('span.'+prefix+'_error').text(val[0]);
              });
            } else {
              var $html = $(res.html);
              if(res.type == 'store-object'){
                $('tbody#objectList').append($html);
              }else{
                $("#tr_object_id_" + res.data.id).replaceWith($html);
              }
              $('#frmCrudObject').trigger("reset");
                $('#btnObjectSave').html('Save');
              $('#btnObjectUpdate').html('Update');
              toastr.success(res.success);
              $('#crudObjectModal' ).modal('hide');
            }
          },
          error: function (error) {
            console.log('Error:', error);
            $('#btnObjectSave').html('Save');
            $('#btnObjectUpdate').html('Update');
          }
        });
      });

      $('body').on('click', 'a#objectEdit', function (e) {
        e.preventDefault();
        $('#frmCrudObject').find('#btnObjectSave').addClass('d-none');
        $('#frmCrudObject').find('#btnObjectUpdate').removeClass('d-none');
        $('#frmCrudObject').find('#btnObjectUpdate').html('<i class="fadeIn animated bx bx-edit"></i>&nbsp;Update');
        $('#frmCrudObject').trigger('reset');
        var object_id = $(this).data('id');
        var form = $('#frmCrudObject');
        var modal = $('#crudObjectModal');
        var actionUrl = $('#crudRoutePath').val();
        modal.find('.modal-title').html('{{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}');
        $.get( actionUrl +'/' +object_id+'/edit', function (res) {
          form.find('#object_id').val(res.data.id);
          var selectRoles = [];
          $.each(res.data.roles,function(i,e){
            selectRoles.push(e.id)
          })
          // console.log(selectRoles);
          // $('.select2').val(selectRoles).trigger('change');
          form.find('#name').val(res.data.name);
          form.find('#slug').val(res.data.slug);

          form.find('#old_image').val(res.data.image);
          if(res.data.image==null){
            form.find('#showPhoto').attr('src',"{{asset('images/no-image.png')}}");
          } else {
            form.find('#showPhoto').attr('src',"{{ asset('uploads/') }}"+'/'+res.data.image);
          }
          modal.modal('show');
        })
      });

      $('body').on('click', '.objectDelete', function (e) {
        e.preventDefault();
        var object_id = $(this).data("id");
        var link = $(this).attr("href");
        // alert("Hello Delete"+ link);
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              type: "DELETE",
              url:link,
              success: function (data) {
                console.log(data);
                $("#tr_object_id_" + object_id).remove();
                toastr.success(data.success);
              },
              error: function (data) {
                console.log('Error:', data);
              }
            });
          }
        })
      });

      $('#btnObjectClose').on('click',function(e){
        e.preventDefault();
        $('#frmCrudObject').find('#btnObjectSave').removeClass('d-none');
        $('#frmCrudObject').find('#btnObjectUpdate').addClass('d-none');
        $('#crudObjectModal').find('.modal-title').html('{{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}');
        $('#frmCrudObject').trigger('reset');
      });

      
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



