<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class MainPageController extends Controller
{
    public function mainPage()
    {
        $products = Products::sortable()->paginate(5);
        return view('welcome', compact('products'));
    }

    public function displayDetailsPage()
    {
        return view('personal-details');
    }

    public function paymentProcess(Request $request)
    {   
        $data = $request->validate([
            'Surname' => ['required'],
            'Firstname' => ['required'],
            'Email' => ['required', 'email'],
            'Phone_number' => ['required'],
        ]);
        
        return view('Purchase', compact('data'));
    }

    public function searchProduct(Request $request)
    {
        $search = $request->input('search');

        $products = Products::query()
        ->where('title', 'LIKE', "%{$search}%")
        ->orWhere('description', 'LIKE', "%{$search}%")
        ->get();

        return view('search', compact('products'));
    }

    public function clothesCategory()
    {
        $products = Products::query()
        ->where('category', 'Clothes')->get();

        return view('clothes', compact('products'));

    }

    public function watchesCategory()
    {
        $products = Products::query()
        ->where('category', 'Watches')->get();

        return view('Watches', compact('products'));

    }

    public function accessoriesCategory()
    {
        $products = Products::query()
        ->where('category', 'Accessories')->get();

        return view('Accessories', compact('products'));

    }

}
