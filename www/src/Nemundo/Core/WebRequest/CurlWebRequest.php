<?php

namespace Nemundo\Core\WebRequest;

use Nemundo\Core\Log\LogFile;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Path\Path;
use Nemundo\Core\System\Delay;
use Nemundo\Core\Type\File\File;

class CurlWebRequest extends AbstractWebRequest
{

    /**
     * @var bool
     */
    public $proxy = false;

    /**
     * @var string
     */
    public $proxyHost;

    /**
     * @var string
     */
    public $proxyPort;

    /**
     * @var string
     */
    public $proxyUser;

    /**
     * @var string
     */
    public $proxyPassword;

    /**
     * @var string
     */
    public $referrerUrl;

    /**
     * @var bool
     */
    public $sslVerification = true;

    private $loaded = false;

    private $curl;

    private $header = [];

    public function __destruct()
    {
        if ($this->curl !== null) {
            curl_close($this->curl);
        }
    }


    public function addHeader($header)
    {

        $this->header[] = $header;
        return $this;

    }


    public function getUrl($url)
    {

        $response = new WebResponse();

        $this->load($url);

        if (sizeof($this->header)) {
            curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->header);
        }

        $html = curl_exec($this->curl);
        if ($html === false) {
            $this->writeError('Curl-Fehler: ' . curl_error($this->curl));

        }

        $httpCode = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);
        $response->statusCode = $httpCode;
        if ($httpCode !== 200) {

            $response->errorMessage = curl_error($this->curl);
            $html = '';

        }

        $response->html = $html;
        $response->url = curl_getinfo($this->curl, CURLINFO_EFFECTIVE_URL);
        // CURLINFO_REDIRECT_URL

        if ($this->delayRequest) {
            (new Delay())->delay($this->delayInSecond);
        }

        return $response;

    }


    public function getRedirectedUrl()
    {

        $info = curl_getinfo($this->curl);
        $url = $info['url'];

        return $url;

    }


    public function postUrl($url, $data)
    {
        //https://stackoverflow.com/questions/3080146/post-data-to-a-url-in-php
    }


    public function downloadUrl($url, $destinationFilename)
    {

        $value = true;

        $file = new File($destinationFilename);

        (new Path($file->getPath()))->createPath();

        $this->load($url);

        $fp = fopen($destinationFilename, 'w+');
        if ($fp === false) {
            $this->writeError('Curl. Could not open: ' . $destinationFilename);
            $value = false;
        }

        curl_setopt($this->curl, CURLOPT_FILE, $fp);
        $response = curl_exec($this->curl);

        if ($response === false) {
            $this->writeError('Curl Download Fehler: ' . curl_error($this->curl));
            $value = false;
        }

        return $value;

    }


    private function load($url)
    {

        if (!$this->loaded) {

            $this->loaded = true;

            $this->curl = curl_init();

            if (!$this->sslVerification) {
                curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
            }

            curl_setopt($this->curl, CURLOPT_USERAGENT, $this->userAgent);
            curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, true);

            // Error: dh key too small
            //curl_setopt($this->curl, CURLOPT_SSL_CIPHER_LIST, 'DEFAULT@SECLEVEL=1');


            if ($this->proxy) {

                $proxyUrl = $this->proxyHost . ':' . $this->proxyPort;
                curl_setopt($this->curl, CURLOPT_PROXY, $proxyUrl);

                $proxyLogin = $this->proxyUser . ':' . $this->proxyPassword;
                curl_setopt($this->curl, CURLOPT_PROXYUSERPWD, $proxyLogin);

            }

        }

        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($this->curl, CURLOPT_HTTPHEADER, array(
            'Accept-Language:de-DE,de;q=0.8,en-US;q=0.6,en;q=0.4,it;q=0.2,zh-CN;q=0.2,zh;q=0.2,da;q=0.2,es;q=0.2'
        ));

        if ($this->referrerUrl !== null) {
            curl_setopt($this->curl, CURLOPT_REFERER, $this->referrerUrl);
        }

        $this->referrerUrl = $url;

    }


    private function writeError($message)
    {

        if ($this->throwException) {
            (new LogFile())->writeError($message);
        } else {
            (new LogMessage())->writeError($message);
        }

    }

}