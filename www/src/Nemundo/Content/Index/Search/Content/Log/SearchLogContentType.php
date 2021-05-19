<?php


namespace Nemundo\Content\Index\Search\Content\Log;



use Nemundo\Content\Index\Search\Data\SearchLog\SearchLog;
use Nemundo\Content\Index\Search\Data\SearchLog\SearchLogReader;
use Nemundo\Content\Index\Search\Parameter\SearchQueryParameter;
use Nemundo\Content\Index\Search\Site\SearchSite;
use Nemundo\Content\Type\AbstractContentType;

class SearchLogContentType extends AbstractContentType
{

    public $searchQuery;

    public $resultCount;


    protected function loadContentType()
    {
        $this->typeLabel = 'Search Log';
        $this->typeId = '9e044ebe-b58d-470c-8d5c-476c8e1452d2';

        // redirect site
        // oder getviewSite
        //$this->viewSite=SearchSite::$site;



        // TODO: Implement loadContentType() method.
    }


    protected function onCreate()
    {

        $data = new SearchLog();
        $data->searchQuery = $this->searchQuery;
        $data->resultCount = $this->resultCount;
        $this->dataId = $data->save();

    }


    protected function onDataRow()
    {
      $this->dataRow= (new SearchLogReader())->getRowById($this->dataId);
    }


    public function getSubject()
    {

        $logRow = $this->getDataRow();
        $subject= 'Gesucht nach '.$logRow->searchQuery;
        return $subject;

    }


    public function hasViewSite()
    {
        return true;
    }

    public function getViewSite()
    {
        
        $logRow = $this->getDataRow();

        $site = clone(SearchSite::$site);
        $site->addParameter(new SearchQueryParameter($logRow->searchQuery));

        return $site;

    }


}