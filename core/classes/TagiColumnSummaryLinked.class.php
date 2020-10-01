<?php

/**
 * Mantis Bug Tracker Column
 */
class TagiColumnSummaryLinked extends MantisColumn
{

    /**
     * Column title, as displayed to the user.
     */
    public $title = 'Summary (link)';

    /**
     * Column name, as selected in the manage columns interfaces.
     */
    public $column = 'summary_linked';

    /**
     * Column is sortable by the user.  Setting this to true implies that
     * the column will properly implement the sortquery() method.
     */
    public $sortable = true;

    /**
     * Link to but notes as well immediately with this columns link.
     */
    public $tobugnotes = true;

    /**
     * The CSS for the hyperlink.
     */
    public $style = '';


    /**
     * Constructor of the class.
     */
    public function __construct() {
        // get caption for column
        $caption_from_settings = plugin_config_get('summary_linked_caption');
        if ($caption_from_settings == '') {
            $this->title = plugin_lang_get('summary_linked_title');
        } else {
            $this->title = $caption_from_settings;
        }

        // get CSS for column
        $this->style = plugin_config_get('summary_linked_style');

        // get to bug notes option
        $this->tobugnotes = plugin_config_get('summary_linked_tobugnotes');
    }

    /**
     * Build the SQL query elements 'join' and 'order' as used by
     * core/filter_api.php to create the filter sorting query.
     * @param string $p_direction Sorting order ('ASC' or 'DESC').
     * @return array Keyed-array with query elements; see developer guide
     */
    public function sortquery( $p_direction ) {
        return [
            'order' => "summary $p_direction"
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
        $id = $p_bug->id;
        $summary = $p_bug->summary;

        if ($this->tobugnotes) {
            $bugnotes = '#bugnotes';
        } else {
            $bugnotes = '';
        }
        $code = '<a href="view.php?id=%d%s" style="%s">%s</a>';
        echo sprintf($code, $id, $bugnotes, $this->style, $summary);
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
