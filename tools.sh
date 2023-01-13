#!/bin/bash

result=${PWD##*/}          # to assign to a variable
result=${result:-/}        # to correct for the case where PWD=/
# realdir="${result}_default"
realdir="documents-backend"

compose="docker-compose -p documents-backend"

f_pull() {
    git pull
    f_composer composer install
    f_composer php artisan migrate

    f_composer php artisan load:permissions || \
    f_composer php artisan load:modules
}

f_up() {
    $compose up -d --remove-orphans
}
f_down() {
    $compose down $@
}
f_migrate() {
    $compose exec web  php ../artisan migrate
    $compose exec web  php ../artisan load:permissions
    $compose exec web  php ../artisan load:modules
}
f_seed_dev() {
    $compose exec web  php ../artisan db:seed ${@:-DevelopmentSeeder} || \
        $compose exec web  php ../artisan load:permissions || \
        $compose exec web  php ../artisan load:modules
}
f_seed() {
    $compose exec web  php ../artisan db:seed ${@:---help} || \
        $compose exec web  php ../artisan load:permissions || \
        $compose exec web  php ../artisan load:modules
}
f_mig() {
    $compose exec web  php ../artisan migrate
}
f_migrate_fresh() {
    $compose exec web  php ../artisan migrate:fresh
    $compose exec web  php ../artisan db:seed --class "DevelopmentSeeder"
    $compose exec web  php ../artisan load:permissions
    $compose exec web  php ../artisan load:modules
}
f_key() {
    $compose exec -w /var/www web php artisan key:generate
}
f_composer() {
   $compose exec -w /var/www web $@
}
f_langs() {
    $compose exec -w /var/www web php artisan translatable:export lt,en
}
f_test() {
   $compose exec -w /var/www web php artisan test $@
}
f_logs() {
    $compose logs -f $@
}
f_unit() {
    $compose exec -w /var/www web ./vendor/bin/phpunit  --process-isolation $@
}

case "$1" in
    pull)
        f_pull
        ;;
    up)
        f_up
        ;;
    down)
        f_down ${@:2}
        ;;
    fresh)
        f_migrate_fresh
        ;;
    migrate)
        f_migrate
        ;;
    seed-dev)
        f_seed_dev ${@:2}
        ;;
    seed)
        f_seed ${@:2}
        ;;
    key)
        f_key
        ;;
    exec)
        f_composer ${@:2}
        ;;
    langs)
        f_langs
        ;;
    test)
        f_test ${@:2}
        ;;
    logs)
        f_logs ${@:2}
        ;;
    unit)
        f_unit ${@:2}
        ;;
    *)
        echo "Usage: $0 {up|down|migrate|minio-init|init|varnish-reload}"
        echo "Run $0 up"
        exit 1
        ;;
esac
