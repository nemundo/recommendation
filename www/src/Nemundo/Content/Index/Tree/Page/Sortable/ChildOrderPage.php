<?php

namespace Nemundo\Content\Index\Tree\Page\Sortable;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\FormBuilder\UrlReferer\UrlRefererHiddenInput;
use Nemundo\Com\FormBuilder\UrlReferer\UrlRefererSite;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Index\Tree\Parameter\TreeParameter;
use Nemundo\Content\Index\Tree\Reader\ChildContentReader;
use Nemundo\Content\Index\Tree\Site\ContentRemoveFromTreeSite;
use Nemundo\Content\Index\Tree\Site\Sortable\ContentSortableJsonSite;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Html\Block\Div;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\JqueryUi\Sortable\JquerySortable;

class ChildOrderPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $contentParameter = new ContentParameter();
        $contentParameter->contentTypeCheck = false;
        $contentType = $contentParameter->getContent();

        $form = new BootstrapForm($this);
        $hidden = new UrlRefererHiddenInput($form);
        $form->redirectSite = new UrlRefererSite();
        $form->submitButton->label = 'Zurück';

        $layout = new BootstrapTwoColumnLayout($this);

        $sortableDiv = new JquerySortable($layout->col1);
        $sortableDiv->id = 'cms_sortable_';
        $sortableDiv->sortableSite = ContentSortableJsonSite::$site;

        $reader = new ChildContentReader();
        $reader->contentType = $contentType;

        foreach ($reader->getData() as $treeRow) {

            $itemDiv = new AdminWidget($sortableDiv);
            $itemDiv->id = 'item_' . $treeRow->id;
            $itemDiv->widgetTitle = $treeRow->child->subject;

            $div = new Div($itemDiv);
            $treeRow->child->getContentType()->getDefaultView($div);

            $btn=new AdminIconSiteButton($itemDiv);
            $btn->site=clone(ContentRemoveFromTreeSite::$site);
            $btn->site->addParameter(new TreeParameter($treeRow->id));

        }

        return parent::getContent();
    }
}