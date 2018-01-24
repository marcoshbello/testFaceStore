<?php

namespace App\Services\ExternalApis\FaceStore;

use App\Services\ExternalApis\ClientConnectService;

class ClientConnectFaceStoreService
{
    private $requestMethod;
    private $requestType;

    /**
     * ClientConnectFaceStoreService constructor.
     * @param $requestMethod
     * @param $requestType
     */
    public function __construct($requestMethod, $requestType)
    {
        $this->requestMethod = $requestMethod;
        $this->requestType = $requestType;
    }

    /**
     * @return mixed
     */
    public function ClientConnectFaceStore()
    {
        $url = "https://api.facestore.pt/v1/" . $this->requestMethod;
        $token = "b6829b5d2950221a0a05c8be4c85a00b6b67ce8c";

        $header = array(
            'APIToken: ' . $token,
            'Content-Type: application/json'
        );

        try {
            $clientConnect = new ClientConnectService($url, $this->requestType, $header);
            $request = $clientConnect->ClientConnect();

            if ($request['success']) {
                return $request;
            }

            throw new \App\Exceptions\ConnectMonException($request['error_code']);

        } catch (\App\Exceptions\ConnectMonException $e) {
            return [
                'success'   => false,
                'data'      => '',
                'messages'  => $e->getMessage()
            ];
        }
    }
}