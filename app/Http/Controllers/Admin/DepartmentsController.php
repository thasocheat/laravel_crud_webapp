<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Home\Departments;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DepartmentsController extends Controller
{
  // set index page view
	public function index() {
		return view('admin.department.index');
	}

	// handle fetch all departments ajax request
	public function fetchAll() {
		$deps = Departments::all();
		$output = '';
		if ($deps->count() > 0) {
			$output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($deps as $dep) {
				$output .= '<tr>
                <td>' . $dep->id . '</td>';

				$imagePath = 'storage/images_department/' . $dep->image;
				if(!empty($dep->image) && file_exists($imagePath)){
					$output .= '<td><img src="storage/images_department/' . $dep->image . '" alt="'. $dep->name . '" width="50" hight="100" class="img-thumbnail rounded-circle"></td>';
				}else{
					$output .= '<td><img src="images/no-image.png" alt="'. $dep->name . '" width="50" hight="100" class="img-thumbnail rounded-circle"></td>';

				}                
                $output .= '<td>' . $dep->name . '</td>
                <td>' . $dep->slug . '</td>
                <td>
                  <a href="#" id="' . $dep->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editDepartmentModal"><i class="bi-pencil-square h4"></i></a>

                  <a href="#" id="' . $dep->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}
	}

	// handle insert a new department ajax request
	public function store(Request $request) {
		$file = $request->file('image');
		$fileName = time() . '.' . $file->getClientOriginalExtension();
		$file->storeAs('public/images_department', $fileName);

		$depData = [
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $fileName
        ];

        Departments::create($depData);
		return response()->json([
			'status' => 200,
		]);
	}

	// handle edit an department ajax request
	public function edit(Request $request) {
		$id = $request->id;
		$dep = Departments::find($id);
		return response()->json($dep);
	}

	// handle update an department ajax request
	public function update(Request $request) {
		$fileName = '';
		$dep = Departments::find($request->dep_id);
		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$fileName = time() . '.' . $file->getClientOriginalExtension();
			$file->storeAs('public/images_department', $fileName);
			if ($dep->image) {
				Storage::delete('public/images_department/' . $dep->image);
			}
		} else {
			$fileName = $request->dep_image;
		}

		$depData = ['name' => $request->name, 'slug' => $request->slug,  'image' => $fileName];

		$dep->update($depData);
		return response()->json([
			'status' => 200,
		]);
	}

	// handle delete an department ajax request
	public function delete(Request $request) {
		$id = $request->id;
		$dep = Departments::find($id);
		if (Storage::delete('public/images_department/' . $dep->image)) {
			Departments::destroy($id);
		}
	}
}
