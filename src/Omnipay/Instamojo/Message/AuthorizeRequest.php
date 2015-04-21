<?php

namespace Omnipay\Instamojo\Message;

/**
 * Instamojo Authorize Request
 */
class AuthorizeRequest extends SubmitRequest
{
    /**
     * function to create data
     * signature is require for authentication
     * at instamojo
     * @return [type] [description]
     */
    public function getData()
    {
        $data = parent::getData();

        $data['data_sign'] = $this->generateSignature($data);

        return $data;
    }
}
