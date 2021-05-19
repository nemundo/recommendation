<?php


namespace Nemundo\App\Scheduler\Page;


use Nemundo\App\Application\Com\ListBox\ApplicationListBox;
use Nemundo\App\Scheduler\Com\Table\SchedulerTable;
use Nemundo\App\Scheduler\Template\SchedulerTemplate;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class SchedulerPage extends SchedulerTemplate
{

    public function getContent()
    {

        $form = new SearchForm($this);

        $formRow = new BootstrapRow($form);

        $application = new ApplicationListBox($formRow);
        $application->submitOnChange = true;
        $application->value = $application->getValue();
        $application->column = true;
        $application->columnSize = 2;

        $active = new BootstrapCheckBox($formRow);
        $active->submitOnChange = true;
        $active->searchMode = true;
        $active->label = 'Active';

        $table = new SchedulerTable($this);
        $table->isActive = $active->getValue();
        if ($application->hasValue()) {
            $table->filterByApplicationId($application->getValue());
        }

        return parent::getContent();

    }

}