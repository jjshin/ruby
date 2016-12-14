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
    <caption>Notice: Customer <b><?= $value2?></b> has made an order.</caption>
    <tr>
        <th>Customer Name</th>
        <td> <b><?= $value2?></b>   </td>
    </tr>

    <th>Order ID</th>
    <td> <b><?= $value1 ?></b>   </td>
    </tr>

    <tr>
        <th>Order Product</th>
        <td> <b><?= $value3?></b>   </td>
    </tr>
    <tr>
        <th>Unit Price</th>
        <td> <b>$<?= $value6?></b>   </td>
    </tr>
    <tr>
        <th>Order Quantity</th>
        <td> <b><?= $value5?></b>   </td>
    </tr>
    <tr>
        <th>Order Total Price</th>
        <td> <b>$<?= $value4?></b>   </td>
    </tr>
    <tr>
        <th>Order Created Time</th>
        <td> <b><?= $value7?></b>   </td>
    </tr>
    <tr>






</table>
</body>

