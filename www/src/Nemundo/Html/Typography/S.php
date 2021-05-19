<?php

namespace Nemundo\Html\Typography;

use Nemundo\Html\Container\AbstractContentContainer;

class S extends AbstractContentContainer
{

    public function getContent()
    {

        $this->tagName = 's';

        return parent::getContent();
    }


}
