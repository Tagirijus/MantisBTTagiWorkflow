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
11. Style: Enable that the *"Category (tagi)"* will use the variable `$g_category_tagi_stylize` for styling the categories. This variable should exist in the `config_inc.php`. The key of this array variable should be the name of the category and the value should be the styling CSS. See chapter [Example for $g_category_tagi_stylize](#example-for-g_category_tagi_stylize) for an example.
12. Style: Enable project title styling for the project list on the top right.
13. Style: The regex of the project title styling to be searched for the styling element to be replaced. E.g. my project titles have the format "YYYY-MM Projecttitle" and I wanted only the year and month to be changed in style.
14. Style: The styling CSS for the project title styling.
15. Bugnote modification: Enable that inside bugnotes certain links will be replaced with a a-href HTML tag and an audio player straight inside the bugnote.
16. Bugnote modification: Configure the regex pattern, which will recognize the url. This should not start or contain https://, since this would interfere with the MantisBTCoreFormatting plugin. I coded it the way that you just have to start with the domain straight ahead: like "tagirijus.de", which could lead to something like "/(tagirijus\.de.\*\.[mp3|ogg]+)/" as a regex pattern.
17. Bugnote modification: Inside the recognized url there is a filename, which will be used for displaying as the a-href text. Normally this name is after the last slash in an url. You could also just use ".\*" maybe to just use the whole url instead (not tested, though).

## Prequesites

In order for the _bugnote audio player add_ feature to work, this plugin has to be one priority lower than the _MantisBTCoreFormatting_ plugin. This way the formattings don't interfere. I am not sure which one comes first then, but locally this works for me. :D

You also might want to change the Content-Security-Policy headers so that you can embed audio from another server, like so:

```PHP
$g_custom_headers = [
    'Content-Security-Policy: default-src \'self\'; media-src https://www.your-domain-here.com'
];
```

## Example for $g_category_tagi_stylize

```PHP
array(
    'general' => 'color:red;font-weight:bold',
    'category 2' => 'color:grey',
)
```

# Changelog

The changelog is [here: CHANGELOG.md](CHANGELOG.md).