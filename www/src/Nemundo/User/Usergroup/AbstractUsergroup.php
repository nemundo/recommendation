<?php

namespace Nemundo\User\Usergroup;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\User\Data\User\UserRow;
use Nemundo\User\Data\UserUsergroup\UserUsergroup;
use Nemundo\User\Data\UserUsergroup\UserUsergroupReader;


// AbstractUsergroupItem
abstract class AbstractUsergroup extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $usergroup;

    /**
     * @var string
     */
    public $usergroupId;


    abstract protected function loadUsergroup();


    public function __construct()
    {
        $this->loadUsergroup();
    }


    /**
     * @return UserRow[]
     */
    public function getUserList()
    {

        $reader = new UserUsergroupReader();
        $reader->model->loadUser();
        $reader->filter->andEqual($reader->model->usergroupId, $this->usergroupId);
        $reader->filter->andEqual($reader->model->user->active, true);

        $list = [];
        foreach ($reader->getData() as $row) {
            $list[] = $row->user;
        }

        return $list;

    }


    public function addUser($userId)
    {

        $data = new UserUsergroup();
        $data->ignoreIfExists = true;
        $data->usergroupId = $this->usergroupId;
        $data->userId = $userId;
        $data->save();

    }

}