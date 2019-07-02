<?php

class Payment
{
    private $zarinpalMerchantID = zarinpalMerchantID;
    private $zarinpalcallBack = zarinpalcallBack;
    //private $zarinpalErrors = zarinpalErrors;

    function __construct()
    {
        require('public/nusoap/nusoap.php');
    }


    function zarinpalRequest($Amount, $Description, $Email, $Mobile)
    {
        $client = new nusoap_client('https://www.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
        $client->soap_defencoding = 'UTF-8';
        $result = $client->call('PaymentRequest', [
                'MerchantID' => $this->zarinpalMerchantID,
                'Amount' => $Amount,
                'Description' => $Description,
                'Email' => $Email,
                'Mobile' => $Mobile,
                'CallbackURL' => $this->zarinpalcallBack,
        ]);
        $Status = $result['Status'];
        $Errors = '';
        $Authority = '';
        if ($Status != 100) {
            $ErrorArray = zarinpalErrors;
            $Errors = $ErrorArray[$Status];
        }
        if ($Status == 100) {
            $Authority = $result['Authority'];
        }
        $responseArray = ['Status' => $Status, 'Errors' => $Errors, 'Authority' => $Authority];
        return $responseArray;
    }

    function zarinpalVerify($Authority, $Amount)
    {
        $client = new nusoap_client('https://www.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
        $client->soap_defencoding = 'UTF-8';
        $result = $client->call('PaymentVerification', [

            'MerchantID' => $this->zarinpalMerchantID,
            'Authority' => $Authority,
            'Amount' => $Amount,

        ]);
        $Status = $result['Status'];
        $Errors = '';
        $RefID = '';
        if ($Status != 100) {
            $ErrorArray = zarinpalErrors;
            $Errors = $ErrorArray[$Status];
        }
        if ($Status == 100) {
            $RefID = $result['RefID'];
        }
        $responseArray = ['Status' => $Status, 'Errors' => $Errors, 'RefID' => $RefID];
        return $responseArray;
    }

}

?>