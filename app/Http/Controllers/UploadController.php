<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
public function upload(Request $request)
{
    $file = $request->file('upload');

    $filename = time().'.'.$file->getClientOriginalExtension();

    $file->move(public_path('uploads'), $filename);

    return response()->json([
        "uploaded" => 1,
        "fileName" => $filename,
        "url" => asset('uploads/'.$filename)
    ]);
}
}