<?php

namespace Nemundo\Core\System;


use Nemundo\Core\Base\AbstractBase;


// PhpConfig
// PhpSystem
// PhpInformation
class PhpEnvironment extends AbstractBase
{


    public function getTimezone()
    {
        return date_default_timezone_get();
    }


    public function setTimezone($timezone)
    {
        date_default_timezone_set($timezone);
        return $this;
    }


    public function getPhpVersion()
    {
        $version = phpversion();
        return $version;
    }

    public function getShowError() {
        return $this->getValue('display_errors');
    }

    public function getMemoryLimit()
    {
        $limit = ini_get('memory_limit');
        return $limit;
    }


    public function setMemoryLimit($memory)
    {

        ini_set('memory_limit', $memory . 'M');
        return $this;

    }


    public function setUnlimitedMemoryLimit()
    {

        ini_set('memory_limit', '-1');
        return $this;

    }



    public function getPhpModul() {

        $list = get_loaded_extensions();
        return $list;

    }



    public function getPhpIniFilename()
    {
        return php_ini_loaded_file();
    }


    public function getMaxFileUpload()
    {
        $maxFileUpload = ini_get('max_file_uploads');
        return $maxFileUpload;
    }

    public function getMaxFileUploadSize()
    {
        $maxFileUpload = ini_get('upload_max_filesize');
        return $maxFileUpload;
    }


    public function getMaxPostSize()
    {
        $value = $this->getValue('post_max_size');
        return $value;
    }


    public function getTimeLimit()
    {
        $value = $this->getValue('max_execution_time') . ' sec';
        return $value;
    }


    public function setTimeLimit($second)
    {
        $this->setValue('max_execution_time', $second);
        return $this;
    }

    private function getValue($parameter)
    {
        $value = ini_get($parameter);
        return $value;
    }


    private function setValue($parameter, $value)
    {
        $value = ini_set($parameter, $value);
        return $value;
    }


}