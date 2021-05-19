<?php


namespace Nemundo\Content\Index\Geo\Reader;


use Nemundo\Content\Builder\ContentBuilder;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\Number\Number;

class GeoDistanceItem extends AbstractBase
{

    public $contentId;

    public $distance;

    /**
     * @var AbstractContentType
     */
    private $content;

    public function getContent()
    {

        if ($this->content == null) {
            $this->content = (new ContentBuilder())->getContent($this->contentId);
        }

        return $this->content;

    }


    public function getDistanceText()
    {

        $text = (new Number($this->distance / 1000))->roundNumber(0) . ' km';
        return $text;

    }


}