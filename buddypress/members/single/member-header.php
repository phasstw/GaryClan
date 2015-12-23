<?php
/**
 * BuddyPress - Users Header
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<?php

/**
 * Fires before the display of a member's header.
 *
 * @since 1.2.0
 */
do_action( 'bp_before_member_header' ); ?>
<div id="item-header-avatar">
	<a href="<?php bp_displayed_user_link(); ?>">

		<?php bp_displayed_user_avatar( 'type=full' ); ?>

	</a>
</div><!-- #item-header-avatar -->

<div id="item-header-content">

	<?php if ( bp_is_active( 'activity' ) && bp_activity_do_mentions() ) : ?>
		<h2 class="user-nicename">@<?php bp_displayed_user_mentionname(); ?></h2>
	<?php endif; ?>

	<span class="activity"><?php bp_last_activity( bp_displayed_user_id() ); ?></span>

	<?php

	/**
	 * Fires before the display of the member's header meta.
	 *
	 * @since 1.2.0
	 */
	do_action( 'bp_before_member_header_meta' ); ?>

	

</div><!-- #item-header-content -->

<?php

/**
 * Fires after the display of a member's header.
 *
 * @since 1.2.0
 */
do_action( 'bp_after_member_header' ); ?>

<?php

/** This action is documented in bp-templates/bp-legacy/buddypress/activity/index.php */
do_action( 'template_notices' ); ?>
