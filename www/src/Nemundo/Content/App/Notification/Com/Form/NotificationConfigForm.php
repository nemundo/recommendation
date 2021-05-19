<?php


namespace Nemundo\Content\App\Notification\Com\Form;


use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox;

class NotificationConfigForm extends BootstrapForm
{

    /**
     * @var BootstrapCheckBox
     */
    private $sendMail;

    public function getContent()
    {

        $this->sendMail=new BootstrapCheckBox($this);
        $this->sendMail->label='Send eMail Notification';


        return parent::getContent(); // TODO: Change the autogenerated stub
    }

}