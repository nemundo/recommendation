<?php


namespace Nemundo\Dev\TestData;


use Nemundo\Core\Console\ConsoleInput;

class NumberOfItemConsoleInput extends ConsoleInput
{

    public function __construct()
    {


        $this->message = 'Number of Test Item';
        $this->defaultValue = 10;


    }

}