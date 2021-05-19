<?php


namespace Nemundo\Crawler\HtmlParser;


use Nemundo\Core\Base\AbstractBase;

class HyperlinkItem extends AbstractBase
{

    public $title;

    public $url;

    public $fullUrl;

    /**
     * @var bool
     */
    public $external = false;

}