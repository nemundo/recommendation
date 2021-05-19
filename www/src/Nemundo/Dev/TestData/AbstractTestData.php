<?php

namespace Nemundo\Dev\TestData;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Time\Stopwatch;


abstract class AbstractTestData extends AbstractBaseClass
{

    abstract protected function createItem($n);


    public function createTestData($numberOfItem = 10)
    {

        $stopwatch = new Stopwatch();
        $stopwatch->logName = $this->getClassNameWithoutNamespace().' ('.$numberOfItem.' Items)';

        $watch = new Stopwatch();

        for ($n = 1; $n <= $numberOfItem; $n++) {
            $this->createItem($n);

            if (($n % 1000) === 0) {
                (new Debug())->write($n.' Time: '.$watch->stop().' sec');
                $watch = new Stopwatch();

            }

        }

        $stopwatch->stopAndPrintOutput();

    }


}