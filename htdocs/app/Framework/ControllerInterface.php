<?php
namespace App\Framework;

interface ControllerInterface {
    /**
     * Permet de lancer le rendu de la page à afficher
     *
     * @return mixed
     */
    public function render();

    /**
     * Permet de charger le template de la page
     *
     * @param $template
     * @return mixed
     */
    public function loadLayout($template);
}