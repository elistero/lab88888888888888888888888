<?php

class A {
    
}

class B extends A {
    public function __construct($a) {
        $this->a = $a;
    }
    protected $a;
}

class C extends B {
    public function __construct($a, $b) {
        $this->b = $b;
        parent::__construct($a);
    }
    protected $b;
}

$a1 = new A();
$a2 = new A();
$b3 = new B($a1);
$b4 = new B($b3);
$c5 = new C($b4, $a2);

var_dump($c5);

$c5 = new C( new B( new B( new A())), new A());

echo "<br>";

var_dump($c5);

?>