<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Handlers\ImageUploadHandler;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$products = Product::paginate();
		return view('products.index', compact('products'));
	}

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

	public function create(Product $product)
	{
		$categories=Category::all();
		return view('products.create_and_edit', compact('product','categories'));
	}

	public function store(ProductRequest $request,ImageUploadHandler $uploadImg,Product $product)
	{
		$this->authorize('update', $product);
		$data=$request->all();
		//dd($data);
        if($request->img){
            $reslut=$uploadImg->save($request->img,'img',$request->category_id,250);
            if($reslut){
                $data['img']=$reslut['path'];
            }
        }

        $product->create($data);

		//$product = Product::create($request->all());
		return redirect()->route('products.index')->with('message', 'Created successfully.');
	}

	public function edit(Product $product)
	{
		//dd($product);
        $this->authorize('update', $product);
        $categories=Category::all();
		return view('products.create_and_edit', compact('product','categories'));
	}

	public function update(ProductRequest $request, Product $product,ImageUploadHandler $uploadImg)
	{
		$this->authorize('update', $product);
		$data=$request->all();
		//dd($data);
        if($request->img){
            $reslut=$uploadImg->save($request->img,'img',$request->category_id,250);
            if($reslut){
                $data['img']=$reslut['path'];
            }
        }

        $product->update($data);


		return redirect()->route('products.show', $product->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Product $product)
	{
		$this->authorize('destroy', $product);
		$product->delete();

		return redirect()->route('products.index')->with('message', 'Deleted successfully.');
	}
}