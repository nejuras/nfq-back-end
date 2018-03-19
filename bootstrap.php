<?php

class Psr4Autoloader
{
    private $prefixes = array();

    public function add($prefix, $paths)
    {
        $this->prefixes[$prefix] = array($paths);

    }

    public function register()
    {
        spl_autoload_register(array($this, 'ClassLoad'));
    }

    public function ClassLoad($class)
    {
        $classFile = str_replace('\\', '/', $class).'.php';

        foreach ($this->prefixes as $prefix=>$dirs) {

            //tikrina ar klasė atitinka prefix'ui
            if ($class === strstr($class, $prefix)) {

                foreach ($dirs as $dir) {
                    $file = $dir.'/'.$classFile;

                    if (file_exists($file)) {
                        require $file;
                        return;
                    }
                }
            }
        }
    }
}
$autoloader = new Psr4Autoloader();

$autoloader->add('Nfq\\Academy\\Homework\\', __DIR__.'/src');
$autoloader->add('Acme\\Hello\\World\\',__DIR__.'/vendor/acme/hello/world/');
$autoloader->register();