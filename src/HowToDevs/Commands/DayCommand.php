<?php


namespace HowToDevs\Commands;


use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use HowToDevs\Main;

class DayCommand extends Command
{

    public function __construct()
    {
        parent::__construct("day",
            "Setzt die Zeit auf Tag",
            "/day", ["tag"]);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player) {
            if ($sender->hasPermission("core.day")) {

                $config = Main::getInstance()->getConfig();

                $sender->sendMessage(Main::PREFIX . $config->get("daymessage"));
                $sender->getLevel()->setTime(0);

            } else {

                $sender->sendMessage(Main::PREFIX . "§cDu hast keine Rechte auf diesen befehl!");

            }
        }
    }
}