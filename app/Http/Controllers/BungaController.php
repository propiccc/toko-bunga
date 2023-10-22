<?php

namespace App\Http\Controllers;

use App\Models\Bunga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BungaController extends Controller
{
    public function index(){
        $data = Bunga::all();
        return view('Page.Dashboard.Admin.Product.Index', [
            'bunga' => $data
        ]);
    }
    public function create(){
        return view('Page.Dashboard.Admin.Product.Create');
    }

    public function search(Request $request){

        if($request->search == null || $request->search == "" ) return redirect()->route('bunga.index');
        $validate = Validator::make($request->all(), [
            'search' => ['required', 'string']
        ]);
        
        if ($validate->fails()) {
            toastr()->success('Someting Wrong, Try Again!');
            return redirect()->route('bunga.index');
        }

        $data = Bunga::where('name', 'LIKE', '%' . $request->search . '%')
        ->orWhere('tipe', 'LIKE', '%' . $request->search . '%')
        ->get();

        return view('Page.Dashboard.Admin.Product.Index', [
            'bunga' => $data
        ]);
    }

    public function store(Request $request){
        
        $validate = Validator::make($request->all(), [
            'image' => ['required', 'image', 'mimes:png,jpg'],
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'tipe' => ['required', 'string'],
            'harga' => ['required', 'string'],
            'stock' => ['required', 'integer'],
        ]);

        
        if ($validate->fails()) {
            $message = [];
            $errors = $validate->errors();
            return view('Page.Dashboard.Admin.Product.Create',[
                'error' => true,
                'message' => $errors->messages()
            ]);
        }

        $req = $request->all();
        if ($request->file('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            if ($image_name != 'blob') {
                $image_name = date('YMDHis') . '-' . $image_name;
                $image->storeAs('/public/ProductImage', $image_name);
                $req['image'] = $image_name;
            } else {
                return view('Page.Dashboard.Admin.Product.Create',[
                    'error' => true,
                    'message' => ['image' =>  'Field Image Is Required']
                ]);
            }
            
        } else {
            return view('Page.Dashboard.Admin.Product.Create',[
                'error' => true,
                'message' => ['image' =>  'Field Image Is Required']
            ]);
        }
        $data = Bunga::create([
            'name' => $req['name'],
            'harga' => $req['harga'],
            'description' => $req['description'],
            'tipe' => $req['tipe'],
            'image' => $req['image'],
            'stock' => $req['stock']
        ]);   

        if ($data) {
            toastr()->success('Data has been saved successfully!');
            return redirect()->route('bunga.index');
        } else {
            toastr()->error('Data Falied To Save!');
            return redirec()->route('bunga.index');

        }

    }

    public function edit($uuid){

        $data = Bunga::where('uuid', $uuid)->first();

        if (!isset($data))  {
            return redirect()->route('bunga.index')->withErrors(['errror' => 'Data Tidak Di Temukan']);
        }
        
        return view('Page.Dashboard.Admin.Product.Edit', [
            'data' => $data
        ]);
    }

    public function update(Request $request, $uuid){

        $validate = Validator::make($request->all(), [
            'image' => ['nullable', 'image', 'mimes:png,jpg'],
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'tipe' => ['required', 'string'],
            'harga' => ['required', 'string'],
            'stock' => ['required', 'integer'],
        ]);

        if ($validate->fails()) {
            return redirect()->route('bunga.index')->withErrors(['errror' => 'Data Tidak Di Temukan']);
        }

        $data = Bunga::where('uuid', $uuid)->first();
        if (!isset($data))  {
            return redirect()->route('bunga.index')->withErrors(['errror' => 'Data Tidak Di Temukan']);
        }

        $req = $request->all();
        if($request->file('image')){
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            if ($image_name != 'blob') {
                Storage::delete("/public/ProductImage/". $data->image);
                $image_name = date('YMDHis') . '-' . $image_name;
                $image->storeAs('/public/ProductImage', $image_name);
                $req['image'] = $image_name;
            } else {
                unset($req['image']);
            }
        }

        $data->update([
            'image' => isset($req['image']) ? $req['image'] : $data->image,
            'description' => $req['description'],
            'harga' => $req['harga'],
            'tipe' => $req['tipe'],
            'name' => $req['name'],
            'stock' => $req['stock']
        ]);
        
        if ($data) {
            toastr()->success('Data successfully Updated!');
            return redirect()->route('bunga.index');
        } else {
            toastr()->error('Data Falied To Save!');
            return redirec()->route('bunga.index');
        }

    }

    public function delete($uuid){

        $data = Bunga::where('uuid', $uuid)->first();

        if (!isset($data)) {
            toastr()->error('No Data Found!');
            return redirect()->route('bunga.index');
        }

        Storage::delete("/public/ProductImage/". $data->image);
       
        if ($data->delete()) {
            toastr()->success('Data successfully Delete!');
            return redirect()->route('bunga.index');
        } else {
            toastr()->error('Data Falied To Delete!');
            return redirec()->route('bunga.index');
        }
        
    }

}

