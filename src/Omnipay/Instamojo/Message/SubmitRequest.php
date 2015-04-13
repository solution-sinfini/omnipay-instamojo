<?php

namespace Omnipay\Instamojo\Message;

use Omnipay\Instamojo\Message\AbstractRequest;

/**
 * Instamojo Submit Request
 */
class SubmitRequest extends AbstractRequest
{
    public function getData()
    {
        $data = parent::getData();

        $this->validate('amount', 'currency');

        $data['data_amount'] = $this->getAmountInteger();
        $data['data_readonly'] = 'data_amount';

        return $data;
    }

    protected function generateSignature($data)
    {
        return hash_hmac(
            'sha1',
            $data['amount'],
            $this->getSalt()
        );
    }

    public function getEndpoint()
    {
        return $this->getEndpoint();
    }
}
