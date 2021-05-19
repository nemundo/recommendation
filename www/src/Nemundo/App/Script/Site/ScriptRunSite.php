<?php

namespace Nemundo\App\Script\Site;



use Nemundo\App\Script\Data\Script\ScriptReader;
use Nemundo\App\Script\Parameter\ScriptUrlParameter;
use Nemundo\Core\Debug\Debug;

use Nemundo\Package\FontAwesome\Icon\RunIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;

class ScriptRunSite extends AbstractIconSite
{

    /**
     * @var ScriptRunSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Run';
        $this->url = 'run';
        $this->icon = new RunIcon();
        //$this->menuActive = false;

        ScriptRunSite::$site=$this;
    }


    protected function registerSite()
    {
        ScriptRunSite::$site = $this;
    }


    public function loadContent()
    {

        //$page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $scriptRow = (new ScriptReader())->getRowById((new ScriptUrlParameter())->getValue());

        //$title = new AdminTitle($page);
        //$title->content = $scriptRow->scriptName;

        (new Debug())->write($scriptRow->scriptName);

        //$script = (new ScriptFactory())->getScript($scriptRow->scriptClassNameNamespace);
        //$script = $scriptRow->getScriptClassObject();
        $script=$scriptRow->getScript();
        $script->run();


        //$page->render();

    }

}