<?php

class Payment
{
    private $zarinpalMerchantID = zarinpalMerchantID;
    private $zarinpalcallBack = zarinpalcallBack;
    private $zarinpalErrors = [
        '-1' => 'اطلاعات ارسال شده ناقص است.',
        '-2' => 'آی پی یا مرچنت کد پذیرنده صحیح نیست.',
        '-3' => 'رقم باید بالای ۱۰۰ تومان باشد.',
        '-4' => 'سطح تایید پدیرنده پایین تر از سطح نقره ایست.',
    ];

    function __construct()
    {
        require(URL . 'public/nusoap/nusoap.php');
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
            $Errors = $this->zarinpalErrors[$Status];
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
            $Errors = $this->zarinpalErrors[$Status];
        }
        if ($Status == 100) {
            $RefID = $result['RefID'];
        }
        $responseArray = ['Status' => $Status, 'Errors' => $Errors, 'RefID' => $RefID];
        return $responseArray;
    }

}

?>