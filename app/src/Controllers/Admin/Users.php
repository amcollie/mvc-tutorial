<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use Core\Controller;

class Users extends Controller
{
    /**
     * Before filter - called before an action method.
     *
     * @return void
     */
    protected function before()
    {
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function index(): void
    {
        echo 'User admin index';
    }

    /**
     * After filter - called after an action method.
     *
     * @return void
     */
    protected function after()
    {
    }
}