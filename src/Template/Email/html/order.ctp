<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width:80%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        caption {

            text-align: center;
            border: 1px solid #dddddd;
            padding: 8px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php// debug($_REQUEST);?>

<table>
    <caption>Notice: Customer <?php echo $_POST['receive_name'] ;?> has made an order.</caption>
    <tr>
        <th>Customer Name</th>
        <td> <?php echo $_POST['receive_name'] ;?>  </td>
    </tr>
    <tr>
        <th>Customer Address</th>
        <td><?php echo $_POST['address1'],' ', $_POST['address2'],' ', $_POST['suburb'], ' ', $_POST['postcode'],' ', $_POST['state'];?></td>
    </tr>
    <tr>
        <th>Order Product</th>
        <td> <b><?= $value ?></b>   </td>
    </tr>
    <tr>
        <th>Order Qty</th>
        <td> <b><?= $value1 ?></b>   </td>
    </tr>



</table>
</body>

