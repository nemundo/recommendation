<?php


namespace Nemundo\App\Robots\Com\Form;


use Nemundo\App\Robots\Builder\RobotsBuilder;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class RobotsForm extends BootstrapForm
{

    /**
     * @var BootstrapTextBox
     */
    private $userAgent;

    /**
     * @var BootstrapTextBox
     */
    private $allow;

    public function getContent()
    {

        $this->userAgent = new BootstrapTextBox($this);
        $this->userAgent->label = 'User Agent';
        $this->userAgent->value = '*';

        $this->allow = new BootstrapTextBox($this);
        $this->allow->label = 'Allow';
        $this->allow->value = '/';

        return parent::getContent();
    }

    protected function onSubmit()
    {

        $builder = new RobotsBuilder();
        $builder->createRobots($this->userAgent->getValue(), $this->allow->getValue());


        parent::onSubmit();

    }

}