<?php

declare(strict_types=1);

namespace creeperplayer20\joinui;

use pocketmine\plugin\PluginBase;
use jojoe77777\FormAPI\SimpleForm;
use pocketmine\console\ConsoleCommandSender;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\player\Player;
use pocketmine\event\Listener;
use pocketmine\Server;

class Main extends PluginBase implements Listener{

public function onEnable(): void {

    $this->getServer()->getPluginManager()->registerEvents($this, $this);

    $this->saveDefaultConfig();

}

public function joinuiForm($player) {
    $form = new SimpleForm(function(Player $player, $data){
        if($data === null){
            
            return true;
        }
        switch($data){
            case 0:
                


            break;
        }});

        $name = $player->getName();

        $form->setTitle($this->getConfig()->get("title"));
        $form->setContent(str_replace("\$name", $name, $this->getConfig()->get("content")));
        $form->addButton($this->getConfig()->get("button"));
        $player->sendForm($form);

    }

public function onJoin(PlayerJoinEvent $event) {

    $player = $event->getPlayer();
    $this->joinuiForm($player);

}}
