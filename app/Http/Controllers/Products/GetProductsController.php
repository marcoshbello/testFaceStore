<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;
use App\Services\Products;

class GetProductsController extends Controller
{

    /**
     * GetProductsController constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProducts(Request $request)
    {
        $getProductsService = new Products\GetProductsService($request->pageNumber);
        $products = $getProductsService->GetProducts();

        $errors = new MessageBag();

        if (!$products['success']) {
            $errors->add('your_custom_error', $products['messages']);
        }

        if ($request->ajax()) {
            return view('products', array('products' => $products['data']))->withErrors($errors);
        }

        return view('app', array('products' => $products['data']))->withErrors($errors);
    }
}
