<?php

namespace Nemundo\Package\Bootstrap\Table;


use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Html\Formatting\Bold;

use Nemundo\Com\TableBuilder\TableCell;
use Nemundo\Com\TableBuilder\TableRow;

class BootstrapLabelValueTable extends BootstrapTable
{

    /**
     * @var int
     */
    public $labelCellWidth;

    public function addLabelValue($label, $value = '')
    {

        $row = new TableRow($this);

        $cell = new TableCell($row);
        $cell->content = $label;
        $cell->width = $this->labelCellWidth;

        $cell = new TableCell($row);
        //$cell->nowrap = true;

        $bold = new Bold($cell);
        $bold->content = $value;

    }

    public function addLabelHyperlink($label, $url, $value)
    {
        $row = new TableRow($this);

        $cell = new TableCell($row);
        $cell->content = $label;
        $cell->width = $this->labelCellWidth;

        $hyperlink = new UrlHyperlink($row);
        $hyperlink->openNewWindow = true;
        $hyperlink->url = $url;
        $bold = new Bold($hyperlink);
        $bold->content = $value;
    }


    public function getContent()
    {

        //$this->addCssClass('table-bordered');

        return parent::getContent();
    }

}