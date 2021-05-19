<?php


namespace Nemundo\Web\View;


use Nemundo\Core\Log\LogMessage;
use Nemundo\Web\Parameter\AbstractUrlParameter;
use Nemundo\Web\Site\AbstractSite;

trait ViewSiteTrait
{

    /**
     * @var AbstractSite
     */
    protected $viewSite;

    /**
     * @var string
     */
    protected $parameterClass;


    public function hasViewSite()
    {

        $value = false;
        if ($this->viewSite !== null) {
            $value = true;
        }

        return $value;

    }


    public function getViewSite($dataId)
    {

        /*if ($this->viewSite == null) {
            (new LogMessage())->writeError('No View Site'.$this->getClassName());
        }

        if ($this->parameterClass == null) {
            (new LogMessage())->writeError('No Parameter'.$this->getClassName());
        }*/


        $parameter=null;
        $site=null;

        if ($this->parameterClass !== null) {
            /** @var AbstractUrlParameter $parameter */
            $parameter = new $this->parameterClass($dataId);
        }

        if ($this->viewSite !==null) {
        $site = clone($this->viewSite);
        $site->addParameter($parameter);
       // $site->title = $this->getSubject($dataId);

        }

        return $site;

    }

}