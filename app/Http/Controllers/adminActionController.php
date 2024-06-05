<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class adminActionController extends Controller
{
    // public function __construct(){
    //     if (Admin::count() == 0) {
    //         Admin::create([
    //             'username' => 'admin',
    //             'password' => Hash::make('12345'),
    //             'nama' => 'Admin',
    //             'role' => 'Master'
    //         ]);
    //     }
    // }

    public function index(){
        $admin = Admin::paginate(10);
        return view('admin/admin', [
            'admin' => $admin,
            "title" => "Admin"
        ]);
    }

    public function store(Request $request){
        $validate = $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:admin',
            'password' => 'required|min:5|max:255',
            'role' => 'required'
        ]);
        
        $validate['password'] = Hash::make($request->password);

        $status = Admin::create($validate);
        if($status){
            return redirect()->back()->with('success', 'Akun berhasil ditambahkan!');
        }
        else{
            return redirect()->back()->with('error', 'Akun gagal ditambahkan!');
        }
    }

    public function update(Request $request,$id){
        $admin=Admin::findOrFail($id);
        $validate = $request->validate([
            'nama' => 'required|max:255',
            'role' => 'required'
        ]);

        $usernameNow = $admin->username;
        if ($usernameNow != $request->username){
            $validate = $request->validate([
                'username' => 'required|min:3|max:255|unique:admin'
            ]);
        } else {
            unset($validate['username']);
        };

        if ($request->filled('password')){
            $request->validate([
                'password' => 'required|min:5|max:255'
            ]);
            $validate['password'] = Hash::make($request->password);
        } else {
            unset($validate['password']);
        }

        $status = $admin->fill($validate)->save();
        if($status){
            return redirect()->back()->with('success', 'Akun berhasil diubah!');
        }
        else{
            return redirect()->back()->with('error', 'Akun gagal diubah!');
        }
    }

    public function destroy($id){
        $data = Admin::findorFail($id);
        $status = $data->delete();
        if($status){
            return redirect()->back()->with('success', 'Akun berhasil dihapus!');
        }
        else{
            return redirect()->back()->with('error', 'Akun gagal dihapus!');
        }
    }
}
