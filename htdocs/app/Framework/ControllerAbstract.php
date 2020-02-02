<?php

namespace app\Framework;

abstract class ControllerAbstract implements ControllerInterface
{

    private $css = [];


    private $js = [];
    /**
     * @var
     */
    private $template;
    /**
     * @var
     */
    private $header;
    /**
     * @var
     */
    private $footer;

    private $error;

    /**
     * function render
     */
    public function render()
    {
        require($this->header);
        require($this->template);
        require($this->footer);

    }

    public function loadLayout($template)
    {

        $this->addCss("style.css");
        $this->addJs("main.js");

        $this->header = TEMPLATE_DIR . '/header.phtml';
        $this->template = TEMPLATE_DIR . '/' . $template;
        $this->footer = TEMPLATE_DIR . '/footer.phtml';



    }

    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @return mixed
     */
    public function getFooter()
    {
        return $this->footer;
    }

    public function addCss($css)
    {
        array_push($this->css,$css);
        //$this->css[0]="app/htdocs/css/style.css";
    }

    public function addJs($js)
    {
        array_push($this->js,$js);
    }

    public function getCss()
    {
        return $this->css;
    }

    public function getJs()
    {
        return $this->js;
    }

    public function getError()
    {
        return $this->error;
    }

    public function setError($error)
    {
        $this->error = $error;
        return $this;
    }

}
