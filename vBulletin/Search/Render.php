<?php

namespace vBulletin\Search;

class Render {

    public static function renderSearchResults(array $result): void {
		echo '<table>';
        foreach ($result as $row) {
			echo '<tr>';
			foreach ($row as $key => $value) {
				echo "<td>{$row[$key]}</td>";
			}
			echo '</tr>';
        }
		echo '</table>';
    }
	
    public static function renderText(string $result): void {
		echo $result;
    }

}