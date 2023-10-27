<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        $data = User::all();
        return view('Page.Dashboard.Admin.User.Index', [
            'user' => $data
        ]);
    }
    public function create(){
        return view('Page.Dashboard.Admin.User.Create');
    }

    public function search(Request $request){

        if($request->search == null || $request->search == "" ) return redirect()->route('user.index');
        $validate = Validator::make($request->all(), [
            'search' => ['required', 'string']
        ]);
        
        if ($validate->fails()) {
            toastr()->success('Someting Wrong, Try Again!');
            return redirect()->route('bunga.index');
        }

        $data = User::where('name', 'LIKE', '%' . $request->search . '%')
        ->orWhere('role', 'LIKE', '%' . $request->search . '%')
        ->orWhere('email', 'LIKE', '%' . $request->search . '%')
        ->get();

        return view('Page.Dashboard.Admin.User.Index', [
            'user' => $data
        ]);
    }

    public function store(Request $request){
        
        $validate = Validator::make($request->all(), [
            'name' => ['required','string','min:4'],
            'email' => ['required', 'string', 'email'],
            'no_telp' => ['required', 'integer'],
            'password' => ['required', 'string', 'min:4','confirmed'],
        ]);

        
        if ($validate->fails()) {
            $message = [];
            $errors = $validate->errors();
            return view('Page.Dashboard.Admin.User.Create',[
                'error' => true,
                'message' => $errors->messages()
            ]);
        }

        $req = $request->all();

        $data = User::create([
            'name' => $req['name'],
            'email' => $req['email'],
            'no_telp' => $req['no_telp'],
            'password' => Hash::make($req['password'])
        ]);   

        if ($data) {
            toastr()->success('Data has been saved successfully!');
            return redirect()->route('user.index');
        } else {
            toastr()->error('Data Falied To Save!');
            return redirec()->route('user.index');

        }

    }

    public function edit($uuid){

        $data = User::where('uuid', $uuid)->first();

        if (!isset($data))  {
            return redirect()->route('bunga.index')->withErrors(['errror' => 'Data Tidak Di Temukan']);
        }
        
        return view('Page.Dashboard.Admin.User.Edit', [
            'data' => $data
        ]);
    }

    public function update(Request $request, $uuid){

        $validate = Validator::make($request->all(), [
            'name' => ['required','string','min:4'],
            'email' => ['required', 'string', 'email'],
            'no_telp' => ['required', 'integer'],
            'password' => ['nullable', 'string', 'min:4','confirmed'],
        ]);
        
        if ($validate->fails()) {
            return redirect()->route('user.index')->withErrors(['errror' => 'Gagal Mengupdate!']);
        }
        
        $data = User::where('uuid', $uuid)->first();
        if (!isset($data))  {
            return redirect()->route('user.index')->withErrors(['errror' => 'Data Tidak Di Temukan']);
        }
        $req = $request->all();
         if($req['password'] == null){
            unset($req['password']);
            unset($req['password_confirnmatin']);
         }

        $data->update($req);
        
        if ($data) {
            toastr()->success('Data successfully Updated!');
            return redirect()->route('user.index');
        } else {
            toastr()->error('Data Falied To Save!');
            return redirec()->route('user.index');
        }

    }

    public function delete($uuid){

        $data = User::where('uuid', $uuid)->first();

        if (!isset($data)) {
            toastr()->error('No Data Found!');
            return redirect()->route('bunga.index');
        }
       
        if ($data->delete()) {
            toastr()->success('Data successfully Delete!');
            return redirect()->route('bunga.index');
        } else {
            toastr()->error('Data Falied To Delete!');
            return redirec()->route('bunga.index');
        }
        
    }
}
