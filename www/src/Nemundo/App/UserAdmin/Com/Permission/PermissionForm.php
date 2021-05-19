<?php

namespace Nemundo\App\UserAdmin\Com\Permission;


use Nemundo\Com\FormBuilder\AbstractFormBuilder;
use Nemundo\Core\Debug\Debug;

use Nemundo\User\Com\ListBox\UserListBox;
use Nemundo\User\Data\UserUsergroup\UserUsergroup;

class PermissionForm extends AbstractFormBuilder
{

    /**
     * @var string
     */
    public $usergroupId;

    /**
     * @var UserListBox
     */
    private $user;

    public function getContent()
    {

        $this->user = new UserListBox($this);
        $this->user->submitOnChange = true;
        //$this->user->filter->andEqual($this->user->model->active, true);

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $data = new UserUsergroup();
        $data->ignoreIfExists = true;
        $data->usergroupId = $this->usergroupId;
        $data->userId = $this->user->getValue();
        $data->save();

        //(new Debug())->write($this->usergroupId);
        //exit;

    }

}