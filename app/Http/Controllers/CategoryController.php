<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function getCategory() {
        $categories = Category::all();
        return view('manageCategory', ['categories' => $categories]);
    }


    public function insertCategory(Request $request) {
        $inputValid =  $this->validate($request, [
            'category_name' => 'required|unique:categories'
        ]);


        $category = new Category;
        $category->category_name = $inputValid['category_name'];


        $category->save();

        return redirect('/insert-category')->with('message', 'Insert Category Success!');
    }

    public function getDetail($id){
        $categories = Category::where('id','=', $id)->with('course')->first();

        return view('detailCategory', ['category' => $categories]);
    }

    public function updateCategory(Request $request, $id){
        $inputValid =  $this->validate($request, [
            'category_name' => 'required|unique:categories'
        ]);

        Category::where('id','=', $id)->update(['category_name' => $inputValid['category_name']]);

        return redirect('insert-category')->with('message', 'Update Category Success!');
    }

    public function deleteCategory($id) {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect('/insert-category')->with('message', 'Delete Category Success!');
    }
}
