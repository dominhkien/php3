<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->search) {
            $list = DB::table('product')
                ->join('category', 'category.id', '=', 'product.category_id')
                ->select('product.id', 'product.price', 'product.name', 'product.view', 'category.name as category_name')
                ->where('product.name', 'like', '%' . $request->search . '%')
                ->get();
        }else{
            $list = DB::table('product')
            ->join('category', 'category.id', '=', 'product.category_id')
            ->select('product.id', 'product.price', 'product.name', 'product.view', 'category.name as category_name')
            ->orderByDesc('product.view')
            ->get();
        }
        

        return view('product/list', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = DB::table('category')->get();
        return view('product/add', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'category_id' => $request->category,
            'price' => $request->price,
            'view' => $request->view,
            'create_at' => Carbon::now(),
            'update_at' => Carbon::now()
        ];
        DB::table('product')->insert($data);
        return redirect()->route('product.list');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = DB::table('product')->where('id', $id)->first();
        $category = DB::table('category')->get();
        
        return view('product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'view' => $request->view,
            'create_at' => Carbon::now(),
            'update_at' => Carbon::now()
        ];
        DB::table('product')->where('id', $id)->update($data);
        return redirect()->route('product.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('product')->where('id', $id)->delete();
        return back();
    }
}
