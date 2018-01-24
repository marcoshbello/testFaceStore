<?php

namespace App\Exceptions;

use Exception;

abstract class MyException extends Exception
{
    protected $id;
    protected $details;

    public function __construct($message)
    {
        parent::__construct($message);
    }

    protected function create(array $args)
    {
        $this->id = array_shift($args);
        $error = $this->errors($this->id);
        $this->details = vsprintf($error['context'], $args);
        return $this->details;
    }

    private function errors($id)
    {
        $data = [
            '400' => [
                'context' => 'Bad Request - The request could not be understood by the server due to malformed syntax. The message body will contain more information; see Error Details.',
            ],
            '401' => [
                'context' => 'Unauthorized - The request requires user authentication or, if the request included authorization credentials, authorization has been refused for those credentials.',
            ],
            '403' => [
                'context' => 'Forbidden - The server understood the request, but is refusing to fulfill it.',
            ],
            '404' => [
                'context' => 'Not Found - The requested resource could not be found. This error can be due to a temporary or permanent condition.',
            ],
            '429' => [
                'context' => 'Too Many Requests - Rate limiting has been applied.',
            ],
            '500' => [
                'context' => 'Internal Server Error. You should never receive this error because our clever coders catch them all ... but if you are unlucky enough to get one, please report it to us through a comment at the bottom of this page.',
            ],
            '502' => [
                'context' => 'Bad Gateway - The server was acting as a gateway or proxy and received an invalid response from the upstream server.',
            ],
            '503' => [
                'context' => 'Service Unavailable - The server is currently unable to handle the request due to a temporary condition which will be alleviated after some delay. You can choose to resend the request again.',
            ]
        ];
        return $data[$id];
    }
}