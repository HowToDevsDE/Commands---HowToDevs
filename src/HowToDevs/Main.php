<?php


namespace HowToDevs;


use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use HowToDevs\Commands\DayCommand;
use HowToDevs\Commands\FeedCommand;
use HowToDevs\Commands\FlyCommand;
use HowToDevs\Commands\HealCommand;
use HowToDevs\Commands\NightCommand;

class Main extends PluginBase implements Listener
{

    const PREFIX = "§aServer §8| §7";

    private static $instance;

    public function onEnable() {

        self::$instance = $this;
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        $this->registerCommands();
        $this->saveDefaultConfig();
        $this->getLogger()->info(self::PREFIX . "§aDieses Plugin wurde Aktiviert!");
        $this->getLogger()->info(self::PREFIX . "§7Made by §bHowToDevs");
        $this->getLogger()->info(self::PREFIX . "§7Our Discord: https://discord.gg/Uf9RPXj");

    }

    public function registerCommands() {

        $this->getServer()->getCommandMap()->register("day", new DayCommand());
        $this->getServer()->getCommandMap()->register("night", new NightCommand());
        $this->getServer()->getCommandMap()->register("heal", new HealCommand());
        $this->getServer()->getCommandMap()->register("feed", new FeedCommand());
        $this->getServer()->getCommandMap()->register("fly", new FlyCommand());

    }

    public function onDisable()
    {
        $this->getLogger()->info(self::PREFIX . "§cDieses Plugin wurde Deaktiviert!");
        $this->getLogger()->info(self::PREFIX . "§7Made by §bHowToDevs");
    }

    public static function getInstance() : Main {

        return self::$instance;

    }

}