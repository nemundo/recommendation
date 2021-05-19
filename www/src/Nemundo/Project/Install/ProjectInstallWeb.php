<?php


namespace Nemundo\Project\Install;


use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Http\Request\Get\GetRequest;
use Nemundo\Html\Document\HtmlDocument;
use Nemundo\Html\Form\Button\SubmitButton;
use Nemundo\Html\Form\Form;
use Nemundo\Html\Form\FormMethod;
use Nemundo\Html\Form\Input\TextInput;
use Nemundo\Html\Heading\H1;
use Nemundo\Html\Paragraph\Paragraph;

class ProjectInstallWeb extends AbstractBase
{

    /**
     * @var string
     */
    public $installPassword;

    /**
     * @var AbstractInstall
     */
    public $install;


    public function startWeb()
    {

        $request = new GetRequest('pwd');
        if ($request->hasValue()) {

            if ($request->getValue() == $this->installPassword) {

                $this->install->install();
                (new Debug())->write('Install finished');

            } else {
                (new Debug())->write('Wrong Install Password');
            }

        } else {


            $html = new HtmlDocument();
            $html->title = 'Install';

            $h1 = new H1($html);
            $h1->content = 'Install';

            $form = new Form($html);
            $form->formMethod = FormMethod::GET;

            $p = new Paragraph($form);
            $p->content = 'Install Password';

            $input = new TextInput($form);
            $input->name = 'pwd';

            new SubmitButton($form);

            $html->render();

        }

    }

}