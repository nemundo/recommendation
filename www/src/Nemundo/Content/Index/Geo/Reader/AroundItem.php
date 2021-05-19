<?php


namespace Nemundo\Content\Index\Geo\Reader;


use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBase;

class AroundItem extends AbstractBase
{

    /**
     * @var AbstractContentType
     */
    public $content;

    public $geoIndexId;

    public $distance;

}