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
