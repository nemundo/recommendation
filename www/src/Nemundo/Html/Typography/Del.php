<?php

namespace Nemundo\Html\Typography;

use Nemundo\Html\Container\AbstractContentContainer;

class Del extends AbstractContentContainer
{

    public function getContent()
    {

        $this->tagName = 'del';

        return parent::getContent();
    }


}
