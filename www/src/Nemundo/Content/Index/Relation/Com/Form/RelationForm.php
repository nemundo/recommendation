<?php

namespace Nemundo\Content\Index\Relation\Com\Form;


use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Content\Index\Relation\Data\Relation\Relation;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;



// RelationIndex
class RelationForm extends BootstrapForm
{

    /**
     * @var AbstractContentType
     */
    public $contentType;

    /**
     * @var BootstrapListBox
     */
    private $content;

    public function getContent()
    {


        $this->content=new BootstrapListBox($this);
        $this->content->label='Content';
        $this->content->validation=true;

        $reader = new ContentReader();
        $reader->addOrder($reader->model->subject);
        foreach ($reader->getData() as $contentRow) {
            $this->content->addItem($contentRow->id,$contentRow->subject);
        }



        return parent::getContent();

    }


    protected function onSubmit()
    {

        // RelationBuilder
        // bidirectional
        // not same


        $data=new Relation();
        $data->ignoreIfExists=true;
        $data->fromId=$this->contentType->getContentId();
        $data->toId=$this->content->getValue();
        $data->save();

        $data=new Relation();
        $data->ignoreIfExists=true;
        $data->fromId=$this->content->getValue();
        $data->toId=$this->contentType->getContentId();
        $data->save();


    }


}