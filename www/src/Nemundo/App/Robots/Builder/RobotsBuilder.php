<?php


namespace Nemundo\App\Robots\Builder;


use Nemundo\App\Robots\Filename\RobotsConfigFilename;
use Nemundo\App\Robots\Filename\RobotsFilename;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Json\Document\JsonDocument;
use Nemundo\Core\TextFile\Writer\TextFileWriter;
use Nemundo\Project\Path\WebPath;

class RobotsBuilder extends AbstractBase
{




    // addRobots
    public function createRobots($userAgent = '*', $allow = '/')
    {


        /*
         *
         * User-agent: *
Allow: /
         *
         */


        $filename = (new RobotsFilename())->getFullFilename();

            /*(new WebPath())
            ->addPath('robots.txt')
            ->getFullFilename();*/


        $file = new TextFileWriter($filename);
        $file->overwriteExistingFile=true;
        $file->addLine('User-agent: ' . $userAgent);
        $file->addLine('Allow: ' . $allow);
        $file->saveFile();


        $config=[];
        $config['user-agent']=$userAgent;
        $config['allow']=$allow;


        $json=new JsonDocument();
        $json->filename = (new RobotsConfigFilename())->getFullFilename();

        $json->addRow($config);

        $json->writeFile();



    }

}