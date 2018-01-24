<?php

namespace App\Services\ExternalApis\FaceStore;

class GetProductsFaceStoreService
{
    private $page;

    /**
     * GetProductsFaceStoreService constructor.
     * @param string $page
     */
    public function __construct($page = 'null')
    {
        $this->page = $page;
    }

    /**
     * @return mixed
     */
    public function GetProductsFaceStore()
    {
        $requestMethod = "products?page=" . $this->page;
        $requestType = "GET";

        $clientConnectFaceStore = new ClientConnectFaceStoreService($requestMethod, $requestType);

        return $clientConnectFaceStore->ClientConnectFaceStore();
    }
}
