<?php

form_security_validate( 'plugin_MantisBTTagiWorkflow_config_edit' );

auth_reauthenticate( );
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );



// menu point: projects

if (gpc_isset('menu_projects')) {
	plugin_config_set( 'menu_projects', 1 );
} else {
	plugin_config_set( 'menu_projects', 0 );
}



// redirect report bug

if (gpc_isset('redirect_report_bug')) {
	plugin_config_set( 'redirect_report_bug', 1 );
} else {
	plugin_config_set( 'redirect_report_bug', 0 );
}



// redirect update bug

if (gpc_isset('redirect_update_bug')) {
	plugin_config_set( 'redirect_update_bug', 1 );
} else {
	plugin_config_set( 'redirect_update_bug', 0 );
}





// auto status

if (gpc_isset('auto_status')) {
	plugin_config_set( 'auto_status', 1 );
} else {
	plugin_config_set( 'auto_status', 0 );
}




// summary linked

if (gpc_isset('summary_linked')) {
	plugin_config_set( 'summary_linked', 1 );
} else {
	plugin_config_set( 'summary_linked', 0 );
}


// summary linked to bugnotes

if (gpc_isset('summary_linked_tobugnotes')) {
	plugin_config_set( 'summary_linked_tobugnotes', 1 );
} else {
	plugin_config_set( 'summary_linked_tobugnotes', 0 );
}


// summary linked style

if (gpc_isset('summary_linked_style')) {
	plugin_config_set( 'summary_linked_style', gpc_get_string('summary_linked_style') );
}


// summary linked caption

if (gpc_isset('summary_linked_caption')) {
	plugin_config_set( 'summary_linked_caption', gpc_get_string('summary_linked_caption') );
}




// category tagi

if (gpc_isset('category_tagi')) {
	plugin_config_set( 'category_tagi', 1 );
} else {
	plugin_config_set( 'category_tagi', 0 );
}


// category tagi style

if (gpc_isset('category_tagi_style')) {
	plugin_config_set( 'category_tagi_style', gpc_get_string('category_tagi_style') );
}


// category tagi caption

if (gpc_isset('category_tagi_caption')) {
	plugin_config_set( 'category_tagi_caption', gpc_get_string('category_tagi_caption') );
}


// category tagi colorize

if (gpc_isset('category_tagi_stylize')) {
	plugin_config_set( 'category_tagi_stylize', 1 );
} else {
	plugin_config_set( 'category_tagi_stylize', 0 );
}



// projecttitle stylize

if (gpc_isset('projecttitle_stylize')) {
	plugin_config_set( 'projecttitle_stylize', 1 );
} else {
	plugin_config_set( 'projecttitle_stylize', 0 );
}

// projecttitle stylize regex

if (gpc_isset('projecttitle_stylize_regex')) {
	plugin_config_set( 'projecttitle_stylize_regex', gpc_get_string('projecttitle_stylize_regex') );
}

// projecttitle stylize style

if (gpc_isset('projecttitle_stylize_style')) {
	plugin_config_set( 'projecttitle_stylize_style', gpc_get_string('projecttitle_stylize_style') );
}



// bugnote audio player add

if (gpc_isset('bugnote_audio')) {
	plugin_config_set( 'bugnote_audio', 1 );
} else {
	plugin_config_set( 'bugnote_audio', 0 );
}

// bugnote audio player add url pattern

if (gpc_isset('bugnote_audio_url_pattern')) {
	plugin_config_set( 'bugnote_audio_url_pattern', gpc_get_string('bugnote_audio_url_pattern') );
}

// bugnote audio player add filename patter

if (gpc_isset('bugnote_audio_file_pattern')) {
	plugin_config_set( 'bugnote_audio_file_pattern', gpc_get_string('bugnote_audio_file_pattern') );
}



// bugnote video player add

if (gpc_isset('bugnote_video')) {
	plugin_config_set( 'bugnote_video', 1 );
} else {
	plugin_config_set( 'bugnote_video', 0 );
}

// bugnote video player add url pattern

if (gpc_isset('bugnote_video_url_pattern')) {
	plugin_config_set( 'bugnote_video_url_pattern', gpc_get_string('bugnote_video_url_pattern') );
}

// bugnote video player add filename patter

if (gpc_isset('bugnote_video_file_pattern')) {
	plugin_config_set( 'bugnote_video_file_pattern', gpc_get_string('bugnote_video_file_pattern') );
}








form_security_purge( 'plugin_MantisBTTagiWorkflow_config_edit' );

print_successful_redirect( plugin_page( 'config', true ) );
