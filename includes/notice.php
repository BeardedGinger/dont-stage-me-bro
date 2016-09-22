<?php
/**
 * Builds the notices and displays them on the WP Engine staging screen
 *
 * @since       0.1.0
 * @package     dont-stage-me-bro
 * @subpackage  dont-stage-me-bro/includes
 * @author      Josh Mallard <josh@limecuda.com>
 */

namespace LC_Dont_Stage_Me\Notice;

class Notice {

	/**
	 * Instance of this class
	 *
	 * @since     0.1.0
	 * @var       $instance
	 */
	protected static $instance;

	/**
	 * Used for getting an instance of this class
	 *
	 * @since     0.1.0
	 */
	public static function instance() {

		if ( empty( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;

	}

	/**
	 * The output for the stage me/don't stage me notice.
	 *
	 * @since     0.1.0
	 */
	public function output_notice() {
		?>

			<div id="lc-stage-notice">
				<p style="display:inline-block;font-weight:bold;"></p>
				<span id="lc-stage-status-trigger" class="button" style="float:right;margin-top:3px">Change Staging Status</span>
			</div>

		<?php
	}

	/**
	 * Notice text when it is okay to create a new staging site.
	 *
	 * @since     0.1.0
	 * @return    string   The text to display when it is okay to create a new staging
	 *                     site for this install.
	 */
	public function stage_me_notice() {

		$notice = __( "Stage me bro. It's cool", 'lc-stage-me' );
		return apply_filters( 'lc_stage_me_notice', $notice );

	}

	/**
	 * Notice text when it is NOT okay to create a new staging site.
	 *
	 * @since     0.1.0
	 * @return    string   The text to display when it is NOT okay to create a new
	 *                     staging site for this install.
	 */
	public function dont_stage_me_notice() {

		$notice = __( "HEY! Don't Stage Me BRO!", 'lc-stage-me' );
		return apply_filters( 'lc_dont_stage_me_notice', $notice );

	}
}
