<?php


namespace Nemundo\Content\Site;


use Nemundo\Com\FormBuilder\UrlReferer\UrlRefererHiddenInput;
use Nemundo\Com\FormBuilder\UrlReferer\UrlRefererSite;
use Nemundo\Content\Page\ContentEditPage;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\FontAwesome\Site\AbstractEditIconSite;


class ContentEditSite extends AbstractEditIconSite
{

    /**
     * @var ContentEditSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'content-edit';
        ContentEditSite::$site = $this;
    }

    public function loadContent()
    {

        (new ContentEditPage())->render();

    }

}