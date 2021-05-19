<?php

namespace Nemundo\Crawler\WebCrawler;

use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\RegularExpression\RegularExpressionReader;
use Nemundo\Core\System\Delay;
use Nemundo\Core\TextFile\Reader\TextFileReader;
use Nemundo\Core\TextFile\Writer\TextFileWriter;
use Nemundo\Core\Type\File\File;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Core\WebRequest\CurlWebRequest;
use Nemundo\Project\Path\CachePath;


class WebCrawler extends AbstractDataSource
{
    /**
     * @var string
     */
    public $url;

    /**
     * @var bool
     */
    public $sslVerification = true;

    /**
     * @var string
     */
    public $regularExpression;

    /**
     * @var bool
     */
    public $cachePage = false;

    /**
     * @var bool
     */
    public $delay=false;

    public $delayTime = 1;

    private $beforeText = [];

    private $field = [];

    private $html;


    protected function loadData()
    {

        if (!$this->checkProperty(['url', 'regularExpression'])) {
            return [];
        }

        $http = new CurlWebRequest();
        $http->sslVerification = $this->sslVerification;


        if ($this->cachePage) {

            $filename = (new CachePath())
                ->addPath('web_crawler')
                ->createPath()
                ->addPath((new Text($this->url))->getChecksum() . '.html')
                ->getFullFilename();

            $fileExists = (new File($filename))->fileExists();

            if ($fileExists) {
                $this->html = (new TextFileReader($filename))->getText();
            } else {

                $response = $http->getUrl($this->url);

                $this->html = $response->html;

                $writer = new TextFileWriter($filename);
                $writer->addLine($this->html);
                $writer->saveFile();

                if ($this->delay) {
                    (new Delay())->delay($this->delayTime);
                }


            }

        } else {

            $response = $http->getUrl($this->url);
            $this->html = $response->html;

            if ($this->delay) {
                (new Delay())->delay($this->delayTime);
            }

        }

        $regex = new RegularExpressionReader();
        $regex->regularExpression = $this->regularExpression;
        $regex->text = $this->html;
        foreach ($regex->getData() as $item) {
            $this->addItem($item);
        }

    }


    /**
     * @return WebCrawlerRow[]
     */
    public function getData()
    {
        return parent::getData();
    }


    /**
     * @return WebCrawlerRow
     */
    public function getDataRow()
    {

        $list = $this->getData();
        $data = [];

        if (isset($list[0])) {
            $data = $list[0];
        } else {
            //(new LogMessage())->writeError('Web Crawler:No data found');
        }

        return $data;

    }


    public function addField($fieldName)
    {
        $this->field[] = $fieldName;
    }


    public function addBeforeText($number, $text)
    {
        $this->beforeText[$number] = $text;
        return $this;
    }

    public function addAfterText($number, $text)
    {

    }


    public function removeContent($regularExpression)
    {


    }


    public function getHtml()
    {

        $this->getData();
        return $this->html;

    }


}