<?php


namespace Nemundo\Content\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Content\Data\Content\ContentCount;
use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Time\Stopwatch;


class ReIndexScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'content-reindex';
    }

    public function run()
    {

        //(new CleanIndexScript())->run();

        // large reader !!!

        $stopwatch = new Stopwatch('ReIndex');

        $totalCount = (new ContentCount())->getCount();
        $n = 0;

        $contentReader = new ContentReader();
        $contentReader->model->loadContentType();
        foreach ($contentReader->getData() as $contentRow) {
            $contentType = $contentRow->getContentType();
            $contentType->saveIndex();

            $n++;

            if (($n % 1000) == 0) {
                (new Debug())->write("$n / $totalCount");
            }

        }

        $stopwatch->stopAndPrintOutput();

    }

}