<?php

namespace Nemundo\Core\Date\Timezone;


use Nemundo\Core\Base\DataSource\AbstractDataSource;

class TimezoneReader extends AbstractDataSource
{

    protected function loadData()
    {

        foreach (\DateTimeZone::listIdentifiers() as $timezone) {

            $this->addItem($timezone);

        }


    }


}