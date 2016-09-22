<?php
/**
 * Enqueues all the assets that are used for our Plugin
 *
 * @since       0.1.0
 * @package     dont-stage-me-bro
 * @subpackage  dont-stage-me-bro/includes
 * @author      Josh Mallard <josh@limecuda.com>
 */

namespace LC_Dont_Stage_Me\Assets;

class Assets {

	/**
	 * The constructor for this class.
	 *
	 * @since     0.1.0
	 */
	public function __construct() {

		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );

	}

	/**
	 * Enqueue the admin scripts for our plugin.
	 *
	 * @since     0.1.0
	 */
	public function admin_scripts() {

		if ( lc_is_staging_screen() ) {

			wp_enqueue_script( 'dont-stage-me-bro', LC_DONT_STAGE_ME_BASE . 'assets/main.js' );
			wp_localize_script( 'dont-stage-me-bro', 'LC_STAGE_ME', array(
				'currentState' => get_option( 'lc_stage_me_status' ),
				'stage'        => \LC_Dont_Stage_Me\Notice\Notice::instance()->stage_me_notice(),
				'dontStage'    => \LC_Dont_Stage_Me\Notice\Notice::instance()->dont_stage_me_notice(),
				'nonce'        => wp_create_nonce( 'lc_stage_me_nonce' ),
			) );

		}

	}
}

new Assets();
