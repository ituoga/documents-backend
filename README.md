
```
copy .env.exmaple to .env
```


```
./tools.sh up
./tools exec composer install
./tools.sh key
./tools.sh migrate
./tools.sh exec php artisan jwt:secret
```
