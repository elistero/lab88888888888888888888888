<?php

class A
{
    protected $x;

    public function line_equation($a, $b)
    {
        if ($a != 0) {
            return $this->x = (-$b) / $a;
        }
        return null;
    }
}

class B extends A
{
    public function disclamer($a, $b, $c)
    {
        return ($b * $b) - 4 * $a * $c;
    }

    public function quadratic_equation($a, $b, $c)
    {
        if ($a === 0) {
            return parent::line_equation($b, $c);
        }
        $d = $this->disclamer($a, $b, $c);
        if ($d > 0) {
            $eg = sqrt($d);
            return $this->x = array((-$b - $eg) / (2 * $a), (-$b + $eg) / (2 * $a));
        }
        if ($d === 0) {
            return $this->x = array(-$b / (2 * $a));
        }
        return null;
    }
}

$aclass = new A();
print_r($aclass->line_equation(4, 5));
$bclass = new B();
print_r($bclass->quadratic_equation(0, 6, 7));