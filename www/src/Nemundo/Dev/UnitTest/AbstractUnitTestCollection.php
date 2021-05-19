<?php

namespace Nemundo\Dev\UnitTest;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Console\ConsoleConfig;
use Nemundo\Core\Debug\Debug;


abstract class AbstractUnitTestCollection extends AbstractBaseClass
{

    /**
     * @var AbstractUnitTest[]
     */
    private $unitTestList = [];

    abstract protected function loadUnitTestCollection();

    public function __construct()
    {
        $this->loadUnitTestCollection();
    }

    protected function addUnitTest(AbstractUnitTest $unitTest)
    {
        $this->unitTestList[] = $unitTest;
    }

    public function runTest()
    {

        //ConsoleConfig::$consoleMode = true;

        foreach ($this->unitTestList as $unitTest) {

            (new Debug())->write('Test: ' . $unitTest->getClassNameWithoutNamespace());

            if (!$unitTest->test()) {
                (new Debug())->write('TEST FAILED');
            }
        }

    }

}