<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Orderdetail extends Entity
{

    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
