<?php

namespace Nemundo\Rss\Reader;


use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Core\Type\Text\Text;


class RssReader extends AbstractDataSource
{

    /**
     * @var string
     */
    public $feedUrl;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $imageUrl;


    public function getTitle()
    {
        $this->loadData();
        return $this->title;
    }


    public function getDescription()
    {
        $this->loadData();
        return $this->description;
    }

    public function getUrl()
    {
        $this->loadData();
        return $this->url;
    }

    public function getImageUrl()
    {
        $this->loadData();
        return $this->imageUrl;
    }


    protected function loadData()
    {

        if (!$this->checkProperty('feedUrl')) {
            return;
        }

        try {

            // Ignore Ssl Zertifikat
            $contextOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                )
            );

            $rss = \Zend\Feed\Reader\Reader::import($this->feedUrl, $contextOptions);

            $this->title = $rss->getTitle();
            if ($this->title == null) {
                $this->title = '';
            }

            $this->description = $rss->getDescription();
            if ($this->description == null) {
                $this->description = '';
            }

            $this->url = $rss->getFeedLink();

            foreach ($rss as $item) {

                $text = new Text($item->getContent());
                $text->removeHtmlTags();

                $rssItem = new RssItem();
                $rssItem->title = $item->getTitle();
                $rssItem->description = (new Text( $text->getValue()))->decodeHtmlCharacter()->getValue();
                $rssItem->url = $item->getLink();

                if (isset($item->getEnclosure()->url)) {
                    $rssItem->enclosureUrl = $item->getEnclosure()->url;
                    $rssItem->enclosureType = $item->getEnclosure()->type;
                }

                //(new Debug())->write($rssItem->url);
                //(new Debug())->write($item->getDateCreated());

                $dateTime = $item->getDateCreated();
                if ($dateTime!==null) {
                $rssItem->dateTime = new DateTime($item->getDateCreated()->format('Y-m-d H:i:s'));
                } else {
                    $rssItem->dateTime = (new DateTime())->setNow();
                }

                $this->addItem($rssItem);

            }

        } catch (\Zend\Feed\Reader\Exception\RuntimeException $e) {
            (new LogMessage())->writeError('Rss Reader Error: ' . $e->getMessage());
        }

    }


    /**
     * @return RssItem[]
     */
    public function getData()
    {
        return parent::getData();
    }

}

