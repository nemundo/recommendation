<?php

namespace Nemundo\Html\Typography;


use Nemundo\Html\Container\AbstractContentContainer;

// ausgeschrieben ???
class Pre extends AbstractContentContainer
{

    protected function loadContainer()
    {

        $this->tagName = 'pre';

    }

}
