
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
 
 ====================
 Задание для PHP разработчика.

Добрый день уважаемый кандидат в нашу команду. Это задание нацелено на определение уровня ваших знаний в 4 областях. Отнеситесь к выполнению задания со всей серьезностью. Результат не только поможет нам оценить ваш уровень, но и пойдет на прод в наилучшем исполнении.

Требуется создать универсальный класс для обмена http сообщениями с удалённым сервером, формат общения по умолчанию application/json, но важна возможность указать другой тип контента. У класса должен быть простой и понятный интерфейс.

Так же данный класс должен уметь инициализироваться с прокси конфигом и в момент инициализации проверять работоспособность туннеля.

Экземпляр класса должен иметь следующий интерфейс

public send(string $url, array $data, $contentType): Response

Объект типа Response должен иметь интерфейс

public getJson(): object
public getString(): string
public getRaw(): string
public getHeader(string $name): string

С помощью созданных классов нужно отправить сообщение на удаленный сервер https://myfin.by/crypto-rates используя socks proxy.

получить и распарсить ответ, после сохранить в MySQL DB используя Doctrine.

CREATE TABLE `crypto_price` (
`id` int(11) NOT NULL AUTO\_INCREMENT,
`crypto` varchar(32) DEFAULT NULL,
`fiat` varchar(13) DEFAULT NULL,
`price` decimal(7,2) DEFAULT NULL,
`time` int(11) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO\_INCREMENT=25 DEFAULT CHARSET=utf8mb3;



