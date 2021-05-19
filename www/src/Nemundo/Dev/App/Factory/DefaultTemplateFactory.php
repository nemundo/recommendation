<?php

namespace Nemundo\Dev\App\Factory;


use Nemundo\Admin\AdminConfig;
use Nemundo\Html\Document\HtmlDocument;
use Nemundo\Core\Base\AbstractBaseClass;

class DefaultTemplateFactory extends AbstractBaseClass
{

    /**
     * @return HtmlDocument
     */
    public function getDefaultTemplate()
    {

        $className = AdminConfig::$defaultTemplateClassName;

        /** @var HtmlDocument $template */
        $template = new $className();
        return $template;

    }

}