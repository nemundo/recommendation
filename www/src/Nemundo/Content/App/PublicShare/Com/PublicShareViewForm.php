<?php


namespace Nemundo\Content\App\PublicShare\Com;


use Nemundo\Content\App\PublicShare\Data\PublicShare\PublicShareRow;
use Nemundo\Content\App\PublicShare\Data\PublicShare\PublicShareUpdate;
use Nemundo\Content\Com\ListBox\ViewListBox;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;

class PublicShareViewForm extends BootstrapForm
{

    /**
     * @var PublicShareRow
     */
    public $publicShareRow;

    /**
     * @var ViewListBox
     */
    private $view;

    public function getContent()
    {

        $this->view = new ViewListBox($this);
        $this->view->fromContentTypeId($this->publicShareRow->content->contentTypeId);
        $this->view->value = $this->publicShareRow->viewId;
        $this->view->submitOnChange=true;

        $this->submitButton->visible=false;

        return parent::getContent();

    }

    protected function onSubmit()
    {

        $update = new PublicShareUpdate();
        $update->viewId = $this->view->getValue();
        $update->updateById($this->publicShareRow->id);

    }

}