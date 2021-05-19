<?php
namespace Hackathon\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class HackathonModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Hackathon\Data\BajourArticle\BajourArticleModel());
$this->addModel(new \Hackathon\Data\Keyword\KeywordModel());
$this->addModel(new \Hackathon\Data\Master\MasterModel());
$this->addModel(new \Hackathon\Data\NewsIndex\NewsIndexModel());
$this->addModel(new \Hackathon\Data\NewsType\NewsTypeModel());
$this->addModel(new \Hackathon\Data\RssFeed\RssFeedModel());
$this->addModel(new \Hackathon\Data\Snb\SnbModel());
$this->addModel(new \Hackathon\Data\SourceIndex\SourceIndexModel());
$this->addModel(new \Hackathon\Data\Topic\TopicModel());
$this->addModel(new \Hackathon\Data\Word\WordModel());
$this->addModel(new \Hackathon\Data\WordIndex\WordIndexModel());
}
}