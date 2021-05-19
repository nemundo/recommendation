<?php


namespace Nemundo\Srf\Import;


use Nemundo\Srf\Content\RadioShow\RadioShowContentType;

use Nemundo\Srf\Data\Show\Show;

use Nemundo\Srf\MediaType\RadioMediaType;
use Nemundo\Srf\Reader\Show\RadioShowJsonReader;
use Nemundo\Srf\Reader\Show\TvShowJsonReader;

class RadioShowImport extends AbstractImport
{

    public function importData()
    {

        $reader = new RadioShowJsonReader();
        $reader->businessUnit = \Nemundo\Srf\Config\BusinessUnit::SRF;

        foreach ($reader->getData() as $item) {


            $type=new RadioShowContentType();  // SrfShowContentType();
            $type->show = $item->show;
            $type->srfId = $item->id;
            $type->saveType();



            /*
            $data = new Show();
            $data->updateOnDuplicate = true;
            $data->mediaTypeId = (new RadioMediaType())->id;
            $data->show = $item->show;
            $data->srfId = $item->id;
            $data->save();*/

            //$img->src=$item->imageUrl;

        }


    }

}