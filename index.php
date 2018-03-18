<?php

use Nfq\Academy\Homework\ClassA;
use Nfq\Academy\Homework\ClassB;
require_once __DIR__ . '/bootstrap.php';

$a = new ClassA();
$a->load_class();

$b = new ClassB();
$b->load_class();