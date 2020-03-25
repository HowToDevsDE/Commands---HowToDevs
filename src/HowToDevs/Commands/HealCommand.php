<?php


namespace HowToDevs\Commands;


use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use HowToDevs\Main;

class HealCommand extends Command
{

    public function __construct()
    {
        parent::__construct("heal",
            "Heilt dich",
            "/heal", ["heilen"]);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player) {
            if ($sender->hasPermission("core.heal")) {

                $config = Main::getInstance()->getConfig();

                $sender->sendMessage(Main::PREFIX . $config->get("healmessage"));
                $sender->setHealth(20);

            } else{

                $sender->sendMessage(Main::PREFIX . "§cDu hast keine Rechte auf diesen befehl!");
            }
        }
    }

}