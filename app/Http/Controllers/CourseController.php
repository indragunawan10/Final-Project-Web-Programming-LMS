<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function getCourse() {
        $categories = Category::all();
        $courses =  Course::with('category')->get();

        return view('manageCourse', ['courses' => $courses,'categories' => $categories] );
    }

    public function getCourseDetails($id)
    {
        $course = Course::where('id', $id)->with('category')->first();
        $categories = Category::all();

        return view('courseDetails', ['course' => $course,'categories' => $categories]);
    }

    public function getMyCourseDetails($id)
    {
        $course = Course::where('id', $id)->with('category')->first();
        $categories = Category::all();
        
        return view('mycourse', ['course' => $course,'categories' => $categories]);
    }

    public function insertCourse(Request $request) {
        $inputValid =  $this->validate($request, [
            'category' => 'required',
            'course_name' => 'required',
            'course_author' => 'required',
            'description' => 'required',
            'cover' => 'required|mimes:png,svg,jpeg,jpg',
            'course_price' => 'required|numeric',
            'material' => 'required',
        ]);
 
        $file = $request->file('cover');
        $imageName = time().'.'.$file->getClientOriginalExtension();
        Storage::putFileAs('public/images', $file, $imageName);
        $imagePath = 'images/'.$imageName;

        $file = $request->file('material');
        $materialName = time().'.'.$file->getClientOriginalExtension();
        Storage::putFileAs('public/materials', $file, $materialName);
        $materialPath = 'materials/'.$materialName;

        $course = new Course;
        $course->course_name = $inputValid['course_name'];
        $course->course_author = $inputValid['course_author'];
        $course->description = $inputValid['description'];
        $course->cover_path = $imagePath;
        $course->course_price = $inputValid['course_price'];
        $course->material_path = $materialPath;
        $course->save();
        $course->category()->attach($inputValid['category']);

        return redirect('insert-course')->with('message', 'Insert Course Success!');
    }


    public function deleteCourse($id) {
        $course = Course::findOrFail($id);
        $filename = public_path('storage/'. $course->cover_path);
        unlink($filename);
        $course->delete();

        return redirect('insert-course')->with('message', 'Delete Course Success!');
    }

    public function updateCourse(Request $request, $id)
    {

        $inputValid =  $this->validate($request, [
            'category' => 'required',
            'course_name' => 'required',
            'course_author' => 'required',
            'description' => 'required',
            'cover_path' => 'mimes:png,svg,jpeg,jpg',
            'course_price' => 'required|numeric'
        ]);
        $course = Course::findOrFail($id);

        if($request->hasFile('cover_path') && $request->hasFile('material_path') ) {

            $filename = public_path('storage/'. $course->cover_path);
            unlink($filename);

            
            $filenameMaterial = public_path('storage/'. $course->material_path);
            unlink($filenameMaterial);

            $file = $request->file('cover_path');
            $imageName = time().'.'.$file->getClientOriginalExtension();
            Storage::putFileAs('public/images', $file, $imageName);
            $imagePath = 'images/'.$imageName;

            $fileMaterial = $request->file('material_path');
            $materialName = time().'.'.$fileMaterial->getClientOriginalExtension();
            Storage::putFileAs('public/images', $fileMaterial, $imageName);
            $materialPath = 'images/'.$materialName;


            Course::where('id','=', $id)->update([
                'course_name' => $inputValid['course_name'],
                'course_author' => $inputValid['course_author'],
                'description' => $inputValid['description'],
                'course_price' => $inputValid['course_price'],
                'cover_path' => $imagePath
            ]);
            $course->category()->sync($inputValid['category']);

        }
        else if($request->hasFile('material_path')){

            $filename = public_path('storage/'. $course->material_path);
            unlink($filename);

            $file = $request->file('material_path');
            $imageName = time().'.'.$file->getClientOriginalExtension();
            Storage::putFileAs('public/images', $file, $imageName);
            $materialPath = 'images/'.$imageName;


            Course::where('id','=', $id)->update([
                'course_name' => $inputValid['course_name'],
                'course_author' => $inputValid['course_author'],
                'description' => $inputValid['description'],
                'course_price' => $inputValid['course_price'],
                'material_path' => $materialPath
            ]);
            $course->category()->sync($inputValid['category']);

        }
        else if($request->hasFile('cover_path'))
        {
            $filename = public_path('storage/'. $course->cover_path);
            unlink($filename);

            $file = $request->file('cover_path');
            $imageName = time().'.'.$file->getClientOriginalExtension();
            Storage::putFileAs('public/images', $file, $imageName);
            $imagePath = 'images/'.$imageName;


            Course::where('id','=', $id)->update([
                'course_name' => $inputValid['course_name'],
                'course_author' => $inputValid['course_author'],
                'description' => $inputValid['description'],
                'course_price' => $inputValid['course_price'],
                'cover_path' => $imagePath
            ]);
            $course->category()->sync($inputValid['category']);
        }
        else
        {
            Course::where('id','=', $id)->update([
                'course_name' => $inputValid['course_name'],
                'course_author' => $inputValid['course_author'],
                'description' => $inputValid['description'],
                'course_price' => $inputValid['course_price'],
            ]);
            $course->category()->sync($inputValid['category']);
        }

        return redirect('insert-course')->with('message', 'Update Course Success!');
    }
}
