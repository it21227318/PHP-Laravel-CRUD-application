<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class ProductController extends Controller
{
    public function login(Request $request){
        $data = $request->validate([
            'loginname'=> 'required',
            'loginpassword'=> 'required'
        ]);

        if(auth()->attempt(['name'=> $data['loginname'],'password' => $data['loginpassword']])){
            $request->session()->regenerate();
        }

        return redirect('/');
    }
    
    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    public function register(Request $request){
        $data = $request->validate([
            'name' => ['required','min:3','max:50'],
            'email'=> ['required','email'],
            'password'=> ['required','min:3','max:10'],
            
        ]);

        $user = User::create($data);
        auth()->login($user);

        return redirect('/');
    }
    
    
    public function index(){
        $allproducts = Product::all();
        return view('products.index', ['products' => $allproducts]);
        
    }

    public function create(){
        return view('products.create');
    }
    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);

        $newProduct = Product::create($data);

        return redirect(route('product.index'));

    }

    public function edit(Product $product){
        return view('products.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);

        $product->update($data);

        return redirect(route('product.index'))->with('success', 'Product Updated Succesffully');

    }
    public function destroy(Product $product){
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product deleted Succesffully');
    }


}
