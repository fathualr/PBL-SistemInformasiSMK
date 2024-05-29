<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousels;
use Illuminate\Support\Facades\Storage;

class carouselsActionController extends Controller
{
    public function index(){
        $carousel = Carousels::paginate(10);
        return view('admin/carousels', [
            "carousel" => $carousel,
            "title" => "Admin Carousel",
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
        if($data->image){
            Storage::disk('public')->delete($data->image);
        }
        $status = $data->delete();
        if($status){
            return redirect()->back()->with('success', 'Carousel berhasil dihapus!');
        }
        else{
            return redirect()->back()->with('error', 'Carousel gagal dihapus!');
        }
    }
}