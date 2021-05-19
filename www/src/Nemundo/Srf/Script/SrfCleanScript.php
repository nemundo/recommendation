<?php


namespace Nemundo\Srf\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Core\Debug\Debug;
use Nemundo\Srf\Content\Livestream\SrfLivestreamContentType;

use Nemundo\Srf\Content\TvEpisode\TvEpisodeContentType;
use Nemundo\Srf\Content\TvShow\TvShowContentType;
use Nemundo\Srf\Data\Episode\EpisodeReader;
use Nemundo\Srf\Data\RadioLivestream\RadioLivestreamReader;
use Nemundo\Srf\Data\Show\ShowReader;
use Nemundo\Srf\Install\SrfInstall;
use Nemundo\Srf\Install\SrfUninstall;

class SrfCleanScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'srf-clean';
    }


    public function run()
    {


        $reader = new RadioLivestreamReader();
        foreach ($reader->getData() as $livestreamRow) {
            $contentType=new SrfLivestreamContentType($livestreamRow->id);
            $contentType->deleteType();
        }



        /*
        $setup = new ContentTypeSetup();
        $setup->removeContent(new SrfLivestreamContentType());*/




        $reader=new EpisodeReader();
        foreach ($reader->getData() as $episodeRow) {
            (new TvEpisodeContentType($episodeRow->id))->deleteType();
        }





        $reader=new ShowReader();
        foreach ($reader->getData() as $showRow) {
            $type=new TvShowContentType($showRow->id);
            $type->deleteType();
        }



        //$setup = new ContentTypeSetup();
        //$setup->removeContent(new SrfLivestreamContentType());



        //(new SrfUninstall())->uninstall();
        //(new SrfInstall())->install();

    }

}