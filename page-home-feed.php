	<?php get_header(); ?>

	</header>
<!--///////////////////////////////////// MAIN-->
	<section id="home-feed" class="home-feed">
		<header class="grid grid-pad">
			<nav>
				<a href="/home-feed/">Home</a>
				<a href="/clan/">Clan</a>
				<a href="/groups/">Groups</a>
				<a href="<?php echo wp_logout_url( site_url('/index/') ); ?>">Logout</a>
			</nav>
		</header>

		<form action="<?php bp_activity_post_form_action(); ?>" method="post" name="whats-new-form" role="complementary" class="grid grid-pad">

			<?php

			/**
			 * Fires before the activity post form.
			 *
			 * @since 1.2.0
			 */
			do_action( 'bp_before_activity_post_form' ); ?>

			<div id="whats-new-avatar">
				<a href="<?php echo bp_loggedin_user_domain(); ?>">
					<?php bp_loggedin_user_avatar(  'type=full&width=' . bp_core_avatar_full_width() . '&height=' . bp_core_avatar_full_height() ); ?>
				</a>
			</div>

			<p class="activity-greeting">
				<?php
					printf( __( "Welcome back, %s", 'buddypress' ), bp_get_user_firstname( bp_get_loggedin_user_fullname() ) );
				?>
			</p>
			

			<?php wp_nonce_field( 'post_update', '_wpnonce_post_update' ); ?>
			<?php

			/**
			 * Fires after the activity post form.
			 *
			 * @since 1.2.0
			 */
			do_action( 'bp_after_activity_post_form' ); ?>

		</form><!-- #whats-new-form -->

		<div class="grid grid-pad">
			<div class="col-2-3">
				<div class="module news-feed-wrapper">
					<h1>Clan News Feed</h1>
					<div class="news-feed">
						<?php
						/**
						 * BuddyPress - Users Activity
						 *
						 * @package BuddyPress
						 * @subpackage bp-legacy
						 */

						?>

						<?php

						/**
						 * Fires before the display of the member activity post form.
						 *
						 * @since 1.2.0
						 */
						do_action( 'bp_before_member_activity_post_form' ); ?>

						<?php
						if ( is_user_logged_in() && bp_is_my_profile() && ( !bp_current_action() || bp_is_current_action( 'just-me' ) ) )
							bp_get_template_part( 'activity/post-form' );

						/**
						 * Fires after the display of the member activity post form.
						 *
						 * @since 1.2.0
						 */
						do_action( 'bp_after_member_activity_post_form' );

						/**
						 * Fires before the display of the member activities list.
						 *
						 * @since 1.2.0
						 */
						do_action( 'bp_before_member_activity_content' ); ?>

						<div class="activity">

							<?php bp_get_template_part( 'activity/activity-loop' ) ?>

						</div><!-- .activity -->

						<?php

						/**
						 * Fires after the display of the member activities list.
						 *
						 * @since 1.2.0
						 */
						do_action( 'bp_after_member_activity_content' ); ?>
					</div>
				</div>
			</div>

			<div class="col-1-3">
				<div class="module friends-list">
					<h1>Clan Members</h1>
					<?php if ( bp_has_members( bp_ajax_querystring( 'members' ) ) ) : ?>
					 
					  <?php do_action( 'bp_before_directory_members_list' ); ?>
					 
					  <ul id="members-list" class="item-list" role="main">
					 
					  <?php while ( bp_members() ) : bp_the_member(); ?>
					 
					    <li>
					      <div class="item-avatar">
					         <a href="<?php bp_member_permalink(); ?>"><?php bp_member_avatar(); ?></a>
					      </div>
					 
					      <div class="item">
					        <div class="item-title">
					           <a href="<?php bp_member_permalink(); ?>"><?php bp_member_name(); ?></a>
					 
					           
					 
					       </div>
					 
					       <div class="item-meta"><span class="activity"><?php bp_member_last_active(); ?></span></div>
					 
					       <?php do_action( 'bp_directory_members_item' ); ?>
					 
					      <?php
					       /***
					        * If you want to show specific profile fields here you can,
					        * but it'll add an extra query for each member in the loop
					        * (only one regardless of the number of fields you show):
					        *
					        * bp_member_profile_data( 'field=the field name' );
					       */
					       ?>
					       </div>
					 
					       <div class="action">
					 
					           <?php do_action( 'bp_directory_members_actions' ); ?>
					 
					      </div>
					 
					      <div class="clear"></div>
					   </li>
					 
					 <?php endwhile; ?>
					 
					 </ul>
					 
					 <?php do_action( 'bp_after_directory_members_list' ); ?>
					 
					 <?php bp_member_hidden_fields(); ?>
					 
					<?php else: ?>
					 
					   <div id="message" class="info">
					      <p><?php _e( "Sorry, no members were found.", 'buddypress' ); ?></p>
					   </div>
					 
					<?php endif; ?>

				</div>











				<div class="module groups">
					<h1>Groups</h1>
					<?php if ( bp_has_groups() ) : ?>
					    <ul id="groups-list" class="item-list">
					    <?php while ( bp_groups() ) : bp_the_group(); ?>
					        <li>
					            
					            <div class="item">
					                <div class="item-title"><a href="<?php bp_group_permalink() ?>"><?php bp_group_name() ?></a></div>
					                <?php do_action( 'bp_directory_groups_item' ) ?>
					            </div>
					            <div class="clear"></div>
					        </li>
					    <?php endwhile; ?>
					    </ul>
					    <?php do_action( 'bp_after_groups_loop' ) ?>
					<?php else: ?>
					    <div id="message" class="info">
					        <p><?php _e( 'There were no groups found.', 'buddypress' ) ?></p>
					    </div>
					<?php endif; ?>		
				</div>
				<div class="module donate">
					<h1>Support the Clan</h1>
					<p>Donations go towards paying for webhosting, site maintenance, minecraft server hosting, and McDonald's for Gary</p>
					<?php echo do_shortcode('[give_form id="38"]'); ?>
				</div>
			</div>
		</div>
	</section>
</div>
<?php get_footer(); ?>