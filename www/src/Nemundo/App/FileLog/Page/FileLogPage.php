<?php

namespace Nemundo\App\FileLog\Page;


use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\App\FileLog\Form\FileLogForm;
use Nemundo\App\FileLog\Parameter\FilenameParameter;
use Nemundo\App\FileLog\Site\FileLogDeleteSite;
use Nemundo\App\FileLog\Site\FileLogDownloadSite;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Core\Type\Number\Number;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Project\Path\LogPath;

class FileLogPage extends AbstractTemplateDocument
{

    public function getContent()
    {


        $btn = new AdminSiteButton($this);
        $btn->site = FileLogDeleteSite::$site;

        $form = new FileLogForm($this);
        $filename = $form->getLogFilename();




        if ($filename !== '') {

            $btn = new AdminSiteButton($this);
            $btn->site = FileLogDownloadSite::$site;
            $btn->site->addParameter(new FilenameParameter($filename));


            $p = new Paragraph($this);

            $table = new AdminTable($this);

            $fullFilename = (new LogPath())
                ->addPath($filename)
                ->getFullFilename();

            /*
            $file = new TextFileReader(LogConfig::$logPath . $filename);

            $table = new AdminTable($this);

            foreach ($file->getData() as $line) {
                $row = new TableRow($table);
                $row->addText($line);
            }*/


            $f = fopen($fullFilename, 'r');
            $lineCount = 0;
            $startLine = 0;
            $endLine = 1000;

            while ($line = fgets($f)) {

                $lineCount++;
                $showLine = false;
                if (($lineCount >= $startLine) && ($lineCount <= $endLine)) {
                    //echo $line;

                    /*$row = new TableRow($table);
                    $row->addText($line);*/

                    $showLine = true;

                }

                /* if ($lineCount == $endLine) {
                     //break;
                     $showLine=false;
                 }*/


                if ($showLine) {

                    $row = new TableRow($table);
                    $row->addText($line);

                }


            }
            fclose($f);


            $p->content = (new Number($lineCount))->formatNumber() . ' lines';


        }


        return parent::getContent();
    }

}