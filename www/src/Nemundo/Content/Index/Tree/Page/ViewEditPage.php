<?php

namespace Nemundo\Content\Index\Tree\Page;


use Nemundo\Com\FormBuilder\UrlReferer\UrlRefererHiddenInput;
use Nemundo\Com\FormBuilder\UrlReferer\UrlRefererSite;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Index\Tree\Com\Form\ContentViewChangeForm;
use Nemundo\Content\Index\Tree\Parameter\TreeParameter;

class ViewEditPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $form = new ContentViewChangeForm($this);
        $form->treeId = (new TreeParameter())->getValue();

        $hidden = new UrlRefererHiddenInput($form);
        $form->redirectSite = new UrlRefererSite();

        return parent::getContent();

    }

}