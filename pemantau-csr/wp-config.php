// Fix REST API issues
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

// Increase memory limit
ini_set('memory_limit', '256M');

// Fix REST API
if (!defined('REST_REQUEST')) {
    define('REST_REQUEST', false);
}
/* That's all, stop editing! */