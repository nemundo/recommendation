<?php


namespace Nemundo\Project\Reset;


use Nemundo\App\Application\Reset\ApplicationReset;
use Nemundo\App\Scheduler\Reset\SchedulerReset;
use Nemundo\App\Script\Reset\ScriptReset;
use Nemundo\User\Reset\UsergroupReset;

class ProjectReset extends AbstractReset
{

    /**
     * @var AbstractReset[]
     */
    private static $resetList = [];


    public function __construct()
    {


        $this->addReset(new ApplicationReset());
        $this->addReset(new ScriptReset());
        $this->addReset(new SchedulerReset());
        $this->addReset(new UsergroupReset());

    }


    public function addReset(AbstractReset $reset)
    {

        ProjectReset::$resetList[] = $reset;
        return $this;

    }


    public function reset()
    {

        foreach (ProjectReset::$resetList as $reset) {
            $reset->reset();
        }

    }


    public function remove()
    {

        foreach (ProjectReset::$resetList as $reset) {
            $reset->remove();
        }

    }


}