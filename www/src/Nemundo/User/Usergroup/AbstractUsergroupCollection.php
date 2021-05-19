<?php

namespace Nemundo\User\Usergroup;


use Nemundo\Core\Base\AbstractBase;

abstract class AbstractUsergroupCollection extends AbstractBase
{

    /**
     * @var AbstractUsergroup[]
     */
    private $usergroupList = [];


    abstract protected function loadCollection();

    public function __construct()
    {
        $this->loadCollection();
    }


    protected function addUsergroup(AbstractUsergroup $usergroup)
    {
        $this->usergroupList[] = $usergroup;
        return $this;
    }


    /*
    public function addUsergroupList(UsergroupList $usergroupList)
    {

        foreach ($usergroupList->getUsergroup() as $usergroup) {
            $this->addUsergroup($usergroup);
        }

    }*/


    public function getUsergroup()
    {
        return $this->usergroupList;
    }

}