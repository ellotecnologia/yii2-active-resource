<?php namespace Zaioll\ActiveResource\http\client;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\RequestInterface;

/**
 * Esta interface será substituida pela interface definida na PSR-18
 */
//interface ClientInterface extends \GuzzleHttp\ClientInterface
interface ClientInterface
{
    /**
     * Sends a PSR-7 request and returns a PSR-7 response.
     *
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface If an error happens while processing the request.
     */
    public function sendRequest(RequestInterface $request);
}
