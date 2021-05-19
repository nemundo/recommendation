<?php

namespace Nemundo\App\FileLog\Form;


use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Core\File\DirectoryReader;
use Nemundo\Core\Log\LogConfig;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class FileLogForm extends SearchForm
{

    /**
     * @var BootstrapListBox
     */
    private $listbox;

    protected function loadContainer()
    {
        parent::loadContainer();

        $row = new BootstrapRow($this);

        $this->listbox = new BootstrapListBox($row);
        $this->listbox->name = 'file';
        $this->listbox->column = true;
        $this->listbox->columnSize = 2;

    }


    public function getLogFilename()
    {

        $filename = $this->listbox->getValue();
        return $filename;

    }

    public function getContent()
    {

        $this->listbox->label = 'Log File';
        $this->listbox->submitOnChange = true;
        $this->listbox->value = $this->listbox->getValue();

        $reader = new DirectoryReader();
        $reader->path = LogConfig::$logPath;

        foreach ($reader->getData() as $file) {
            $this->listbox->addItem($file->filename, $file->filename);
        }

        return parent::getContent();

    }

}