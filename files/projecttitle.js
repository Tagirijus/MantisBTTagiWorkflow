$('a.project-link').each(function (index) {
	$(this).html(
		projecttitle_replace_regex_only($(this).text())
	);
});

function projecttitle_replace_regex_only(text) {
	var match = text.match(PROJECTTITLE_REGEX);
	if (match !== null) {
		text = text.replace(match[0], projecttitle_stylize(match[0]));
	}
	return text;
}

function projecttitle_stylize(text) {
	return "<span style=\"" + PROJECTTITLE_STYLE + "\">" + text + "</span>";
}