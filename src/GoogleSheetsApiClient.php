<?php
namespace Macki;

class GoogleSheetsApiClient
{
    /**
     * @var \Google_Client
     */
    protected $client;

    /**
     * @var \Google_Service_Sheets
     */
    protected $service;


    public function __construct($client)
    {
        $this->client = $client;
        $this->service = new \Google_Service_Sheets($this->client);
    }

    /**
     * @return \Google_Service_Sheets
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Magic call method.
     *
     * @param string $method
     * @param array $parameters
     *
     * @throws \BadMethodCallException
     *
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        if (method_exists($this->client, $method)) {
            return call_user_func_array([$this->client, $method], $parameters);
        }
        throw new \BadMethodCallException(sprintf('Method [%s] does not exist.', $method));
    }
}
