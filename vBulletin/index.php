<?php

namespace vBulletin;

use vBulletin\Search;
use vBulletin\DataBase;

$paramsPath = ROOT . '/config/app.php';
$params = include($paramsPath);	

$dbLink = DataBase::getConnection();

$searchid = isset($_REQUEST['searchid']) ? $_REQUEST['searchid'] : null;
$query = isset($_REQUEST['q']) ? $_REQUEST['q'] : null;

if ($searchid) {
	Search::showResults($searchid, $dbLink, $params['forumidexcept']);
} elseif ($query) {
	Search::process($query, $dbLink, $params['filepathfull'], $params['forumidexcept']);
} else {
	Render::renderText("<h2>Search in forum</h2><form><input name='q'></form>");
}