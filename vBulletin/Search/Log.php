<?php

namespace vBulletin\Search;

class Log {

    public static function write(string $pfilePathFull, string $pQuery): void {
		$file = fopen($pfilePathFull, 'a+');
		fwrite($file, $pQuery . "\n");
    }

}