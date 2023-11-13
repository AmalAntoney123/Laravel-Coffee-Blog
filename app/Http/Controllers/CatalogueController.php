<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    public function createCatalogue(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]);
        $imagePath = $request->file('image')->store('catalogue_images', 'public');

        $catalogue = Catalogue::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image_path' => $imagePath,
        ]);

        return redirect('/admin')->with('productadd', 'Product Added Successfully');
    }
    public function showItemEditScreen(Catalogue $product)
    {
        return view('edit-product')->with('product', $product);
    }
    public function updateproduct(Catalogue $product, Request $request)
    {

        $incomingFields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);
        
        if ($request->file('image') == null) {
            $product->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
            ]);
        } else {
            $imagePath = $request->file('image')->store('catalogue_images', 'public');

            $product->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'image_path' => $imagePath,
            ]);
            
        }
        return redirect('/admin')->with('productupdate', 'Product Updated Successfully');
    }
    public function deleteproduct(Catalogue $product)
    {
        $product->delete();

        return redirect('/admin');
    }
}
