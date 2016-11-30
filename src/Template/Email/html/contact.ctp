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
    <caption>Contact from Customer <?php echo $_REQUEST['firstname'],$_REQUEST['lastname'] ;?></caption>
    <tr>
        <th>First Name</th>
        <td><?php echo $_REQUEST['firstname'];?></td>
    </tr>

    <tr>
        <th>First Lame</th>
        <td><?php echo $_REQUEST['lastname'];?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?php echo $_REQUEST['email'];?></td>
    </tr>

</table>
</body>

