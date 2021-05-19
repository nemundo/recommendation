<?php

namespace Nemundo\Core\Csv\Reader;


use Nemundo\Core\TextFile\Reader\TextFileReader;

class FixWidthCsvReader extends AbstractCsvReader
{

    private $postitionList = [];

    public function addSeperationPosition($position)
    {
        $this->postitionList[] = $position;
        return $this;
    }


    protected function loadData()
    {

        $file = new TextFileReader($this->filename);
        $file->utf8Encode = $this->utf8Encode;

        $count = 0;
        foreach ($file->getData() as $line) {

            if ($count >= $this->lineOfStart) {

                $item = [];

                $previousPosition = 0;
                foreach ($this->postitionList as $position) {
                    $length = $position - $previousPosition;
                    $item[] = trim(substr($line, $previousPosition, $length));
                    $previousPosition = $position;
                }

                // Insert last item
                $item[] = trim(substr($line, $previousPosition));

                $this->list[] = $item;

            }

            $count++;

        }

    }

}