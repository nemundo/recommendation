<?php

namespace Hackathon\Site;

use Hackathon\Data\Topic\Topic;
use Hackathon\Data\Topic\TopicReader;
use Hackathon\Parameter\TopicParameter;
use Nemundo\Core\Http\Request\Post\PostRequest;
use Nemundo\Core\Json\Document\JsonResponse;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\Site;

// Json/TopicListJsonSite
class TopicListSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->url = 'topiclist';
        $this->menuActive = false;

    }

    public function loadContent()
    {


        $list=[];

        $reader = new TopicReader();
        $reader->addOrder($reader->model->topic);
        foreach ($reader->getData() as $topicRow) {
                $list[]=$topicRow->topic;
        }

        $json['topic'] = $list;

        $response = new JsonResponse();
        $response->addRow($json);
        $response->render();


    }
}