<?php

namespace Integracommerce\Classes;

use Integracommerce\Client\ApiClient;
use Integracommerce\Client\Response;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Psr\Http\Message\ResponseInterface;

class Integracommerce
{
    /**
     * Username for HTTP basic authentication
     * @var string
     */
    public static $username = '';

    /**
     * Password for HTTP basic authentication
     * @var string
     */
    public static $password = '';

    /**
     * Debug switch (default set to false)
     */
    public static $sandbox = false;

    public static $uriHomologacao = 'https://api.integracommerce.com.br/api/';

    public static $uriProducao = 'https://in.integracommerce.com.br/api/';

    /**
     * @var ApiClient
     */
    public static $apiClient;

    /*
     *  initalize  ApiClient
     */
    public static function init(string $username = '', string $password = '', bool $sandbox = false)
    {
        if (self::$apiClient === null) {

            $stack = HandlerStack::create();

            $stack->push(Middleware::mapResponse(function (ResponseInterface $response) {
                return new Response(
                    $response->getStatusCode(),
                    $response->getHeaders(),
                    $response->getBody(),
                    $response->getProtocolVersion(),
                    $response->getReasonPhrase());
            }));

            self::$username = $username ?? self::$username;
            self::$password = $password ?? self::$password;
            self::$sandbox = $sandbox;

            self::$apiClient = new ApiClient([
                'username' => $username,
                'password' => $password,
                'base_uri' => $sandbox ? self::$uriHomologacao : self::$uriProducao,
                'handler'  => $stack,
                'headers'  => [
                    'Accept' => 'application/json'
                ]
            ]);
        }
    }
}