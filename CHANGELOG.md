# Changelog

The following changelog is based on this: [Keep a Changelog](http://keepachangelog.com/en/1.0.0/) and tries to stick to the [semantic versioning](http://semver.org/spec/v2.0.0.html).

## [1.3.1] - 2022-07-21
### Fixed
- When enabling _Redirect to table after bug update_ there was no email send, since the EVENT call in _bug\_update.php_ is before the mail handling. I monkey-patched this whole email handling into my custom method. Means: if the original mail handling in the bug-update file changes and I won't change my plugin here, things might not work well anymore, thus: monkey patch.

## [1.3.0] - 2022-06-24
### Added
- Bugnote add video - feature added like the audio one, but for videos.

### Changed
- Bugnote add player feature now uses different config table _config\_ids_, since the old ones were too long and gave errors on changing the settings of the MantisBTTagiWorkflow plugin.

## [1.2.0] - 2022-06-03
### Added
- Bugnote add player - feature added. This one can replace an url with a a-href HTML tag and an audio player at the same time.

## [1.1.0] - 2020-01-14
### Added
- Changelog added.
- Added feature to stylize the project list with a regex capturing. E.g. my project titles have the format "YYYY-MM Projecttitle" and I wanted the projecttitle to be more visible than the year and the month. Since I had no idea how to achieve this, I just added javascript, which captured a specific part of the project title and wrapped it with a `span` to be able to stilize this part.

### Changed
- README updated to make things more clear.

### Fixed
- Fixed some text in the plugins settings.
