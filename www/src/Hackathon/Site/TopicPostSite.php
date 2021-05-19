<?php

namespace Hackathon\Site;

use Hackathon\Data\Topic\Topic;
use Nemundo\Core\Http\Request\Post\PostRequest;
use Nemundo\Core\Json\Document\JsonResponse;
use Nemundo\Web\Site\AbstractSite;

class TopicPostSite extends AbstractSite
{
    protected function loadSite()
    {

        $this->title = 'asdf';
        $this->url = 'topicpost';
        $this->menuActive = false;

    }

    public function loadContent()
    {


        //(new Debug())->write($_POST);


        $request = new PostRequest('topic');

        //$topic= (new PostRequest('topic'))->getValue();
        //$topic = $_POST['topic'];

        //(new Debug())->write($topic);

        $json = [];

        if ($request->hasValue()) {

            $topic = $request->getValue();

            $data = new Topic();
            $data->topic = $topic;
            $data->save();

            $json['status'] = 'ok';

        } else {

            $json['error'] = 'No topic paramater';

        }


        //(new Debug())->write($_POST);



        $response = new JsonResponse();
        $response->addRow($json);
        $response->render();


    }
}