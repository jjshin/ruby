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

<?php //debug($_REQUEST);?>

<table>
    <caption>Customer <?php echo $_REQUEST['name'];?> has made an Enquire </caption>
    <tr>
        <th>Title</th>
        <td><?php echo $_REQUEST['title'];?></td>
    </tr>
    <tr>
        <th>Name</th>
        <td><?php echo $_REQUEST['name'];?></td>
    </tr>
    <tr>
        <th>Phone</th>
        <td><?php echo $_REQUEST['phone'];?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?php echo $_REQUEST['email'];?></td>
    </tr>
    <tr>
        <th>Product ID</th>
        <td><?php echo $_REQUEST['products_id'];?></td>
    </tr>

    <tr>
        <th>Content</th>
        <td><?php echo $_POST['content'];?></td>
    </tr>

</table>
</body>

