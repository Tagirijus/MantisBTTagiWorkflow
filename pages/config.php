<?php

auth_reauthenticate( );
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );

layout_page_header( plugin_lang_get( 'title' ) );

layout_page_begin( 'manage_overview_page.php' );

print_manage_menu( 'manage_plugin_page.php' );




?>



<div class="col-md-12 col-xs-12">
<div class="space-10"></div>
<div class="form-container" >

<form id="formatting-config-form" action="<?php echo plugin_page( 'config_edit' )?>" method="post">
    <?php echo form_security_field( 'plugin_MantisBTTagiWorkflow_config_edit' ) ?>

<div class="widget-box widget-color-blue2">
<div class="widget-header widget-header-small">
    <h4 class="widget-title lighter">
        <i class="ace-icon fa fa-medkit"></i>
        <?php echo plugin_lang_get( 'title' ) . ': ' . plugin_lang_get( 'config' )?>
    </h4>
</div>
<div class="widget-body">
<div class="widget-main no-padding">
<div class="table-responsive">
<table class="table table-bordered table-condensed table-striped">


<!-- menu point: projects -->
<tr>
	<th class="category">
		<?php echo plugin_lang_get( 'config_menu_modify' )?>
	</th>
	<td class="center exclude_special_fields">
		<div style="width:98%;margin:0 auto;text-align:left;float:none">
			<label><input type="checkbox" name="menu_projects"
				<?php if( plugin_config_get( 'menu_projects' ) ) {
					echo 'checked="checked"';
				}
				?>
				style="margin-bottom:2.1ex;float:left"
				value="1">&nbsp;<?php echo plugin_lang_get( 'menu_projects_title' ) ?></label>
		</div>
	</td>
</tr>


<!-- redirect report bug -->
<tr>
	<th class="category">
		<?php echo plugin_lang_get( 'config_redirect_report_bug' )?>
	</th>
	<td class="center exclude_special_fields">
		<div style="width:98%;margin:0 auto;text-align:left;float:none">
			<label><input type="checkbox" name="redirect_report_bug"
				<?php if( plugin_config_get( 'redirect_report_bug' ) ) {
					echo 'checked="checked"';
				}
				?>
				style="margin-bottom:2.1ex;float:left"
				value="1">&nbsp;<?php echo plugin_lang_get( 'config_enable' ) ?></label>
		</div>
	</td>
</tr>




<!-- redirect update bug -->
<tr>
	<th class="category">
		<?php echo plugin_lang_get( 'config_redirect_update_bug' )?>
	</th>
	<td class="center exclude_special_fields">
		<div style="width:98%;margin:0 auto;text-align:left;float:none">
			<label><input type="checkbox" name="redirect_update_bug"
				<?php if( plugin_config_get( 'redirect_update_bug' ) ) {
					echo 'checked="checked"';
				}
				?>
				style="margin-bottom:2.1ex;float:left"
				value="1">&nbsp;<?php echo plugin_lang_get( 'config_enable' ) ?></label>
		</div>
	</td>
</tr>




<!-- auto status -->
<tr>
	<th class="category">
		<?php echo plugin_lang_get( 'config_auto_status' )?>
	</th>
	<td class="center exclude_special_fields">
		<div style="width:98%;margin:0 auto;text-align:left;float:none">
			<label><input type="checkbox" name="auto_status"
				<?php if( plugin_config_get( 'auto_status' ) ) {
					echo 'checked="checked"';
				}
				?>
				style="margin-bottom:2.1ex;float:left"
				value="1">&nbsp;<?php echo plugin_lang_get( 'config_enable' ) ?></label>
		</div>
	</td>
</tr>




<!-- summary linked -->
<tr>
	<th class="category">
		<?php echo plugin_lang_get( 'config_summary_linked' )?>
	</th>
	<td class="center exclude_special_fields">
		<div style="width:98%;margin:0 auto;text-align:left;float:none">
			<label><input type="checkbox" name="summary_linked"
				<?php if( plugin_config_get( 'summary_linked' ) ) {
					echo 'checked="checked"';
				}
				?>
				style="margin-bottom:2.1ex;float:left"
				value="1">&nbsp;<?php echo plugin_lang_get( 'config_enable' ) ?></label>
		</div>
	</td>
</tr>

