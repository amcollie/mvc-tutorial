<?php

declare(strict_types=1);

namespace App\Controllers;

use Core\Controller;
use Core\View;

class Home extends Controller
{
    /**
     * Show the index page.
     * 
     * @return void
     */
    public function indexAction(): void
    {
        View::renderTemplate('Home/index.twig', [
            'name' => 'Dave',
            'colours' => ['red', 'green', 'blue']
        ]);
    }

        /**
     * Before filter - called before an action method.
     *
     * @return void
     */
    protected function before()
    {
        // echo "(before) ";
    }

    /**
     * After filter - called after an action method.
     *
     * @return void
     */
    protected function after()
    {
        // echo "(after) ";
    }
}