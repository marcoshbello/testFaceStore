<?php

namespace App\Services\Products;

use App\Services\ExternalApis\FaceStore;

class GetProductByIdService
{
    private $productId;

    /**
     * GetProductByIdService constructor.
     * @param $productId
     */
    public function __construct($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return mixed
     */
    public function getProductById()
    {
        $getProductByIdFaceStoreService = new FaceStore\GetProductByIdFaceStoreService($this->productId);

        $product = $getProductByIdFaceStoreService->GetProductByIdFaceStore();

        return $product;
    }
}