<?php


namespace Nemundo\Core\Path;


class Path extends AbstractPath
{


    public function __construct($path = null)
    {

        parent::__construct();

        if ($path !== null) {
            $this->addPath($path);
        }

    }


    protected function loadPath()
    {

    }

}