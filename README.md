
# myfin_parser

System to scrap ctypto rates from myfin.by. All data can be accessed via small API by http requests. 

## Installation

```bash
git clone https://github.com/daniyarsan/myfin_parser.git

composer install

php bin/doctrine orm:schema-tool:create
```

## Usage from cli

```php
 php ./bin/console app:parse-myfin
 ```
