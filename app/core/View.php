<?php

declare(strict_types=1);

namespace Core;

use Exception;

/**
 * View
 * 
 * PHP version 8.2.1
 */
class View
{
    /**
     * Render a view file
     * 
     * @param string $view The view file
     * 
     * @return void
     */
    public static function render($view, $args = []): void
    {
        extract($args, EXTR_SKIP);

        $file = "../src/Views/$view";

        if (is_readable($file)) {
            require($file);
        } else {
            throw new Exception("$file not found");
        }
    }

    /**
     * Render a view template using Twig
     *
     * @param string $template The template file
     * @param array $args Associative array of data to display in the view (optional)
     * 
     * @return void
     */
    public static function renderTemplate($template, $args = []): void
    {
        static $twig = null;
        if (is_null($twig)) {
            $loader = new \Twig\Loader\FilesystemLoader( __DIR__ . '/../src/Views');
            $twig = new \Twig\Environment($loader, [
                'cache' => __DIR__ . '/../cache',
                'debug' => true
            ]);
        }
        echo $twig->render($template, $args);
    }

}