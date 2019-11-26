<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.2
 */
class Buyer extends \Core\Model
{

    public static function readBuyers()
    {
        $db = static::getDB();
        $query = $db->query('SELECT * FROM buyers ORDER BY id DESC');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
