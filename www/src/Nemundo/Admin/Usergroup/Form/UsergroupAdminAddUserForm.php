<?php

namespace Nemundo\Admin\Usergroup\Form;


use Nemundo\Admin\Usergroup\Parameter\UsergroupParameter;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\User\Data\User\UserListBox;
use Nemundo\User\Data\UserUsergroup\UserUsergroup;

class UsergroupAdminAddUserForm extends BootstrapForm
{

    /**
     * @var UserListBox
     */
    private $user;

    public function getContent()
    {
        $this->user = new UserListBox($this);
        $this->user->addOrder($this->user->model->login);
        $this->user->validation = true;

        return parent::getContent();
    }


    protected function onSubmit()
    {

        $data = new UserUsergroup();
        $data->ignoreIfExists = true;
        $data->userId = $this->user->getValue();
        $data->usergroupId = (new UsergroupParameter())->getValue();
        $data->save();

    }


}