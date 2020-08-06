<?php namespace Zaioll\ActiveResource\http\client;

use yii\base\Component;
use Zaioll\ActiveResource\http\client\ClientInterface;
use Psr\Http\Message\RequestInterface;

class Cliente extends Component implements ClientInterface
{
    protected $_client;

    /**
     * @inheritDoc
     */
    public function sendRequest(RequestInterface $request)
    {
        return $this->send($request);
    }

    /**
     * @param array $config
     */
    public function __construct($encapsulado, array $config = [])
    {
        $this->_client = $encapsulado;

        parent::__construct($config);        
    }

    /**
     * Get the value of client
     */ 
    public function getClient()
    {
        return $this->_client;
    }

    /**
     * Set the value of client
     *
     * @return  self
     */ 
    protected function setClient($client)
    {
        $this->_client = $client;

        return $this;
    }

    public function sendAsync(RequestInterface $request, array $options = [])
    {
        return $this->client->sendAsync($request, $options);
    }

    public function requestAsync($method, $uri = '', array $options = [])
    {
        return $this->client->requestAsync($method, $uri, $options);
    }

    public function send(RequestInterface $request, array $options = [])
    {
        return $this->client->send($request, $options);
    }

    public function request($method, $uri = '', array $options = [])
    {
        return $this->client->request($method, $uri, $options);
    }

    public function head($url, $options)
    {
        return $this->_client->head($url, $options);
    }

    public function get($url, $options)
    {
        return $this->_client->get($url, $options);
    }

    public function __get($name)
    {
        return $this->_client->$name;
    }

    public function __set($name, $value)
    {
        return $this->_client->$name = $value;
    }

    /*
    public function __call($name)
    {
        $params = func_get_args();
        if (count($params) < 1) {
            throw new \InvalidArgumentException('Magic request methods require a URI and optional options array');
        }

        $args[0] = $params[0];
        $args[1] = isset($params[1]) ? $params[1] : [];

        return $this->_client->$name($args);
    }
    */
}
