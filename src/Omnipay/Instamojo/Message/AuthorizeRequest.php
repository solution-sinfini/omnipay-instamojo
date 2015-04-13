<?php

namespace Omnipay\Instamojo\Message;

/**
 * Instamojo Authorize Request
 */
class AuthorizeRequest extends SubmitRequest
{
    public function getData()
    {
        $data = parent::getData();

        $data['data_sign'] = $this->generateSignature($data);

        return $data;
    }
}
