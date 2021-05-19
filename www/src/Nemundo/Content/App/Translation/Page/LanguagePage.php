<?php

namespace Nemundo\Content\App\Translation\Page;

use Nemundo\Content\App\Translation\Content\Language\LanguageContentType;
use Nemundo\Content\App\Translation\Template\TranslationTemplate;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;


class LanguagePage extends TranslationTemplate
{

    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);
        (new LanguageContentType())->getAdmin($layout->col1);

        return parent::getContent();

    }

}