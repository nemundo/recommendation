<?php


namespace Nemundo\Content\Site\Admin;


use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;


// AllContentRemoveSite
// RemoveAllContent
class AllContentRemoveSite extends AbstractDeleteIconSite
{

    /**
     * @var AllContentRemoveSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Remove Content';
        $this->url = 'remove-content';

        AllContentRemoveSite::$site = $this;

    }


    public function loadContent()
    {

        $contentTypeParameter = new ContentTypeParameter();
        $contentTypeParameter->contentTypeCheck = false;
        $contentType = $contentTypeParameter->getContentType();

        (new ContentTypeSetup())->removeContent($contentType);

        (new UrlReferer())->redirect();


    }

}