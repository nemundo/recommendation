<?php


namespace Nemundo\App\UserAction;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\User\Usergroup\AbstractUsergroup;

class UserActionConfig extends AbstractBase
{

    /**
     * @var bool
     */
    public static $showForgotHyperlink = false;

    /**
     * @var bool
     */
    public static $showRegisterHyperlink = false;

    /**
     * @var AbstractUsergroup[]
     */
    public static $defaultUsergroupList = [];

}