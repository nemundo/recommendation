<?php


namespace Nemundo\Core\File\Pdf;


use Nemundo\Core\File\AbstractFile;

class PdfFile extends AbstractFile
{

    public function getPdfText()
    {

        $command = "pdftotext $this->filename -";
        $text = shell_exec($command);

        if ($text === null) {
            $text = '';
        }

        return $text;

    }

}