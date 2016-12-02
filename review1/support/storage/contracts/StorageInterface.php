<?php

namespace App\support\storage\contracts;

Interface StorageInterface
{
    public function get ($index);
    public function set ($index, $value);
    public function all();
    public function exists($index);
    public function remove ($index);
    public function clear();
}