<?php

declare(strict_types=1);

namespace creeperplayer20\joinui;

use pocketmine\plugin\PluginBase;
use jojoe77777\FormAPI\CustomForm;
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

    $this->reloadConfig();
    $this->saveDefaultConfig();
    $this->getConfig()->save();

}

public function joinuiForm($player){
    $form = new CustomForm(function(Player $player, $data){
        if($data === null){
            //The form has been closed by the player
            return true;
        }
        switch($data){
            case 0:
                //First Button
                //Here is where you add the code to what this button will do.
            break;
        }});
        $name = $player->getName();
        $form->setTitle(str_replace("\$name", $name, $this->getConfig()->get("title")));
        $form->addLabel(str_replace("\$name", $name, $this->getConfig()->get("content")));
        $player->sendForm($form);
    }

public function onJoin(PlayerJoinEvent $event){
    $player = $event->getPlayer();
    $this->joinuiForm($player);

}}
