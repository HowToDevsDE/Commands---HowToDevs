<?php


namespace HowToDevs\Commands;


use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use HowToDevs\Main;
use pocketmine\Server;

class FlyCommand extends Command
{

    public function __construct()
    {
        parent::__construct("fly",
            "Gibt dir Fly",
            "/fly");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player) {
            if ($sender->hasPermission("core.fly")) {

                $config = Main::getInstance()->getConfig();

                $api = Server::getInstance()->getPluginManager()->getPlugin("FormAPI");
                $form = $api->createSimpleForm(function (Player $sender, $data) {
                    $config = Main::getInstance()->getConfig();
                    $result = $data;
                    if ($result === null) {
                        return;
                    }
                    if ($result === 0) {
                        $sender->setAllowFlight(true);
                        $sender->setFlying(true);
                        $sender->sendMessage(Main::PREFIX . $config->get("flyonmessage"));
                    }
                    if ($result === 1) {
                        $sender->setAllowFlight(false);
                        $sender->setFlying(false);
                        $sender->sendMessage(Main::PREFIX . $config->get("flyoffmessage"));
                    }
                });
                $config = Main::getInstance()->getConfig();
                $form->setTitle("§fFly Menu");
                $form->setContent("");
                $form->addButton($config->get("flyonbutton"));
                $form->addButton($config->get("flyoffbutton"));
                $form->sendToPlayer($sender);
            } else {

                $sender->sendMessage(Main::PREFIX . "§cDu hast keine Rechte auf diesen befehl!");

            }
        }
    }
}