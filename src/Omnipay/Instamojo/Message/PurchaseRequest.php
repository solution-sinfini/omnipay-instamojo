<?php

namespace Omnipay\Instamojo\Message;

/**
 * Instamojo Purchase Request
 */
class PurchaseRequest extends AuthorizeRequest
{
    public function getData()
    {
        $data = parent::getData();

        return $data;
    }
}
