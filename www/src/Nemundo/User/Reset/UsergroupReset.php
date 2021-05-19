<?php


namespace Nemundo\User\Reset;


use Nemundo\Project\Reset\AbstractReset;
use Nemundo\User\Data\Usergroup\UsergroupDelete;
use Nemundo\User\Data\Usergroup\UsergroupUpdate;

class UsergroupReset extends AbstractReset
{

    public function reset()
    {

        $update = new UsergroupUpdate();
        $update->setupStatus = false;
        $update->update();

    }


    public function remove()
    {

        $delete = new UsergroupDelete();
        $delete->filter->andEqual($delete->model->setupStatus, false);
        $delete->delete();

    }

}