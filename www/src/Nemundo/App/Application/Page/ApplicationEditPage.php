<?php

namespace Nemundo\App\Application\Page;

use Nemundo\App\Application\Com\Form\ApplicationEditForm;
use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\App\Application\Site\ApplicationSite;
use Nemundo\App\Application\Template\ApplicationTemplate;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class ApplicationEditPage extends ApplicationTemplate
{
    public function getContent()
    {

        $layout=new BootstrapTwoColumnLayout($this);

        $form=new ApplicationEditForm($layout->col1);
        $form->applicationId=(new ApplicationParameter())->getValue();
        $form->redirectSite=ApplicationSite::$site;



        return parent::getContent();
    }
}