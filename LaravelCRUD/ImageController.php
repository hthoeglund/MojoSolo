<?php

namespace App\Http\Controllers;

use App\Data;
use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Data $data){
        return view('image', compact('data'));
    }

    public function store(Request $request, Data $data)
    {
        $request->validate([
            'fileUpload'=>'required|image|mimes:jpeg,png,jpg,gif'
        ]);

        if($files = $request->file('fileUpload')){
            $destinationPath = 'public/image/';
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $insert['image'] = "$profileImage";
        }

        $insert['data_id'] = $data->id;

        $check = Image::insertGetId($insert);

        return redirect()->route('data.index')->with('check', $check)->withSuccess('Image has been successfully uploaded.');
    }
}
