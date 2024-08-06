<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Banner;
use App\Models\GeneralSetting;
use App\Models\Product;
use App\Models\Admin;
use App\Models\TotalPurchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isEmpty;

class ApiController extends Controller
{
    //
    public function get_category()
    {
        $category = Category::all();
        if (!$category) {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Category Not Found',
            ]);
        }
        return response()->json([
            'code' => 200,
            'status' => '1',
            'message' => 'All Category',
            'data' => $category
        ]);
    }

    public function add_category(Request $request)
    {
        $rules = [
            'name' => 'required',
            'image' => 'required',
        ];
        $validation = validator::make($request->all(), $rules);
        if ($validation->fails()) {
            $errors = $validation->errors()->all();
            $errorMessage = implode(' ', $errors);
            return response()->json([
                'code' => 400,
                'status' => 0,
                'message' => $errorMessage
            ]);
        }

        $category = new Category();
        $category->name = $request->name;
        $category->image = $request->image;
        $category->save();
        if ($category) {
            return response()->json([
                'code' => 200,
                'status' => '1',
                'message' => 'Category Added',
                'data' => $category
            ]);
        } else {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Category Not Added',
            ]);
        }
    }

    public function update_category(Request $request)
    {

        $rules = [
            'name' => 'required',
            'image' => 'required',
            'id' => 'required',
        ];

        $validation = validator::make($request->all(), $rules);
        if ($validation->fails()) {
            $errors = $validation->errors()->all();
            $errorMessage = implode(' ', $errors);
            return response()->json([
                'code' => 400,
                'status' => 0,
                'message' => $errorMessage
            ]);
        }

        $category = Category::find($request->id);
        if (!$category) {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Category Not Found',
            ]);
        }
        $category->name = $request->name;
        $category->image = $request->image;
        $category->save();
        if ($category) {
            return response()->json([
                'code' => 200,
                'status' => '1',
                'message' => 'Category Updated',
                'data' => $category
            ]);
        } else {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Category Not Updated',
            ]);
        }
    }

    public function delete_category(Request $request)
    {

        $rules = [
            'id' => 'required',
        ];
        $validation = validator::make($request->all(), $rules);
        if ($validation->fails()) {
            $errors = $validation->errors()->all();
            $errorMessage = implode(' ', $errors);
            return response()->json([
                'code' => 400,
                'status' => 0,
                'message' => $errorMessage
            ]);
        }

        $category = Category::find($request->id);
        if (!$category) {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Category Not Found',
            ]);
        }
        $category->delete();
        return response()->json([
            'code' => 200,
            'status' => '1',
            'message' => 'Category Deleted',
        ]);
    }

    public function get_banner()
    {

        $banner = Banner::all();
        if (!$banner) {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Banner Not Found',
            ]);
        }
        return response()->json([
            'code' => 200,
            'status' => '1',
            'message' => 'All Banner',
            'data' => $banner
        ]);
    }

    public function add_banner(Request $request)
    {

        $rules = [
            'banner' => 'required',
        ];
        $validation = validator::make($request->all(), $rules);
        if ($validation->fails()) {
            $errors = $validation->errors()->all();
            $errorMessage = implode(' ', $errors);
            return response()->json([
                'code' => 400,
                'status' => 0,
                'message' => $errorMessage
            ]);
        }

        $banner = new Banner();
        $banner->banner = $request->banner;
        $banner->save();
        if ($banner) {
            return response()->json([
                'code' => 200,
                'status' => '1',
                'message' => 'Banner Added',
                'data' => $banner
            ]);
        } else {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Banner Not Added',
            ]);
        }
    }

    public function update_banner(Request $request)
    {

        $rules = [
            'banner' => 'required',
            'id' => 'required',
        ];

        $validation = validator::make($request->all(), $rules);
        if ($validation->fails()) {
            $errors = $validation->errors()->all();
            $errorMessage = implode(' ', $errors);
            return response()->json([
                'code' => 400,
                'status' => 0,
                'message' => $errorMessage
            ]);
        }

        $banner = Banner::find($request->id);
        if (!$banner) {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Banner Not Found',
            ]);
        }
        $banner->banner = $request->banner;
        $banner->save();
        if ($banner) {
            return response()->json([
                'code' => 200,
                'status' => '1',
                'message' => 'Banner Updated',
                'data' => $banner
            ]);
        } else {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Banner Not Updated',
            ]);
        }
    }

    public function delete_banner(Request $request)
    {
        $rules = [
            'id' => 'required',
        ];
        $validation = validator::make($request->all(), $rules);
        if ($validation->fails()) {
            $errors = $validation->errors()->all();
            $errorMessage = implode(' ', $errors);
            return response()->json([
                'code' => 400,
                'status' => 0,
                'message' => $errorMessage
            ]);
        }
        $banner = Banner::find($request->id);
        if (!$banner) {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Banner Not Found',
            ]);
        }
        $banner->delete();
        return response()->json([
            'code' => 200,
            'status' => '1',
            'message' => 'Banner Deleted',
        ]);
    }

    public function get_general_settings()
    {
        $settings = GeneralSetting::all();
        if ($settings->isEmpty()) {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'General Settings Not Found',
            ]);
        }
        return response()->json([
            'code' => 200,
            'status' => '1',
            'message' => 'All General Settings',
            'data' => $settings
        ]);
    }

    public function update_general_settings(Request $request)
    {

        $rules = [
            'id' => 'required',
            'upiID' => 'required',
            'pixelCode' => 'required',
            'logo' => 'required',
            'showGpay' => 'required',
            'showPytm' => 'required',
            'showPhonepe' => 'required',
            'showBHIM' => 'required',
        ];
        $validation = validator::make($request->all(), $rules);
        if ($validation->fails()) {
            $errors = $validation->errors()->all();
            $errorMessage = implode(' ', $errors);
            return response()->json([
                'code' => 400,
                'status' => 0,
                'message' => $errorMessage
            ]);
        }

        $settings = GeneralSetting::find($request->id);
        if (!$settings) {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Settings Not Found',
            ]);
        }

        $settings->upiID = $request->upiID;
        $settings->pixelCode = $request->pixelCode;
        $settings->logo = $request->logo;
        $settings->showGpay = $request->showGpay;
        $settings->showPytm = $request->showPytm;
        $settings->showPhonepe = $request->showPhonepe;
        $settings->showBHIM = $request->showBHIM;
        $settings->save();
        if ($settings) {
            return response()->json([
                'code' => 200,
                'status' => '1',
                'message' => 'Settings Updated',
                'data' => $settings
            ]);
        } else {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Settings Not Updated',
            ]);
        }
    }

    public function add_general_settings(Request $request)
    {

        $rules = [
            'upiID' => 'required',
            'pixelCode' => 'required',
            'logo' => 'required',
            'showGpay' => 'required',
            'showPytm' => 'required',
            'showPhonepe' => 'required',
            'showBHIM' => 'required',
        ];
        $validation = validator::make($request->all(), $rules);
        if ($validation->fails()) {
            $errors = $validation->errors()->all();
            $errorMessage = implode(' ', $errors);
            return response()->json([
                'code' => 400,
                'status' => 0,
                'message' => $errorMessage
            ]);
        }

        $settings = new GeneralSetting();
        $settings->upiID = $request->upiID;
        $settings->pixelCode = $request->pixelCode;
        $settings->logo = $request->logo;
        $settings->showGpay = $request->showGpay;
        $settings->showPytm = $request->showPytm;
        $settings->showPhonepe = $request->showPhonepe;
        $settings->showBHIM = $request->showBHIM;
        $settings->save();
        if ($settings) {

            return response()->json([
                'code' => 200,
                'status' => '1',
                'message' => 'Settings Added',
                'data' => $settings
            ]);
        } else {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Settings Not Added',
            ]);
        }
    }

    public function get_products()
    {

        $products = Product::all();
        if ($products->isEmpty()) {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Products Not Found',
            ]);
        }

        return response()->json([
            'code' => 200,
            'status' => '1',
            'message' => 'All Products',
            'data' => $products
        ]);
    }

    public function add_product(Request $request)
    {
        $rules = [
            'title' => 'required',
            'catID' => 'required',
            'catName' => 'required',
            'subDesc' => 'required',
            'price' => 'required',
            'descPrice' => 'required',
        ];
        $validation = validator::make($request->all(), $rules);
        if ($validation->fails()) {
            $errors = $validation->errors()->all();
            $errorMessage = implode(' ', $errors);
            return response()->json([
                'code' => 400,
                'status' => 0,
                'message' => $errorMessage
            ]);
        }
        $product = new Product();
        $product->title = $request->title;
        $product->catID = $request->catID;
        $product->catName = $request->catName;
        $product->subDesc = $request->subDesc;
        $product->price = $request->price;
        $product->descPrice = $request->descPrice;
        $product->reviews = $request->reviews;
        $product->specifications = $request->specifications;
        $product->colors = $request->colors;
        $product->save();
        if ($product) {
            return response()->json([
                'code' => 200,
                'status' => '1',
                'message' => 'Product Added',
                'data' => $product
            ]);
        } else {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Product Not Added',
            ]);
        }
    }

    public function update_product(Request $request)
    {

        $rules = [
            'id' => 'required',
            'title' => 'required',
            'catID' => 'required',
            'catName' => 'required',
            'subDesc' => 'required',
            'price' => 'required',
            'descPrice' => 'required',
        ];
        $validation = validator::make($request->all(), $rules);
        if ($validation->fails()) {
            $errors = $validation->errors()->all();
            $errorMessage = implode(' ', $errors);
            return response()->json([
                'code' => 400,
                'status' => 0,
                'message' => $errorMessage
            ]);
        }
        $product = Product::find($request->id);
        $product->title = $request->title;
        $product->catID = $request->catID;
        $product->catName = $request->catName;
        $product->subDesc = $request->subDesc;
        $product->price = $request->price;
        $product->descPrice = $request->descPrice;
        $product->reviews = $request->reviews;
        $product->specifications = $request->specifications;
        $product->colors = $request->colors;
        $product->save();
        if ($product) {
            return response()->json([
                'code' => 200,
                'status' => '1',
                'message' => 'Product Updated',
                'data' => $product
            ]);
        } else {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Product Not Updated',
            ]);
        }
    }

    public function delete_product(Request $request)
    {

        $rules = [
            'id' => 'required',
        ];
        $validation = validator::make($request->all(), $rules);
        if ($validation->fails()) {
            $errors = $validation->errors()->all();
            $errorMessage = implode(' ', $errors);
            return response()->json([
                'code' => 400,
                'status' => 0,
                'message' => $errorMessage
            ]);
        }
        $product = Product::find($request->id);
        if (!$product) {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Product Not Found',
            ]);
        }
        $product->delete();
        if ($product) {
            return response()->json([
                'code' => 200,
                'status' => '1',
                'message' => 'Product Deleted',
                'data' => $product
            ]);
        } else {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Product Not Deleted',
            ]);
        }
    }

    public function search_product(Request $request)
    {

        $rules = [
            'id' => 'required',
        ];
        $validation = validator::make($request->all(), $rules);
        if ($validation->fails()) {
            $errors = $validation->errors()->all();
            $errorMessage = implode(' ', $errors);
            return response()->json([
                'code' => 400,
                'status' => 0,
                'message' => $errorMessage
            ]);
        }

        $product = Product::find($request->id);
        if (!$product) {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Product Not Found',
            ]);
        } else {
            return response()->json([
                'code' => 200,
                'status' => '1',
                'message' => 'Product Found',
                'data' => $product
            ]);
        }
    }

    public function search_product_cat(Request $request)
    {

        $rules = [
            'catID' => 'required',
        ];
        $validation = validator::make($request->all(), $rules);
        if ($validation->fails()) {
            $errors = $validation->errors()->all();
            $errorMessage = implode(' ', $errors);
            return response()->json([
                'code' => 400,
                'status' => 0,
                'message' => $errorMessage
            ]);
        }

        $product = Product::where('catID', $request->catID)->get();
        if ($product->isEmpty()) {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Product Not Found',
            ]);
        }
        return response()->json([
            'code' => 200,
            'status' => '1',
            'message' => 'Product Found',
            'data' => $product
        ]);
    }

    public function get_purchase()
    {
        $purchase = TotalPurchase::all();
        if ($purchase->isEmpty()) {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Purchase Not Found',
            ]);
        }
        return response()->json([
            'code' => 200,
            'status' => '1',
            'message' => 'All Purchase Found',
            'data' => $purchase
        ]);
    }

    public function add_purchase(Request $request)
    {

        $rules = [
            'productID' => 'required',
            'productName' => 'required',
            'amt' => 'required',
        ];
        $validation = validator::make($request->all(), $rules);
        if ($validation->fails()) {
            $errors = $validation->errors()->all();
            $errorMessage = implode(' ', $errors);
            return response()->json([
                'code' => 400,
                'status' => 0,
                'message' => $errorMessage
            ]);
        }

        $purchase = new TotalPurchase();
        $purchase->productID = $request->productID;
        $purchase->productName = $request->productName;
        $purchase->amt = $request->amt;
        $purchase->save();
        if ($purchase) {
            return response()->json([
                'code' => 200,
                'status' => '1',
                'message' => 'Purchase Added',
                'data' => $purchase
            ]);
        } else {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Purchase Not Added',
            ]);
        }
    }

    public function update_purchase(Request $request)
    {

        $rules = [
            'id' => 'required',
            'productID' => 'required',
            'productName' => 'required',
            'amt' => 'required',
        ];
        $validation = validator::make($request->all(), $rules);
        if ($validation->fails()) {
            $errors = $validation->errors()->all();
            $errorMessage = implode(' ', $errors);
            return response()->json([
                'code' => 400,
                'status' => 0,
                'message' => $errorMessage
            ]);
        }

        $purchase = TotalPurchase::find($request->id);
        if (!$purchase) {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Purchase Not Found',
            ]);
        }

        $purchase->productID = $request->productID;
        $purchase->productName = $request->productName;
        $purchase->amt = $request->amt;
        $purchase->save();
        if ($purchase) {
            return response()->json([
                'code' => 200,
                'status' => '1',
                'message' => 'Purchase Updated',
                'data' => $purchase
            ]);
        } else {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Purchase Not Updated',
            ]);
        }
    }

    public function delete_purchase(Request $request)
    {

        $rules = [
            'id' => 'required',
        ];
        $validation = validator::make($request->all(), $rules);
        if ($validation->fails()) {
            $errors = $validation->errors()->all();
            $errorMessage = implode(' ', $errors);
            return response()->json([
                'code' => 400,
                'status' => 0,
                'message' => $errorMessage
            ]);
        }
        $purchase = TotalPurchase::find($request->id);
        if (!$purchase) {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Purchase ID Not Found',
            ]);
        }
        $purchase->delete();
        return response()->json([
            'code' => 200,
            'status' => '1',
            'message' => 'Purchase Deleted',
        ]);
    }

    public function get_admin()
    {

        $admin = Admin::all();
        if ($admin->isEmpty()) {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Admin Not Found',
            ]);
        }

        return response()->json([
            'code' => 200,
            'status' => '1',
            'message' => 'All Admin Found',
            'data' => $admin
        ]);
    }

    public function add_admin(Request $request)
    {

        $rules = [
            'username' => 'required',
            'password' => 'required|min:6',
        ];
        $validation = validator::make($request->all(), $rules);
        if ($validation->fails()) {
            $errors = $validation->errors()->all();
            $errorMessage = implode(' ', $errors);
            return response()->json([
                'code' => 400,
                'status' => 0,
                'message' => $errorMessage
            ]);
        }

        $admin = new Admin();
        $admin->username = $request->username;
        $admin->password = $request->password;
        $admin->save();
        if ($admin) {
            return response()->json([
                'code' => 200,
                'status' => '1',
                'message' => 'Admin Added',
                'data' => $admin
            ]);
        } else {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Admin Not Added',
            ]);
        }
    }

    public function update_admin(Request $request)
    {

        $rules = [
            'id' => 'required',
            'username' => 'required',
            'password' => 'required|min:6',
        ];
        $validation = validator::make($request->all(), $rules);
        if ($validation->fails()) {
            $errors = $validation->errors()->all();
            $errorMessage = implode(' ', $errors);
            return response()->json([
                'code' => 400,
                'status' => 0,
                'message' => $errorMessage
            ]);
        }

        $admin = Admin::find($request->id);
        if (!$admin) {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Admin Not Found',
            ]);
        }

        $admin->username = $request->username;
        $admin->password = $request->password;
        $admin->save();
        if ($admin) {
            return response()->json([
                'code' => 200,
                'status' => '1',
                'message' => 'Admin Updated',
                'data' => $admin
            ]);
        } else {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Admin Not Updated',
            ]);
        }
    }

    public function delete_admin(Request $request)
    {

        $rules = [
            'id' => 'required',
        ];
        $validation = validator::make($request->all(), $rules);
        if ($validation->fails()) {
            $errors = $validation->errors()->all();
            $errorMessage = implode(' ', $errors);
            return response()->json([
                'code' => 400,
                'status' => 0,
                'message' => $errorMessage
            ]);
        }

        $admin = Admin::find($request->id);
        if (!$admin) {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Admin Not Found',
            ]);
        }
        $admin->delete();
        return response()->json([
            'code' => 200,
            'status' => '1',
            'message' => 'Admin Deleted',
        ]);
    }

    public function login(Request $request)
    {

        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];
        $validation = validator::make($request->all(), $rules);
        if ($validation->fails()) {
            $errors = $validation->errors()->all();
            $errorMessage = implode(' ', $errors);
            return response()->json([
                'code' => 400,
                'status' => 0,
                'message' => $errorMessage
            ]);
        }

        $admin = Admin::where('username', $request->username)->where('password', $request->password)->first();
        if ($admin) {
            return response()->json([
                'code' => 200,
                'status' => '1',
                'message' => 'Admin Login',
                'data' => $admin
            ]);
        } else {
            return response()->json([
                'code' => 400,
                'status' => '0',
                'message' => 'Wrong Credentials',
            ]);
        }
    }
}
