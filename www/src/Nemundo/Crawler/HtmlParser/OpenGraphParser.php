<?php


namespace Nemundo\Crawler\HtmlParser;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\RegularExpression\RegularExpressionReader;
use Nemundo\Crawler\WebCrawler\WebCrawler;

class OpenGraphParser extends AbstractBase
{

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $siteName;

    /**
     * @var bool
     */
    public $hasImage=false;

    /**
     * @var string
     */
    public $imageUrl;

    /**
     * @var string
     */
    public $url;

    /**
     * @var string
     */
    public $type;


    private $propertyList = [];

    public function __construct($url)
    {

        $crawler = new WebCrawler();
        $crawler->url = $url;
        $crawler->regularExpression = '<meta (.*?)>';

        foreach ($crawler->getData() as $crawlerRow) {

            $meta = $crawlerRow->getValue(0);

            $re = new RegularExpressionReader();
            $re->text = $meta;
            $re->regularExpression = 'property=["|\']og:(.*?)["|\']';
            if ($re->hasItems()) {
                $property = $re->getDataRow()->getValue(0);
                $content = '';

                $re2 = new RegularExpressionReader();
                $re2->text = $meta;
                $re2->regularExpression = 'content=["|\'](.*?)["|\']';
                if ($re2->hasItems()) {
                    $content = $re2->getDataRow()->getValue(0);
                }

                $this->propertyList[$property] = $content;

            }

        }

        $this->title = $this->loadProperty('title');
        $this->description = $this->loadProperty('description');
        $this->url = $this->loadProperty('url');

        $this->imageUrl = $this->loadProperty('image');

        if ($this->imageUrl !=='') {
            $this->hasImage=true;
        }

        $this->siteName = $this->loadProperty('site_name');
        $this->type = $this->loadProperty('type');

    }


    public function getPropertyList()
    {
        return $this->propertyList;
    }


    private function loadProperty($propertyName)
    {

        $value = null;

        if (isset($this->propertyList[$propertyName])) {
            $value = $this->propertyList[$propertyName];
        }

        return $value;

    }

}