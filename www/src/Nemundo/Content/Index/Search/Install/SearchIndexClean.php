<?php


namespace Nemundo\Content\Index\Search\Install;


use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Content\Index\Content\Setup\ContentTypeSetup;
use Nemundo\Content\Index\Search\Content\Log\SearchLogContentType;
use Nemundo\Content\Index\Search\Data\SearchCollection;
use Nemundo\Project\Install\AbstractClean;

class SearchIndexClean extends AbstractClean
{

    public function cleanData()
    {


        /*
        $setup = new ContentTypeSetup();
        $setup->removeContent(new SearchLogContentType());
*/

        $setup = new ModelCollectionSetup();
        $setup->removeCollection(new SearchCollection());

        (new SearchIndexInstall())->install();


    }

}