<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        if (Auth::check()) {
            $user_top = Products::take(5)->get();

            $profit = DB::table('cart')->join('products', 'cart.productid', '=', 'products.ProductID')->join('suppliers', 'suppliers.SupplierID', '=', 'products.supplierid')->where('userid', '=', Auth::user()->id)->select(DB::raw('SUM(products.price) as total_price'), DB::raw('SUM(cart.quantity) as quantity'))->first();

            $profile_report = DB::table('cart')->join('products', 'cart.productid', '=', 'products.ProductID')->join('suppliers', 'suppliers.SupplierID', '=', 'products.supplierid')->where('userid', '=', Auth::user()->id)->select('products.price', 'products.quantity')->get();

            $revenue = Products::whereYear('created_at', date('Y'))->select('price')->get();
            $revenue22 = Products::whereYear('created_at', date('Y', strtotime("-1 year")))->select('price')->get();

            $users = User::where('user_role', '!=', 'admin')->get();
            $products = DB::table('products')->join('category', 'products.CategoryID', '=', 'category.CategoryID')->get();
            $categories = DB::table('category')->get();

            $pr = [];
            $rev_2023 = [];
            $rev_2022 = [];
            for ($i = 0; $i < count($profile_report); $i++) {
                $pr[] = $profile_report[$i]->price * $profile_report[$i]->quantity;
            }

            for ($i = 0; $i < count($revenue); $i++) {
                $rev_2023[] = $revenue[$i]->price;
            }

            for ($i = 0; $i < count($revenue22); $i++) {
                $rev_2022[] = $revenue22[$i]->price;
            }

            $data = [
                'user_top' => $user_top,
                'profit' => $profit->total_price * $profit->quantity,
                'sales' => $profit->total_price,
                'profile_report' => $pr,
                'rev_2023' => $rev_2023,
                'rev_2022' => $rev_2022,
                'users' => $users,
                'products' => $products,
                'categories' => $categories,
            ];
            return view('dashboard.pages.home', compact('data'));
        }
        return redirect("registration");
    }

    //
    public function customer_registration(Request $request)
    {
        if (Auth::check()) {
            if ($request->hasFile('profile_image')) {
                $file = $request->file('profile_image');
                $fileName = 'customer-' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public', $fileName);

                $uid = Auth::user()->id;

                DB::table('customers')->insert(["fname" => $request->fname, "lname" => $request->lname, "picture" => $path, "address" => $request->address, "city" => $request->city, "state" => $request->state, "postalcode" => $request->postal_code, "country" => $request->country, "phone" => $request->phone, "email" => $request->email, "userid" => $uid]);

                DB::table('users')->where('id', '=', $uid)->update(['user_role' => 'customer']);

                return redirect("dashboard");
            } else {
                return redirect("dashboard")->with('customer_registrationerror', 'Please provide complete details');
            }
        } else {
            return redirect("registration");
        }
    }

    //
    public function vendor_registration(Request $request)
    {
        if (Auth::check()) {
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $fileName = 'vendor-' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public', $fileName);

                $uid = Auth::user()->id;

                DB::table('suppliers')->insert(["companyname" => $request->comp_name, "fname" => $request->fname, "lname" => $request->lname, "logo" => $path, "address" => $request->address, "city" => $request->city, "state" => $request->state, "postalcode" => $request->postal_code, "country" => $request->country, "phone" => $request->phone, "email" => $request->email, "userid" => $uid, 'paymentmethods' => 'none']);

                DB::table('users')->where('id', '=', $uid)->update(['user_role' => 'vendor']);

                return redirect("dashboard");
            } else {
                return redirect("dashboard")->with('vendor_registrationerror', 'Please provide complete details');
            }
        } else {
            return redirect("registration");
        }
    }

    public function product_history()
    {
        if (Auth::check()) {
            $products = DB::table('cart')->join('products', 'cart.productid', '=', 'products.ProductID')->where('customerid', '=', Auth::user()->id)->select('picture', 'productname', 'productdescp', 'price', 'cart.quantity', 'products.price', 'products.created_at', 'products.ProductID')->get();

            $data = array(
                'products' => $products
            );
            return view('dashboard.pages.producthistory', compact('data'));
        } else {
            return redirect('registration');
        }
    }

    public function your_reviews()
    {
        if (Auth::check() && Auth::user()->user_role == 'customer') {
            $reviews = DB::table('reviews')->join('customers', 'reviews.customerid', '=', 'customers.CustomerID')->join('products', 'reviews.productid', '=', 'products.ProductID')->where('customers.CustomerID', '=', Auth::user()->id)->get();
            $data = array(
                'reviews' => $reviews
            );
            return view('dashboard.pages.your_reviews', compact('data'));
        } else if (Auth::check() && Auth::user()->user_role == 'vendor') {
            $reviews = DB::table('reviews')->join('customers', 'reviews.customerid', '=', 'customers.CustomerID')->join('products', 'reviews.productid', '=', 'products.ProductID')->join('suppliers', 'suppliers.SupplierID', '=', 'products.supplierid')->where('suppliers.userid', '=', Auth::user()->id)->get();
            $data = array(
                'reviews' => $reviews
            );

            return view('dashboard.pages.your_reviews', compact('data'));
        } else {
            return redirect('registration');
        }
    }

    public function your_orders()
    {
        if (Auth::check() && Auth::user()->user_role == 'vendor') {
            $orders = DB::table('cart')->join('products', 'cart.productid', '=', 'products.ProductID')->join('suppliers', 'suppliers.SupplierID', '=', 'products.supplierid')->join('customers', 'cart.customerid', '=', 'customers.CustomerID')->select('products.picture', 'productname',  'price', 'cart.quantity', 'products.price', 'products.created_at', 'products.ProductID', 'products.categoryid', 'products.gender', 'customers.fname', 'customers.lname')->where('suppliers.userid', '=', Auth::user()->id)->get();

            $data = array(
                'orders' => $orders
            );

            return view('dashboard.pages.your_orders', compact('data'));
        } else {
            return redirect('registration');
        }
    }
    public function add_category(Request $request)
    {
        if (Auth::check() && Auth::user()->user_role == 'admin') {
            $cat = DB::table('category')->insertGetId(['name' => $request->name, 'description' => $request->description, 'status' => 'active']);
            return response()->json(['success' => 'Category created successfully.', 'cat' => DB::table('category')->where('CategoryID', '=', $cat)->first()]);
        }
    }
}
