<?php

namespace xpBush\Fan;

#this plugin made by me
# _____                               _
#|  ___|_ _ _ __         ___ ___   __| | ___
#| |_ / _` | '_ \ _____ / __/ _ \ / _` |/ _ \
#|  _| (_| | | | |_____| (_| (_) | (_| |  __/
#|_|  \__,_|_| |_|      \___\___/ \__,_|\___|
#Need help? Contact me
#discord: "Fαɳ. # 0066
#mail: shadowaxe94@gmail.com

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\utils\Config;
use pocketmine\level\Position;
use pocketmine\block\Block;
use pocketmine\math\Vector3;

class Main extends PluginBase implements Listener{

    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        if (! file_exists($this -> getDataFolder() . "config.yml")) {
            $this -> saveResource("config.yml");
        }
        $this->cfg = new Config($this -> getDataFolder() . "config.yml", Config::YAML);
        $this->getLogger()->info("Plugin xbPush load");
    }

    public function breakBlock(BlockBreakEvent $event){
        $player = $event->getPlayer();
        $block = $event->getBlock();
        $x = $block->x;
        $level = $block->getLevel();
        $y = $block->y;
        $z = $block->z;


            if ($block->getId() === $this->cfg->get("id") and ($block->getDamage() == 7)) {

                if(!$this->cfg->get("aleatoire") === "true"){
                    $player->setXpLevel($this->cfg->get("aleatoire"));
                }

                $pos = new Vector3($x, $y, $z);
                $random = rand(8, 15);
                $player->setXpLevel($random);
                $event->getPlayer()->getLevel()->setBlock($pos, $block->getId(), 0);

            }else{
                $event->setCanceled(true);
            }

    }

}
