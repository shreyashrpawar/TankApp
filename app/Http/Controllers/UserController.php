<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;



class UserController extends Controller
{
      public function update(Request $request, string $id)      
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('profiles', $fileName, 'public');
            DB::table('users')
                ->where('GST_no', $id)
                ->update(['image' => asset('storage/' . $filePath)]);
            return response()->json([
                'message' => 'Image uploaded successfully!',
                'file_name' => $fileName,
                'file_path' => asset('storage/' . $filePath),
            ], 201);
        }

        return response()->json([
            'message' => 'No image uploaded!',
        ], 400);
    }
}
