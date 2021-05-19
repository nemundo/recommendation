<?php


namespace Nemundo\Content\Index\Tree\Site;


use Nemundo\Content\Index\Tree\Data\Tree\TreeDelete;
use Nemundo\Content\Index\Tree\Parameter\TreeParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;

class ContentRemoveFromTreeSite extends AbstractDeleteIconSite
{

    /**
     * @var ContentRemoveFromTreeSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Remove Content';
        $this->url = 'remove-content';

        ContentRemoveFromTreeSite::$site = $this;

    }


    public function loadContent()
    {


        $treeId = (new TreeParameter())->getValue();
        (new TreeDelete())->deleteById($treeId);

        (new UrlReferer())->redirect();


    }

}