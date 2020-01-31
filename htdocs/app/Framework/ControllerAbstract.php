<?php

namespace app\Framework;

abstract class ControllerAbstract implements ControllerInterface
{
    private $template;
    private $header;
    private $footer;

    public function render()
    {
        require($this->header);
        require($this->template);
        require($this->footer);

    }

    public function loadLayout($template){
        $this->header = TEMPLATE_DIR . '/header.phtml';
        $this->template = TEMPLATE_DIR . '/' .$template;
        $this->footer = TEMPLATE_DIR . '/footer.phtml';


    }

    public function getHeader()
    {
        return $this->header;
    }

    public function getTemplate()
    {
        return $this->template;
    }

    public function getFooter()
    {
        return $this->footer;
    }

}