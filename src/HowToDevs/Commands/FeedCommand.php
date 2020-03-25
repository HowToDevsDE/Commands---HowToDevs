<?php


namespace HowToDevs\Commands;


use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use HowToDevs\Main;

class FeedCommand extends Command
{

    public function __construct()
    {
        parent::__construct("feed",
            "Füttert dich",
            "/feed");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player) {
            if ($sender->hasPermission("core.feed")) {

                $config = Main::getInstance()->getConfig();

                $sender->sendMessage(Main::PREFIX . $config->get("feedmessage"));
                $sender->setFood(20);

            } else {

                $sender->sendMessage(Main::PREFIX . "§cDu hast keine Rechte auf diesen befehl!");
            }
        }
    }

}