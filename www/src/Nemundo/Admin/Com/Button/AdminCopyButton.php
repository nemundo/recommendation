<?php


namespace Nemundo\Admin\Com\Button;


use Nemundo\Html\Hyperlink\AbstractHyperlink;
use Nemundo\Package\FontAwesome\FontAwesomeIcon;

class AdminCopyButton extends AbstractHyperlink
{

    public $copyId;


    public function getContent()
    {

        $this->title = 'Copy';

        $icon = new FontAwesomeIcon($this);
        $icon->icon = 'copy';

        $this->href = '#';

        $this->addAttribute('onclick', 'var copyText = document.getElementById(\'' . $this->copyId . '\');copyText.select();document.execCommand(\'copy\');');

        return parent::getContent();
    }

}