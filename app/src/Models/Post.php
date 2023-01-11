<?php

declare(strict_types=1);

namespace App\Models;

use Core\Model;
use PDO;

class Post extends Model
{
    /**
     * Get all the posts as an associative array.
     * 
     * @return array
     */
    public static function getAllPosts(): array
    {
        $db = static::getDb();

        $stmt = $db->query('SELECT id, title, content FROM posts ORDER BY created_at');
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return $posts;
    }
}