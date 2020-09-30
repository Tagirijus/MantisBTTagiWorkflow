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


// summary linked style

if (gpc_isset('summary_linked_style')) {
	plugin_config_set( 'summary_linked_style', gpc_get_string('summary_linked_style') );
}






form_security_purge( 'plugin_MantisBTTagiWorkflow_config_edit' );

print_successful_redirect( plugin_page( 'config', true ) );
