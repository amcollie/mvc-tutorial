<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Post;
use Core\Controller;
use Core\View;

class Posts extends Controller
{
    /**
     * Show the index page
     * 
     * @return void
     */
    public function indexAction(): void
    {
        $posts = Post::getAllPosts();
        View::renderTemplate('Posts/index.twig', compact('posts'));
    }

    /**
     * Show the add new page
     * 
     * @return void
     */
    public function addNewAction(): void
    {
        echo 'Hello from the addNew action in the Posts controller!';
    }

    /**
     * Show the edit page
     *
     * @return void
     */
    public function editAction(): void
    {
        echo 'Hello from the edit action in the Posts controller!';
        echo '<br>';
        echo '<p>Route parameters: <pre>'. htmlspecialchars(print_r($this->routeParams, true)). '</pre>';
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