<?php

namespace Integracommerce\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class ApiClient extends Client
{
    protected $username = '';

    protected $password = '';

    public function __construct(array $config = [])
    {
        $this->username = $config['username'] ?? '';
        $this->password = $config['password'] ?? '';

        parent::__construct($config);
    }

    public function request($method, $uri = '', array $options = [])
    {
        try {

            $options = array_merge($options, [
                'auth' => [
                    $this->username,
                    $this->password
                ]
            ]);

            return parent::request($method, $uri, $options);

        } catch (ClientException $e) {
            throw new ApiException(
                $e->getMessage(),
                $e->getCode(),
                $e->getResponse()
            );
        }
    }
}