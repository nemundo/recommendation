<?php

namespace Nemundo\User\Session;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\User\Data\User\UserCount;
use Nemundo\User\Data\User\UserReader;
use Nemundo\User\Data\User\UserRow;
use Nemundo\User\Data\Usergroup\UsergroupRow;
use Nemundo\User\Data\UserUsergroup\UserUsergroupReader;
use Nemundo\User\Login\Session\IsLoggedSession;
use Nemundo\User\Login\Session\UserIdSession;
use Nemundo\User\Login\UserLogout;
use Nemundo\User\Usergroup\AbstractUsergroup;

class UserSession extends AbstractBase
{

    /**
     * @var bool
     */
    public $active = true;

    /**
     * @var string
     */
    public $login;

    /**
     * @var string
     */
    public $displayName;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $userId;

    /**
     * @var string
     */
    public $secureToken;

    /**
     * @var UserRow
     */
    private static $userRow;

    private static $usergroupList;


    public function __construct()
    {

        $this->fromLoginSession();

    }


    public function fromLoginSession()
    {

        $isUserLogged = (new IsLoggedSession())->getValue();

        if ($isUserLogged) {
            $this->userId = (new UserIdSession())->getValue();

            if (UserSession::$userRow == null) {

                $count = new UserCount();
                $count->filter->andEqual($count->model->id, $this->userId);
                if ($count->getCount() == 1) {
                    UserSession::$userRow = (new UserReader())->getRowById($this->userId);
                } else {
                    (new UserLogout())->logout();
                    return;
                }

            }

            if (UserSession::$userRow->active) {
                $this->active = UserSession::$userRow->active;
                $this->login = UserSession::$userRow->login;
                $this->email = UserSession::$userRow->email;
                $this->displayName = UserSession::$userRow->displayName;
                $this->secureToken = UserSession::$userRow->secureToken;
            } else {
                (new UserLogout())->logout();
            }

        }

    }


    public function isUserLogged()
    {

        $isUserLogged = (new IsLoggedSession())->getValue();
        return $isUserLogged;

    }


    /**
     * @return UsergroupRow[]
     */
    public function getUsergroup()
    {

        $reader = new UserUsergroupReader();
        $reader->model->loadUsergroup();
        $reader->filter->andEqual($reader->model->userId, $this->userId);

        $list = [];
        foreach ($reader->getData() as $row) {
            $list[] = $row->usergroup;
        }

        return $list;

    }



    public function isMemberOfUsergroup(AbstractUsergroup $usergroup)
    {

        if (UserSession::$usergroupList == null) {

            UserSession::$usergroupList = [];

            $reader = new UserUsergroupReader();
            $reader->filter->andEqual($reader->model->userId, $this->userId);
            foreach ($reader->getData() as $row) {
                UserSession::$usergroupList[] = $row->usergroupId;
            }
        }

        $returnValue = false;
        if (in_array($usergroup->usergroupId, UserSession::$usergroupList)) {
            $returnValue = true;
        }

        return $returnValue;

    }

}