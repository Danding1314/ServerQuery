<?php

/** @author DaRealPandaz */
namespace DaRealPandaz\ServerQuery\Utils\Data;

use DaRealPandaz\ServerQuery\Utils\QueryUtils;

class ServerData {

    /** @var array */
    private $data;
    /** @var string */
    private $name;
    /** @var string */
    private $map;
    /** @var string[] */
    private $plugins = [];
    /** @var array */
    private $onlinePlayers = [];
    /** @var int */
    private $maxPlayerCount;
    /** @var bool */
    private $isWhitelisted;
    /** @var int */
    private $rawIp;
    /** @var string|int */
    private $ip;
    /** @var int */
    private $port;
    /** @var string */
    private $version;
    /** @var int */
    private $playerCount;

    public function __construct(array $data) {
        $this->data = $data;
        $this->name = $data["name"];
        $this->map = $data["raw"]["map"];
        $this->parsePlugins();
        $this->parseOnlinePlayers();
        $this->maxPlayerCount = $data["maxplayers"];
        $this->isWhitelisted = $data["raw"]["whitelist"];
        $this->rawIp = $data["raw"]["hostip"];
        $this->ip = $data["query"]["host"];
        $this->port = $data["query"]["port"];
        $this->version = $data["raw"]["version"];
        $this->playerCount = count($this->onlinePlayers);
    }

    protected function parseOnlinePlayers(): void {
        foreach ($this->data["players"] as $data) {
            array_push($this->onlinePlayers, $data["name"]);
        }
    }

    protected function parsePlugins(): void {
        $i = 0;
        foreach (explode(" ", $this->data["raw"]["plugins"]) as $plugin) {
            if(QueryUtils::isEven($i) && $i !== 0) {
                array_push($this->plugins, $plugin);
            }
            $i++;
        }
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getMap(): string
    {
        return $this->map;
    }

    /**
     * @return string[]
     */
    public function getPlugins(): array
    {
        return $this->plugins;
    }

    /**
     * @return array
     */
    public function getOnlinePlayers(): array
    {
        return $this->onlinePlayers;
    }

    /**
     * @return int
     */
    public function getMaxPlayerCount(): int
    {
        return $this->maxPlayerCount;
    }

    /**
     * @return bool
     */
    public function isWhitelisted(): bool
    {
        return $this->isWhitelisted;
    }

    /**
     * @return int
     */
    public function getRawIp(): int
    {
        return $this->rawIp;
    }

    /**
     * @return int|string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @return int
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @return int
     */
    public function getPlayerCount(): int
    {
        return $this->playerCount;
    }

}