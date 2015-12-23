	<?php get_header(); ?>

	</header>
	<!--///////////////////////////////////// MAIN-->
	<section id="clan" class="clan">
		<header class="grid grid-pad">
			<nav>
				<a href="/home-feed/">Home</a>
				<a href="/clan/">Clan</a>
				<a href="/groups/">Groups</a>
				<a href="<?php echo wp_logout_url( site_url('/index/') ); ?>">Logout</a>
			</nav>
		</header>

		<div class="grid grid-pad">
			<div class="col-1">
				<div class="module clan-wrapper">
					<h1>Clan Members</h1>
					<div class="clan-feed">
						<?php if ( bp_has_members( bp_ajax_querystring( 'members' ) ) ) : ?>
						 
						  <?php do_action( 'bp_before_directory_members_list' ); ?>
						 
						  <ul id="members-list" class="item-list" role="main">
						 
						  <?php while ( bp_members() ) : bp_the_member(); ?>
						 
						    <li>
						      <div class="item-avatar">
						         <a href="<?php bp_member_permalink(); ?>">
						         		<?php bp_member_avatar( 'type=full&width=' . bp_core_avatar_full_width() . '&height=' . bp_core_avatar_full_height() ); ?>
						         </a>
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
				</div>
			</div>
	</section>
</div>
<?php get_footer(); ?>