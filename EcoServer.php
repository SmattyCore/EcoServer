<?php
namespace SnakeSoft;

/**
 * Class EcoServer
 *
 * Class for retrieving Eco Game Server Information
 *
 * @package SnakeSoft
 * @version 1.0
 * @author Matt Rothtauscher <matt@snakesoft.net>
 */
class EcoServer
{
    protected $url;
    protected $port;

    protected $gamePort;
    protected $webPort;
    protected $description;
    protected $ping;
    protected $onlinePlayers;
    protected $totalPlayers;
    protected $timeSinceStart;
    protected $timeLeft;
    protected $animals;
    protected $plants;
    protected $laws;
    protected $worldSize;
    protected $version;
    protected $economyDesc;
    protected $skillSpecialization;

    /**
     * @return int
     */
    public function getGamePort()
    {
        return $this->gamePort;
    }

    /**
     * @param int $gamePort
     * @return EcoServer
     */
    private function setGamePort($gamePort)
    {
        $this->gamePort = $gamePort;
        return $this;
    }

    /**
     * @return int
     */
    public function getWebPort()
    {
        return $this->webPort;
    }

    /**
     * @param int $webPort
     * @return EcoServer
     */
    private function setWebPort($webPort)
    {
        $this->webPort = $webPort;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return EcoServer
     */
    private function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPing()
    {
        return $this->ping;
    }

    /**
     * @param mixed $ping
     * @return EcoServer
     */
    private function setPing($ping)
    {
        $this->ping = $ping;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOnlinePlayers()
    {
        return $this->onlinePlayers;
    }

    /**
     * @param mixed $onlinePlayers
     * @return EcoServer
     */
    private function setOnlinePlayers($onlinePlayers)
    {
        $this->onlinePlayers = $onlinePlayers;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotalPlayers()
    {
        return $this->totalPlayers;
    }

    /**
     * @param mixed $totalPlayers
     * @return EcoServer
     */
    private function setTotalPlayers($totalPlayers)
    {
        $this->totalPlayers = $totalPlayers;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTimeSinceStart()
    {
        return $this->timeSinceStart;
    }

    /**
     * @return float TimeSinceStart in hours
     */
    public function getTimeSinceStartInHours()
    {
        return (($this->getTimeSinceStart() / 60) / 60);
    }

    /**
     * @param mixed $timeSinceStart
     * @return EcoServer
     */
    private function setTimeSinceStart($timeSinceStart)
    {
        $this->timeSinceStart = $timeSinceStart;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTimeLeft()
    {
        return $this->timeLeft;
    }

    /**
     * @return float TimeLeft in hours
     */
    public function getTimeLeftInHours()
    {
        return (($this->getTimeLeft() / 60) / 60);
    }

    /**
     * @param mixed $timeLeft
     * @return EcoServer
     */
    private function setTimeLeft($timeLeft)
    {
        $this->timeLeft = $timeLeft;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnimals()
    {
        return $this->animals;
    }

    /**
     * @param mixed $animals
     * @return EcoServer
     */
    private function setAnimals($animals)
    {
        $this->animals = $animals;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlants()
    {
        return $this->plants;
    }

    /**
     * @param mixed $plants
     * @return EcoServer
     */
    private function setPlants($plants)
    {
        $this->plants = $plants;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLaws()
    {
        return $this->laws;
    }

    /**
     * @param mixed $laws
     * @return EcoServer
     */
    private function setLaws($laws)
    {
        $this->laws = $laws;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWorldSize()
    {
        return $this->worldSize;
    }

    /**
     * @param mixed $worldSize
     * @return EcoServer
     */
    private function setWorldSize($worldSize)
    {
        $this->worldSize = $worldSize;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param mixed $version
     * @return EcoServer
     */
    private function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEconomyDesc()
    {
        return $this->economyDesc;
    }

    /**
     * @param mixed $economyDesc
     * @return EcoServer
     */
    private function setEconomyDesc($economyDesc)
    {
        $this->economyDesc = $economyDesc;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSkillSpecialization()
    {
        return $this->skillSpecialization;
    }

    /**
     * @param mixed $skillSpecialization
     * @return EcoServer
     */
    private function setSkillSpecialization($skillSpecialization)
    {
        $this->skillSpecialization = $skillSpecialization;
        return $this;
    }

    /**
     * EcoServer constructor.
     * @param string $url Without http:// or https:// or / at the end
     * @param int $port
     */
    public function __construct($url, $port)
    {
        $this->url = $url;
        $this->port = $port;
    }

    /**
     * Updates all the server details
     * @return EcoServer $this
     */
    public function Update()
    {
        $response = file_get_contents($this->getCompleteURL(false));
        if(!empty($response))
        {
            try
            {
                $json = json_decode($response);

                $this->setGamePort($json->GamePort);
                $this->setWebPort($json->WebPort);
                $this->setDescription($json->Description);
                $this->setPing($json->Ping);
                $this->setOnlinePlayers($json->OnlinePlayers);
                $this->setTotalPlayers($json->TotalPlayers);
                $this->setTimeSinceStart($json->TimeSinceStart);
                $this->setTimeLeft($json->TimeLeft);
                $this->setAnimals($json->Animals);
                $this->setPlants($json->Plants);
                $this->setLaws($json->Laws);
                $this->setWorldSize($json->WorldSize);
                $this->setVersion($json->Version);
                $this->setEconomyDesc($json->EconomyDesc);
                $this->setSkillSpecialization($json->SkillSpecialization);
            }
            catch(Exception $e)
            {

            }
        }

        return $this;
    }

    /**
     * @param bool $isHttps
     * @return string
     */
    private function getCompleteURL($isHttps)
    {
        return (($isHttps) ? 'https://' : 'http://').$this->url.':'.$this->port.'/info';
    }
}