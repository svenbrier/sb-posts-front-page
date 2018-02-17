<?php

namespace SbPostsFrontPage;


class Admin {

	private const SLUG = 'sb-posts-front-page';
	private const OPTIONGROUP = 'sb-pfp-plugin-settings-group';
	private $file;

	public const OPTIONNAME = 'sb-pfp-posts-front-page';

	public function __construct( string $file ) {
		$this->file = $file;
	}

	public function loadTextdomain() {
		load_plugin_textdomain( self::SLUG, false, dirname( plugin_basename( $this->file ) ) . '/languages/' );
	}

	public function createMenu() {
		add_options_page(
			'SB Posts Front Page Settings',
			'SB Posts Front Page',
			'administrator',
			self::SLUG,
			[ $this, 'settingsPage' ]
		);
	}

	public function registerSettings() {
		register_setting( self::OPTIONGROUP, self::OPTIONNAME );
	}

	public function settingsPage() {
		$viewData = [
			'option_group' => self::OPTIONGROUP,
			'option_name'  => self::OPTIONNAME,
		];
		require_once __DIR__ . '/../views/admin.php';
	}

	public function actionWrapper() {
		// create custom plugin settings menu entry
		add_action( 'admin_menu', [ $this, 'createMenu' ] );
		// for translation purposes
		add_action( 'plugins_loaded', [ $this, 'loadTextdomain' ] );
		// call register settings function
		add_action( 'admin_init', [ $this, 'registerSettings' ] );
	}

	public function uninstallPlugin() {
		if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
			die;
		}
		delete_option(self::OPTIONNAME);
		delete_site_option(self::OPTIONNAME);
	}

}

