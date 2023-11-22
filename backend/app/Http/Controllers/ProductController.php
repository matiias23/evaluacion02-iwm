<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::orderBy('id', 'desc')->get());
    }

    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $fields=$request->validate([
                'name'=>'required',
                'price'=>'required',
                'description'=>'nullable',
                'image'=>'required'
            ]);

            $product=Product::create([
                'name'=>$fields['name'],
                'price'=>$fields['price'],
                'description'=>$fields['description'],
                'image'=>$fields['image']
            ]);
            DB::commit();
            return response()->json($product,200);
        }catch (\Exception $e){
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

    public function update(Request $request, int $id)
    {
        $fields = $request->validate(([
            'name' => 'required',
            'price' => 'required',
            'description' => 'nullable',
            'image' => 'required'
        ]));

        try {
            DB::beginTransaction();
            $product = Product::where('id', $fields['id'])->update([
                'id' => $fields['id'],
                'name' => $fields['name'],
                'price' => $fields['price'],
                'description' => $fields['description'],
                'image' => $fields['image'],
            ]);
            DB::commit();
            return response()->json($product);
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new \Exception($exception->getMessage());
        }
    }

    public function destroy(int $id)
    {
        //
        try {
            DB::beginTransaction();
            $product = Product::find($id);
            $product->delete();
            DB::commit();
            return response()->json($product);
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new \Exception($exception->getMessage());
        }
    }


}


