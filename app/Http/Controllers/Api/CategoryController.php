<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CatgoryServices;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $catgoryservices;

    public function __construct(CatgoryServices $catgoryservices)
    {
        $this->catgoryservices = $catgoryservices;
    }

    /**
     * List all categories.
     *
     * This endpoint returns a list of all categories available in the store.
     *
     * @group Categories
     * @response 200 [
     *   {
     *      "id": 1,
     *      "name": "Electronics",
     *      "description": "All kinds of electronic devices",
     *      "image": "https://example.com/storage/imagesCat/electronics.jpg"
     *   },
     *   {
     *      "id": 2,
     *      "name": "Furniture",
     *      "description": "Home and office furniture",
     *      "image": "https://example.com/storage/imagesCat/furniture.jpg"
     *   }
     * ]
     */
    public function index()
    {
        // Retrieve all categories from the service
        $categories = $this->catgoryservices->getAll();

        // Format each category with its image URL
        $formatted = $categories->map(function ($cat) {
            return [
                'id'          => $cat->id,
                'name'        => $cat->name,
                'description' => $cat->description,
                'image'       => $cat->getFirstMedia('imagesCat')?->getUrl(),
            ];
        });

        // Return JSON response
        return response()->json($formatted);
    }


}
