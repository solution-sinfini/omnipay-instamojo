<?php

namespace Omnipay\Instamojo\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

/**
 * Instamojo Response
 */
class Response extends AbstractResponse
{
    public function __construct(RequestInterface $request, $data)
    {
        $this->request = $request;
        parse_str($data, $this->data);
    }

    public function isSuccessful()
    {
        return isset($this->data['Status']) && in_array($this->data['Status'], array(
            '200')
        );
    }

    public function getCode()
    {
        return (
            isset($this->data['ErrorCode']) &&
            $this->data['ErrorCode'] != ''
        ) ? $this->data['ErrorCode'] : null;
    }

    public function getMessage()
    {
        return (
            isset($this->data['Message']) &&
            $this->data['Message'] !== ''
        ) ? $this->data['Message'] : null;
    }

    public function getTransactionReference()
    {
        if (isset($this->data['payment_id'])) {
            return $this->data['payment_id'];
        }
    }
}
