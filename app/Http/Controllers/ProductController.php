<?php
  
namespace App\Http\Controllers;
  
use App\Models\Product;
use Illuminate\Http\Request;
  
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
    
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:products',
            'title' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric',
            'type' => 'required',            
            'image' => 'required|file|max:5048',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Product::create($input);
     
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:products',
            'title' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric',
            'type' => 'required',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $product->update($input);
    
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
     
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
    public function allProducts()
    {
        // Retrieve all products from the database
        $products = Product::all();

        // Pass the products to the 'allProducts' view
        return view('allProducts', compact('products'));
    }
    public function showDisplays()
{
    $products = Product::where('type', 'display')->get();
    return view('products.displays', compact('products'));
}

public function showRAM()
{
    $products = Product::where('type', 'ram')->get();
    return view('products.ram', compact('products'));
}

public function showSSD()
{
    $products = Product::where('type', 'ssd')->get();
    return view('products.ssd', compact('products'));
}

public function showMouse()
{
    $products = Product::where('type', 'mouse')->get();
    return view('products.mouse', compact('products'));
}

public function showKeyboards()
{
    $products = Product::where('type', 'keyboard')->get();
    return view('products.keyboards', compact('products'));
}

public function showHeadphones()
{
    $products = Product::where('type', 'headphone')->get();
    return view('products.headphones', compact('products'));
}
public function productDetails($id)
{
    // Fetch the product by its ID
    $product = Product::findOrFail($id);
    
    // Return the new product details view and pass the product data
    return view('products.productDetails', compact('product'));
}
public function download($id)
{
    $product = Product::findOrFail($id);

    $filePath = public_path('images/' . $product->image);

    if (file_exists($filePath)) {
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);

        $mimeType = $this->getMimeType($extension);

        return response()->download($filePath, $product->image, ['Content-Type' => $mimeType]);
    } else {
        return back()->with('error', 'File not found!');
    }
}
private function getMimeType($extension)
{
    $mimeTypes = [
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',
        'pdf' => 'application/pdf',
    ];
    return $mimeTypes[$extension] ?? 'application/octet-stream'; 
}


    
}