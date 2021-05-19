<?php

namespace Nemundo\Core\File;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Core\Type\Text\Text;

class DateTimeFilename extends AbstractBase
{


    public function getDateFilename($fileExtension)
    {

        $dateTime = new Text((new DateTime())->setNow()->getIsoDateTime());
        $dateTime->replace('-', '_');
        $dateTime->replace(':', '_');
        $dateTime->replace(' ', '_');

       // $zipFilename = $path . 'migration_' . $dateTime->getValue() . '.zip';



    }


    public function getDateTimeFilename()
    {


        $dateTime = new Text((new DateTime())->setNow()->getIsoDateTime());
        $dateTime->replace('-', '_');
        $dateTime->replace(':', '_');
        $dateTime->replace(' ', '_');

        //$filename =  'migration_' . $dateTime->getValue() . '.zip';
        $filename =  $dateTime->getValue() ;

       return $filename;

    }

}