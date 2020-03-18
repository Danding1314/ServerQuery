<?php

/** @author DaRealPandaz */
namespace DaRealPandaz\ServerQuery\API;

use DaRealPandaz\ServerQuery\Utils\Data\ServerData;
use pocketmine\utils\Internet;

class QueryAPI {

    /**
     * @param string|int    $ip
     * @param int       $port
     * @return ServerData|false
     */
    static function queryServer($ip, int $port = 19132) {
        $url = "https://juniper-brick.glitch.me/query?ip=".$ip."&port=".$port;
        $data = json_decode(Internet::getURL($url), true);
        if(isset($data["error"])) return false;
        return new ServerData($data);
    }

}