<?php


namespace Nemundo\Content\Index\Search\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Content\Index\Search\Data\SearchModelCollection;
use Nemundo\Content\Index\Search\Install\SearchIndexClean;
use Nemundo\Content\Index\Search\Install\SearchIndexInstall;
use Nemundo\Model\Setup\ModelCollectionSetup;

class SearchCleanScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'search-clean';
    }


    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->removeCollection(new SearchModelCollection());

        (new SearchIndexInstall())->install();


    }

}