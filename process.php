<?php

    include 'config.php';
    require_once ('PaymentFormHelper.php');
    
    /*
     * input variables
     */
    
    /* 
     * the amount needs to be in form 0000 e.g. 10.00 -> 1000
     */
    $amount = '14500';
    $currencyCode = 'eur';
    $orderID = '150';
    $transactionType = 'SALE';
    /*
     * date format in form year-month-day
     */
    $transactionDateTime = '2016-07-20 11:59:38 +01:00';
    
    $orderDescription = 'Benny Kenny - 52/150';
    $customerName = 'Benny Kenny';
    $address1 = 'Louisburg';
    $address2 = '';
    $address3 = 'Louisburg';
    $address4 = ''; 
    $city = '';
    $state = 'Co. Mayo';
    $postCode = '';
    $countryCode = 372;
    $emailAddress = 'test@test.com';
    $phoneNumber = '00000000000';
    
    $merchantID = $_POST['merchantid'];;
    $password = $_POST['password'];;
    $preSharedKey = $_POST['presharedKey'];;
    //die("asdffghj");
    $_SESSION['merchantid'] = $merchantID;
    $_SESSION['password'] = $password;
    $_SESSION['presharedKey'] = $preSharedKey;
    /*
     * Date of birth in form Year-month-day
     */
    $dateOfBirth = date('Y-m-d', strtotime('2014-08-28'));
    $callbackURL = PaymentFormHelper::getSiteSecureBaseURL().'callback.php';
    /*
     * the numeric currency code is used for coresponding code
     */
    switch ($currencyCode)
    {
        case eur:
            $currencyCode = 978;
            break;
        case usd:
            $currencyCode = 840;
            break;
        case gbp:
            $currencyCode = 826;
            break;
    }
        
    /*
     * When result delivery method is SERVER
     * set the result delivery method and payment form display results to false
     */
    if ($resultDeliveryMethod == 'SERVER')
    {
        $serverResultURL = PaymentFormHelper::getSiteSecureBaseURL().'ReceiveTransactionresult.php';
        $paymentFormDisplaysResult = 'false';     
    }
    else 
    {
        $serverResultURL = '';
        $paymentFormDisplaysResult = 'true';
    }

    /*
     * Create a hash string
     */
    $hashstring = PaymentFormHelper::generateStringToHash($merchantID, 
                                                           $password, 
                                                           $amount, 
                                                           $currencyCode,
                                                           $echoAVScheckResult,
                                                           $echoCV2CheckResult,
                                                           $echoThreeDSecureAuthenticationCheckResult,
                                                           $echoCardType,
                                                           $echoCardNumberFirstSix,
                                                           $echoCardNumberLastFour,
                                                           $echoCardExpiryDate,
                                                           $orderID,
                                                           $transactionType,
                                                           $transactionDateTime,
                                                           $callbackURL,
                                                           $orderDescription,
                                                           $customerName,
                                                           $address1,
                                                           $address2,
                                                           $address3,
                                                           $address4,
                                                           $city,
                                                           $state,
                                                           $postCode,
                                                           $countryCode,
                                                           $emailAddress,
                                                           $phoneNumber,
                                                           $dateOfBirth,
                                                           $emailAddressEditable,
                                                           $phoneNumberEditable,
                                                           $dateOfBirthEditable,
                                                           $CV2Mandatory,
                                                           $address1Mandatory,
                                                           $cityMandatory,
                                                           $postCodeMandatory,
                                                           $stateMandatory,
                                                           $countryMandatory,                                                          
                                                           $resultDeliveryMethod,
                                                           $serverResultURL,
                                                           $paymentFormDisplaysResult,
                                                           $preSharedKey,
                                                           $hashMethod);
    
 
    /*
     * Create the hashDigest using the hash string created
     * Encodeed using SHA1
     */
   // $szReturnString = sha1('PreSharedKey=oiCwp5kCdayiTWTH5A==&MerchantID=lewist-5620897&Password=Lewistest1234&Amount=7078207&CurrencyCode=826&OrderID=SszrJazO_prCjivr&TransactionType=SALE&TransactionDateTime=2015-03-09 08:49:37 -06:00&CallbackURL=http://paymentgatewayuk.com/XCart/?target=callback&OrderDescription=Order:SszrJazO_prCjivr&CV2Mandatory=true&Address1Mandatory=true&CityMandatory=true&PostCodeMandatory=true&StateMandatory=false&CountryMandatory=true&ResultDeliveryMethod=POST&ServerResultURL=&PaymentFormDisplaysResult=true');
    $hashDigest = PaymentFormHelper::calculateHashDigest($hashstring, $preSharedKey, $hashMethod);
    
  //  die($szReturnString);
    /*
    * include the form to be sent to the gateway
    */
    include 'templates/processForm.tpl';
    
?> 



