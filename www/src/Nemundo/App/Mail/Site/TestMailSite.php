<?php

namespace Nemundo\App\Mail\Site;


use Nemundo\App\Mail\Form\TestMailForm;
use Nemundo\App\Mail\Page\TestMailPage;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;

// TestMailSite
class TestMailSite extends AbstractSite
{

    /**
     * @var TestMailSite
     */
    //public static $site;

    protected function loadSite()
    {
        $this->title = 'Test Mail';
        $this->url = 'test-mail';
        //$this->menuActive = false;

        //MailTestSite::$site=$this;

    }


    public function loadContent()
    {

        (new TestMailPage())->render();

    }


}