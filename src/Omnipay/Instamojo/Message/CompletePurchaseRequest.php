<?php
namespace Omnipay\Instamojo\Message;

class CompletePurchaseRequest extends PurchaseRequest
{
    protected $liveEndPoint = 'https://www.instamojo.com/api/1.1/';
    protected $testEndPoint = 'https://www.instamojo.com/api/1.1/';
    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        $data = array(
            'payment_id'  => $this->getTransactionReference(),
        );

        return $data;
    }

    /**
     * function to get the payment id
     * @return [type] [description]
     */
    public function getTransactionReference()
    {
        return $this->httpRequest->query->get('payment_id');
    }
    
    /**
     * function to check the status of payment
     * on complete ofthe purchase
     */
    public function sendData($data)
    {
        if ($data['payment_id']) {
            $httpRequest = $this->httpClient->createRequest(
                'GET',
                $this->liveEndPoint.'payments/'.$data['payment_id'],
                null,
                $data
            );

            $httpResponse = $httpRequest
                ->setHeader('X-Api-key', $this->getApiKey())
                ->setHeader('X-Auth-Token', $this->getAuthToken())
                ->send();
                
            return $this->response = new CompletePurchaseResponse($this, $httpResponse->json());
        }
    }
}
