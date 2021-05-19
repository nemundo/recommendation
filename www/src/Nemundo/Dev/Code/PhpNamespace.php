<?php

namespace Nemundo\Dev\Code;


use Nemundo\Core\Base\AbstractBase;

class PhpNamespace extends AbstractBase
{

    /**
     * @var string
     */
    public $prefixNamespace;

    /**
     * @var string
     */
    public $namespace;

    public function getPath()
    {

        $path = $this->namespace;
        $prefix = $this->prefixNamespace . '\\';

        if (substr($path, 0, strlen($prefix)) == $prefix) {
            $path = substr($path, strlen($prefix));
        }

        $path = str_replace('\\', DIRECTORY_SEPARATOR, $path);
        $path = str_replace('/', DIRECTORY_SEPARATOR, $path);

        return $path;

    }


}