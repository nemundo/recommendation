<?php

namespace Nemundo\App\Script\Page;


use Nemundo\App\Application\Com\ListBox\ApplicationListBox;
use Nemundo\App\Script\Com\Table\ScriptTable;
use Nemundo\App\Script\Template\ScriptTemplate;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class ScriptPage extends ScriptTemplate
{

    public function getContent()
    {

        $search = new SearchForm($this);

        $formRow = new BootstrapRow($search);

        $applicationListBox = new ApplicationListBox($formRow);
        $applicationListBox->submitOnChange = true;
        $applicationListBox->searchMode = true;
        $applicationListBox->column = true;
        $applicationListBox->columnSize = 2;

        $table = new ScriptTable($this);
        $table->filterByApplicationId($applicationListBox->getValue());

        return parent::getContent();

    }

}