<?php

namespace Nemundo\Package\Jquery\Container;


use Nemundo\Html\Script\JavaScript;

class JqueryHeader extends JavaScript
{

    private static $scriptList = [];

    public static function addJqueryScript($script)
    {

        JqueryHeader::$scriptList[] = $script;

    }


    public function getContent()
    {


        /*
        if (count(JqueryHeader::$scriptList) > 0) {

            $this->addCodeLine('$(document).ready(function () {');

            foreach (JqueryHeader::$scriptList as $script) {
                $this->addCodeLine($script);
            }

            $this->addCodeLine('});');

        } else {
            $this->visible = false;
        }*/

        return parent::getContent();

    }

}