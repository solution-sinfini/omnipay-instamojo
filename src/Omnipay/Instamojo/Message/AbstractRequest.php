<?php

namespace Omnipay\Instamojo\Message;

/**
 * Instamojo Abstract Request
 */
abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    protected $liveEndPoint = 'https://www.instamojo.com/api/1.1/';
    protected $testEndPoint = 'https://www.instamojo.com/api/1.1/';

    public function getUsername()
    {
        return $this->getParameter('username');
    }

    public function setUsername($value)
    {
        return $this->setParameter('username', $value);
    }

    public function sendData($data)
    {
        $httpResponse = $this->httpClient->post($this->getEndpoint(), null, $data)->send();
        return new Response($this, $httpResponse->getBody());
    }

    public function getData()
    {
        $this->validate('amount', 'salt', 'end_point');

        $data = array();

        $data['data_amount'] = $this->getAmount();

        return $data;
    }
}
