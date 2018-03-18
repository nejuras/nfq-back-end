<?php

class Psr4Autoloader
{
    private $prefixes = array();

    public function register()
    {
        spl_autoload_register(array($this, 'getclass'));
    }

    public function add($prefix, $base_dir)
    {
        $this->prefixes = [
            'prefix' => $prefix,
            'base_dir' => $base_dir
        ];

        return $this;
    }

    public function getclass($class)
    {

        $prefix = $this->prefixes['prefix'];
        $length = strlen($prefix);
        $base_directory = $this->prefixes['base_dir'];

        if(strncmp($prefix, $class, $length) !== 0) {
            return;
        }

        $class_name = substr($class, $length);
        $prefix_replace = str_replace('\\', '/', $prefix);
        $file = $base_directory . $prefix_replace . $class_name . '.php';

        if(file_exists($file)) {
            require $file;
        }
    }
}

$autoloader = new Psr4Autoloader();
$autoloader->add('Nfq\\Academy\\Homework\\', __DIR__.'/src/');
$autoloader->register();