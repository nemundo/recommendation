<?php

namespace Nemundo\Core\Http\Response;


abstract class AbstractHttpResponse extends AbstractResponse
{

    /**
     * @var string
     */
    protected $content;

    /**
     * @var string
     */
    protected $contentType = ContentType::HTML;

    /**
     * @var string
     */
    protected $attachmentFilename;


    protected $filesize;


    public function sendResponse()
    {

        header('Content-type: ' . $this->contentType . '; charset=utf-8');

        if ($this->filesize !== null) {
            header('Content-Length: ' . $this->filesize);
        }

        if ($this->attachmentFilename !== null) {
            header('Content-Disposition: attachment; filename="' . $this->attachmentFilename . '"');
        }

        $this->sendStatusCode();

        /*if ($this->content !== null) {
            if (is_array($this->content)) {
                $content = implode(PHP_EOL, $this->content);
            } else {
                $content = $this->content;
            }
            $content = trim($content);
            echo $content;

        }*/

        $content = $this->content;
        echo $content;


    }

}
