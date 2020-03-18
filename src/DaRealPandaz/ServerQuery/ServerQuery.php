<?php

/** @author DaRealPandaz */
namespace DaRealPandaz\ServerQuery;

use DaRealPandaz\ServerQuery\API\QueryAPI;
use DaRealPandaz\ServerQuery\Commands\QueryCMD;
use pocketmine\plugin\PluginBase;

class ServerQuery extends PluginBase {

    /** @var ServerQuery */
    static $instance;
    static $isDebug = true;

    /**
     * @return ServerQuery
     */
    static function getInstance(): ServerQuery {
        return self::$instance;
    }

    /**
     * @param string    $message
     * @return void
     */
    static function log(string $message): void {
        self::$instance->getLogger()->info($message);
    }

    /**
     * @return void
     */
    public function onLoad(): void {
        self::$instance = $this;
    }

    /**
     * @return void
     */
    function onEnable(): void {
        if(self::$isDebug)$this->debug();
        $this->initCommands();
        $this->initEvents();
        $this->initTasks();
    }

    /**
     * @return void
     */
    function debug(): void {
    }

    /**
     * @return void
     */
    function initCommands(): void {
        $this->getServer()->getCommandMap()->register("ServerQuery", new QueryCMD("query", "queries servers for information"));
    }

    /**
     * @return void
     */
    function initEvents(): void {

    }

    /**
     * @return void
     */
    function initTasks(): void {

    }

}