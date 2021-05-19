<?php

namespace Nemundo\Com\Html\Listing;


use Nemundo\Html\Listing\Li;
use Nemundo\Html\Listing\Ul;

class UnorderedList extends Ul
{


    public function addText($text)
    {

        $li = new Li($this);
        $li->content = $text;

        return $this;

    }

}
