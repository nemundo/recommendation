<?php


namespace Nemundo\App\Application\Reset;


use Nemundo\App\Application\Data\Application\ApplicationDelete;
use Nemundo\App\Application\Data\Application\ApplicationUpdate;
use Nemundo\Project\Reset\AbstractReset;

class ApplicationReset extends AbstractReset
{

    public function reset()
    {

        $update = new ApplicationUpdate();
        $update->setupStatus = false;
        $update->update();

    }

    public function remove()
    {

        $delete = new ApplicationDelete();
        $delete->filter->andEqual($delete->model->setupStatus, false);
        $delete->delete();

    }

}