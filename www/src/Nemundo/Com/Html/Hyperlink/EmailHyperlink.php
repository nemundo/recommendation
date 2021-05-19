<?php

namespace Nemundo\Com\Html\Hyperlink;


use Nemundo\Html\Hyperlink\AbstractHyperlink;

class EmailHyperlink extends AbstractHyperlink
{

    /**
     * @var string
     */
    public $email;


    public function getContent()
    {

        $this->addContent($this->email);
        $this->href = 'mailto:' . $this->email;

        return parent::getContent();

    }

}