#  NÃO FUNCIONA MAIS - SOMENTE PORTFÓLIO

Esse bot é somente para portfólio. Ele habilitava envio de emails pelo titan da Hostgator Brasil. Não que eu seja favorável a esse tipo de projeto mas, pelo bom senso, não iria fazer mal algum para a hostgator a quantidade de emails da pessoa que contratou. O objetivo não era mandar spam mas sim automatização de tarefas. Porém não funciona mais, nem adianta tentar restaurar.

# NO LONGER WORKS - PORTFOLIO ONLY

This bot is for portfolio only. It enabled the sending of emails by the titan of Hostgator Brasil. Not that I'm in favor of this type of project but, by common sense, it wouldn't do any harm to hostgator the amount of emails from the person they hired. The goal was not to send spam but to automate tasks. But it doesn't work anymore, there's no use trying to restore.


## Pre-requisites

PHP>=7.2

```
sudo apt install php7.3-dom php7.3-curl
```

## Installing
- Copy the file `config/config-sample.php` to `config/config.php` and fill the fields
- do the command `composer install` in the root folder
- create a node server and point to `src/Node/api_node.js`
- give `user` permissions recursivelly and `www` ou `www-data` permission to `temp` folder

## Dev
- test the api with a local server `php -S localhost:8000` in the folder `public` and do the below request with Postman

## Steps to deploy 

- Make sure the connection is https
- Point the domain to `public` folder inside the project
- ready! now you are ready to make requests


## Request

##### HEADER
```
POST /index.php HTTP/1.1
Host: your-domain.com
Content-Type: application/json
Accept: application/json
```
##### BODY
```
{
    "login": {
        "email": "api@your-domain.com",
        "password": ""
    },
    "send": [
        {
        "subject": "Api3",
        "body": "Teste novo",
        "to": [
            {
                "email": "seu-email@gmail.com",
                "name": "seu-email@gmail.com"
            }
        ],
        "cc": [],
        "bcc": [],
        "files": []
    }
    ]
}
```
