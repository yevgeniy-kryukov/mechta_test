<?php

namespace vBulletin\Search;

use vBulletin\Render;
use vBulletin\Log;

class Search {
	
	public static function process(string $pQuery, \PDO $dbLink, string $pFilePathFull, int $pForumIdExcept = -1): void {
		$sth = $dbLink->prepare('SELECT * FROM vb_post WHERE text like :p_txt and forumid <> :p_forumid');
		$sth->bindParam('p_txt', $pQuery, \PDO::PARAM_STR);
		$sth->bindParam('p_forumid', $pForumIdExcept, \PDO::PARAM_INT);
		$sth->execute();
		$result = $sth->fetchAll();
		
		Log::write($pFilePathFull, $pQuery);

		Render::renderSearchResults($result);
	}
	
	public static function showResults(int $pSearchId, \PDO $dbLink, int $pForumIdExcept = -1): void {
		$sth = $dbLink->prepare('SELECT * FROM vb_searchresult WHERE searchid = :p_id and forumid <> :p_forumid');
		$sth->bindParam('p_id', $pSearchId, \PDO::PARAM_INT);
		$sth->bindParam('p_forumid', $pForumIdExcept, \PDO::PARAM_INT);
		$sth->execute();
		$result = $sth->fetchAll();

		Render::renderSearchResults($result);
	}

}