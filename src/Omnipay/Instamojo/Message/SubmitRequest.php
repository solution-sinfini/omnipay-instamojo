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

        $this->validate('amount');

        $data['data_amount'] = $this->getAmount();
        $data['data_readonly'] = 'data_amount';

        return $data;
    }

    protected function generateSignature($data)
    {
        return hash_hmac(
            'sha1',
            $this->getAmount(),
            $this->getSalt()
        );
    }

    public function getEndpoint()
    {
        return $this->getEndpoint();
    }
}
