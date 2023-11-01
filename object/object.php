<?php
class RemoteControl
{
    private $power;
    private $volume;
    private $channel;

    public function __construct($power = false, $volume = 0, $channel = 1)
    {
        $this->power = $power;
        $this->volume = $volume;
        $this->channel = $channel;
    }

    public function powerOn()
    {
        $this->power = true;
        echo "Remote Control is now powered on.";
    }

    public function powerOff()
    {
        $this->power = false;
        echo "Remote Control is off.";
    }

    public function setVolume($volume)
    {
        if ($this->power && $volume >= 0 && $volume <= 100) {
            $this->volume = $volume;
            echo "Volume is $volume.";
        } else {
            echo "Cannot set volume when the power is off.";
        }
    }

    public function changeChannel($channel)
    {
        if ($this->power) {
            $this->channel = $channel;
            echo "Changed to channel $channel.";
        } else {
            echo "Cannot change channel when the power is off.";
        }
    }
}

// Created a new remote control
$remote = new RemoteControl();

// Power on 
$remote->powerOn();
echo "<br><br>";
$remote->setVolume(50);
echo "<br><br>";
$remote->changeChannel(5);
echo "<br><br>";

// Power off
$remote->powerOff();
echo "<br><br>";
// Attempt to change settings when the remote is off
$remote->setVolume(75);
echo "<br><br>";
$remote->changeChannel(10);
echo "<br><br>";
