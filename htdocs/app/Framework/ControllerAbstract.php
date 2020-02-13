<?php
namespace App\Framework;

use mysql_xdevapi\Exception;

abstract class ControllerAbstract implements ControllerInterface {
    const FOOTER = 'footer.phtml';
    const HEADER = 'header.phtml';

    private $header;
    private $body;
    private $footer;

    private $error;

    private $css = [];
    private $js = [];

    public function __construct(){
        if(!$this->checkMethod()){
            throw new \Exception('La méthode d\'accés n\'est pas correcte');
        }
    }

    /**
     * Permet de lancer le rendu de la page à afficher
     */
    public function render(){
        require(TEMPLATE_DIR . $this->getHeader());
        require(TEMPLATE_DIR . $this->getBody());
        require(TEMPLATE_DIR . $this->getFooter());
    }

    /**
     * Permet de charger le template de la page
     *
     * @param $template
     * @return $this
     */
    public function loadLayout($template){
        $this->setHeader(self::HEADER);
        $this->setBody($template);
        $this->setFooter(self::FOOTER);
        $this->addCss('style.css');
        $this->addJs('script.js');
        return $this;
    }

    public function checkMethod(){
        return true;
    }

    /**
     * @return mixed
     */
    public function getHeader(){
        return $this->header;
    }

    /**
     * @param $header
     * @return $this
     */
    public function setHeader($header){
        $this->header = $header;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param $body
     * @return $this
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * @param $footer
     * @return $this
     */
    public function setFooter($footer)
    {
        $this->footer = $footer;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param mixed $error
     * @return $this
     */
    public function setError($error)
    {
        $this->error = $error;
        return $this;
    }

    public function getCss(){
        return $this->css;
    }

    public function getJs(){
        return $this->js;
    }

    public function addCss($css){
        array_push($this->css, $css);
    }

    public function addJs($js){
        array_push($this->js, $js);
    }
}