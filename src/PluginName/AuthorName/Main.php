<?php

namespace PluginName\AuthorName;



use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{

    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        if (!file_exists($this->getDataFolder() . "config.yml")) {
            $this -> saveResource("config.yml");
        }
        $this->cfg = new Config($this -> getDataFolder() . "config.yml", Config::YAML);
        $this->getLogger()->info("Plugin PluginName load");
    }
}
