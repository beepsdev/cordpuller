# Cordpuller
Yet another library for dealing with the official [Discord](https://discord.com/) [REST API](https://discord.com/developers/docs/intro).

### Why another library?
I Was looking for a library that could run via a webserver, And seemingly all the exiting ones required to be ran in a CLI or weren't up to date.
And since I wanted to run a webserver that could handle [interactions](https://discord.com/developers/docs/interactions/receiving-and-responding#interactions), That was pretty annoying.

*So, I Decided to try and make my own? Shouldn't be that hard right? (Haha).*

### Gateway?
There is currently, and there are no plans to add a way to listen to discord gateway events directly. You can parse them using `Cordpuller/Discord::parseGatewayEvent()` if you receive them from [Attendee](https://github.com/beepsdev/discord.attendee) for example.

## Installation
installing this at the moment seems like a bad idea, but heres instructions anwayways.

### Requirements
- PHP 8.0 (Or higher)
- gmp
- Composer

### Installation
Add the repository to your composer project.
```shell
composer config repositories.cordpuller vcs https://github.com/beepsdev/cordpuller
```

Install the library.
```shell
composer require Beepsdev/Cordpuller
```

or smth like that at least