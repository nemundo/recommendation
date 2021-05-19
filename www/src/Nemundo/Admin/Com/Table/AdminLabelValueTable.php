<?php

namespace Nemundo\Admin\Com\Table;


use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Html\Formatting\Bold;
use Nemundo\Html\Character\HtmlCharacter;
use Nemundo\Html\Container\AbstractHtmlContainer;

use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Com\TableBuilder\TableCell;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Package\Bootstrap\Table\BootstrapTable;
use Nemundo\Web\Site\AbstractSite;


class AdminLabelValueTable extends BootstrapTable
{

    /**
     * @var int
     */
    public $labelCellWidth = 200;


    protected function loadContainer()
    {
        parent::loadContainer();
        $this->smallTable = true;

    }


    public function addLabelValue($label, $value = '')
    {

       /* $row = new TableRow($this);

        $cell = new TableCell($row);
        //$cell->content = $label;
        $cell->width = $this->labelCellWidth;

        $bold = new Bold($cell);
        $bold->content = $label;


        $cell = new TableCell($row);
        $cell->content = $value;*/

        $row = $this->getTableRow($label);
        $row->addText($value);

        //$bold = new Bold($cell);
        //$bold->content = $value;

    }


    public function addEmpty()
    {

        $this->addLabelValue(HtmlCharacter::NON_BREAKING_SPACE);

    }

    public function addLabelYesNoValue($label, $value = true)
    {

        $row=$this->getTableRow($label);

        $valueText = null;
        if ($value) {
            $valueText = 'Ja';
        } else {
            $valueText = 'Nein';
        }

        $row->addText($valueText);

        /*
        $row = new TableRow($this);

        $cell = new TableCell($row);
        $cell->content = $label;
        $cell->width = $this->labelCellWidth;

        $cell = new TableCell($row);

        $bold = new Bold($cell);
        $bold->content = $valueText;
*/
    }


    public function addLabelSite($label, AbstractSite $site)
    {

        /*$row = new TableRow($this);

        $cell = new TableCell($row);
        $cell->content = $label;
        $cell->width = $this->labelCellWidth;*/


        $row  =$this->getTableRow($label);

        $hyperlink = new SiteHyperlink($row);
        $hyperlink->site = $site;

    }


    public function addLabelCom($label, AbstractHtmlContainer $com)
    {

       /* $row = new TableRow($this);

        $cell = new TableCell($row);
        $cell->content = $label;
        $cell->width = $this->labelCellWidth;*/

        $row=$this->getTableRow($label);
        $row->addContainer($com);

    }


    public function addLabelHyperlink($label, $url, $value = null)
    {

        if ($value == null) {
            $value = $url;
        }

        /*$row = new TableRow($this);

        $cell = new TableCell($row);
        $cell->content = $label;
        $cell->width = $this->labelCellWidth;*/


        $row = $this->getTableRow($label);

        $hyperlink = new UrlHyperlink($row);
        $hyperlink->openNewWindow = true;
        $hyperlink->url = $url;
        $hyperlink->content = $url;

        //$bold = new Bold($hyperlink);
        //$bold->content = $value;

    }


    private function getTableRow($label) {

        $row = new TableRow($this);

        $cell = new TableCell($row);
        //$cell->content = $label;
        $cell->width = $this->labelCellWidth;

        $bold = new Bold($cell);
        $bold->content = $label;

        return $row;

    }


}