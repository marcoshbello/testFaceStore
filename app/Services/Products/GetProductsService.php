<?php

namespace App\Services\Products;

use App\Services\ExternalApis\FaceStore;

class GetProductsService
{
    private $page;

    /**
     * GetProductsService constructor.
     * @param $page
     */
    public function __construct($page)
    {
        $this->page = $page;
    }

    /**
     * @return mixed
     */
    public function getProducts()
    {
        $getProductsFaceStoreService = new FaceStore\GetProductsFaceStoreService($this->page);

        $productsList = $getProductsFaceStoreService->GetProductsFaceStore();

        return $productsList;
    }
}