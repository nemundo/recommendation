<?php


namespace Nemundo\App\Manifest\Builder;


use Nemundo\App\Manifest\Filename\WebmanifestConfigFilename;
use Nemundo\App\Manifest\Filename\WebmanifestFilename;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Json\Document\JsonDocument;
use Nemundo\Core\TextFile\Writer\TextFileWriter;
use Nemundo\Core\Type\File\File;
use Nemundo\Project\Path\WebPath;

class WebManifestBuilder extends AbstractBase
{

    //public $jsonFilename = 'manifest.webmanifest';

    public $appName;

    public $shortName;

    public $description;

    public $icon;

    public $startUrl = '/';

    public $display = 'fullscreen';

    public $backgroundColor;

    public $themeColor;

    public function createFile()
    {

        $json = new JsonDocument();
        $json->filename = (new WebmanifestFilename())->getFullFilename();

        $data = [];
        $data['name'] = $this->appName;
        $data['short_name'] = $this->shortName;
        if ($this->description !== null) {
            $data['description'] = $this->description;
        }

        $data['background_color'] = $this->backgroundColor;
        $data['theme_color'] = $this->themeColor;


        $iconList = [];

        $icon = [];
        $icon['src'] = $this->icon;
        $icon['sizes'] = '144x144';
        $icon['type'] = 'image/png';
        $iconList[] = $icon;

        $data['icons'] = $iconList;

        $data['start_url'] = $this->startUrl;
        $data['display'] = $this->display;


        $json->setData($data);

        $json->writeFile();


        $filename = (new WebPath())
            ->addPath('serviceworker.js')
            ->getFullFilename();

        if ((new File($filename))->notExists()) {

            $file = new TextFileWriter($filename);
            $file->addLine('self.addEventListener("fetch", function(e) {');
            $file->addLine('});');
            $file->addLine('self.addEventListener("install", function(event) {');
            $file->addLine('});');

            $file->saveFile();

        }

    }


}