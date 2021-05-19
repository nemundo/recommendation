<?php


namespace Nemundo\App\Linux\Com\Form;


use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Local\LocalCommand;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class LocalCommandForm extends BootstrapForm
{

    /**
     * @var BootstrapTextBox
     */
    private $command;

    public function getContent()
    {

        $this->command = new BootstrapTextBox($this);
        $this->command->label = 'Command';

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $local = new LocalCommand();
        $output = $local->runLocalCommand($this->command->getValue());

        (new Debug())->write($output);
        exit;


    }

}