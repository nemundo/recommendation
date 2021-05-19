<?php


namespace Nemundo\Srf\Config;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Srf\Token\SrfToken;

class SrfConfig extends AbstractBase
{

    public function loadConfig()
    {

        SrfToken::$clientId = 'yolaebBMALh55kNXh4AFSFzCIpRDkGYn';
        SrfToken::$clientSecret = 'Q4DWL8SU00mUbf7T';

    }


}