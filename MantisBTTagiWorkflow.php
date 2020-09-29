<?php

class MantisBTTagiWorkflowPlugin extends MantisPlugin {

  function register() {
    $this->name        = 'MantisBT Tagi Workflow';
    $this->description = 'Some tweaks for MantisBT to fit my workflow without modifying core files.';

    $this->version     = '1.0';
    $this->requires    = array(
      'MantisCore'       => '2.0.0',
    );

    $this->author      = 'Manuel Senfft';
    $this->contact     = 'info@tagirijus.de';
    $this->url         = 'http://www.tagirijus.de';
  }

  function hooks() {
    return array(
        'EVENT_LAYOUT_RESOURCES' => 'add_css'
    );
  }

  function add_css($p_event) {
      echo '<link rel="stylesheet" type="text/css" href="' . plugin_file('DarkTheme.css') . '" />' . "\n";
  }

}