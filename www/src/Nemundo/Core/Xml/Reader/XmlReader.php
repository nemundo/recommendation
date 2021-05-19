<?php

namespace Nemundo\Core\Xml\Reader;

use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Log\LogMessage;


class XmlReader extends AbstractDataSource
{

    /**
     * @var string
     */
    public $filename;

    /**
     * @var bool
     */
    public $authentication = false;

    /**
     * @var string
     */
    public $user;

    /**
     * @var string
     */
    public $password;


    protected function loadData()
    {

        if (!$this->checkProperty('filename')) {
            return;
        }

        if (!$this->loaded) {

            $option = array();
            if ($this->authentication) {
                $option = array(
                    'http' => array(
                        'method' => "GET",
                        'header' => "Authorization: Basic " . base64_encode($this->user . ':' . $this->password)
                    )
                );
            } else {
                $option = array(
                    'http' => array(
                        'header' => 'Accept: application/xml'
                    )
                );
            }

            $context = stream_context_create($option);

            $fp = @fopen($this->filename, 'r', false, $context);

            // Error Handling
            if (!$fp) {
                (new LogMessage())->writeError('Error: Konnte ' . $this->filename . ' nicht öffenen');
                (new LogMessage())->writeError(error_get_last()['message']);

                return;
            }

            $xmlstring = stream_get_contents($fp);
            fclose($fp);

            $xml = simplexml_load_string($xmlstring, 'SimpleXMLElement', LIBXML_NOCDATA);
            $json = json_encode($xml);
            $this->list = json_decode($json, true);

        }

    }

}
