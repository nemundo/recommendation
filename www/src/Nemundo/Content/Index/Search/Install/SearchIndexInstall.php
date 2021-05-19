<?php


namespace Nemundo\Content\Index\Search\Install;


use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Setup\ScriptSetup;

use Nemundo\Content\Index\Search\Data\SearchModelCollection;
use Nemundo\Content\Index\Search\Type\SearchIndexType;
use Nemundo\Content\Setup\IndexTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;

use Nemundo\Content\Index\Search\Application\SearchApplication;
use Nemundo\Content\Index\Search\Content\Log\SearchLogContentType;

use Nemundo\Content\Index\Search\Script\SearchCleanScript;
use Nemundo\Content\Index\Search\Script\SearchIndexReindexingScript;
use Nemundo\Content\Index\Search\Script\WordCleanScript;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class SearchIndexInstall extends AbstractInstall
{

    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new SearchApplication());

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new SearchModelCollection());

        (new ScriptSetup(new SearchApplication()))
            ->addScript(new SearchCleanScript())
            ->addScript(new WordCleanScript());

        (new IndexTypeSetup())->addIndexType(new SearchIndexType());


    }

}