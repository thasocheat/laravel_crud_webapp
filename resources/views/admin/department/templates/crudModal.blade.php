<div class="modal fade" id="crudObjectModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <form id="frmCrudObject" action="{{ route($crudRoutePath.'.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="object_id" id="object_id">
          <input type="hidden" name="crudRoutePath" id="crudRoutePath" value="{{ $crudRoutePath }}">
          <div class="row">

            <div class="col-md-6">
              <div class="col-md-12">  
                
                <div class="form-group">
                  <label for="name" class="form-control-label mb-1">Department Name: <span class="text-danger">*</span></label>
                  <input id="name" name="name" class="form-control" type="text" placeholder="Department Name">
                  <span class="text-danger error-text name_error"></span>
                </div>
              

              
                <div class="form-group">
                  <label for="slug" class="form-control-label mb-1">Slut: <span class="text-danger">*</span></label>
                  <input id="slug" name="slug" class="form-control" type="text" placeholder="Slut" multiple="2">
                  <span class="text-danger error-text slug_error"></span>
                </div>        

              </div>
            </div>
            
            <div class="col-md-6">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 pb-2">
                  <div class="form-group">
                    {{-- <label for="image" class="form-control-label mb-1">Image Destination: <span class="text-danger">*</span></label> --}}
                    <img width="128"
                        src="{{asset('images/no-image.png')}}"
                        class="show-photo" id="showPhoto" alt=""
                        title="Brow Image"
                        style="cursor: pointer; border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;"
                        >
                    <input type="hidden" name="old_image" id="old_image">
                    <input type="file" name="image" id="image" accept="image/x-png,image/png,image/jpg,image/jpeg" class="form-control d-none">
    
                    <span class="text-danger error-text image_error"></span>
                  </div>
                </div>
              </div>
            </div>

           

            

          </div>
        </div>
        <div class="modal-footer">
          @include('admin.templates.button')
        </div>
      </form>
    </div>
  </div>
</div>

