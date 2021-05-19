<?php


namespace Nemundo\Srf\Import;


use Nemundo\Srf\Content\TvEpisode\TvEpisodeContentType;
use Nemundo\Srf\Data\Show\ShowReader;
use Nemundo\Srf\MediaType\TvMediaType;
use Nemundo\Srf\Reader\Episode\TvEpisodeJsonReader;

class TvEpisodeImport extends AbstractImport
{

    public function importData()
    {

        $showReader = new ShowReader();
        $showReader->filter->andEqual($showReader->model->mediaTypeId, (new TvMediaType())->id);
        $showReader->addOrder($showReader->model->show);
        foreach ($showReader->getData() as $showRow) {

            $episodeReader = new TvEpisodeJsonReader();
            $episodeReader->showId = $showRow->srfId;
            foreach ($episodeReader->getData() as $episodeItem) {

                $type = new TvEpisodeContentType();
                $type->showId = $showRow->id;
                $type->title = $episodeItem->title;
                $type->description = $episodeItem->description;
                $type->urn = $episodeItem->urn;
                $type->episodeDateTime = $episodeItem->dateTime;
                $type->length = $episodeItem->length;
                $type->saveType();

            }

        }

    }

}