<!-- summary linked to bug notes -->
<tr>
	<th class="category">
		<?php echo plugin_lang_get( 'config_summary_linked_tobugnotes' )?>
	</th>
	<td class="center exclude_special_fields">
		<div style="width:98%;margin:0 auto;text-align:left;float:none">
			<label><input type="checkbox" name="summary_linked_tobugnotes"
				<?php if( plugin_config_get( 'summary_linked_tobugnotes' ) ) {
					echo 'checked="checked"';
				}
				?>
				style="margin-bottom:2.1ex;float:left"
				value="1">&nbsp;<?php echo plugin_lang_get( 'config_enable' ) ?></label>
		</div>
	</td>
</tr>

<!-- summary linked style -->
<tr>
	<th class="category">
		<?php echo plugin_lang_get( 'config_summary_linked_style' )?>
	</th>
	<td class="center exclude_special_fields">
		<div style="width:98%;margin:0 auto;text-align:left;float:none">
			<input type="text" name="summary_linked_style"
				style="margin-bottom:2.1ex;float:left"
				value="<?php echo plugin_config_get( 'summary_linked_style' ) ?>">
		</div>
	</td>
</tr>

<!-- summary linked caption -->
<tr>
	<th class="category">
		<?php echo plugin_lang_get( 'config_summary_linked_title_entry' )?>
	</th>
	<td class="center exclude_special_fields">
		<div style="width:98%;margin:0 auto;text-align:left;float:none">
			<input type="text" name="summary_linked_caption"
				style="margin-bottom:2.1ex;float:left"
				value="<?php echo plugin_config_get( 'summary_linked_caption' ) ?>">
		</div>
	</td>
</tr>




<!-- category tagi -->
<tr>
	<th class="category">
		<?php echo plugin_lang_get( 'config_category_tagi' )?>
	</th>
	<td class="center exclude_special_fields">
		<div style="width:98%;margin:0 auto;text-align:left;float:none">
			<label><input type="checkbox" name="category_tagi"
				<?php if( plugin_config_get( 'category_tagi' ) ) {
					echo 'checked="checked"';
				}
				?>
				style="margin-bottom:2.1ex;float:left"
				value="1">&nbsp;<?php echo plugin_lang_get( 'config_enable' ) ?></label>
		</div>
	</td>
</tr>

<!-- category tagi style -->
<tr>
	<th class="category">
		<?php echo plugin_lang_get( 'config_category_tagi_style' )?>
	</th>
	<td class="center exclude_special_fields">
		<div style="width:98%;margin:0 auto;text-align:left;float:none">
			<input type="text" name="category_tagi_style"
				style="margin-bottom:2.1ex;float:left"
				value="<?php echo plugin_config_get( 'category_tagi_style' ) ?>">
		</div>
	</td>
</tr>

<!-- category tagi caption -->
<tr>
	<th class="category">
		<?php echo plugin_lang_get( 'config_category_tagi_title_entry' )?>
	</th>
	<td class="center exclude_special_fields">
		<div style="width:98%;margin:0 auto;text-align:left;float:none">
			<input type="text" name="category_tagi_caption"
				style="margin-bottom:2.1ex;float:left"
				value="<?php echo plugin_config_get( 'category_tagi_caption' ) ?>">
		</div>
	</td>
</tr>

<!-- category tagi colorize -->
<tr>
	<th class="category">
		<?php echo plugin_lang_get( 'config_category_tagi_stylize' )?>
	</th>
	<td class="center exclude_special_fields">
		<div style="width:98%;margin:0 auto;text-align:left;float:none">
			<label><input type="checkbox" name="category_tagi_stylize"
				<?php if( plugin_config_get( 'category_tagi_stylize' ) ) {
					echo 'checked="checked"';
				}
				?>
				style="margin-bottom:2.1ex;float:left"
				value="1">&nbsp;<?php echo plugin_lang_get( 'config_enable' ) ?></label>
		</div>
	</td>
</tr>



<!-- projecttitle stylize -->
<tr>
	<th class="category">
		<?php echo plugin_lang_get( 'config_projecttitle_stylize' )?>
	</th>
	<td class="center exclude_special_fields">
		<div style="width:98%;margin:0 auto;text-align:left;float:none">
			<label><input type="checkbox" name="projecttitle_stylize"
				<?php if( plugin_config_get( 'projecttitle_stylize' ) ) {
					echo 'checked="checked"';
				}
				?>
				style="margin-bottom:2.1ex;float:left"
				value="1">&nbsp;<?php echo plugin_lang_get( 'config_enable' ) ?></label>
		</div>
	</td>
</tr>

