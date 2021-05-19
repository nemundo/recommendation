<?php

namespace Hackathon\Content\BajourJob;

use Hackathon\Content\BajourArticle\BajourArticleContentType;
use Hackathon\Data\BajourArticle\BajourArticle;
use Hackathon\Data\BajourArticle\BajourArticleId;
use Hackathon\Index\NewsIndexBuilder;
use Nemundo\Content\App\Job\Content\AbstractJobContentType;
use Nemundo\Content\Type\Index\ContentIndexBuilder;

class BajourImportJob extends AbstractJobContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'Bajour Import';
        $this->typeId = '766173bb-d292-448f-984c-11f34c15e040';
    }



    public function run()
    {



        $endpoint = 'https://api.bajour.ch/';

        $query='{
  articles(first:200) {
    nodes {
      id url title lead publishedAt
    }
   
  }
}';


        $variables = [];

        $headers = ['Content-Type: application/json', 'User-Agent: client'];
        /*if (null !== $token) {
            $headers[] = "Authorization: bearer $token";
        }*/

        $html= file_get_contents($endpoint, false, stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => $headers,
                'content' => json_encode(['query' => $query, 'variables' => $variables]),
            ]
        ]));



        $jsonReader=new \Nemundo\Core\Json\Reader\JsonReader();
        $jsonReader->fromText($html);

        foreach ($jsonReader->getData()['data']['articles']['nodes'] as $row) {

            //(new \Nemundo\Core\Debug\Debug())->write($row['title']);

            $uniqueId = $row['id'];

            $data=new BajourArticle();
            $data->updateOnDuplicate=true;
            $data->uniqueId=$uniqueId;
            $data->title= $row['title'];
            $data->lead =   $row['lead'];
            $data->url =   $row['url'];
            $data->save();


            $id=new BajourArticleId();
            $id->filter->andEqual($id->model->uniqueId,$uniqueId);
            $dataId=$id->getId();


            $type=new BajourArticleContentType($dataId);

            (new ContentIndexBuilder($type))->buildIndex();
            (new NewsIndexBuilder($type))->buildIndex();



        }




    }

}