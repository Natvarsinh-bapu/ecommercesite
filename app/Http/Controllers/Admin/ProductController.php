<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\ProductImage;
use App\ProductCategory;
use App\Utils\FileUpload;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('images')->latest()->paginate(9);

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', 1)->pluck('name', 'id');

        return view('admin.product.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $request->all();        

        if(isset($post['image']) && $post['image'] != null){
            $path = 'product_images/';
            $post['image'] = FileUpload::UploadFile($path, $post['image']);
        }

        $other_images = [];
        if(isset($post['other_images']) && !empty($post['other_images'])){
            $path = 'product_images/';
            foreach ($post['other_images'] as $file) {
                $other_images[] = FileUpload::UploadFile($path, $file);
            }            
        }        

        $product = Product::create($post);

        if(!empty($other_images)){
            foreach ($other_images as $img) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $img
                ]);
            }
        }

        if($product){
            foreach ($post['category'] as $category) {
                ProductCategory::create([
                    'product_id' => $product->id,
                    'category_id' => $category
                ]);
            }
        }

        return redirect('admin/products')->with('success', 'Product created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('images')->findOrFail($id);

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::where('status', 1)->pluck('name', 'id');
        $selected = ProductCategory::where('product_id', $id)->pluck('category_id')->toArray();

        return view('admin.product.edit', compact('product', 'selected', 'categories'));
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
        $post = $request->all();

        $product = Product::findOrFail($id);

        if(isset($post['image']) && $post['image'] != null){
            $path = 'product_images/';
            $post['image'] = FileUpload::UploadFile($path, $post['image']);

            FileUpload::deleteFile($path, $product->image);
        } else {
            $post['image'] = $product->image;
        }

        $other_images = [];
        if(isset($post['other_images']) && !empty($post['other_images'])){
            $path = 'product_images/';
            foreach ($post['other_images'] as $file) {
                $other_images[] = FileUpload::UploadFile($path, $file);
            }

            $product_images = ProductImage::where('product_id', $product->id)->get();
            foreach ($product_images as $product_image) {
                $path = 'product_images/';            
                FileUpload::deleteFile($path, $product_image->image);
                $product_image->delete();
            }

            if(!empty($other_images)){
                foreach ($other_images as $img) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $img
                    ]);
                }
            }
        }

        $product->update($post);

        if($product){
            ProductCategory::where('product_id', $product->id)->delete();
            foreach ($post['category'] as $category) {
                ProductCategory::create([
                    'product_id' => $product->id,
                    'category_id' => $category
                ]);
            }
        }

        return redirect('admin/products')->with('success', 'Product updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return redirect()->back();
    }
}
