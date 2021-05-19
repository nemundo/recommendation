<?php


namespace Nemundo\Content\Index\Tree\Com\Container;


use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Index\Tree\Reader\ChildContentReader;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Html\Block\Hr;
use Nemundo\Html\Container\AbstractHtmlContainer;


// ContentChildContainer
// ChildContentContainer
class ContentChildContainer extends AbstractHtmlContainer
{

    /**
     * @var AbstractContentType
     */
    public $contentType;

    public function getContent()
    {

        //(new Hr($this));

        $reader = new ChildContentReader();
        $reader->contentType = $this->contentType;

        foreach ($reader->getData() as $treeRow) {

            $child = $treeRow->child->getContentType();

            if ($child->hasView()) {

                if ($child->hasViewSite()) {

                    $widget = new ContentWidget($this);
                    $widget->contentType = $child;
                    $widget->viewId = $treeRow->viewId;
                    $widget->viewEditable=false;

                } else {

                    $child->getView($treeRow->viewId, $this);

                }

                /*
                                $btn = new AdminIconSiteButton($div);
                                $btn->site = clone(ContentRemoveSite::$site);
                                $btn->site->addParameter(new TreeParameter($treeRow->id));

                                $btn = new AdminIconSiteButton($div);
                                $btn->site = clone(ContentEditSite::$site);
                                $btn->site->addParameter(new ContentParameter($treeRow->childId));*/


                //$widget=new ContentWidget($this);
                //$widget->contentType = $child;


                //(new Hr($this));


            }

        }


        return parent::getContent();

    }

}