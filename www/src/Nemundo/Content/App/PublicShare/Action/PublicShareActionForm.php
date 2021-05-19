<?php


namespace Nemundo\Content\App\PublicShare\Action;


use Nemundo\Admin\Com\Button\AdminCopyButton;
use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Content\App\PublicShare\Data\PublicShare\PublicShare;
use Nemundo\Content\App\PublicShare\Data\PublicShare\PublicShareReader;
use Nemundo\Content\App\PublicShare\Parameter\PublicShareParameter;
use Nemundo\Content\App\PublicShare\Site\PublicShareDeleteSite;
use Nemundo\Content\App\PublicShare\Site\PublicShareSite;
use Nemundo\Content\Builder\ContentBuilder;
use Nemundo\Content\Com\ListBox\ViewListBox;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class PublicShareActionForm extends AbstractContentForm
{

    /**
     * @var PublicShareAction
     */
    public $contentType;

    /**
     * @var ViewListBox
     */
    private $view;

    public function getContent()
    {


        $action=new PublicShareAction();
        $action->actionContentId=$this->contentType->actionContentId;
        $action->onAction();



        $reader = new PublicShareReader();
        $reader->model->loadContent();
        $reader->filter->andEqual($reader->model->contentId, $this->contentType->actionContentId);  // getContentId());  // actionContentId);
        foreach ($reader->getData() as $shareRow) {

            /*$widget = new AdminWidget($this);
            $widget->widgetTitle = 'Public Share';*/




            $site = clone(PublicShareSite::$site);
            $site->addParameter(new PublicShareParameter($shareRow->id));

            $input = new BootstrapTextBox($this);
            $input->name = 'public_url';
            $input->label = 'Public Url';
            $input->value = $site->getUrlWithDomain();


            $btn = new AdminCopyButton($this);
            $btn->copyId = $input->name;

            // löschen
            // copy

            $this->view = new ViewListBox($this);
            $this->view->fromContentTypeId($shareRow->content->contentTypeId);

            $btn = new AdminIconSiteButton($this);
            $btn->site = clone(PublicShareDeleteSite::$site);
            $btn->site->addParameter(new PublicShareParameter($shareRow->id));

            //$btn->site->addParameter(new ContentParameter($shareRow->contentId));



        }

        return parent::getContent();

    }


    protected function onSubmit()
    {
        // TODO: Implement onSubmit() method.

        $data = new PublicShare();
        $data->updateOnDuplicate = true;
        $data->contentId = $this->contentType->actionContentId;
        $data->viewId = $this->view->getValue();
        $data->save();


    }

}