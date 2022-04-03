<?php 
require_once '../src/Autoload.php';

$redis = new Redis();
$redis->pconnect('127.0.0.1');

$redisStore = new com\radityopw\multistore\RedisStore($redis,"mahasiswa");

$data = array('nrp' => '5202100002', 'nama' => 'radityopw');

$redisStore->set('5202100002',$data);

var_dump($redisStore->get('5202100002'));

$redisStore->del('5202100002');
