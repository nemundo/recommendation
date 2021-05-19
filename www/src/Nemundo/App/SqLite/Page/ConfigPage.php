<?php


namespace Nemundo\App\SqLite\Page;


use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\App\SqLite\Com\Form\FilenameCookieForm;
use Nemundo\App\SqLite\Cookie\FilenameCookie;
use Nemundo\App\SqLite\SqLiteConfig;
use Nemundo\App\SqLite\Template\SqLiteTemplate;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class ConfigPage extends SqLiteTemplate
{

    public function getContent()
    {




        new FilenameCookieForm($this);



        return parent::getContent();
    }

}