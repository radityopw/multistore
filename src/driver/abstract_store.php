<?php 
namespace com\radityopw\multistore;

abstract class AbstractStore{

    abstract public function set(string $key,array $value);
    abstract public function get(string $key);
    abstract public function del(string $key);

}
