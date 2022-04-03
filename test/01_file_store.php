<?php 
require_once '../src/Autoload.php';

$fileStore = new com\radityopw\multistore\FileStore("/tmp/multistore/filestore");
$data = array('nama' => 'radityopw','nrp' => '5202100002');

$fileStore->set('5202100002',$data);

var_dump($fileStore->get('5202100002'));

$fileStore->del('5202100002');

