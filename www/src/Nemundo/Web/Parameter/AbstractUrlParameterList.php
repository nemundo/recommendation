<?php

namespace Nemundo\Web\Parameter;


use Nemundo\Core\Log\LogMessage;


abstract class AbstractUrlParameterList extends AbstractUrlParameter
{

    /**
     * @var string
     */
    public $parameterName;

    private $valueList = [];

    private $valueLoaded = false;

    public function __construct()  //$valueList = [])
    {

        /*if (!is_array($valueList)) {
            (new LogMessage())->writeError('AbstractMultpleUrlParameter: No valid Array');
        }*/

        parent::__construct();
        //$this->valueList = $valueList;


    }


    protected function loadValue()
    {


        if (!$this->valueLoaded) {

        $this->valueLoaded = true;

        if (isset($_REQUEST[$this->parameterName])) {
            foreach ($_REQUEST[$this->parameterName] as $value) {

                //if (!in_array($value, $list)) {
                $this->valueList[] = trim($value);
                //}

            }
        }

        }


    }


    public function addValue($value)
    {

        $this->loadValue();

        if (!in_array($value, $this->valueList)) {
            $this->valueList[] = $value;
        }

        //$this->valueList =array_unique($this->valueList);
        return $this;

    }


    public function removeValue($value)
    {

        $this->loadValue();

        foreach (array_keys($this->valueList, $value) as $key) {
            unset($this->valueList[$key]);
            //unset($_GET[$key]);
        }

        return $this;

    }


    public function getValueList()
    {

        $this->loadValue();

        //$list = array_unique($this->valueList);

        asort($this->valueList);
        //$list = $this->valueList;

        //(new Debug())->write($list);
        //$list=[];

        /*
        if (isset($_REQUEST[$this->parameterName])) {
            foreach ($_REQUEST[$this->parameterName] as $value) {

                if (!in_array($value, $list)) {
                    $list[] = trim($value);
                }

            }
        }*/

        return $this->valueList;  //list;

    }


    public function hasValue()
    {

        $this->loadValue();

        /*$hasValue = true;
        if (isset($_REQUEST[$this->parameterName])) {

            foreach ($_REQUEST[$this->parameterName] as $value) {

                $value = trim($value);

                if (($value == '') || ($value == '0')) {
                    $hasValue = false;
                }

            }

        }*/


        $hasValue = false;

        if (isset($_REQUEST[$this->parameterName])) {

            foreach ($_REQUEST[$this->parameterName] as $value) {

                $value = trim($value);

                if ($value !== '') {     // || ($value == '0')) {
                    $hasValue = true;
                }

            }

        }


        return $hasValue;

    }


    public function getValue()
    {

        (new LogMessage())->writeError('GetValue. Not allowed.');

    }


    public function getUrl()
    {

        $this->loadValue();

        $urlList = [];
        foreach ($this->getValueList() as $value) {
            $urlList[] = $this->parameterName . '[]=' . $value;
        }

        //(new Debug())->write($urlList);

        $url = '';
        if (sizeof($urlList) > 0) {
            $url = join('&', $urlList);
        }

        //(new Debug())->write('url:'.$url);

        return $url;

    }


    public function getJson()
    {

        $json = json_encode($this->getValueList());
        return $json;

    }

}