<?php


namespace Nemundo\Srf\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Content\App\Timeline\Event\TimelineEvent;
use Nemundo\Core\Debug\Debug;
use Nemundo\Srf\Content\Channel\SrfChannelType;
use Nemundo\Srf\Content\Livestream\SrfLivestreamContentType;

use Nemundo\Srf\Content\TvEpisode\TvEpisodeContentType;
use Nemundo\Srf\Content\TvShow\TvShowContentType;
use Nemundo\Srf\Data\Episode\EpisodeReader;
use Nemundo\Srf\Data\Show\ShowReader;
use Nemundo\Srf\Import\RadioLivestreamImport;
use Nemundo\Srf\Import\TvEpisodeImport;
use Nemundo\Srf\Import\TvShowImport;
use Nemundo\Srf\Install\SrfInstall;

class SrfTestScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'srf-test';
    }


    public function run()
    {



        $reader = new EpisodeReader();
        foreach ($reader->getData() as $episodeRow) {

            //if ($episodeRow->show->mediaTypeId == (new Tv))

            $type = new TvEpisodeContentType($episodeRow->id);
            $type->addEvent(new TimelineEvent());
            $type->saveType();

            /*(new Debug())->write($type->getSubject());
            (new Debug())->write($type->getDateTime());*/

        }



       /* $srfType=new SrfChannelType();

        $reader = new ShowReader();
        foreach ($reader->getData() as $showRow) {

            $type = new TvShowContentType($showRow->id);

            (new Debug())->write($type->getSubject());


            //$type->parentId = $srfType->getContentId();
            //(new Debug())->write($type->existItem());
            //$type->saveType();

            //$type->addRelation($srfType->getContentId());




        }*/






    }

}