<?php

namespace Nemundo\Core\Directory;


class TextDirectory extends AbstractDirectory
{

    public function getText()
    {

        $seperator = PHP_EOL;
        $text = join($seperator, $this->list);
        return $text;
    }


    public function getTextWithSeperator($seperator = ', ')
    {
        $text = join($seperator, $this->list);
        return $text;
    }


    public function getCount()
    {

        $count = sizeof($this->list);
        return $count;

    }


    public function getClosestText($text)
    {

        $shortest = 0;
        $closestWord = null;

        foreach ($this->getData() as $word) {

            //$distance = levenshtein($text, $word);
            similar_text($text, $word, $percent);

            if ($percent > $shortest) {
                $shortest = $percent;
                $closestWord = $word;
            }

        }

        return $closestWord;

    }


    public function getClosestTextList($text, $minPercent = 60)
    {

        $closestWordList = [];

        foreach ($this->getData() as $word) {

            //$distance = levenshtein($text, $word);
            similar_text($text, $word, $percent);
            //(new Debug())->write($percent);

            if ($percent > $minPercent) {
                $closestWordList[] = $word;
            }

        }

        return $closestWordList;

    }

}
