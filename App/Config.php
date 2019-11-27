<?php

namespace App;

/**
 * Application configuration
 *
 * PHP version 7.2
 */
class Config
{
    /**
     * Side host
     * @var string
     */

    const HOST_URL = 'http://localhost/xpeedstudio-script-mvc/public';

    /**
     * Database host
     * @var string
     */
    const DB_HOST = 'localhost';

    /**
     * Database name
     * @var string
     */
    const DB_NAME = 'xpeed_studio';

    /**
     * Database user
     * @var string
     */
    const DB_USER = 'root';

    /**
     * Database password
     * @var string
     */
    const DB_PASSWORD = '';

    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    const SHOW_ERRORS = true;
}
