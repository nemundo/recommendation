<?php

namespace Nemundo\Srf\Token;


use Nemundo\Core\Base\AbstractBase;

class SrfToken extends AbstractBase
{

    /**
     * @var string
     */
    public static $clientId;

    /**
     * @var string
     */
    public static $clientSecret;

    public function getToken()
    {

        $url = 'https://api.srgssr.ch/oauth/v1/accesstoken?grant_type=client_credentials';

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, rawurldecode(http_build_query(array(
            'client_id' => SrfToken::$clientId,
            'client_secret' => SrfToken::$clientSecret,
            'grant_type' => 'authorization_code'
        ))));

        $json = json_decode(curl_exec($curl), true);
        $accessToken = $json['access_token'];

        return $accessToken;

    }

}