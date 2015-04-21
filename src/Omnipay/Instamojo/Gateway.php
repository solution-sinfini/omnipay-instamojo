<?php

namespace Omnipay\Instamojo;

use Omnipay\Common\AbstractGateway;

/**
 * instamojo Gateway
 *
 * @link http://docs.instamojoservices.com/raven/api-guide/
 */
class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'Instamojo';
    }

    public function getDefaultParameters()
    {
        return array(
            'api_key' => '',
            'auth_token' => '',
            'end_point' =>'',
            'salt' => ''
        );
    }

    /**
     * Setting up the salt for signature
     * @return [type] [description]
     */
    public function getSalt()
    {
        return $this->getParameter('salt');
    }

    public function setSalt($value)
    {
        return $this->setParameter('salt', $value);
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

    public function getLink()
    {
        return $this->getParameter('link');
    }

    public function setLink($value)
    {
        return $this->setParameter('link', $value);
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Instamojo\Message\PurchaseRequest', $parameters);
    }

    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Instamojo\Message\AuthorizeRequest', $parameters);
    }

    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Instamojo\Message\CompletePurchaseRequest', $parameters);
    }
}
