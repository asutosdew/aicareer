<?php
/**
 * Authentication Check Guard
 * Ensures only logged-in members can access protected pages
 */

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/helpers.php';

require_auth();
