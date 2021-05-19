<?php

namespace Nemundo\Core\Text;


use Nemundo\Core\Base\AbstractBase;


class SnippetText extends AbstractBase
{

    private $specialChars = ['Â', 'Ã', 'Ä', 'À', 'Á', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'Þ', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'þ', 'ÿ', 1, 2, 3, 4, 5, 6, 7, 8, 9, 0];
    private $specialReplaces = ['A', 'A', 'A', 'A', 'A', 'A', 'E', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'P', 'B', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'b', 'y', 1, 2, 3, 4, 5, 6, 7, 8, 9, 0];
    private $highlightTemplate = '<b>%word%</b>';
    private $minWords = 30;
    private $maxWords = 100;
    
    

    private function breakIntoSentences($text)
    {
        return preg_split('/(?<=[.?!;:])\s+/', $text, -1, PREG_SPLIT_NO_EMPTY);
    }


    private function getMatchedSentences($query, $sentences)
    {
        $queryWords = str_word_count($query, 1, implode('', $this->specialChars));
        $matchedSentences = [];
        foreach ($queryWords as $word) {
            foreach ($sentences as $key => $sentence) {
                if (preg_match('/\b' . preg_quote(str_replace($this->specialChars, $this->specialReplaces, $word)) . '\b/i', str_replace($this->specialChars, $this->specialReplaces, $sentence))) {
                    // if word is matched in this sentence (word boundary)
                    $matchedSentences[$key] = $sentence;
                }
            }
        }
        ksort($matchedSentences);
        return $matchedSentences;
    }


    private function highlightMatches($query,  $text)
    {
        $queryWords = str_word_count($query, 1, implode('', $this->specialChars));
        $snippetWords = str_word_count(str_replace('-', ' ', $text), 1, implode('', $this->specialChars));
        $replaces = [];
        foreach ($queryWords as $word) {
            foreach ($snippetWords as $snippetWord) {
                // case-insensitive matching. accent-insensitive matching
                if (strtolower(str_replace($this->specialChars, $this->specialReplaces, $word)) ==
                    strtolower(str_replace($this->specialChars, $this->specialReplaces, $snippetWord))) {
                    $replaces['/\b' . preg_quote($snippetWord) . '\b/'] = str_replace('%word%', $snippetWord, $this->highlightTemplate);
                }
            }
        }
        return preg_replace(array_keys($replaces), array_values($replaces), $text);
    }


    public function getSnippet($query, $text)
    {

        $highlight = true;

        $text = str_replace(["\n", "\r"], ' ',$text);
        $text = preg_replace('/\s\s+/', ' ', $text);

        $query = htmlspecialchars($query);
        $text = strip_tags($text);
        $sentences = $this->breakIntoSentences($text);
        $matchedSentences = $this->getMatchedSentences($query, $sentences);
        $result = '';
        $wordCounter = 0;
        $lastKey = key($matchedSentences) - 1;
        foreach ($matchedSentences as $key => $sentence) {
            $wordCounter += str_word_count($sentence, 0, implode('', $this->specialChars));
            if ($wordCounter < $this->maxWords || $result === '') {
                if ($key != $lastKey + 1) {
                    // if this sentence is not the next sentence, add ' ... '
                    $result .= ' ...';
                }
                $result .= ' ' . $sentence;
            }
            $lastKey = $key;
        }
        // Matched text is smaller than [minWords]. Try to add next sentences
        while ($wordCounter < $this->minWords && isset($sentences[$lastKey + 1]) && str_word_count($sentences[$lastKey + 1], 0, implode('', $this->specialChars)) + $wordCounter < $this->maxWords) {
            $result .= ' ' . $sentences[$lastKey + 1];
            $wordCounter += str_word_count($sentences[$lastKey + 1], 0, implode('', $this->specialChars));
            $lastKey++;
        }
        // Matched text is possibly still to small. Try to add sentences before the first sentence
        $firstKey = key($matchedSentences);
        while ($wordCounter < $this->minWords && isset($sentences[$firstKey - 1]) && str_word_count($sentences[$firstKey - 1], 0, implode('', $this->specialChars)) + $wordCounter < $this->maxWords) {
            // add this sentence before the current result
            $result = $sentences[$firstKey - 1] . ' ' . $result;
            $wordCounter += str_word_count($sentences[$firstKey - 1], 0, implode('', $this->specialChars));
            $firstKey--;
        }
        if ($highlight === true) {
            return $this->highlightMatches($query, trim($result));
        }
        return trim($result);
    }


}