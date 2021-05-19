<?php

namespace Nemundo\Package\Bootstrap\Table;


use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Com\Html\Header\LibraryHeader;

class BootstrapClickableTable extends BootstrapTable
{

    use LibraryTrait;

    /**
     * @var bool
     */
    public $openNewTab = false;

    /**
     * @var bool
     */
    private static $insertHeader = false;

    public function getContent()
    {

        LibraryHeader::addStyle('.clickable-row {');
        LibraryHeader::addStyle('cursor: pointer;');
        LibraryHeader::addStyle('}');

        $this->addJqueryScript('$(".clickable-row").click(function() {');

        if ($this->openNewTab) {
            $this->addJqueryScript('window.open($(this).data("href"), "_blank");');
        } else {
            $this->addJqueryScript('window.location = $(this).data("href");');
        }
        $this->addJqueryScript('});');

        BootstrapClickableTable::$insertHeader = true;

        return parent::getContent();

    }

}