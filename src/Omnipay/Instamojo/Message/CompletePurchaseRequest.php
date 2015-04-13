<?php
namespace Omnipay\Instamojo\Message;

class CompletePurchaseRequest extends PurchaseRequest
{
    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        $this->validate('payment_id');

        $data = array(
            'payment_id'  => $this->getTransactionReference(),
        );

        return $data;
    }

    public function getTransactionReference()
    {
        return $this->httpRequest->query->get('payment_id');
    }
    
    /**
     * {@inheritdoc}
     */
    public function sendData($data)
    {
        $headers = array();
        $headers[] = array('X-Api-key:'.$this->getApiKey());
        $headers[] = array('X-Auth-Token:'.$this->getAuthToken());

        if ($data['payment_id']) {
            $httpResponse = $this->httpClient->post($this->getEndPoint().'/payments/'.$data['payment_id'], $headers, $data)->send();
            return $this->response = new CompletePurchaseResponse($this, $httpResponse->xml());
        }
    }
}
