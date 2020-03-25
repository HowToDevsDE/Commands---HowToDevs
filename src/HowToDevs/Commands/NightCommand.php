<?php


namespace HowToDevs\Commands;


use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use HowToDevs\Main;

class NightCommand extends Command
{

    public function __construct()
    {
        parent::__construct("night",
            "Setzt die Zeit auf Nacht",
            "/nacht", ["nacht"]);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player) {
            if ($sender->hasPermission("core.night")) {

                $config = Main::getInstance()->getConfig();

                $sender->sendMessage(Main::PREFIX . $config->get("nightmessage"));
                $sender->getLevel()->setTime(37000);


            } else{
                $sender->sendMessage(Main::PREFIX . "§cDu hast keine Rechte auf diesen befehl!");

            }
        }
    }
}