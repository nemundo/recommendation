<?php

namespace Nemundo\App\Performance;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Math\Percent\Percent;
use Nemundo\Core\TextFile\Writer\TextFileWriter;
use Nemundo\Core\Time\Stopwatch;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Core\Type\Number\Number;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Project\Path\LogPath;

class PerformanceStopwatch extends AbstractBase
{

    private static $count = 0;

    /**
     * @var Stopwatch
     */
    private $stopwatch;

    /**
     * @var string
     */
    private $stopwatchName;

    /**
     * @var int[]
     */
    private static $stopwatchTime = [];


    public function __construct($name = null)
    {

        if ($name !== null) {
            $this->stopwatchName = $name;
            $this->stopwatch = new Stopwatch();
            if (!isset(PerformanceStopwatch::$stopwatchTime[$name])) {
                PerformanceStopwatch::$stopwatchTime[$name] = 0;
            }
        }

    }

    public function countPlus()
    {
        PerformanceStopwatch::$count++;

        if ((PerformanceStopwatch::$count % 1000) == 0) {
            (new Debug())->write(PerformanceStopwatch::$count);
        }

    }


    public function stopStopwatch()
    {

        PerformanceStopwatch::$stopwatchTime[$this->stopwatchName] = PerformanceStopwatch::$stopwatchTime[$this->stopwatchName] + $this->stopwatch->stop();

    }


    public function writeToScreen()
    {

        (new Debug())->write('Count: ' . PerformanceStopwatch::$count);
        (new Debug())->write($this->getLogContent());

    }


    public function writeLog()
    {


        $dateTimeText = (new Text((new DateTime())->setNow()->getShortDateTimeWithSecondLeadingZeroFormat()))
            ->replace('.', '_')
            ->replace(':', '_')
            ->getValue();

        $filename = (new LogPath())
            ->addPath('performance')
            ->addPath($dateTimeText . '.txt')
            ->getFilename();

        $file = new TextFileWriter($filename);
        $file->addLine($this->getLogContent());
        $file->saveFile();

    }


    private function getLogContent()
    {

        $content = [];

        $total = 0;
        foreach (PerformanceStopwatch::$stopwatchTime as $key => $value) {
            $total = $total + $value;
        }


        $content[] = 'Performance Total: ' . $total;

        if (PerformanceStopwatch::$count !== 0) {
            $content[] = 'Count: ' . PerformanceStopwatch::$count;
            $content[] = 'Average: ' . (new Number($total / PerformanceStopwatch::$count))->formatNumber(2) . ' sec';
        }

        foreach (PerformanceStopwatch::$stopwatchTime as $key => $value) {

            $percent = new Percent($value);
            $percent->baseValue = $total;

            $content[] = $key . ': ' . (new Number($value))->formatNumber(1) . ' sec (' . $percent->getValue() . ')';

        }

        return $content;

    }

}