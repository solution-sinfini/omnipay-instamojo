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
    
    public function getSalt()
    {
        return $this->getParameter('salt');
    }

    public function setSalt($value)
    {
        return $this->setParameter('salt', $value);
    }

    /**
     * function to send the instamojo link
     * @return [type] [description]
     */
    public function getLink()
    {
        return $this->getParameter('link');
    }

    public function setLink($value)
    {
        return $this->setParameter('link', $value);
    }

    public function getApiKey()
    {
        return $this->getParameter('api_key');
    }

    public function setApiKey($value)
    {
        return $this->setParameter('api_key', $value);
    }

    public function getAuthToken()
    {
        return $this->getParameter('auth_token');
    }

    public function setAuthToken($value)
    {
        return $this->setParameter('auth_token', $value);
    }

    public function sendData($data)
    {
        $url = $this->getLink().'?'.http_build_query($data, '', '&').'&embed=form';

        return $this->response = new Response($this, $data, $url);
    }

    public function getData()
    {
        $this->validate('amount');

        $data = array();

        $data['data_amount'] = $this->getAmount();

        return $data;
    }
}
