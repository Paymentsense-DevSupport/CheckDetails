<?php

    require_once 'PaymentFormHelper.php';
    include 'config.php';
    
    $merchantID = $_SESSION['merchantid'];;
    $password = $_SESSION['password'];;
    $preSharedKey = $_SESSION['presharedKey'];;
    //die("asdffghj");
    
    $duplicateTransaction = false;
               
    /*
     * Switch statement to check the resultDeliverymethod, 
     * whether POST, SERVER or SERVER_PULL
     */
    switch ($resultDeliveryMethod)
    {
        /*
         * Validate the transaction results for POST
         */
           case 'POST':
               /*
                * results dilevered using post variables to this page.
                */
                $boResultValidationSuccessful = PaymentFormHelper::validateTransactionResult_POST($merchantID, 
                                                                                                 $password, 
                                                                                                 $preSharedKey, 
                                                                                                 $hashMethod, 
                                                                                                 $_POST, 
                                                                                                 $trTransactionResult, 
                                                                                                 $szValidateErrorMessage);              
                
                                                                                              
                
                break;
            /*
            * Validate the transaction result for SERVER_PULL
            */     
           case 'SERVER_PULL':
                
               $szPaymentFormResultHandlerURL = 'https://mms.paymentsensegateway.com/Pages/PublicPages/PaymentFormResultHandler.ashx';
               /*
                * results from form arre queried using cross reference and orderID
                */
               $boResultValidationSuccessful = PaymentFormHelper::validateTransactionResult_SERVER_PULL($merchantID, 
                                                                                                        $password, 
                                                                                                        $preSharedKey, 
                                                                                                        $hashMethod, 
                                                                                                        $_GET, 
                                                                                                        $szPaymentFormResultHandlerURL, 
                                                                                                        $trTransactionResult, 
                                                                                                        $szValidateErrorMessage);
               break;
               
            /*
             * Validate the transaction result for SERVER
             */
           case 'SERVER':
               /*
                * query transaction results delivered via server-to-server
                */
               $boResultValidationSuccessful = PaymentFormHelper::validateTransactionResult_SERVER($merchantID, 
                                                                                                   $password, 
                                                                                                   $preSharedKey, 
                                                                                                   $hashMethod, 
                                                                                                   $_GET, 
                                                                                                   $trTransactionResult, 
                                                                                                   $szValidateErrorMessage);
    }              
    
    
    if ($boResultValidationSuccessful)
    {
        if (!PaymentFormHelper::reportTransactionResults($trTransactionResult, $szOutputMessage))
        {
            // handle the case where the results aren't stored correctly
        }
    }
    
    // display  error message if the transaction result were not validated
    if(!$boResultValidationSuccessful)
    {
        $messageClass = "ErrorMessage";
        $message = $szValidateErrorMassage;
    }
    else 
    {
        switch($trTransactionResult->getStatusCode())
        {
            case 0:
                $messageClass = "Successful";
                break;
            case 4:
                $messageClass = "ErrorMessage";
            case 5:
                $messageClass = "ErrorMessage";
                break;
            case 20:
                $duplicateTransaction = true;
                if($trTransactionResult->getPreviousStatusCode() == 0)
                {
                    $messageClass = "Successful";
                }
                else 
                {
                    $messageClass = "ErrorMessage";
                }
                $previouosTransactionMessage = $trTransactionResult->getPreviousMessage();
                break;
            case 30:
                $messageClass = "ErrorMessage";
                break;
            default:
                $messageClass = "ErrorMessage";
                
        }
    }
   $message = $trTransactionResult->getMessage();
   echo $message;
 
   
    //include 'templates/callbackResult.tpl';
?>
