<?php

namespace App\Services\ExternalApis;

class ClientConnectService
{
    private $url;
    private $requestType;
    private $header;

    /**
     * ClientConnectService constructor.
     * @param $url
     * @param $requestType
     * @param $header
     */
    public function __construct($url, $requestType, $header)
    {
        $this->url = $url;
        $this->requestType = $requestType;
        $this->header = $header;
    }

    /**
     * @return mixed
     */
    public function ClientConnect()
    {
        $curl = curl_init($this->url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $this->requestType);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->header);
        $output = curl_exec($curl);
        $response = json_decode($output);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($status == 200) {
            return [
                'success'   => true,
                'data'      => $response
            ];
        } else {
            return [
                'success'       => false,
                'data'          => '',
                'error_code'    => $status
            ];
        }
    }
}