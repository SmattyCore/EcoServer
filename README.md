# EcoServer
Class for representing EcoServer information for the Eco Survival Game

## Example Usage ##
```php
require 'EcoServer.php';

$ecoSrv = (new \SnakeSoft\EcoServer('46.251.235.71', 3901))->Update();

echo '<pre>'.print_r($ecoSrv, true).'</pre>';
```
will give you this result:
```
SnakeSoft\EcoServer Object
(
    [url:protected] => 46.251.235.71
    [port:protected] => 3901
    [gamePort:protected] => 3900
    [webPort:protected] => 3901
    [description:protected] => Ecobrix
    [ping:protected] => 0
    [onlinePlayers:protected] => 0
    [totalPlayers:protected] => 2
    [timeSinceStart:protected] => 167052.67073986
    [timeLeft:protected] => 2424947.3718156
    [animals:protected] => 865
    [plants:protected] => 132167
    [laws:protected] => 1
    [worldSize:protected] => 0,52km²
    [version:protected] => 0.7.1.2 beta
    [economyDesc:protected] => 0 trades, 0 contracts
    [skillSpecialization:protected] => Medium.
)
```
