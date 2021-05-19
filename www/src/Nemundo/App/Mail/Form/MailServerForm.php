<?php


namespace Nemundo\App\Mail\Form;


use Nemundo\Admin\Com\Form\AbstractAdminEditForm;
use Nemundo\App\Mail\Data\MailServer\MailServer;
use Nemundo\App\Mail\Data\MailServer\MailServerModel;
use Nemundo\App\Mail\Data\MailServer\MailServerReader;
use Nemundo\App\Mail\Data\MailServer\MailServerUpdate;
use Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class MailServerForm extends AbstractAdminEditForm
{

    /**
     * @var BootstrapCheckBox
     */
    private $active;

    /**
     * @var BootstrapTextBox
     */
    private $host;

    /**
     * @var BootstrapTextBox
     */
    private $port;

    /**
     * @var BootstrapCheckBox
     */
    private $authentication;

    /**
     * @var BootstrapTextBox
     */
    private $user;

    /**
     * @var BootstrapTextBox
     */
    private $password;

    /**
     * @var BootstrapTextBox
     */
    private $mailAddress;

    /**
     * @var BootstrapTextBox
     */
    private $mailText;


    public function getContent()
    {

        $model = new MailServerModel();

        $this->active = new BootstrapCheckBox($this);
        $this->active->label = $model->active->label;
        $this->active->value = true;

        $this->host = new BootstrapTextBox($this);
        $this->host->label = $model->host->label;
        $this->host->validation = true;

        $this->port = new BootstrapTextBox($this);
        $this->port->label = $model->port->label;
        $this->port->validation = true;

        $this->authentication = new BootstrapCheckBox($this);
        $this->authentication->label = $model->authentication->label;
        $this->authentication->value = true;

        $this->user = new BootstrapTextBox($this);
        $this->user->label = $model->user->label;

        $this->password = new BootstrapTextBox($this);
        $this->password->label = $model->password->label;

        $this->mailAddress = new BootstrapTextBox($this);
        $this->mailAddress->label = $model->mailAddress->label;
        $this->mailAddress->validation = true;

        $this->mailText = new BootstrapTextBox($this);
        $this->mailText->label = $model->mailText->label;
        $this->mailText->validation = true;

        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        $serverMailRow = (new MailServerReader())->getRowById($this->dataId);
        $this->active->value = $serverMailRow->active;
        $this->host->value = $serverMailRow->host;
        $this->port->value = $serverMailRow->port;
        $this->authentication->value = $serverMailRow->authentication;
        $this->user->value = $serverMailRow->user;
        $this->password->value = $serverMailRow->password;
        $this->mailAddress->value = $serverMailRow->mailAddress;
        $this->mailText->value = $serverMailRow->mailText;

    }


    protected function onSave()
    {

        $this->resetActive();

        $data = new MailServer();
        $data->active = $this->active->getValue();
        $data->host = $this->host->getValue();
        $data->port = $this->port->getValue();
        $data->authentication = $this->authentication->getValue();
        $data->user = $this->user->getValue();
        $data->password = $this->password->getValue();
        $data->mailAddress = $this->mailAddress->getValue();
        $data->mailText = $this->mailText->getValue();
        $data->save();

    }


    protected function onUpdate()
    {

        $this->resetActive();

        $update = new MailServerUpdate();
        $update->active = $this->active->getValue();
        $update->host = $this->host->getValue();
        $update->port = $this->port->getValue();
        $update->authentication = $this->authentication->getValue();
        $update->user = $this->user->getValue();
        $update->password = $this->password->getValue();
        $update->mailAddress = $this->mailAddress->getValue();
        $update->mailText = $this->mailText->getValue();
        $update->updateById($this->dataId);

    }


    private function resetActive()
    {

        if ($this->active->getValue()) {
            $update = new MailServerUpdate();
            $update->active = false;
            $update->update();
        }

    }

}