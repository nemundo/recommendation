<?php


namespace Nemundo\Content\App\Explorer\Site;


use Nemundo\Content\App\Explorer\Parameter\RefererContentParameter;
use Nemundo\Content\Index\Tree\Item\TreeItem;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;

class ContentRemoveSite extends AbstractDeleteIconSite
{

    /**
     * @var ContentRemoveSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Remove';
        $this->url = 'remove-content';

        ContentRemoveSite::$site = $this;

    }


    public function loadContent()
    {

        /*$parentParameter = new ParentParameter();
        $parentParameter->contentTypeCheck = false;
        $parentContentType = $parentParameter->getContentType();

        $parentContentType->removeChild((new ContentParameter())->getValue());*/

        //(new ContentParameter())->getContentType(false)->removeFromParent();

        $contentId = (new ContentParameter())->getValue();
        (new TreeItem(($contentId)))->removeFromParent();



        $refererParameter = new RefererContentParameter();
        if ($refererParameter->hasValue()) {
            $site = clone(ExplorerSite::$site);
            $site->addParameter((new ContentParameter((new RefererContentParameter())->getValue())));
            $site->redirect();
        } else {
            (new UrlReferer())->redirect();
        }

    }

}