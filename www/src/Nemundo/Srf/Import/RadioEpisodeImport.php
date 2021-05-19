<?php


namespace Nemundo\Srf\Import;


use Nemundo\Srf\Content\TvEpisode\TvEpisodeContentType;
use Nemundo\Srf\Data\Episode\Episode;
use Nemundo\Srf\Data\Show\ShowReader;
use Nemundo\Srf\MediaType\RadioMediaType;
use Nemundo\Srf\Reader\Episode\RadioEpisodeJsonReader;
use Nemundo\Srf\Reader\Episode\TvEpisodeJsonReader;

class RadioEpisodeImport extends AbstractImport
{

    public function importData()
    {

        $showReader = new ShowReader();
        $showReader->filter->andEqual($showReader->model->mediaTypeId, (new RadioMediaType())->id);
        foreach ($showReader->getData() as $showRow) {


            $episodeReader = new RadioEpisodeJsonReader();
            $episodeReader->showId = $showRow->srfId;
            foreach ($episodeReader->getData() as $episodeItem) {

                /*$data = new Episode();
                $data->ignoreIfExists = true;
                $data->showId = $showRow->id;
                $data->title = $episodeItem->title;
                $data->description = $episodeItem->description;
                $data->urn = $episodeItem->urn;
                $data->srfId = $episodeItem->id;
                $data->dateTime = $episodeItem->dateTime;
                $data->length = $episodeItem->length;
                $data->save();*/

                $type =new TvEpisodeContentType();  // new SrfEpisodeContentType();
                $type->showId = $showRow->id;
                $type->title = $episodeItem->title;
                $type->description = $episodeItem->description;
                $type->urn = $episodeItem->urn;
                //$type->srfId = $episodeItem->id;
                $type->episodeDateTime = $episodeItem->dateTime;
                $type->length = $episodeItem->length;
                $type->saveType();

            }


        }


    }

}