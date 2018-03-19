<?php

use Nfq\Academy\Homework\ClassA;
use Nfq\Academy\Homework\ClassC;
use Nfq\Academy\Homework\ClassD;
use Acme\Hello\World\ClassB;

require_once __DIR__ . '/bootstrap.php';

$a = new ClassA();
echo $a->load_class();

$c = new ClassC();
$c->load_class();

$d = new ClassD();
$d->load_class();

$b = new ClassB();
$b->load_class();