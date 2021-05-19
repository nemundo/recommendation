<?php

namespace Nemundo\App\System\Com\Table;


use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Core\System\PhpEnvironment;
use Nemundo\Core\Type\DateTime\DateTime;

class SystemTable extends AdminLabelValueTable
{

    public function getContent()
    {

        $this->addLabelValue('Sytem Date/Time', (new DateTime())->setNow()->getIsoDateTime());
        $this->addLabelValue('Timezone', (new PhpEnvironment())->getTimezone());
        $this->addLabelValue('IP',$_SERVER['SERVER_ADDR']);

        return parent::getContent();
    }

}