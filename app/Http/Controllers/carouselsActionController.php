<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousels;

class carouselsActionController extends Controller
{
    public function index(){
        $carousels = Carousels::all();
        return view('admin/carousels', [
            "carousels" => $carousels,
            "title" => "Carousels",
        ]);
    }

    public function store(Request $request){
        $validate = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $validate['image'] = $request->file('image')->store('image/gambarCarousel', 'public');

        $status = Carousels::create($validate);
        if($status){
            return redirect()->back()->with('success', 'Carousel berhasil ditambahkan!');
        }
        else{
            return redirect()->back()->with('error', 'Carousel gagal ditambahkan!');
        }
    }

    public function destroy($id){
        $data = Carousels::findOrFail($id);
        $status = $data->delete();
        if($status){
            return redirect()->back()->with('success', 'Carousel berhasil dihapus!');
        }
        else{
            return redirect()->back()->with('error', 'Carousel gagal dihapus!');
        }
    }
}