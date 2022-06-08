<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Data;

class DataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $datas = $user->datas;
        return view('CRUD')->with('datas', $datas);
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        // Left this out because I made data1 and data2 nullable
//        $request->validate([
//            'data1' => 'required',
//            'data2' => 'required'
//        ]);

        $newData = new Data();

        $user = Auth::user();
        $newData->user_id = $user->id;

        $newData->data1 = request('data1');
        $newData->data2 = request('data2');

        $newData->save();

        return redirect()->route('data.index')->withSuccess('Data has been successfully created.');
    }

    public function edit(Data $data){
        return view('edit', compact('data'));
    }

    public function update(Request $request, Data $data){
        $data->update($request->all());
        return redirect()->route('data.index')->withSuccess('Data has been successfully updated.');
    }

    public function destroy(Data $data){
        $data->delete();

        return redirect()->route('data.index')->withSuccess('Data has been successfully destroyed.');
    }

    // This is how I stored the old way of adding a new blank row
//    public function store(){
//        $data = new Data();
//
//        $data->user_id = Auth::user()->id;
//        $data->data1 = null;
//        $data->data2 = null;
//
//        $data->save();
//
//        return redirect('/tables');
//    }
}
