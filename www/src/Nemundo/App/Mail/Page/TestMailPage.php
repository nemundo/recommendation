<?php

namespace Nemundo\App\Mail\Page;


use Nemundo\App\Mail\Form\TestMailForm;
use Nemundo\App\Mail\Site\MailSite;
use Nemundo\App\Mail\Template\MailTemplate;

class TestMailPage extends MailTemplate
{

    public function getContent()
    {

        $form = new TestMailForm($this);
        $form->redirectSite = MailSite::$site;

        return parent::getContent();

    }

}