<?php


namespace App\Firebase;


use Illuminate\Support\Traits\ForwardsCalls;
use Kreait\Firebase\Database;
use Kreait\Firebase\Database\Reference;

class FirebaseQuery
{

    use ForwardsCalls;

    protected $path;

    public function __construct($path = '/')
    {
        $this->path = $path ?? '/';
    }


    /**
     * @return Database
     */
    protected function db(){
        return app('firebase.database');
    }


    /**
     * @param $path
     * @return $this
     */
    protected function traverse($path){
        return new self($this->path . '/' . $path);
    }


    /**
     * @return Reference
     */
    protected function reference($path = ''){
        return $this->db()->getReference($this->path . '/' . $path);
    }


    public function __call($method, $parameters)
    {
        return $this->forwardCallTo($this, $method, $parameters);
    }


    public static function __callStatic($method, $arguments)
    {
        return (new static)->$method(...$arguments);
    }


}
