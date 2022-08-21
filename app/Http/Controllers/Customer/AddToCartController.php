<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddToCartRequest;
use App\Repository\AddToCartInterface;



class AddToCartController extends Controller
{
    public $cart;
    
    public function __construct(AddToCartInterface $cart)
    {
        $this->cart = $cart;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = $this->cart->getAllCartProducts();
        return view('customer.cart-added-products',compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddToCartRequest $request)
    {
        try {
            //code...
            $collection = $request->except(['_token','_method']);
            $addToCart = $this->cart->addToCart($collection);

            if ($addToCart) {
                # code...
                $data = ['status' => true,'status_code'=>200,'message' => 'Product added to cart successfully'];
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
