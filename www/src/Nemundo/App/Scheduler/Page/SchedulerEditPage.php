<?php


namespace Nemundo\App\Scheduler\Page;


use Nemundo\App\Application\Com\ListBox\ApplicationListBox;
use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\App\Scheduler\Com\Form\SchedulerForm;
use Nemundo\App\Scheduler\Com\Table\SchedulerTable;
use Nemundo\App\Scheduler\Parameter\SchedulerParameter;
use Nemundo\App\Scheduler\Site\SchedulerSite;
use Nemundo\App\Scheduler\Template\SchedulerTemplate;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class SchedulerEditPage extends SchedulerTemplate
{

    public function getContent()
    {

        $form = new SchedulerForm($this);
        $form->schedulerId = (new SchedulerParameter())->getValue();
        $form->redirectSite = clone(SchedulerSite::$site);
        $form->redirectSite->addParameter(new ApplicationParameter());

        return parent::getContent();

    }

}