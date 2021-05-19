<?php

namespace Nemundo\App\Mail\Scheduler;


use Nemundo\App\Mail\Config\MailConfigLoader;
use Nemundo\App\Mail\Data\MailQueue\MailQueueReader;
use Nemundo\App\Mail\Data\MailQueue\MailQueueUpdate;
use Nemundo\App\Mail\Message\SmtpMailMessage;
use Nemundo\App\Scheduler\Job\AbstractScheduler;
use Nemundo\Core\Type\DateTime\DateTime;

class MailQueueScheduler extends AbstractScheduler
{

    protected function loadScheduler()
    {
        $this->overrideSetting = false;
        $this->active = false;
        $this->minute = 1;
        $this->scriptName = 'mail-queue-send';
        $this->description='Send the mails in the queue';
        $this->consoleScript = true;
    }


    public function run()
    {

        (new MailConfigLoader())->loadConfig();

        $reader = new MailQueueReader();
        $reader->filter->andEqual($reader->model->send, false);

        foreach ($reader->getData() as $queueRow) {

            $mail = new SmtpMailMessage();
            $mail->addTo($queueRow->mailTo);
            $mail->subject = $queueRow->subject;
            $mail->text = $queueRow->text;
            $mail->sendMail();

            $update = new MailQueueUpdate();
            $update->send = true;
            $update->dateTimeSend = (new DateTime())->setNow();
            $update->updateById($queueRow->id);

        }

    }

}