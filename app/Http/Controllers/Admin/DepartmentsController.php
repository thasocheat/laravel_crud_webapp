<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Home\Departments;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DepartmentsController extends Controller
{
    public $prefix = 'department_';
    public $crudRoutePath = 'department';

    public function index()
    {
      // Get all data from departments table
      $data['crudRoutePath'] = $this->crudRoutePath;
      $data['prefix'] = $this->prefix;
      $data['departments'] = Departments::all();
      return view('admin.department.index', $data);
    }

    public function store(Request $request)
  {
    // abort_if(Gate::denies($this->prefix.'create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

      // return response()->json($request);
      $object_id= $request->object_id;
      $validator = Validator::make($request->all(),[
        'name' => ['required'],
        'slug' => ['required'],
      ]);
      if($validator->fails()){
        $response = [
          'status' => 400,
          'error'  => $validator->errors()->toArray()
        ];
        return response()->json($response);
      } else {

        if($request->hasFile('image')){
          $image = $request->file('image');
          $image_name = Str::slug($request->title).'-'. uniqid().'.'. $image->getClientOriginalExtension();
          $image->move(public_path('uploads/departments/'),$image_name);
          $image_name="departments/".$image_name;
        } else {
          if($request->old_image){
            $image_name = $request->old_image;
          } else {
            $image_name = null;
          }
        }
        $all_data =[
          'name'=>$request->name,
          'slug'=>$request->slug,
          'image'=>$image_name,
        ];
        // return response()->json($all_data);
          $datas   =   Departments::updateOrCreate([
          'id' => $object_id], //id ជា id របស់ table service
          $all_data);

        if($object_id){
          $type = 'update-object';
          $success = 'departments has been Updated Successfully!';
        } else {
          $type = 'store-object';
          $success = 'departments has been inserted Successfully!';
        }

        $response = [
          'status'  => 200,
          'type'    => $type,
          'success' => $success,
          'data'    => $datas,
          'html'    => view('admin.department.templates.ajax_tr',[
            'row'=> $datas,
            'prefix'=>$this->prefix,
            'crudRoutePath'=> $this->crudRoutePath])
          ->render(),
        ];
        return response()->json($response);
    }
  }

  public function edit($id)
  {
    $departments = Departments::findOrFail($id);
    $response = [
      'data'  => $departments
    ];
    return response()->json($response);
  }

  public function show($id)
  {
    // abort_if(Gate::denies($this->prefix.'show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    $departments = Departments::findOrFail($id);
    $response = [
      'data'  => $departments
    ];
    return response()->json($response);
  }

  public function destroy($id)
  {
    // abort_if(Gate::denies($this->prefix.'delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    $departments = Departments::find($id);
    $departments->delete();

    $response = [
      'success' => "departments has been deleted successfully!",
      'data' => $departments,
    ];
    return response()->json( $response);
  }
}
