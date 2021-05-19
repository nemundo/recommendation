<?php


namespace Nemundo\Content\App\Calendar\Setup;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Content\App\Calendar\Data\CalendarSourceType\CalendarSourceType;
use Nemundo\Content\Type\AbstractContentType;

class CalendarSourceSetup extends AbstractBase
{

    public function addSourceContentType(AbstractContentType $contentType) {

        $data = new CalendarSourceType();
        $data->ignoreIfExists=true;
        $data->contentTypeId=$contentType->typeId;
        $data->save();

        return $this;

    }

}