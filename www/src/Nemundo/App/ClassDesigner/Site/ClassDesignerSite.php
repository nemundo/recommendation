<?php

namespace Nemundo\App\ClassDesigner\Site;


use Nemundo\App\ClassDesigner\Page\ClassDesignerPage;
use Nemundo\Web\Site\AbstractSite;


class ClassDesignerSite extends AbstractSite
{

    /**
     * @var ClassDesignerSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Class Designer';
        $this->url = 'class-designer';

        ClassDesignerSite::$site = $this;

    }


    public function loadContent()
    {

        (new ClassDesignerPage())->render();

    }

}