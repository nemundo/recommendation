<?php

namespace Nemundo\App\UserAdmin\Form;


use Nemundo\Core\Http\Request\Post\PostRequest;
use Nemundo\Core\Validation\ValidationType;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\User\Builder\UserBuilder;
use Nemundo\User\Data\User\UserReader;
use Nemundo\User\Data\Usergroup\UsergroupReader;
use Nemundo\User\Data\UserUsergroup\UserUsergroupCount;
use Nemundo\User\Type\UserItemType;
use Nemundo\User\Usergroup\Usergroup;


class UserForm extends BootstrapForm
{

    /**
     * @var string
     */
    public $userId;

    /**
     * @var BootstrapCheckBox
     */
    private $active;

    /**
     * @var BootstrapTextBox
     */
    private $login;

    /**
     * @var BootstrapTextBox
     */
    private $eMail;


    public function getContent()
    {

        $this->active = new BootstrapCheckBox($this);
        $this->active->label = 'Active';
        $this->active->value = true;

        $this->login = new BootstrapTextBox($this);
        $this->login->name = 'login';
        $this->login->label = 'Login';

        $this->eMail = new BootstrapTextBox($this);
        $this->eMail->label = 'eMail';
        $this->eMail->validation = true;
        $this->eMail->validationType = ValidationType::IS_EMAIL;

        if ($this->userId == null) {
            $this->login->autofocus = true;
            $this->login->validation = true;
        } else {

            $userRow = (new UserReader())->getRowById($this->userId);

            // Problem bei Submit !!!
            //$this->login->disabled = true;

            $this->active->value = $userRow->active;
            $this->login->value = $userRow->login;
            $this->eMail->value = $userRow->email;

        }

        $usergroupReader = new UsergroupReader();
        foreach ($usergroupReader->getData() as $usergroupRow) {
            $checkbox = new BootstrapCheckBox($this);
            $checkbox->name = 'usergroup_' . $usergroupRow->id;
            $checkbox->label = $usergroupRow->usergroup;
            $checkbox->value = false;

            if ($this->userId !== null) {

                $count = new UserUsergroupCount();
                $count->filter->andEqual($count->model->userId, $this->userId);
                $count->filter->andEqual($count->model->usergroupId, $usergroupRow->id);
                if ($count->getCount() == 1) {
                    $checkbox->value = true;
                }
            }

        }

        return parent::getContent();
    }


    public function onSubmit()
    {

        $user = new UserBuilder($this->userId);
        $user->active = $this->active->getValue();
        $user->login = $this->login->getValue();
        $user->email = $this->eMail->getValue();
        $user->createUser();


        $user->removeAllUsergroup();

        $usergroupReader = new UsergroupReader();
        foreach ($usergroupReader->getData() as $usergroupRow) {

            $name = 'usergroup_' . $usergroupRow->id;

            $parameter = new PostRequest($name);

            if ($parameter->getValue() == '1') {

                $usergroup = new Usergroup();
                $usergroup->usergroupId = $usergroupRow->id;

                $user->addUsergroup($usergroup);

            }

        }


        if ($this->userId == null) {
            $user->sendMail();
        }


    }

}