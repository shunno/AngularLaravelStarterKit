<?php

class CommitOperation 
{
    
    protected static $instance = null;

    public  $Success=true ;

    public  $OperationId ;

    public  $Message ;

    public  $Error ;

    protected function __construct()
    {
        
        
    }

    protected function __clone()
    {
        
    }

    public static function getInstance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new CommitOperation;
        }
        return static::$instance;
    }


}