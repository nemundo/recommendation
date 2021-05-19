<?php


namespace Nemundo\App\Script\Com\Table;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\App\Application\Com\Container\AbstractApplicationFilterContainer;
use Nemundo\App\Script\Data\Script\ScriptReader;
use Nemundo\App\Script\Parameter\ScriptUrlParameter;
use Nemundo\App\Script\Site\ScriptRunSite;

class ScriptTable extends AbstractApplicationFilterContainer  // AdminClickableTable
{

    /**
     * @var string
     */
    //public $applicationId;


    public function getContent()
    {

        $table = new AdminTable($this);

        $scriptReader = new ScriptReader();
        $scriptReader->model->loadApplication();

        $header = new AdminTableHeader($table);
        $header->addText($scriptReader->model->application->label);
        $header->addText($scriptReader->model->scriptName->label);
        $header->addText($scriptReader->model->description->label);
        $header->addText($scriptReader->model->scriptClass->label);
        $header->addText($scriptReader->model->consoleScript->label);
        $header->addEmpty();


        if ($this->applicationId !== null) {
            $scriptReader->filter->andEqual($scriptReader->model->applicationId, $this->applicationId);
        }

        foreach ($scriptReader->getData() as $scriptRow) {

            $row = new AdminTableRow($table);
            $row->addText($scriptRow->application->application);
            $row->addText($scriptRow->scriptName);
            $row->addText($scriptRow->description);
            $row->addText($scriptRow->scriptClass);
            $row->addYesNo($scriptRow->consoleScript);

            $site = clone(ScriptRunSite::$site);
            $site->addParameter(new ScriptUrlParameter($scriptRow->id));
            $row->addIconSite($site);

        }

        return parent::getContent();

    }

}