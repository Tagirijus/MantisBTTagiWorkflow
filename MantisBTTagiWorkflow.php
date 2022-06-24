<?php


class MantisBTTagiWorkflowPlugin extends MantisPlugin {

  function register() {
    $this->name        = plugin_lang_get('title');
    $this->description = plugin_lang_get('description');
    $this->page = 'config';

    $this->version     = '1.2.0';
    $this->requires    = array(
      'MantisCore'       => '2.0.0',
    );

    $this->author      = 'Manuel Senfft';
    $this->contact     = 'info@tagirijus.de';
    $this->url         = 'https://www.tagirijus.de';
  }

  function init() {
    require_once 'core/classes/TagiColumnSummaryLinked.class.php';
    require_once 'core/classes/TagiColumnCategoryTagi.class.php';
  }

  function config( ) {
    return array(
      'menu_projects' => 1,
      'redirect_report_bug' => 1,
      'redirect_update_bug' => 1,
      'auto_status' => 1,
      'summary_linked' => 1,
      'summary_linked_style' => 'color:#babaff !important;font-weight:bold',
      'summary_linked_caption' => '',
      'summary_linked_tobugnotes' => 1,
      'category_tagi' => 1,
      'category_tagi_style' => 'font-size:.8em;margin:0 3px',
      'category_tagi_caption' => '',
      'category_tagi_stylize' => 1,
      'projecttitle_stylize' => 1,
      'projecttitle_stylize_regex' => '\d\d\d\d-\d\d',
      'projecttitle_stylize_style' => 'margin-right:1em;font-size:.7em;opacity: .5',
      'bugnote_audio' => 1,
      'bugnote_audio_url_pattern' => '/(domain\.com.*\.(mp3|ogg)+)/',
      'bugnote_audio_file_pattern' => '/[^\/]+$/',
      'bugnote_video' => 1,
      'bugnote_video_url_pattern' => '/(domain\.com.*\.(mp4)+)/',
      'bugnote_video_file_pattern' => '/[^\/]+$/'
    );
  }

  function hooks() {
    $hooks = parent::hooks();

    $hooks['EVENT_MENU_MAIN'] = 'modify_menu';
    $hooks['EVENT_REPORT_BUG'] = 'report_bug_link';
    $hooks['EVENT_UPDATE_BUG'] = 'redirect_update_bug';
    $hooks['EVENT_FILTER_COLUMNS'] = 'add_columns';
    $hooks['EVENT_LAYOUT_RESOURCES'] = 'add_resources';
    $hooks['EVENT_LAYOUT_PAGE_FOOTER'] = 'add_resources_footer';
    $hooks['EVENT_DISPLAY_FORMATTED'] = 'modify_formatted';

    return $hooks;
  }

  function modify_formatted($p_event, $p_string, $p_multiline = true)
  {
    $t_string = $p_string;

    if ( plugin_config_get( 'bugnote_audio' ) ) {
      $t_string = $this->bugnote_audio_player_add($t_string);
    }

    if ( plugin_config_get( 'bugnote_video' ) ) {
      $t_string = $this->bugnote_video_player_add($t_string);
    }

    return $t_string;
  }

  function bugnote_audio_player_add($t_string)
  {
    $pattern_url = plugin_config_get( 'bugnote_audio_url_pattern' );
    $pattern_filename = plugin_config_get( 'bugnote_audio_file_pattern' );
    $audio_html = '<a href="https://www.%1$s" target="_blank">%2$s</a><br><br><audio src="https://www.%1$s" controls></audio>';
    return preg_replace_callback($pattern_url, function ($matches) use ($pattern_filename, $audio_html) {
      $url = $matches[0];
      $filename = '';
      preg_match($pattern_filename, $url, $filename_match);
      if (isset($filename_match[0])) {
        $filename = $filename_match[0];
      }
      return sprintf($audio_html, $url, $filename);
    }, $t_string);
  }

  function bugnote_video_player_add($t_string)
  {
    $pattern_url = plugin_config_get( 'bugnote_video_url_pattern' );
    $pattern_filename = plugin_config_get( 'bugnote_video_file_pattern' );
    $video_html = '<a href="https://www.%1$s" target="_blank">%2$s</a><br><br><video src="https://www.%1$s" controls></video>';
    return preg_replace_callback($pattern_url, function ($matches) use ($pattern_filename, $video_html) {
      $url = $matches[0];
      $filename = '';
      preg_match($pattern_filename, $url, $filename_match);
      if (isset($filename_match[0])) {
        $filename = $filename_match[0];
      }
      return sprintf($video_html, $url, $filename);
    }, $t_string);
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

  function report_bug_link($p_event, $p_bugdata, $p_bug_id)
  {
    // auto assign status, if handler was assigned?
    if ( plugin_config_get( 'auto_status' ) ) {
      $handler = bug_get_field( $p_bug_id, 'handler_id' );
      if ($handler != 0) {
        bug_set_field( $p_bug_id, 'status', 10 );
      }
    }

    // redirect to table, if option is enabled
    // IMPORTANT: this lines have to be at the end of this function!
    // otherwise the other lines would be skipped!
    if ( plugin_config_get( 'redirect_report_bug' ) ) {
      if (!gpc_get_bool('report_stay')) {
        print_successful_redirect('view_all_bug_page.php');
      }
    }
  }

  function redirect_update_bug($p_event)
  {
    if ( plugin_config_get( 'redirect_update_bug' ) ) {
      print_successful_redirect('view_all_bug_page.php');
    }
  }

  function add_columns($p_event)
  {
    $out = [];

    // summary linked
    if ( plugin_config_get( 'summary_linked' ) ) {
      $out[] = new TagiColumnSummaryLinked();
    }

    // category tagi
    if ( plugin_config_get( 'category_tagi' ) ) {
      $out[] = new TagiColumnCategoryTagi();
    }

    return $out;
  }

  function add_resources($p_event)
  {
    $out = '';

    if (
      plugin_config_get( 'summary_linked' ) or
      plugin_config_get( 'category_tagi' )
    ) {
      $out .= $this->add_columns_css($p_event);
    }

    echo $out;
  }

  function add_columns_css($p_event)
  {
    return "<style>td.column-plugin{text-align:left !important}</style>\n";
  }

  function add_resources_footer($p_event)
  {
    $out = '';

    if (
      plugin_config_get( 'projecttitle_stylize' )
    ) {
      $out .= $this->add_projecttitle_js($p_event);
    }

    echo $out;
  }

  function add_projecttitle_js($p_event)
  {
    $this->projecttitle_update_js_variables();
    $out = '<script type="text/javascript" src="' . plugin_file('projecttitle_config.js') . '"></script>' . "\n";
    $out .= '<script type="text/javascript" src="' . plugin_file('projecttitle.js') . '"></script>' . "\n";
    return $out;
  }

  function projecttitle_update_js_variables()
  {
    $projecttitle_config = 'var PROJECTTITLE_REGEX = /' . plugin_config_get( 'projecttitle_stylize_regex' ) . '/g;';
    $projecttitle_config .= 'var PROJECTTITLE_STYLE = "' . plugin_config_get( 'projecttitle_stylize_style' ) . '";';
    file_put_contents( dirname(__FILE__) . '/files/projecttitle_config.js', $projecttitle_config );
  }

}