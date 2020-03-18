![serverquery](.github/images/ServerQuery.png)

# Introduction

ServerQuery is a PocketMine-MP plugin designed to query other MCPE servers while In-Game. This allows for developers to create numerous things to connect their servers.

# API

To query a server through you will need to import the `QueryAPI` class.
```php
import DaRealPandaz\ServerQuery\API\QueryAPI;
```

Once you have the class imported, use the static method `queryServer()` to retrieve a server's data...

```php
QueryAPI::queryServer(string $ip, int $port)
```

<b>Return Values</b>
 - If the server queried is offline the function will return `false`...
 
 - If the server is online the data class `ServerData` will be returned... (See <a href="https://github.com/DaRealPandaz/ServerQuery/src/DaRealPandaz/ServerQuery/Utils/Data/ServerData.php">Here</a> for more information)
 
# Installation

Hopefully, I will have this plugin on <a href="https://poggit.pmmp.io">Poggit</a> soon. But until then, head over to <a>releases</a> and download the latest version of `ServerQuery`.

# Contributing

If you'd like to add some features to this plugin, feel free to leave a <b>Pull Request</b> or message me on discord at <b>DaRealPandaz#5315</b>
