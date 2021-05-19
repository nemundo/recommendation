<?php


namespace Nemundo\Project\Web;


use Nemundo\Core\Base\AbstractBase;


// WebProject
class WebCollection extends AbstractBase
{

    /**
     * @var AbstractWebProject[]
     */
    private static $webProjectList=[];

    public function registerWebProject(AbstractWebProject $webProject) {

        WebCollection::$webProjectList[]=$webProject;
        return $this;

    }


    public function getWebProjectList() {
        return WebCollection::$webProjectList;
    }

}