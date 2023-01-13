<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    //
    public function index()
    {
        $categories = DB::table('category')->get();
        $products = Products::orderBy('created_at', 'DESC')->where('productavailable', '=', 'yes')->paginate(10);
        $data = array(
            'categories' => $categories,
            'products' => $products
        );
        return view('frontend.pages.shop', compact('data'));
    }
    //
    public function filter_category($catid)
    {
        $categories = DB::table('category')->get();
        $products = Products::where('CategoryID', '=', $catid)->where('productavailable', '=', 'yes')->orderBy('created_at', 'DESC')->paginate(10);
        $data = array(
            'categories' => $categories,
            'products' => $products
        );
        return view('frontend.pages.shop', compact('data'));
    }
    //
    public function filter_gender(Request $request)
    {
        $categories = DB::table('category')->get();
        $products = Products::where('gender', '=', $request->gender)->where('productavailable', '=', 'yes')->orderBy('created_at', 'DESC')->paginate(10);
        $data = array(
            'categories' => $categories,
            'products' => $products
        );
        return view('frontend.pages.shop', compact('data'));
    }
    //
    public function filter_price(Request $request)
    {
        $categories = DB::table('category')->get();
        $products = Products::orderBy('created_at', 'DESC')->where('productavailable', '=', 'yes')->whereBetween('price', [intval($request->min), intval($request->max)])->paginate(10);
        $data = array(
            'categories' => $categories,
            'products' => $products
        );
        return view('frontend.pages.shop', compact('data'));
    }
    //
    public function sort_by_date(Request $request)
    {
        if ($request->filter == 'date_desc') {
            $products = Products::orderBy('created_at', 'DESC')->where('productavailable', '=', 'yes')->paginate(10);
        } else if ($request->filter == 'date_asc') {
            $products = Products::orderBy('created_at', 'ASC')->where('productavailable', '=', 'yes')->paginate(10);
        } else if ($request->filter == 'price_desc') {
            $products = Products::orderBy('price', 'DESC')->where('productavailable', '=', 'yes')->paginate(10);
        } else if ($request->filter == 'price_asc') {
            $products = Products::orderBy('price', 'ASC')->where('productavailable', '=', 'yes')->paginate(10);
        }

        $categories = DB::table('category')->get();
        $data = array(
            'categories' => $categories,
            'products' => $products
        );
        return view('frontend.pages.shop', compact('data'));
    }
    //
    public function cart()
    {
        if (Auth::check()) {
            $products = DB::table('cart')->join('products', 'cart.productid', '=', 'products.ProductID')->where('customerid', '=', Auth::user()->id)->select('picture', 'productname', 'price', 'cart.quantity', 'products.price')->get();

            // return $products;

            $data = array(
                'products' => $products
            );
            return view('frontend.pages.cart', compact('data'));
        } else {
            return redirect('registration');
        }
    }
    //
    public function view_product($pid)
    {
        $product = DB::table('products')->where('ProductID', '=', $pid)->first();
        $curr_cat = DB::table('category')->where('CategoryID', '=', $product->categoryid)->first();
        $supplier = DB::table('suppliers')->where('SupplierID', '=', $product->supplierid)->first();
        $reviews = DB::table('reviews')->join('customers', 'reviews.customerid', '=', 'customers.CustomerID')->where('productid', '=', $pid)->get();

        // return $reviews;
        $data = array(
            'product' => $product,
            'curr_cat' => $curr_cat,
            'reviews' => $reviews,
            'supplier' => $supplier
        );
        return view('frontend.pages.product', compact('data'));
    }
}