<!-- projecttitle stylize regex -->
<tr>
	<th class="category">
		<?php echo plugin_lang_get( 'config_projecttitle_stylize_regex' )?>
	</th>
	<td class="center exclude_special_fields">
		<div style="width:98%;margin:0 auto;text-align:left;float:none">
			<input type="text" name="projecttitle_stylize_regex"
				style="margin-bottom:2.1ex;float:left"
				value="<?php echo plugin_config_get( 'projecttitle_stylize_regex' ) ?>">
		</div>
	</td>
</tr>

<!-- projecttitle stylize style -->
<tr>
	<th class="category">
		<?php echo plugin_lang_get( 'config_projecttitle_stylize_style' )?>
	</th>
	<td class="center exclude_special_fields">
		<div style="width:98%;margin:0 auto;text-align:left;float:none">
			<input type="text" name="projecttitle_stylize_style"
				style="margin-bottom:2.1ex;float:left"
				value="<?php echo plugin_config_get( 'projecttitle_stylize_style' ) ?>">
		</div>
	</td>
</tr>



<!-- bugnote audio player -->
<tr>
	<th class="category">
		<?php echo plugin_lang_get( 'config_bugnote_audio' )?>
	</th>
	<td class="center exclude_special_fields">
		<div style="width:98%;margin:0 auto;text-align:left;float:none">
			<label><input type="checkbox" name="bugnote_audio"
				<?php if( plugin_config_get( 'bugnote_audio' ) ) {
					echo 'checked="checked"';
				}
				?>
				style="margin-bottom:2.1ex;float:left"
				value="1">&nbsp;<?php echo plugin_lang_get( 'config_enable' ) ?></label>
		</div>
	</td>
</tr>

<!-- bugnote audio player url pattern -->
<tr>
	<th class="category">
		<?php echo plugin_lang_get( 'config_bugnote_audio_url_pattern' )?>
	</th>
	<td class="center exclude_special_fields">
		<div style="width:98%;margin:0 auto;text-align:left;float:none">
			<input type="text" name="bugnote_audio_url_pattern"
				style="margin-bottom:2.1ex;float:left"
				value="<?php echo plugin_config_get( 'bugnote_audio_url_pattern' ) ?>">
		</div>
	</td>
</tr>

<!-- bugnote audio player filename pattern -->
<tr>
	<th class="category">
		<?php echo plugin_lang_get( 'config_bugnote_audio_file_pattern' )?>
	</th>
	<td class="center exclude_special_fields">
		<div style="width:98%;margin:0 auto;text-align:left;float:none">
			<input type="text" name="bugnote_audio_file_pattern"
				style="margin-bottom:2.1ex;float:left"
				value="<?php echo plugin_config_get( 'bugnote_audio_file_pattern' ) ?>">
		</div>
	</td>
</tr>



<!-- bugnote video player -->
<tr>
	<th class="category">
		<?php echo plugin_lang_get( 'config_bugnote_video' )?>
	</th>
	<td class="center exclude_special_fields">
		<div style="width:98%;margin:0 auto;text-align:left;float:none">
			<label><input type="checkbox" name="bugnote_video"
				<?php if( plugin_config_get( 'bugnote_video' ) ) {
					echo 'checked="checked"';
				}
				?>
				style="margin-bottom:2.1ex;float:left"
				value="1">&nbsp;<?php echo plugin_lang_get( 'config_enable' ) ?></label>
		</div>
	</td>
</tr>

<!-- bugnote video player url pattern -->
<tr>
	<th class="category">
		<?php echo plugin_lang_get( 'config_bugnote_video_url_pattern' )?>
	</th>
	<td class="center exclude_special_fields">
		<div style="width:98%;margin:0 auto;text-align:left;float:none">
			<input type="text" name="bugnote_video_url_pattern"
				style="margin-bottom:2.1ex;float:left"
				value="<?php echo plugin_config_get( 'bugnote_video_url_pattern' ) ?>">
		</div>
	</td>
</tr>

<!-- bugnote video player filename pattern -->
<tr>
	<th class="category">
		<?php echo plugin_lang_get( 'config_bugnote_video_file_pattern' )?>
	</th>
	<td class="center exclude_special_fields">
		<div style="width:98%;margin:0 auto;text-align:left;float:none">
			<input type="text" name="bugnote_video_file_pattern"
				style="margin-bottom:2.1ex;float:left"
				value="<?php echo plugin_config_get( 'bugnote_video_file_pattern' ) ?>">
		</div>
	</td>
</tr>





</table>
</div>
</div>
    <div class="widget-toolbox padding-8 clearfix">
        <input type="submit" class="btn btn-primary btn-white btn-round" value="<?php echo lang_get( 'change_configuration' )?>" />
    </div>
</div>
</div>
</form>
</div>
</div>


<?php

layout_page_end();
