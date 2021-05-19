<?php

namespace Nemundo\Geo\Kml\Style;


use Nemundo\Html\Container\AbstractTagContainer;

class IconStyle extends AbstractTagContainer
{

    /**
     * @var string
     */
    public $iconUrl;


    public function getContent()
    {

        $this->tagName = 'IconStyle';

        if ($this->iconUrl !== null) {
            /*$tag = new Icon($this);
            $tag->href = $this->iconUrl;*/

            $this->addContent('<Icon>
            <href>' . $this->iconUrl . '</href>
            </Icon>');

        }

        return parent::getContent();

    }

}