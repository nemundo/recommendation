<?php


namespace Nemundo\Content\Type;



use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Json\JsonText;

trait JsonContentTrait
{


    public function getData()
    {

        $data['id'] = $this->dataId;
        $data['subject'] = $this->getSubject();

        return $data;

    }


    final public function getJsonHeader() {

        $data['content_type']=$this->typeLabel;
        $data['content_type_id']=$this->typeId;

        return $data;

    }


    final public function getJsonData() {

        $data=$this->getJsonHeader();
        $data['data'][]=$this->getData();

        return $data;

    }


    // exportJson
    final public function getJson() {

        $json=new JsonText();
        $json->addData($this->getJsonData());

        return $json->getJson();

    }


    public function importJson($data) {

        (new Debug())->write('No Json Import Function');

    }




}