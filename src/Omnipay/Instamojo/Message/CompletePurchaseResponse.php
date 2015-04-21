<?php

namespace Omnipay\Instamojo\Message;

class CompletePurchaseResponse extends Response
{
    public function isSuccessful()
    {
        return true;
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
        if (isset($this->data['payment']['payment_id'])) {
            return $this->data['payment']['payment_id'];
        }
    }

    public function getCurrency()
    {
        if (isset($this->data['payment']['currency'])) {
            return $this->data['payment']['currency'];
        }
    }

    public function getAmount()
    {
        if (isset($this->data['payment']['amount'])) {
            return $this->data['payment']['amount'];
        }
    }

    public function getBankFees()
    {
        if (isset($this->data['payment']['fees'])) {
            return $this->data['payment']['fees'];
        }
    }
}
