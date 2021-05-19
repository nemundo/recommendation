<?php


namespace Nemundo\Content\Index\Tree\Com\Form;


use Nemundo\Content\Builder\ContentBuilder;
use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class ContentSearchForm extends AbstractContentSearchForm
{

    /**
     * @var BootstrapListBox
     */
    private $content;

    public function getContent()
    {

        $this->content = new BootstrapListBox($this);
        $this->content->label = 'Content';
        $this->content->validation = true;

        $reader = new ContentReader();
        $reader->filter->andEqual($reader->model->contentTypeId, $this->contentType->typeId);
        $reader->addOrder($reader->model->subject);
        foreach ($reader->getData() as $contentCustomRow) {
            $this->content->addItem($contentCustomRow->id, $contentCustomRow->subject);
        }

        return parent::getContent();

    }


    protected function onSubmit()
    {

         $this->saveTree((new ContentBuilder())->getContent($this->content->getValue()));

    }

}