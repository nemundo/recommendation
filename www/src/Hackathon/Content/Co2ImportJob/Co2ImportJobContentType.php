<?php

namespace Hackathon\Content\Co2ImportJob;

use Nemundo\Content\App\Job\Content\AbstractJobContentType;
use Nemundo\Content\App\TimeSeries\Content\TimeSeries\TimeSeriesContentType;
use Nemundo\Core\Csv\CsvSeperator;
use Nemundo\Core\Csv\Reader\CsvReader;
use Nemundo\Core\Type\File\File;
use Nemundo\Core\WebRequest\WebRequest;
use Nemundo\Project\Path\TmpPath;

class Co2ImportJobContentType extends AbstractJobContentType
{

    protected function loadContentType()
    {
        $this->typeLabel = 'CO2 Import Job';
        $this->typeId = '7121c655-2937-42f6-80b3-fff85d765ea1';
    }


    public function run()
    {

        $url = 'https://datahub.io/core/co2-ppm-daily/r/co2-ppm-daily.csv';

        $filename = (new TmpPath())
            ->addPath('co2-ppm-daily.csv')
            //->addPath((new UniqueFilename())->getUniqueFilename('csv'))
            ->getFullFilename();

        $file = new File($filename);


        if ($file->notExists()) {
            (new WebRequest())->downloadUrl($url, $filename);
        }


        $timeSeries = new TimeSeriesContentType();
        $timeSeries->uniqueName = 'co2';
        $timeSeries->timeSeries = 'Co2';
        $timeSeries->source = '';
        $timeSeries->saveType();

        $reader = new CsvReader();
        $reader->filename = $filename;
        $reader->separator = CsvSeperator::COMMA;
        foreach ($reader->getData() as $csvRow) {

            $date = $csvRow->getDate('date');
            $value = $csvRow->getValue('value');

            $timeSeries->addDayData($date, 'co2', $value);

        }

        $timeSeries->saveAverageFromDate();

        //$this->deleteFile();


    }


}