<?php
/**
 * Restrictly PSR-4 Autoloader.
 *
 * @package Restrictly
 * @since 0.1.0
 */

defined( 'ABSPATH' ) || exit;

spl_autoload_register(
    function ( string $class ): void {

        $prefix   = 'Restrictly\\';
        $base_dir = __DIR__ . '/';

        // Bail if not our namespace.
        if ( 0 !== strpos( $class, $prefix ) ) {
            return;
        }

        // Remove namespace prefix.
        $relative_class = substr( $class, strlen( $prefix ) );

        // Convert namespace to path.
        $file = $base_dir . str_replace( '\\', '/', $relative_class ) . '.php';

        if ( file_exists( $file ) ) {
            require_once $file;
        }
    }
);
