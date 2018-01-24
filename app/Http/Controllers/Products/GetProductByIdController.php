<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Products;

class GetProductByIdController extends Controller
{
    /**
     * GetProductByIdController constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProductById(Request $request)
    {
        $getProductByIdService = new Products\GetProductByIdService($request->productId);
        $product = $getProductByIdService->GetProductById();

        if ($request->ajax()) {
            return response()->json([$product]);
        }
    }
}
