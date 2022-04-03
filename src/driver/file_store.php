<?php 
namespace com\radityopw\multistore;

class FileStore extends AbstractStore{

    protected string $dir;

    function __construct(string $location){
        if(!is_dir( $location ) ){
            throw new \Exception("directory ".$location." not exists");
        }
        $this->dir = $location;
    }

    private function getFile(string $key){
        return $this->dir.DIRECTORY_SEPARATOR.$key.".fs";
    }

    public function set(string $key,array $value){
        $file = $this->getFile($key);

        file_put_contents($file,json_encode($value));

    }

    public function get(string $key){
        $file = $this->getFile($key);
        
        return json_decode(file_get_contents($file),TRUE);
    }

    public function del(string $key){
        $file = $this->getFile($key);
        
        unlink($file);
    }

}
