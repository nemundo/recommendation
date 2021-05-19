<?php

namespace Nemundo\User\Usergroup;



// UsergroupRecord
// Orm unbenennen in UsergroupData
// AbstractUsergroupItem
class UsergroupItem extends AbstractUsergroup  //  AbstractBaseClass
{

    /**
     * @var string
     */
    //public $usergroupId;

    /**
     * @var string
     */
    //public $usergroup;


    public function __construct($usergroupId)
    {
        parent::__construct();
        $this->usergroupId = $usergroupId;
    }


    protected function loadUsergroup()
    {

    }


    /*
    public function createUsergroup()
    {

        $data = new Usergroup();
        $data->updateOnDuplicate = true;
        $data->id = $this->usergroupId;
        $data->usergroup = $this->usergroup;
        $data->save();

    }


    /**
     * @return UserRow[]
     */
    /*  public function getUserList()
      {

          $reader = new UserUsergroupReader();
          $reader->filter->andEqual($reader->model->usergroup, $this->usergroupId);

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


      public function deleteUsergroup()
      {


          $userUsergroupDelete = new UserUsergroupDelete();
          $userUsergroupDelete->filter->andEqual($userUsergroupDelete->model->usergroup, $this->usergroupId);
          $userUsergroupDelete->delete();

          (new UsergroupDelete())->deleteById($this->usergroupId);

      }*/


}