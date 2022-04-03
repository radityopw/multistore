<?php 
namespace com\radityopw\multistore;

class RedisStore extends AbstractStore{

    protected $redis;
    protected $prefix;

    function __construct($redis,string $prefix){
        if(!isset($redis) || $redis == null){
            throw new \Exception("object redis is null");
        }

        if(!isset($prefix) || $prefix == null || empty($prefix)){
            throw new \Exception("prefix cannot be empty");
        }
        
        $this->prefix = trim($prefix);
        $this->redis = $redis;
        
    }

    private function getRedisKey(string $key){
        return $this->prefix.":".$key;
    }

    public function set(string $key,array $value){
        $redisKey = $this->getRedisKey($key);
        $this->redis->set($redisKey,json_encode($value));

    }

    public function get(string $key){
        $redisKey = $this->getRedisKey($key);
        return json_decode($this->redis->get($redisKey),TRUE);
    }

    public function del(string $key){
        $redisKey = $this->getRedisKey($key);
        $this->redis->del($redisKey);
    }

}
