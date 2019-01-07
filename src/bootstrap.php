<?php
/**
 * Bootstrap WPAcceptance
 *
 * @package  wpacceptance
 */

namespace WPAcceptance;

use \Symfony\Component\Console\Application;

$app = new Application( 'WPAcceptance', '0.10.0' );

define( 'WPACCEPTANCE_DIR', dirname( __DIR__ ) );

/**
 * Attempt to set this as WPAcceptance can consume a lot of memory.
 */
ini_set( 'memory_limit', '-1' );

if ( GitLab::get()->isGitLab() ) {
	putenv( 'WPSNAPSHOTS_DIR=' . GitLab::get()->getSnapshotsDirectory() );
}

/**
 * Register commands
 */
$app->add( new Command\Init() );
$app->add( new Command\Run() );
$app->add( new Command\Destroy() );

$app->run();
