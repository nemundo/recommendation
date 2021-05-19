<?php

namespace Nemundo\Rss\Reader;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Core\Type\DateTime\DateTime;

class RssItem extends AbstractBase
{

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $url;

    /**
     * @var DateTime
     */
    public $dateTime;

    /**
     * @var string
     */
    public $enclosureUrl;

    /**
     * @var string
     */
    public $enclosureType;

}