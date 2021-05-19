<?php

namespace Nemundo\Package\Bootstrap\Card;

use Nemundo\Html\Block\Div;
use Nemundo\Html\Listing\Li;
use Nemundo\Com\Html\Listing\UnorderedList;

class ListCard extends Div
{

    private $list = [];

    public function addItem($label)
    {
        $this->list[] = $label;
        return $this;
    }


    public function getContent()
    {

        $this->addCssClass('card');

        $unorderdList = new UnorderedList($this);
        $unorderdList->addCssClass('list-group list-group-flush');

        foreach ($this->list as $label) {
            $li = new Li($unorderdList);
            $li->addCssClass('list-group-item');
            $li->content = $label;
        }

        return parent::getContent();
    }


    /*
<div class="card">
<ul class="list-group list-group-flush">
<li class="list-group-item">Cras justo odio</li>
<li class="list-group-item">Dapibus ac facilisis in</li>
<li class="list-group-item">Vestibulum at eros</li>
</ul>
</div>*/


}