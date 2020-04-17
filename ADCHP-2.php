<?php
require("simple_html_dom.php");
$content = file_get_contents_curl("abc.html");

$html = file_get_html($content );
$ret = $html->find('div[id=cardnumber]');
?>
