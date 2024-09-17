<?php

namespace App\Http\Controllers;

use App\Models\ImageCrud;
use File;
use Illuminate\Http\Request;
use Session;

class ImageCrudController extends Controller
{
    public function index(){
        $product = ImageCrud::all();
        // return $image;
        return view("index", compact("product"));
    }

    public function add_new_product(){
        return view("add_product");
    }

    public function store_product(Request $request){
        $request->validate([
            "name"=>"required",
            "image"=>"required|mimes:png,jpg,jpeg",
        ]);

        $imageName = '';
        if($image = $request->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/product', $imageName);
        }

        ImageCrud::create([
            'name' => $request->name,
            'image' => $imageName,
        ]);

        Session::flash('msg','Product added Successfully');
        return redirect()->back();
    }

    public function edit_product($id){
        $product = ImageCrud::findOrFail($id);
        return view('edit_product',compact('product'));
    }

    public function update_product(Request $request, $id){
        $product = ImageCrud::findOrFail($id);

        $request->validate([
            "name"=>"required",
        ]);

        $imageName = '';
        $deleteImageName = 'images/product/'.$product->image;

        if($image = $request->file('image')){
            if(file_exists($deleteImageName)){
                File::delete($deleteImageName);
            }
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/product', $imageName);
        }else{
            $imageName = $product->image;
        }

        ImageCrud::where('id',$id)->update([
            'name' => $request->name,
            'image' => $imageName,
        ]);

        Session::flash('msg','Product added Successfully');
        return redirect()->back();
    }

    public function delete_product($id){
        $product = ImageCrud::findOrFail($id);
        $deleteProductName = 'images/product/'.$product->image;
        if(file_exists($deleteProductName)){
            File::delete($deleteProductName);
        }
        $product->delete();
        Session::flash('msg','Product deleted successfully');
        return redirect()->back();
    }
}
