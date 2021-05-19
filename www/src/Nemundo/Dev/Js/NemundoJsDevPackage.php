<?php


namespace Nemundo\Dev\Js;


class NemundoJsDevPackage extends AbstractJsPackage
{

    protected function loadPackage()
    {

        $this->basePath = 'C:\git\framework\js\\';
        $this->baseUrl = '/framework/js/';

        $this->addJs('Debug/Debug.js');
        $this->addJs('Config/WebConfig.js');
        $this->addJs('Timer/Timer.js');
        $this->addJs('Timer/Delay.js');
        $this->addJs('Document/Document.js');
        $this->addJs('Base/Base.js');
        $this->addJs('Base/Content.js');
        $this->addJs('Content/Div.js');
        $this->addJs('Content/Paragraph.js');
        $this->addJs('Content/Span.js');
        $this->addJs('Hyperlink/Hyperlink.js');
        $this->addJs('Form/Base.js');
        $this->addJs('Form/Label.js');
        $this->addJs('Form/Button.js');
        $this->addJs('Form/Form.js');
        $this->addJs('Form/Input.js');
        $this->addJs('Form/TextInput.js');
        $this->addJs('Form/FileInput.js');
        $this->addJs('Form/RangeInput.js');
        $this->addJs('Form/Checkbox.js');
        $this->addJs('Form/Textarea.js');
        $this->addJs('Form/Select.js');
        $this->addJs('Image/Image.js');
        $this->addJs('Listing/UnorderedList.js');
        $this->addJs('Table/Table.js');
        $this->addJs('Table/Td.js');
        $this->addJs('Table/TableHeader.js');
        $this->addJs('Table/TableRow.js');
        $this->addJs('Title/H1.js');
        $this->addJs('Title/H2.js');
        $this->addJs('Iframe/Iframe.js');
        $this->addJs('Url/UrlParameter.js');
        $this->addJs('Url/UrlBuilder.js');
        $this->addJs('Web/WebRequest.js');

    }

}