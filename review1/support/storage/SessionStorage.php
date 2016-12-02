<?php


namespace App\support\storage;



use Countable;
use App\support\storage\contracts\StorageInterface;

class SessionStorage implements StorageInterface, Countable {

    protected $bucket;


    public function __construct($bucket = 'default')
    {
        if (!isset($_SESSION[$bucket])){
            $_SESSION[$bucket] = [];
        }


        $this->bucket = $bucket;
    }


}