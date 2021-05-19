<?php

namespace Hackathon\Content\SnbDevisenImport;

use Hackathon\Content\SnbDevisen\SnbDevisenContentType;
use Hackathon\Data\Snb\Snb;
use Nemundo\Content\App\Job\Content\AbstractJobContentType;
use Nemundo\Core\Csv\Reader\CsvReader;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Model\Type\Text\TextType;

class SnbDevisenImportJob extends AbstractJobContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'SnbDevisenImport';
        $this->typeId = '59c2dcb4-075b-4783-922e-254698fc7def';


    }


    public function run()
    {


        // "Date";"D0";"Value"

        $reader = new CsvReader();
        $reader->filename = 'D:\Data\Snb\snb-data-snbbipo-de-selection-20210430_0900.csv';
        $reader->lineOfStart = 3;
        foreach ($reader->getData() as $csvRow) {

            $datumList = (new Text( $csvRow->getValue('Date')))->split('-');

            $data=new Snb();
            $data->ignoreIfExists=true;
            $data->year=$datumList[0];
            $data->month=$datumList[1];
            $data->devisen=$csvRow->getValue('Value');
            $data->save();

        }


        (new SnbDevisenContentType())->saveType();




        // TODO: Implement run() method.
    }


}