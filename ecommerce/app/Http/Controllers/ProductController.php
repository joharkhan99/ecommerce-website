<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function add_product()
    {
        $categories = DB::table('category')->get();
        $data = array(
            'categories' => $categories
        );
        return view('dashboard.pages.add_product', compact('data'));
    }
    public function edit_product($pid)
    {
        $product = DB::table('products')->where('ProductID', '=', $pid)->first();
        $curr_cat = DB::table('category')->where('CategoryID', '=', $product->categoryid)->first();
        $categories = DB::table('category')->where('CategoryID', '!=', $product->categoryid)->get();

        $data = array(
            'product' => $product,
            'categories' => $categories,
            'curr_cat' => $curr_cat
        );
        return view('dashboard.pages.edit_product', compact('data'));
    }
    public function delete_product($pid)
    {
        $product = DB::table('products')->where('ProductID', '=', $pid)->delete();
        return redirect("view_product")->with('productsuccess', 'Your Product has been deleted Successfully!');
    }
    //
    public function view_product()
    {
        if (Auth::check() && Auth::user()->user_role == 'vendor') {
            $uid = Auth::user()->id;
            $supplierid = DB::table('suppliers')->where('userid', '=', $uid)->first();
            $products = DB::table('products')->where('supplierid', '=', $supplierid->SupplierID)->get();
            $data = array(
                'products' => $products
            );
            return view('dashboard.pages.view_products', compact('data'));
        } else {
            return redirect("registration");
        }
    }
    //
    public function create_product(Request $request)
    {
        if (Auth::check() && Auth::user()->user_role == 'vendor') {
            $product_images = [];
            $files = $request->file('images');

            if ($request->hasFile('images')) {
                foreach ($files as $file) {
                    $fileName = 'product-' . time() . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('public', $fileName);
                    array_push($product_images, $path);
                }
            }

            $uid = Auth::user()->id;
            $supplierid = DB::table('suppliers')->where('userid', '=', $uid)->first();

            DB::table('products')->insert(["productname" => $request->productname, "productdescp" => $request->productdescp, "supplierid" => $supplierid->SupplierID, "categoryid" => $request->category, "gender" => $request->gender, "quantity" => $request->quantity, "price" => $request->price, "discount" => $request->discount, "productavailable" => 'yes', "discountavailable" => 'yes', "picture" => implode(",", $product_images), 'ranking' => "1"]);

            return redirect("add_product")->with('productsuccess', 'Your Product has been added Successfully!');
        } else {
            return redirect("registration");
        }
    }
    //
    public function add_review(Request $request)
    {
        if (Auth::check() && Auth::user()->user_role == 'customer') {
            $uid = Auth::user()->id;
            DB::table('reviews')->insert(['productid' => $request->productid, 'customerid' => $uid, 'review_rating' => $request->rating, 'review_text' => $request->review_text]);
            return redirect("product/" . $request->productid);
        } else {
            return redirect("registration");
        }
    }
    public function add_to_cart(Request $request)
    {
        if (Auth::check() && Auth::user()->user_role == 'customer') {
            $uid = Auth::user()->id;
            DB::table('cart')->insert(['productid' => $request->productid, 'customerid' => $uid, 'quantity' => $request->quantity]);
            return redirect("product/" . $request->productid);
        } else {
            return redirect("registration");
        }
    }
    //
    public function update_product(Request $request)
    {
        if (Auth::check() && Auth::user()->user_role == 'vendor') {
            $product_images = [];
            $uid = Auth::user()->id;
            $supplierid = DB::table('suppliers')->where('userid', '=', $uid)->first();

            if ($request->hasFile('images')) {
                $files = $request->file('images');
                foreach ($files as $file) {
                    $fileName = 'product-' . time() . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('public', $fileName);
                    array_push($product_images, $path);
                }

                DB::table('products')->where('ProductID', '=', $request->prod_id)->where('supplierid', '=', $supplierid->SupplierID)->update(["productname" => $request->productname, "productdescp" => $request->productdescp, "categoryid" => $request->category, "gender" => $request->gender, "quantity" => $request->quantity, "price" => $request->price, "discount" => $request->discount, "picture" => implode(",", $product_images)]);
            } else {
                DB::table('products')->where('ProductID', '=', $request->prod_id)->where('supplierid', '=', $supplierid->SupplierID)->update(["productname" => $request->productname, "productdescp" => $request->productdescp, "categoryid" => $request->category, "gender" => $request->gender, "quantity" => $request->quantity, "price" => $request->price, "discount" => $request->discount]);
            }

            return redirect("view_product")->with('productsuccess', 'Your Product has been updated Successfully!');
        } else {
            return redirect("registration");
        }
    }
    public function change_product_availability(Request $request)
    {
        if (Auth::check() && Auth::user()->user_role == 'vendor') {
            $uid = Auth::user()->id;
            $supplierid = DB::table('suppliers')->where('userid', '=', $uid)->first()->SupplierID;

            if ($request->availability == 'yes') {
                DB::table('products')->where('supplierid', '=', $supplierid)->where('ProductID', '=', $request->product_id)->update(['updated_at' => now(), 'productavailable' => 'yes']);
                return response()->json(['success' => 'Product has been Enabled']);
            } else {
                DB::table('products')->where('supplierid', '=', $supplierid)->where('ProductID', '=', $request->product_id)->update(['updated_at' => now(), 'productavailable' => 'no']);
                return response()->json(['success' => 'Product has been Disabled']);
            }
        } else {
            return redirect("registration");
        }
    }
}
