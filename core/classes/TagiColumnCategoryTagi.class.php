<?php

/**
 * Mantis Bug Tracker Column
 */
class TagiColumnCategoryTagi extends MantisColumn
{

    /**
     * Column title, as displayed to the user.
     */
    public $title = 'Category (tagi)';

    /**
     * Column name, as selected in the manage columns interfaces.
     */
    public $column = 'category_tagi';

    /**
     * Link for "all projects" title.
     */
    public $all = 'all';

    /**
     * Column is sortable by the user.  Setting this to true implies that
     * the column will properly implement the sortquery() method.
     */
    public $sortable = true;

    /**
     * The CSS for the hyperlink.
     */
    public $style = '';

    /**
     * If enabled, the category name will be stylized according
     * to the $g_category_tagi_stylize array in the config_inc
     */
    public $stylize = true;


    /**
     * Constructor of the class.
     */
    public function __construct() {
        // get caption for column
        $caption_from_settings = plugin_config_get('category_tagi_caption');
        if ($caption_from_settings == '') {
            $this->title = plugin_lang_get('category_tagi_title');
        } else {
            $this->title = $caption_from_settings;
        }

        // get CSS for column
        $this->style = plugin_config_get('category_tagi_style');

        // get link caption
        $this->all = plugin_lang_get('category_tagi_all');

        // get bool for category name stylization
        $this->stylize = plugin_config_get('category_tagi_stylize');
    }

    /**
     * Build the SQL query elements 'join' and 'order' as used by
     * core/filter_api.php to create the filter sorting query.
     * @param string $p_direction Sorting order ('ASC' or 'DESC').
     * @return array Keyed-array with query elements; see developer guide
     */
    public function sortquery( $p_direction ) {
        return [
            'order' => "category_id $p_direction"
        ];
    }

    /**
     * Allow plugin columns to pre-cache data for all issues
     * that will be shown in a given view.  This is preferable to
     * the alternative option of querying the database for each
     * issue as the display() method is called.
     * @param array $p_bugs Bug objects.
     * @return void
     */
    public function cache( array $p_bugs ) {}

    /**
     * Function to clear the cache of values that was built with the cache() method.
     * This can be requested as part of an export of bugs, and clearing the used
     * memory helps to keep a long export process within memory limits.
     * @return void
     */
    public function clear_cache() {}

    /**
     * Function to display column data for a given bug row.
     * @param BugData $p_bug            A BugData object.
     * @param integer $p_columns_target Column display target.
     * @return void
     */
    public function display( BugData $p_bug, $p_columns_target ) {
        $project_id = $p_bug->project_id;
        $project = project_get_name($project_id);

        if (helper_get_current_project() != 0) {
            $project_id = 0;
            $project = $this->all;
        }

        $url_base = '<a href="set_project.php?project_id=%d" style="%s">%s</a>';
        $url = sprintf($url_base, $project_id, $this->style, $project);

        $category = category_get_name($p_bug->category_id);
        $category = $this->stylize_category($category);

        $code = '[%s] %s';
        echo sprintf($code, $url, $category);
    }

    /**
     * Stylize the category name, if enabled in the config.
     *
     * @param string $category
     * @return string
     */
    protected function stylize_category($category)
    {
        if ($this->stylize) {
            if (config_is_set('category_tagi_stylize')) {
                $styling = config_get('category_tagi_stylize');
                if (array_key_exists($category, $styling)) {
                    return sprintf(
                        '<span style="%s">%s</span>',
                        $styling[$category],
                        $category
                    );
                }
            }
        }

        return $category;
    }

    /**
     * Function to return column value for a given bug row.
     * This should be overridden to provide value without processing for html
     * display or escaping for a specific target output. The output will be
     * escaped by calling code to the appropriate format.
     * Default implementation is to capture display output, for backward
     * compatibility with target COLUMNS_TARGET_CSV_PAGE.
     * @param BugData $p_bug            A BugData object.
     * @param integer $p_columns_target Column display target.
     * @return string The column value.
     */
    public function value( BugData $p_bug, $p_columns_target = COLUMNS_TARGET_CSV_PAGE ) {
        ob_start();
        $this->display( $p_bug, $p_columns_target );
        return ob_get_clean();
    }

}
