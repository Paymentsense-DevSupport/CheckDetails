<html>
    <body>
        <table border="1" style="width:50%">
        <tr>
            <th>Details</th>
            <th>Value</th>
            <th>Comment</th>
        </tr>
        <tr>
            <td>StatusCode:</td>
            <td><?php echo $resStatusCode?></td>
            <td></td>
        </tr>
        <tr>
            <td>Message:</td>
            <td><?php echo $resMessage?></td>
            <td></td>
        </tr>
        <tr>
            <td>PreviousStatusCode:</td>
            <td><?php echo $resPreviousStatusCode?></td>
            <td></td>
        </tr>
        <tr>
            <td>PreviousMessage:</td>
            <td><?php echo $resPreviousMessage?></td>
            <td></td>
        </tr>
        <tr>
            <td>CrossReference:</td>
            <td><?php echo $resCrossReference?></td>
            <td></td>
        </tr>
        <tr>
            <td>Amount:</td>
            <td><?php echo $resAmount?></td>
            <td></td>
        </tr>
        <tr>
            <td>CurrencyCode:</td>
            <td><?php echo $resCurrencyCode?></td>
            <td></td>
        </tr>
        <tr>
            <td>OrderID:</td>
            <td><?php echo $resOrderID?></td>
            <td></td>
        </tr>
        <tr>
            <td>Customer name:</td>
            <td><?php echo $resCustomerName?></td>
            <td></td>
        </tr>
        <tr>
            <td>Address:</td>
            <td><?php echo $resAddress1, " ", $resAddress2?></td>
            <td></td>
        <tr>
        </tr>
        <tr>
            <td>City:</td>
            <td><?php echo $resCity?></td>
            <td></td>
        </tr>    
        <tr>
            <td>State:</td>
            <td><?php echo $resState?></td>
            <td></td>
        </tr>
        <tr>
            <td>PostCode:</td>
            <td><?php echo $resPostCode?></td>
            <td></td>
        </tr>
        
            
        </table>
    </body>
</html>