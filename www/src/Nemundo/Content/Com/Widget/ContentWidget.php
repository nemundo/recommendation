<?php

namespace Nemundo\Content\Com\Widget;


use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Content\Action\ContentActionTrait;
use Nemundo\Content\Builder\ContentViewBuilder;
use Nemundo\Content\Com\Dropdown\ContentActionDropdown;
use Nemundo\Content\Index\Tree\Com\Dropdown\RestrictedContentTypeDropdown;
use Nemundo\Content\Index\Tree\Com\Dropdown\ViewChangeDropdown;
use Nemundo\Content\Index\Tree\Data\RestrictedContentType\RestrictedContentTypeCount;
use Nemundo\Content\Index\Tree\Site\TreeContentNewSite;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Html\Block\ContentDiv;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Formatting\Italic;
use Nemundo\Html\Heading\H5;
use Nemundo\Package\Bootstrap\Card\BootstrapCard;
use Nemundo\Package\Bootstrap\Utility\BootstrapSpacing;
use Nemundo\Web\Site\AbstractSite;


// ContentContainer (ohne Widget Style)
// contentHeaderWidget


// TOO BIG !!!


class ContentWidget extends BootstrapCard  // AdminWidget
{

    use ContentActionTrait;

    /**
     * @var AbstractContentType
     */
    public $contentType;
//content


    /**
     * @var bool
     */
    public $editable = true;

    /**
     * @var bool
     */
    public $viewEditable = true;

    public $viewId;

    public $showHeader = true;

    /**
     * @var bool
     */
    public $showMenu = true;

    public $widgetTitle;

    /**
     * @var bool
     */
    public $loadAction = false;

    /**
     * @var AbstractSite
     */
    public $redirectSite;

    /**
     * @var ContentActionDropdown
     */
    public $actionDropdown;


    protected function loadContainer()
    {

        parent::loadContainer();
        $this->actionDropdown = new ContentActionDropdown();

    }


    public function getContent()
    {

        if ($this->showHeader) {

            $div = new Div($this->cardHeader);
            $div->addCssClass('d-flex justify-content-between align-items-center');

            $title = $this->widgetTitle;
            if ($title == null) {
                $title = $this->contentType->getSubject();
            }

            $leftDiv = new Div($div);
            $leftDiv->addCssClass('d-flex flex-row bd-highlight mb-3');

            $divTitle = new Div();

            $typeLabel = $this->contentType->getTypeLabel();
            if ($title !== $typeLabel) {
                $small = new ContentDiv($divTitle);
                $small->content = $typeLabel;
            }
            

            $h5 = new H5($divTitle);
            $h5->content = $title;
            $h5->addCssClass('p-2 bd-highlight');


            if ($this->contentType->hasViewSite()) {

                $hyperlink = new SiteHyperlink($leftDiv);
                $hyperlink->addCssClass('text-dark');
                $hyperlink->site = $this->contentType->getViewSite();
                $hyperlink->showSiteTitle = false;
                $hyperlink->addContainer($divTitle);

            } else {

                $leftDiv->addContainer($divTitle);

            }


            if ($this->viewEditable) {
                $dropdown = new ViewChangeDropdown($leftDiv);
                $dropdown->contentType = $this->contentType;
                $dropdown->redirectSite = $this->redirectSite;
                $dropdown->showToggle = false;
                $dropdown->addCssClass('p-2 bd-highlight');

                $i = new Italic($dropdown->dropdownButton);
                $i->addCssClass('fa fa-angle-down');


            }


            if ($this->editable) {

                $div->addContainer($this->actionDropdown);


                $this->actionDropdown->contentId = $this->contentType->getContentId();
                $this->actionDropdown->showToggle = false;

                foreach ($this->getContentActionList() as $contentAction) {
                    $this->actionDropdown->addContentAction($contentAction);
                }


                if ($this->loadAction) {
                    $this->actionDropdown->addDefaultAction();
                }


                $i = new Italic($this->actionDropdown->dropdownButton);
                $i->addCssClass('fa fa-ellipsis-v');


                $div = new Div($this);
                $div->addCssClass('btn-group');


                $count = new RestrictedContentTypeCount();
                $count->filter->andEqual($count->model->contentTypeId, $this->contentType->typeId);
                if ($count->getCount() > 0) {

                    $dropdown = new RestrictedContentTypeDropdown($div);
                    $dropdown->redirectSite = clone(TreeContentNewSite::$site);
                    $dropdown->redirectSite->addParameter(new ContentParameter($this->contentType->getContentId()));
                    $dropdown->contentTypeId = $this->contentType->typeId;
                    $dropdown->icon = 'fa fa-plus';
                    $dropdown->showToggle = false;
                    $dropdown->addCssClass(BootstrapSpacing::MARIGN_RIGHT_5);

                }


            }

        }


        $div = new Div($this);


        $view = null;
        if ($this->viewId == null) {

            $view = $this->contentType->getDefaultView($div);

        } else {

            $builder = new ContentViewBuilder();
            $builder->contentType = $this->contentType;
            $builder->viewId = $this->viewId;
            $view = $builder->getView($div);

        }

        $view->redirectSite = $this->redirectSite;

        return parent::getContent();

    }


}