<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Repository\ProductInterface;
use App\Http\Traits\FileManagerTrait;

class ProductController extends Controller
{
    use FileManagerTrait;
    public $product;
    
    public function __construct(ProductInterface $product)
    {
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->getAllProducts();
        $data = ['status' => true,'status_code'=>200,'products'=>$products,'message' => 'Successfull'];
        return response()->json(['results'=> $data]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = $this->product->getAllProducts();
        return view('admin.add-product',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {
            //code...
            $collection = $request->except(['_token','_method']);
            $createProduct = $this->product->addProduct($collection);

            if ($createProduct) {
                # code...
                $data = ['status' => true,'status_code'=>200,'message' => 'Successfull'];
                return response()->json(['results'=> $data]);
            } else {
                # code...
                $data = ['status' => false,'status_code'=>200,'message' => 'Something went wrong.'];
                return response()->json(['results'=> $data]);
            }
            

        } catch (\Throwable $th) {
            //throw $th;
            $data = ['status' => false,'status_code'=>200,'message' => $th->getMessage()];
            return response()->json(['results'=> $data]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
