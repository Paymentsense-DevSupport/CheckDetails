<html>
    <body>
    <!-- Create a form to send the variables to the payment gateway -->
        <form action="https://mms.paymentsensegateway.com/Pages/PublicPages/PaymentForm.aspx" id="processForm" method="post">
            <input type="hidden" name="HashDigest" value="<?php echo $hashDigest?>"/>
            <input type="hidden" name="MerchantID" value="<?php echo $merchantID?>"/>
            <input type="hidden" name="Amount" value="<?php echo $amount?>"/>
            <input type="hidden" name="CurrencyCode" value="<?php echo $currencyCode?>"/>
            <input type="hidden" name="EchoAVSCheckResult" value="<?php echo $echoAVScheckResult?>"/>
            <input type="hidden" name="EchoCV2CheckResult" value="<?php echo $echoCV2CheckResult?>"/>
            <input type="hidden" name="EchoThreeDSecureAuthenticationCheckResult" value="<?php echo $echoThreeDSecureAuthenticationCheckResult?>"/>
            <input type="hidden" name="EchoCardType" value="<?php echo $echoCardType?>"/>
            <input type="hidden" name="EchoCardNumberFirstSix" value="<?php echo $echoCardNumberFirstSix?>"/>
            <input type="hidden" name="EchoCardNumberLastFour" value="<?php echo $echoCardNumberLastFour?>"/>
            <input type="hidden" name="EchoCardExpiryDate" value="<?php echo $echoCardExpiryDate?>"/>
           
           
            <input type="hidden" name="PhoneNumber" value="<?php echo $phoneNumber?>"/>
            <input type="hidden" name="DateOfBirth" value="<?php echo $dateOfBirth?>"/>
            <input type="hidden" name="EmailAddressEditable" value="<?php echo $emailAddressEditable?>"/>
            <input type="hidden" name="PhoneNumberEditable" value="<?php echo $phoneNumberEditable?>"/>
            <input type="hidden" name="DateOfBirthEditable" value="<?php echo $dateOfBirthEditable?>"/>
            <input type="hidden" name="CV2Mandatory" value="<?php echo $CV2Mandatory?>"/>
            <input type="hidden" name="Address1Mandatory" value="<?php echo $address1Mandatory?>"/>
            <input type="hidden" name="CityMandatory" value="<?php echo $cityMandatory?>"/>
            <input type="hidden" name="PostCodeMandatory" value="<?php echo $postCodeMandatory?>"/>
            <input type="hidden" name="StateMandatory" value="<?php echo $stateMandatory?>"/>
            <input type="hidden" name="CountryMandatory" value="<?php echo $countryMandatory?>"/>
             <input type="hidden" name="OrderID" value="<?php echo $orderID?>"/>
            <input type="hidden" name="TransactionType" value="<?php echo $transactionType?>"/>
            <input type="hidden" name="TransactionDateTime" value="<?php echo $transactionDateTime?>"/>
            <input type="hidden" name="CallbackURL" value="<?php echo $callbackURL?>"/>
            <input type="hidden" name="OrderDescription" value="<?php echo $orderDescription?>"/>
            <input type="hidden" name="CustomerName" value="<?php echo $customerName?>"/>
            <input type="hidden" name="Address1" value="<?php echo $address1?>"/>
            <input type="hidden" name="Address2" value="<?php echo $address2?>"/>
            <input type="hidden" name="Address3" value="<?php echo $address3?>"/>
            <input type="hidden" name="Address4" value="<?php echo $address4?>"/>
            <input type="hidden" name="City" value="<?php echo $city?>"/>
            <input type="hidden" name="State" value="<?php echo $state?>"/>
            <input type="hidden" name="PostCode" value="<?php echo $postCode?>"/>
            <input type="hidden" name="CountryCode" value="<?php echo $countryCode?>"/>
            <input type="hidden" name="EmailAddress" value="<?php echo $emailAddress?>"/>
            <input type="hidden" name="ResultDeliveryMethod" value="<?php echo $resultDeliveryMethod?>"/>
            <input type="hidden" name="ServerResultURL" value="<?php echo $serverResultURL?>"/>
            <input type="hidden" name="PaymentFormDisplaysResult" value="<?php echo $paymentFormDisplaysResult?>"/>
          
        </form>

        <script>document.getElementById('processForm').submit();</script>
	</body>
</html>