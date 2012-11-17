Open Inviter Invite Friends
============================

This plugin is a fusion of Curverider's Invitefriends Plugin and Invite Friends module from Openinviter API. 
You can, in the same form, invite your friends in the old way, typing one e-mail per line, or invite your friends using Openinviter API.

Features:
---------

- Invite messages uses the same layout from original invitefriends plugins.
- Send invite codes in the message. (Allow mutual friendships in registration).
- Multilanguage support. (English and Brazilian Portuguese in the package).
- Only two files were changed. Future upgrades will be easier.

Installing:
-----------

Unzip the plugin in the "mod" folder, download the latest version of Openinviter API from http://openinviter.com/download.php and unzip in the `\vendor\openinviter` folder.  

Configuring:
------------

Disable the original Invitefriends plugin. Edit the file \vendor\openinviter\config.php like the example below. You will need a User Name and Private Key. You can get it registering in openinviter.com website.

Example:

    <?php
    $openinviter_settings=array(       
		"username"=>"YourUserName", //Your login in the openinviter website.    
		"private_key"=>"YourPrivateKey", //Your private key.       
		"cookie_path"=>'/home/admin/tmp', //Path to store cookies and plugin cache.       
		"message_body"=>" "       
		"message_subject"=>" "       
		"transport"=>"curl", //You can use wget too       
		"local_debug"=>"on_error",       
		"remote_debug"=>FALSE,       
		"hosted"=>FALSE,       
		"proxies"=>array(),       
		"stats"=>TRUE,       
		"plugins_cache_time"=>1800,       
		"plugins_cache_file"=>"oi_plugins.php", //Plugin cache filename.       
		"update_files"=>false,       
		"stats_user"=>"", //Required to access the stats       
		"stats_password"=>"" //Required to access the stats    );   
	?>

Final notes:
------------

This plugin was writen from scratch, merging a elgg plugin and a openinviter api example. Only one file from original Invitefriends plugin was changed: `\views\default\oi_invitefriends\form.php`. 

I added the line 

> `include($CONFIG->pluginspath . "oi_invitefriends/oi_invitefriends.php");` 

This will make future upgrades easier.

The code responsible to send invites through Openvintier API is a "elggfied" version of example.php, supllied in the package.

I will use in the plugin the version numbering from Openinviter API. So, this plugin starts with 1.9.4.0 (Openinviter 1.9.4, minor release 0)

I am using in a production enviroment, but I am a C# developer, not a PHP developer, so be careful. :)

If you like it, recommend it! Recommending, you don´t help me: you help the community, showing the best rated plugins and saving hours for new users.
