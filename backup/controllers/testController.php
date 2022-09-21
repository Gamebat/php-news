<?php

class class2 
{
    public function socketRequest($socketRequest)
    {
        //
    }
    public function socketResponse()
    {
        //
    }
}

class class1 
{
    private $foo;

    public function __constructor(class2 $Foo)
    {
        $this->foo = $Foo;
    }

    public function socketRequest($socketRequest)
    {
        return $this->foo->socketRequest($socketRequest);
    }
    public function socketResponse()
    {
        return $this->foo->socketResponse();
    }
}

?>