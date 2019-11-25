# Issue Api Platform or Doctrine with Entity Inheritance


## Installation

**Requirements**   
- composer 
- symfony cli  ([Installation](https://symfony.com/download))
- sqlite (or change the .env), the issue is the same with postgres

```
composer install
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load  -n
symfony server:start --port=8888
```


To test the issue, run :
` curl http://localhost:8888/api/accounts?page=1`

