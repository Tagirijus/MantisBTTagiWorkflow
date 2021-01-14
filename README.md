# Mantis Bugtracker Tagi Workflow

## About

There are some things I changed in an older version of MantisBT to fit my workflow. But now I wanted to make things non-destructive and thus started to write a plugin to (hopefully) be able to achieve my workflow again, without the need of core-file modification.

# What's included

1. Side menu: You can have a quick shortcut to the projects management view, which directly sorts by `enabled` status of the projects. This way you can have all the active projects on top already.
2. Workflow: You can enable to directly forward to the issues table after reporting an issue, instead of redirecting to the new issue.
3. Workflow: Same as above, but for editing of issues (thus not creating a new one).
4. Workflow: Set the status of the issue to **10** automatically if a person is assigned. In my mantis settings this status is called *"to do"*, by the way.
5. Table: Enable a column, which is the summary with a *a href* link to the issue itself.
6. Table: Enable for the above added column that the link also leads to the bug notes directly.
7. Style: CSS styling for the *"Summary with link"* table modification (see above).
8. Style: Set the caption for the *"Summary with link"* table modification (see above).
9. Table: Enable the column *"Category (Tagi)"* which has the category of the issue, but also a link to the project of the issue in bracktes. If a project is chosen already, this link will lead to "All projects" instead.
10. Style: Set the caption for the *"Category (tagi)"* table modification (see above).
11. Style: Enable that the *"Category (tagi)"* will use the variable `$g_category_tagi_stylize` for styling the categories. This variable should exist in the `config_inc.php`. The key of this array variable should be the name of the category and the value should be the styling CSS. See chapter [Example for $g_category_tagi_stylize](README.md#example-g_category_tagi_stylize) for an example.

## Example for $g_category_tagi_stylize

```PHP
array(
    'general' => 'color:red;font-weight:bold',
    'category 2' => 'color:grey',
)
```

# Changelog

The changelog is [here: CHANGELOG.md](CHANGELOG.md).