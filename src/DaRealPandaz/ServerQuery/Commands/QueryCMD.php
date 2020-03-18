<?php

/** @author DaRealPandaz */
namespace DaRealPandaz\ServerQuery\Commands;

use DaRealPandaz\ServerQuery\API\QueryAPI;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;

class QueryCMD extends Command {

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        parent::__construct($name, $description, $usageMessage, $aliases);
        $this->setPermission("drp.query.cmd");
        $this->setUsage("/query <string:ip> <int:port>");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender->hasPermission($this->getPermission())) {
            if(isset($args[0])) {
                if(isset($args[1])) {
                    if(is_numeric($args[1])) {
                        $query = QueryAPI::queryServer($args[0], $args[1]);
                        if($query !== false) {
                            $sender->sendMessage(TextFormat::GREEN.$query->getIp().":".$query->getPort()." is currently online with ".$query->getPlayerCount()." players online.");
                        }else {
                            $sender->sendMessage(TextFormat::RED."The server you requested is currently offline.");
                        }
                    }else {
                        $sender->sendMessage($this->getUsage());
                    }
                }else {
                    $sender->sendMessage($this->getUsage());
                }
            }else {
                $sender->sendMessage($this->getUsage());
            }
        }
    }

}