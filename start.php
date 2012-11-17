<?php

/**
 * Elgg invite friends
 *
 * @package ElggInviteFriends
 */

elgg_register_event_handler('init', 'system', 'oi_invitefriends_init');

/**
 * Invite friends initialization
 */
function oi_invitefriends_init() {
	global $CONFIG;

	elgg_register_page_handler('oi_invitefriends', 'oi_invitefriends_page_handler');

	elgg_register_event_handler('pagesetup', 'system', 'oi_invitefriends_menu_setup');

	$action_base = $CONFIG->pluginspath . 'oi_invitefriends/actions';
	elgg_register_action('oi_invitefriends/invite',"$action_base/invite.php");
}

/**
 * Load the invite friends page
 */
function oi_invitefriends_page_handler() {

	gatekeeper();
	
	elgg_set_context('friends');
	elgg_set_page_owner_guid(elgg_get_logged_in_user_guid());
		
	$title = elgg_echo('friends:invite');
	$body = elgg_view('oi_invitefriends/form');
	
	$params = array(
			'content' => $body,
			'title' => $title,
	);
	$body = elgg_view_layout('one_sidebar', $params);
	
	echo elgg_view_page($title, $body);
	
}

/**
 * Add menu item for invite friends
 */
function oi_invitefriends_menu_setup() {
	global $CONFIG;
	if (elgg_in_context('friends')  || elgg_in_context("friendsof") || elgg_in_context("collections")) {
		$url = "{$CONFIG->wwwroot}oi_invitefriends/";
		$item = array('name' => 'invite_friends', 
					  'text' => elgg_echo('friends:invite'), 
					  'href' => $url, 
				      'context' => elgg_get_context(),
					  'section' => 'invite',);
		elgg_register_menu_item('page', $item);
	}
}
