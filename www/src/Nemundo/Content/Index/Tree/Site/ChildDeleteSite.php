<?php

namespace Nemundo\Content\Index\Tree\Site;

use Nemundo\Com\Template\TemplateDocument;
use Nemundo\Content\Index\Group\Type\GroupTrait;
use Nemundo\Content\Index\Tree\Data\Tree\TreeDelete;
use Nemundo\Content\Index\Tree\Parameter\TreeParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Wiki\Content\WikiPageContentType;
use Nemundo\Wiki\Event\WikiEvent;
use Nemundo\Wiki\Parameter\WikiPageParameter;
use Nemundo\Wiki\Site\WikiSite;

class ChildDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var ChildDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Remove Content';
        $this->url = 'remove-content';

        ChildDeleteSite::$site = $this;
    }

    public function loadContent()
    {

        $treeId=(new TreeParameter())->getValue();
        (new TreeDelete())->deleteById($treeId);


        (new UrlReferer())->redirect();


    }
}