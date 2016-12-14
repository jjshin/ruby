
<p>Dear Customer:</p>
<p>Order No: <b><?= $value1 ?></b></p>
<p>Order Status has changed.</P>
<p> </p>
<p>Your current order Status  has been changed to:</p>
<b>
    <?php

    switch($value){
        case 1:
            echo 'Confirming';
            break;
        case 2:
            echo 'Confirmed';
            break;
        case 3:
            echo 'On its way';
            break;
        case 4:
            echo 'Out for delivery';
            break;
        case 5:
            echo'Delivered';
            break;
        case 6:
            echo 'Cancelled';
            break;
    }
    ?>
</b>

<p>Warm Regards,</p>
<p>Ruby's Gifts Team</p>



