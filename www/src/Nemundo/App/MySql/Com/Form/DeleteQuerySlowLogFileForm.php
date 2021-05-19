<?php


namespace Nemundo\App\MySql\Com\Form;


use Nemundo\App\MySql\Config\SlowLogFilename;
use Nemundo\Core\Type\File\File;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;

class DeleteQuerySlowLogFileForm extends BootstrapForm
{

    public function getContent()
    {

        $this->submitButton->label = 'Delete Slow Query Log File';

        return parent::getContent();

    }


    protected function onSubmit()
    {

        (new File((new SlowLogFilename())->getFilename()))->deleteFile();

    }

}