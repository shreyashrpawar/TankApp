<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class ProductController extends Controller
{
    public function show(Request $request)
    {
        $products = Products::all();
        return $products;
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'headText' => 'required|string|min:0|max:1000',
            'description' => 'required|string|min:0',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('products', $fileName, 'public');
            DB::table('products')->insert([
                    'image' => asset('storage/' . $filePath),
                    'headText' => $validated['headText'],
                    'description' => $validated['description'],
                ]);
        }
        return redirect()->route('products.form')->with('success', 'User created!');
      }
}
