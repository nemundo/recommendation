<?php


namespace Nemundo\Srf\App\Livestream\Import;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Srf\App\Livestream\Content\RadioLivestream\RadioLivestreamContentType;
use Nemundo\Srf\App\Livestream\Content\TvLivestream\TvLivestreamContentType;
use Nemundo\Srf\Config\SrfConfig;
use Nemundo\Srf\Content\Livestream\SrfLivestreamContentType;
use Nemundo\Srf\Import\AbstractImport;
use Nemundo\Srf\Reader\Livestream\RadioLivestreamJsonReader;
use Nemundo\Srf\Reader\Livestream\TvLivestreamJsonReader;

class RadioLivestreamImport extends AbstractImport
{

    public function importData()
    {

        (new SrfConfig())->loadConfig();


/*
        $reader = new TvLivestreamJsonReader();
        foreach ($reader->getData() as $livestreamItem) {

            $type = new TvLivestreamContentType();
            $type->livestream = $livestreamItem->livestream;
            $type->urn = $livestreamItem->urn;
            $type->saveType();

        }*/





        $reader = new RadioLivestreamJsonReader();
        foreach ($reader->getData() as $livestreamItem) {

            $type = new RadioLivestreamContentType();
            $type->livestream = $livestreamItem->livestream;
            $type->urn = $livestreamItem->urn;
            $type->saveType();

        }

    }

}