<?php
/**
 * BuddyPress - Members Home
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>
<!--section wrap added by Tyler-->
<section class="member-profile">
	<header class="grid grid-pad">
		<nav>
			<a href="/home-feed/">Home</a>
			<a href="/clan/">Clan</a>
			<a href="/groups/">Groups</a>
			<a href="<?php echo wp_logout_url( site_url('/index/') ); ?>">Logout</a>
		</nav>
	</header>
	<div id="buddypress">
		

		<?php

		/**
		 * Fires before the display of member home content.
		 *
		 * @since 1.2.0
		 */
		do_action( 'bp_before_member_home_content' ); ?>

		<div id="item-header" role="complementary" class="grid grid-pad">

			<?php
			/**
			 * If the cover image feature is enabled, use a specific header
			 */
			if ( bp_displayed_user_use_cover_image_header() ) :
				bp_get_template_part( 'members/single/cover-image-header' );
			else :
				bp_get_template_part( 'members/single/member-header' );
			endif;
			?>

		</div><!-- #item-header -->

		<div id="item-body">

			<?php

			/**
			 * Fires before the display of member body content.
			 *
			 * @since 1.2.0
			 */
			do_action( 'bp_before_member_body' );

			if ( bp_is_user_activity() || !bp_current_component() ) :
				bp_get_template_part( 'members/single/activity' );

			elseif ( bp_is_user_blogs() ) :
				bp_get_template_part( 'members/single/blogs'    );

			elseif ( bp_is_user_friends() ) :
				bp_get_template_part( 'members/single/friends'  );

			elseif ( bp_is_user_groups() ) :
				bp_get_template_part( 'members/single/groups'   );

			elseif ( bp_is_user_messages() ) :
				bp_get_template_part( 'members/single/messages' );

			elseif ( bp_is_user_profile() ) :
				bp_get_template_part( 'members/single/profile'  );

			elseif ( bp_is_user_forums() ) :
				bp_get_template_part( 'members/single/forums'   );

			elseif ( bp_is_user_notifications() ) :
				bp_get_template_part( 'members/single/notifications' );

			elseif ( bp_is_user_settings() ) :
				bp_get_template_part( 'members/single/settings' );

			// If nothing sticks, load a generic template
			else :
				bp_get_template_part( 'members/single/plugins'  );

			endif;

			/**
			 * Fires after the display of member body content.
			 *
			 * @since 1.2.0
			 */
			do_action( 'bp_after_member_body' ); ?>

		</div><!-- #item-body -->

		<?php

		/**
		 * Fires after the display of member home content.
		 *
		 * @since 1.2.0
		 */
		do_action( 'bp_after_member_home_content' ); ?>

	</div><!-- #buddypress -->
</section>
