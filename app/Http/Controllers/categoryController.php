<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function createCategory(){
        return view('createCategory',[
            'title' => 'Create Category'
        ]);
    }

    public function storeCategory(Request $request){
        $request->validate([
            'category_name' => 'required'
        ]);

        Category::create([
            'category' => $request->category_name
        ]);

        return redirect('/');
    }

    public function index(){
        return view('categories',[
            'title' => 'Categories',
            'categories' => Category::all()
        ]);
    }

    public function showCategory(Category $category){
        return view('showCategory',[
            'title' => 'Show Category',
            'category' => $category
        ]);
    }
}
