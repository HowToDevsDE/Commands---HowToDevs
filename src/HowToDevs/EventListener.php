<?php


namespace HowToDevs;


use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\Server;

class EventListener implements Listener
{

    public function __construct(Main $plugin)
    {
        $this->plugin = $plugin;
    }

    public function onJoin(PlayerJoinEvent $event) {

        $player = $event->getPlayer();

        $config = Main::getInstance()->getConfig();

        $player->sendMessage(Main::PREFIX . $config->get("welcomemessage"));


    }
}