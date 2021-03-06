<?php


namespace Hackathon\Com;


use Hackathon\Data\Topic\Topic;
use Hackathon\Parameter\TopicParameter;
use Hackathon\Site\HomeSite;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class TopicForm extends BootstrapForm
{

    /**
     * @var BootstrapTextBox
     */
    private $topic;

    public function getContent()
    {

        $this->topic=new BootstrapTextBox($this);
        $this->topic->label='Topic';
        $this->topic->validation=true;

        return parent::getContent(); // TODO: Change the autogenerated stub
    }


    protected function onSubmit()
    {

        $data=new Topic();
        $data->topic=$this->topic->getValue();
        $id=$data->save();

        $this->redirectSite=HomeSite::$site;
        $this->redirectSite->addParameter(new TopicParameter($id));

    }


}