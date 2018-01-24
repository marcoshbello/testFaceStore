<?php

namespace App\Services\ExternalApis\FaceStore;

class GetProductByIdFaceStoreService
{
    private $productId;

    /**
     * GetProductByIdFaceStoreService constructor.
     * @param $productId
     */
    public function __construct($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return mixed
     */
    public function GetProductByIdFaceStore()
    {
        $requestMethod = "products/" . $this->productId;
        $requestType = "GET";

        $clientConnectFaceStore = new ClientConnectFaceStoreService($requestMethod, $requestType);

        return $clientConnectFaceStore->ClientConnectFaceStore();
    }
}
