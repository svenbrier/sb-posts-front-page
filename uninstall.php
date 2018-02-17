<?php
declare( strict_types=1 );

namespace SbPostsFrontPage;

require_once __DIR__ . '/includes/Admin.php';

$admin = new Admin( __FILE__ );
$admin->uninstallPlugin();