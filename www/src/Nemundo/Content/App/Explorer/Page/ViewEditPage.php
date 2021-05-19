<?php

namespace Nemundo\Content\App\Explorer\Page;


use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Content\App\Explorer\Template\ExplorerTemplate;
use Nemundo\Content\Index\Tree\Com\Form\ContentViewChangeForm;
use Nemundo\Content\Index\Tree\Parameter\TreeParameter;
use Nemundo\Content\Parameter\ContentParameter;

class ViewEditPage extends ExplorerTemplate
{

    public function getContent()
    {

        $form = new ContentViewChangeForm($this);
        $form->treeId = (new TreeParameter())->getValue();
        $form->redirectSite = ExplorerSite::$site;
        $form->redirectSite->addParameter(new ContentParameter());

        return parent::getContent();

    }

}