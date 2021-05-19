<?php

namespace Nemundo\App\FileLog\Site;


use Nemundo\App\FileLog\Page\FileLogPage;
use Nemundo\Web\Site\AbstractSite;


class FileLogSite extends AbstractSite
{

    /**
     * @var FileLogSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'File Log';
        $this->url = 'file-log';
        FileLogSite::$site = $this;

        new FileLogDownloadSite($this);
        new FileLogDeleteSite($this);

    }


    public function loadContent()
    {

        (new FileLogPage())->render();

        /*
        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $form = new LogFileForm($page);
        $filename = $form->getLogFilename();

        if ($filename !== '') {

            $file = new TextFileReader(LogConfig::$logPath . $filename);

            $table = new AdminTable($page);

            foreach ($file->getData() as $line) {
                $row = new TableRow($table);
                $row->addText($line);
            }

        }

        $btn = new AdminSiteButton($page);
        $btn->site = LogFileDeleteSite::$site;

        $page->render();*/

    }

}