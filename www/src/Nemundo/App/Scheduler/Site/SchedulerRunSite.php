<?php

namespace Nemundo\App\Scheduler\Site;


use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerReader;
use Nemundo\App\Scheduler\Parameter\SchedulerParameter;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Button\BootstrapButton;
use Nemundo\Package\FontAwesome\Icon\RunIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;


class SchedulerRunSite extends AbstractIconSite
{

    /**
     * @var SchedulerRunSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Run';
        $this->url = 'run';
        $this->menuActive = false;
        $this->icon = new RunIcon();

        SchedulerRunSite::$site = $this;
    }


    public function loadContent()
    {

        $schedulerId = (new SchedulerParameter())->getValue();

        $reader = new SchedulerReader();
        $reader->model->loadScript();
        $row = $reader->getRowById($schedulerId);

        //$className = $row->script->scriptClass;

        /** @var AbstractScript $script */
        //$script = new $className;

        $script=$row->script->getScript();
        $script->run();


        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $p = new Paragraph($page);
        $p->content = 'Scheduler Job ' . $script->scriptName . ' finished.';

        $btn = new AdminSiteButton($page);
        $btn->site=SchedulerSite::$site;
        $btn->showSiteTitle=false;
        $btn->content = 'Back';
        //$btn->site = clone(SchedulerConfig::$site);

        $page->render();

    }

}