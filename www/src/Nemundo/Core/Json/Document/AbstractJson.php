<?php

namespace Nemundo\Core\Json\Document;


use Nemundo\Core\Base\AbstractBase;

class AbstractJson extends AbstractBase
{

    /**
     * @var bool
     */
    public $formatJson = true;

    protected $data = [];

    public function addRow($row)
    {
        $this->data[] = $row;
    }


    // brauchts es das
    public function setData($data)
    {
        $this->data = $data;
    }


    protected function getContent()
    {

        $option = null;

        if ($this->formatJson) {
            $option = JSON_PRETTY_PRINT;
        }

        $content = json_encode($this->data, $option);

        return $content;

    }

}