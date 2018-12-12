<?php

namespace IntegraCommerce\Client;

use \Exception;

class ApiException extends Exception
{
    /**
     * The server response.
     *
     * @var Response
     */
    protected $response;

    protected $errors = [];

    public function __construct($message = "", int $code = 0, Response $response)
    {
        $this->response = $response;
        $message = $this->response->getResponse()->Message ?? $message;

        parent::__construct($message, $code);
    }

    /**
     * Get the HTTP response header
     *
     * @return string HTTP response header
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Return errors list
     * @return array errors
     */
    public function getErrors()
    {
        $errors = $this->response->getResponse()->Errors ?? null;

        if ($errors != null && is_array($errors)) {
            foreach ($errors as $error) {
                $this->errors[] = $this->getCode() . ' - ' . $this->getErrorMessageByCode($this->getCode()) . ' - ' . $error->Message;
            }
        } else {
            $this->errors[] = $this->getCode() . ' - ' . $this->getErrorMessageByCode($this->getCode()) . ' - ' . $this->getMessage();
        }

        return $this->errors;
    }

    public function getErrorMessageCode(): string
    {
        return $this->getErrorMessageByCode($this->getCode());
    }

    /**
     * Retorna o response ja tratado
     *
     * @param $code
     * @return string
     */
    public function getErrorMessageByCode($code): string
    {
        switch ($code) {
            case 400:
                {
                    return 'Requisição Mal Formada';
                }
            case 401:
                {
                    return 'Usuário não autorizado';
                }
            case 403:
                {
                    return 'Acesso não autorizado';
                }
            case 404:
                {
                    return 'Recurso não Encontrado';
                }
            case 405:
                {
                    return 'Operação não suportada';
                }
            case 408:
                {
                    return 'Tempo esgotado para a requisição';
                }
            case 409:
                {
                    return 'Recurso em conflito';
                }
            case 413:
                {
                    return 'Requisição excede o tamanho máximo permitido';
                }
            case 415:
                {
                    return 'Content-type inválido';
                }
            case 422:
                {
                    return 'Não foi possível processar as instruções contidas na requisição';
                }
            case 429:
                {
                    return 'Requisição excede a quantidade máxima de chamadas permitidas à API.';
                }
            case 500:
                {
                    return 'Erro na API';
                }
        }
    }
}