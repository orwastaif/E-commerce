<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CategoryController extends Controller
{
    public function AllCat(){
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function AddCat(Request $request)
    {

        $validated = $request->validate([
            'category_name' => 'required|unique:posts|max:255',

        ],

        [
            'category_name.required' => 'Please Input Category Name',
            'category_name.max' => 'category less than 225char', 
        ]);

  
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth::user()->id;
        DB::table('categories')->insert($data);
  

        return Redirect()->back()->with('seccess', 'category inserted successfuly');


    }
}
