<?php

namespace Nemundo\App\Scheduler\Com\Form;


use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\App\Scheduler\Builder\NextJobBuilder;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerReader;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerUpdate;
use Nemundo\Core\Type\DateTime\Time;
use Nemundo\Core\Validation\ValidationType;
use Nemundo\Html\Form\Input\HiddenInput;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class SchedulerForm extends BootstrapForm
{

    /**
     * @var string
     */
    public $schedulerId;

    /**
     * @var BootstrapCheckBox
     */
    private $active;

    /**
     * @var BootstrapTextBox
     */
    private $day;

    /**
     * @var BootstrapTextBox
     */
    private $hour;

    /**
     * @var BootstrapTextBox
     */
    private $minute;

    /**
     * @var BootstrapCheckBox
     */
    private $specificStartTime;

    /**
     * @var BootstrapTextBox
     */
    private $startTime;


    public function getContent()
    {

        $applicationParamter=new ApplicationParameter();

        $hidden=new HiddenInput($this);
        $hidden->name=$applicationParamter->getParameterName();
        $hidden->value=$applicationParamter->getValue();


        $schedulerRow = (new SchedulerReader())->getRowById($this->schedulerId);

        $formRow = new BootstrapRow($this);

        $this->active = new BootstrapCheckBox($formRow);
        $this->active->label = 'Active';
        $this->active->value = $schedulerRow->active;

        $formRow = new BootstrapRow($this);


        $this->day = new BootstrapTextBox($formRow);
        $this->day->label = 'Day';
        $this->day->value = $schedulerRow->day;
        $this->day->validation = true;
        $this->day->validationType = ValidationType::IS_NUMBER;

        $this->hour = new BootstrapTextBox($formRow);
        $this->hour->label = 'Hour';
        $this->hour->value = $schedulerRow->hour;
        $this->hour->validation = true;
        $this->hour->validationType = ValidationType::IS_NUMBER;

        $this->minute = new BootstrapTextBox($formRow);
        $this->minute->label = 'Minute';
        $this->minute->value = $schedulerRow->minute;
        $this->minute->validation = true;
        $this->minute->validationType = ValidationType::IS_NUMBER;

        $formRow = new BootstrapRow($this);

        $this->specificStartTime = new BootstrapCheckBox($formRow);
        $this->specificStartTime->label = 'Specific Start Time';
        $this->specificStartTime->value = $schedulerRow->specificStartTime;

        $this->startTime = new BootstrapTextBox($formRow);
        $this->startTime->label = 'Start Time';
        $this->startTime->value = '00:00';
        $this->startTime->validation = true;
        $this->startTime->value = $schedulerRow->startTime->getIsoTime();

        return parent::getContent();
    }


    protected function onSubmit()
    {

        $update = new SchedulerUpdate();
        $update->active = $this->active->getValue();
        $update->day = $this->day->getValue();
        $update->hour = $this->hour->getValue();
        $update->minute = $this->minute->getValue();
        $update->specificStartTime = $this->specificStartTime->getValue();
        $update->startTime = new Time($this->startTime->getValue());
        $update->updateById($this->schedulerId);

        $builder = new NextJobBuilder();
        $builder->schedulerId = $this->schedulerId;
        $builder->setNow = true;
        $builder->buildNextJob();


    }

}