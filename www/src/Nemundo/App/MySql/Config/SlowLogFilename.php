<?php


namespace Nemundo\App\MySql\Config;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Db\Provider\MySql\Information\MySqlVariable;

class SlowLogFilename extends AbstractBase
{

    public function getFilename()
    {

        $datadir = (new MySqlVariable())->getValue('datadir');
        $filename = (new MySqlVariable())->getValue('slow_query_log_file');
        $fullFilename = $datadir . $filename;

        return $fullFilename;

    }

}