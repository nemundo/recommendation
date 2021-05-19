<?php

namespace Nemundo\User\Usergroup;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\User\Data\UserUsergroup\UserUsergroupReader;
use Nemundo\User\Session\UserSession;


class UsergroupMembership extends AbstractBase
{

    /**
     * @var string[]
     */
    public static $usergroupIdList;

    public function isMemberOfUsergroup(AbstractUsergroup $usergroup)
    {

        $this->loadUsergroup();

        $returnValue = false;
        if (in_array($usergroup->usergroupId, UsergroupMembership::$usergroupIdList)) {
            $returnValue = true;
        }

        return $returnValue;

    }


    public function getUsergroupIdList()
    {

        $this->loadUsergroup();
        return UsergroupMembership::$usergroupIdList;

    }


    private function loadUsergroup()
    {

        $userId = (new UserSession())->userId;

        if (is_null(UsergroupMembership::$usergroupIdList)) {

            UsergroupMembership::$usergroupIdList = [];

            $reader = new UserUsergroupReader();
            $reader->filter->andEqual($reader->model->userId, $userId);
            foreach ($reader->getData() as $row) {
                UsergroupMembership::$usergroupIdList[] = $row->usergroupId;
            }

        }

    }

}