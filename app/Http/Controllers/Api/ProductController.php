<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ProductServices;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $productService;

    public function __construct(ProductServices $productService)
    {
        $this->productService = $productService;
    }

    /**
     * List all products.
     *
     * This endpoint returns a list of all products in the store.
     *
     * @group Products
     * @response 200 {
     *   "count": 2,
     *   "products": [
     *      {
     *          "number_Product": 1,
     *          "name_Product": "Laptop",
     *          "new_price_Product": 1200,
     *          "imageProduct_Product": "https://example.com/storage/img.jpg"
     *      }
     *   ]
     * }
     */
    public function index()
    {
        // Get all products from the service
        $products = $this->productService->getAllProducts();

        // Check if no products found
        if ($products->isEmpty()) {
            return response()->json(['message' => 'No products found'], 404);
        }

        // Format the data
        $formatted = $products->map(function ($product) {
            return [
                'number_Product'            => $product->id,
                'name_Product'              => $product->name,
                'description_product'       => $product->description,
                'short_description_Product' => $product->short_description, 
                'quantity_Product'          => $product->quantity,
                'cost_price_Product'        => $product->cost_price,
                'purchase_price_Product'    => $product->purchase_price, 
                'old_price_Product'         => $product->old_price, 
                'new_price_Product'         => $product->new_price,
                'favorite_Product'          => $product->favorite,
                'imageProduct_Product'      => $product->getFirstMedia('images')?->getUrl(), 
            ];
        });

        // Return data as JSON
        return response()->json([
            'count' => $products->count(),
            'products' => $formatted,
        ]);
    }

    /**
     * Show a specific product.
     *
     * This endpoint returns the details of a single product by ID.
     *
     * @group Products
     * @urlParam id integer required The ID of the product.
     * @response 200 {
     *   "number_Product": 1,
     *   "name_Product": "Laptop",
     *   "description_product": "High performance laptop",
     *   "short_description_Product": "Dell 16GB RAM",
     *   "quantity_Product": 10,
     *   "cost_price_Product": 500,
     *   "purchase_price_Product": 550,
     *   "old_price_Product": 600,
     *   "new_price_Product": 550,
     *   "favorite_Product": false,
     *   "imageProduct_Product": "https://example.com/storage/img.jpg"
     * }
     * @response 404 {
     *   "message": "Product not found"
     * }
     */
    public function show($id)
    {
        // Get the product from the service
        $product = $this->productService->getProductById($id);

        // Check if product exists
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Format the data
        $formatted = [
            'number_Product'            => $product->id,
            'name_Product'              => $product->name,
            'description_product'       => $product->description,
            'short_description_Product' => $product->short_description, 
            'quantity_Product'          => $product->quantity,
            'cost_price_Product'        => $product->cost_price,
            'purchase_price_Product'    => $product->purchase_price, 
            'old_price_Product'         => $product->old_price, 
            'new_price_Product'         => $product->new_price,
            'favorite_Product'          => $product->favorite,
            'imageProduct_Product'      => $product->getFirstMedia('images')?->getUrl(),
        ];

        // Return data as JSON
        return response()->json($formatted);
    }
}
