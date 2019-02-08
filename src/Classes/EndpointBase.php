<?php

namespace Integracommerce\Classes;


use Integracommerce\Client\ApiClient;
use Integracommerce\Client\Response;

abstract class EndpointBase
{
    /**
     * @var ApiClient
     */
    protected $apiClient;

    public function __construct($apiClient = null)
    {
        if (null === $apiClient) {
            if (Integracommerce::$apiClient === null) {
                Integracommerce::init();
            } else
                $this->apiClient = Integracommerce::$apiClient;
        } else {
            $this->apiClient = $apiClient;
        }
    }

    /**
     * @return ApiClient
     */
    public function getApiClient(): ApiClient
    {
        return $this->apiClient;
    }

    /**
     * @param ApiClient $apiClient
     */
    public function setApiClient(ApiClient $apiClient): void
    {
        $this->apiClient = $apiClient;
    }

    protected function request(string $method, string $uri, array $options = []): Response
    {
        return $this->getApiClient()->request($method, $uri, $options);
    }
}