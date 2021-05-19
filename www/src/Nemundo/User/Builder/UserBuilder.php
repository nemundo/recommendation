<?php

namespace Nemundo\User\Builder;


use Nemundo\App\Mail\Message\MailMessage;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Random\UniqueId;
use Nemundo\User\Data\User\User;
use Nemundo\User\Data\User\UserCount;
use Nemundo\User\Data\User\UserDelete;
use Nemundo\User\Data\User\UserId;
use Nemundo\User\Data\User\UserReader;
use Nemundo\User\Data\User\UserUpdate;
use Nemundo\User\Data\Usergroup\UsergroupCount;
use Nemundo\User\Data\Usergroup\UsergroupReader;
use Nemundo\User\Data\UserUsergroup\UserUsergroup;
use Nemundo\User\Data\UserUsergroup\UserUsergroupCount;
use Nemundo\User\Data\UserUsergroup\UserUsergroupDelete;

use Nemundo\User\Mail\AbstractUserLoginMailContainer;
use Nemundo\User\Mail\UserLoginMailContainer;
use Nemundo\User\Parameter\SecureTokenParameter;
use Nemundo\User\Password\PasswordHash;
use Nemundo\User\Usergroup\AbstractUsergroup;
use Nemundo\User\Usergroup\Usergroup;


// UserType
class UserBuilder extends AbstractBase
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


    protected $userId;


    public function __construct($userId = null)
    {

        $this->userId = $userId;

    }


    public function fromLogin($login)
    {

        if ($login !== null) {
            $id = new UserId();
            $id->filter->andEqual($id->model->login, $login);
            $this->userId = $id->getId();

            if (!$this->userId == '') {
                $this->loadData();
            } else {
                // (new LogMessage())->writeError('Login not found');
            }

        }

        return $this;

    }


    public function fromLoginOrEmail($login)
    {

        $id = new UserId();
        $id->filter->orEqual($id->model->login, $login);
        $id->filter->orEqual($id->model->email, $login);
        $this->userId = $id->getId();

        if (!$this->userId == '') {
            $this->loadData();
        }

        return $this;

    }


    public function fromSecureTokenParameter()
    {

        $secureToken = (new SecureTokenParameter())->getValue();

        /*$count = new UserCount();
        //$count->filter->andEqual($count->model->login, $login);
        $count->filter->andEqual($count->model->secureToken, $secureToken);
        if ($count->getCount() == 0) {
            (new LogMessage())->writeError('Invalid Secure Token');
            exit;
        }*/


        $this->existsUser($secureToken);

        $id = new UserId();
        $id->filter->andEqual($id->model->secureToken, $secureToken);
        $this->userId = $id->getId();

        return $this;


    }


    public function existsUser($secureToken)
    {

        $count = new UserCount();
        $count->filter->andEqual($count->model->secureToken, $secureToken);
        if ($count->getCount() == 0) {
            (new LogMessage())->writeError('Invalid Secure Token');
            exit;
        }

    }


    public function getUserRow()
    {

        return (new UserReader())->getRowById($this->userId);

    }


    public function createUser()
    {

        $displayName = $this->displayName;
        if ($displayName == null) {
            $displayName = $this->login;
        }

        $count = new UserCount();
        $count->filter->andEqual($count->model->login, $this->login);
        if ($count->getCount() == 0) {

            $data = new User();
            $data->active = $this->active;
            $data->login = $this->login;
            $data->email = $this->email;
            $data->displayName = $displayName;
            $data->secureToken = (new UniqueId())->getUniqueId();
            $this->userId = $data->save();

        } else {

            $id = new UserId();
            $id->filter->andEqual($id->model->login, $this->login);
            $this->userId = $id->getId();

            $update = new UserUpdate();
            $update->active = $this->active;
            $update->updateById($this->userId);

        }

        return $this->userId;

    }


    public function addUsergroup(AbstractUsergroup $usergroup)
    {

        $count = new UsergroupCount();
        $count->filter->andEqual($count->model->id, $usergroup->usergroupId);
        if ($count->getCount() == 1) {


            $count = new UserUsergroupCount();
            $count->filter->andEqual($count->model->userId, $this->userId);
            $count->filter->andEqual($count->model->usergroupId, $usergroup->usergroupId);
            if ($count->getCount() == 0) {
                $data = new UserUsergroup();
                //$data->ignoreIfExists = true;
                $data->userId = $this->userId;
                $data->usergroupId = $usergroup->usergroupId;
                $data->save();
            }

        } else {
            (new LogMessage())->writeError('Usergroup does not exist. Usergroup Id: ' . $usergroup->usergroupId);
        }

        return $this;

    }


    public function addAllUsergroup()
    {

        $usergroupReader = new UsergroupReader();
        foreach ($usergroupReader->getData() as $usergroupRow) {

            $usergroup = new Usergroup();
            $usergroup->usergroupId = $usergroupRow->id;

            $this->addUsergroup($usergroup);
        }


    }


    public function removeUsergroup(AbstractUsergroup $usergroup)
    {

        $delete = new UserUsergroupDelete();
        $delete->filter->andEqual($delete->model->userId, $this->userId);
        $delete->filter->andEqual($delete->model->usergroupId, $usergroup->usergroupId);
        $delete->delete();

        return $this;

    }


    public function removeAllUsergroup()
    {

        $delete = new UserUsergroupDelete();
        $delete->filter->andEqual($delete->model->userId, $this->userId);
        $delete->delete();

        return $this;

    }


    public function changePassword($password)
    {

        $this->changePasswordByHash((new PasswordHash($password))->getHashPassword());
        return $this;
    }


    public function changePasswordByHash($passwordHash)
    {

        $update = new UserUpdate();
        $update->password = $passwordHash;
        $update->updateById($this->userId);

        return $this;

    }


    public function disableUser()
    {

        $update = new UserUpdate();
        $update->active = false;
        $update->updateById($this->userId);

    }


    public function enableUser()
    {

        $update = new UserUpdate();
        $update->active = true;
        $update->updateById($this->userId);

    }


    public function deleteUser()
    {

        $delete = new UserUsergroupDelete();
        $delete->filter->andEqual($delete->model->userId, $this->userId);
        $delete->delete();

        (new UserDelete())->deleteById($this->userId);

        return $this;

    }

    public function sendMail(AbstractUserLoginMailContainer $mailContainer = null)
    {

        if ($mailContainer == null) {
            $mailContainer = new UserLoginMailContainer();
        }

        $mailContainer->userId = $this->userId;

        $mailMessage = new MailMessage();
        $mailMessage->mailTo = $this->email;
        $mailMessage->subject = $mailContainer->subject;
        $mailMessage->text = $mailContainer->getBodyContent();
        $mailMessage->sendMail();

    }


}