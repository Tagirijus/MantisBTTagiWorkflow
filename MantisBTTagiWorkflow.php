<?php


class MantisBTTagiWorkflowPlugin extends MantisPlugin {

  function register() {
    $this->name        = 'MantisBT Tagi Workflow';
    $this->description = 'Some tweaks for MantisBT to fit my workflow without modifying core files.';
    $this->page = 'config';

    $this->version     = '1.0';
    $this->requires    = array(
      'MantisCore'       => '2.0.0',
    );

    $this->author      = 'Manuel Senfft';
    $this->contact     = 'info@tagirijus.de';
    $this->url         = 'https://www.tagirijus.de';
  }

  function config( ) {
    return array(
      'menu_projects' => 1,
      'redirect_report_bug' => 1,
    );
  }

  function hooks() {
    $hooks = parent::hooks();

    $hooks['EVENT_MENU_MAIN'] = 'modify_menu';
    $hooks['EVENT_REPORT_BUG'] = 'redirect_report_bug';

    return $hooks;
  }

  function modify_menu($p_event, $p_menu) {
    if ( plugin_config_get( 'menu_projects' ) ) {
      return [[
        'url' => 'manage_proj_page.php?sort=enabled&dir=DESC',
        'title' => plugin_lang_get('menu_projects_title'),
        'icon' => 'fa-gear'
      ]];
    }
  }

  function redirect_report_bug($p_event)
  {
    if ( plugin_config_get( 'redirect_report_bug' ) ) {
      print_successful_redirect('view_all_bug_page.php');
    }
  }

}