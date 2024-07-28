DOCKER_CMD := docker-compose -f docker-compose.yml
APP_CMD := docker-compose exec app

init:
	@build
	@up
build:
	${DOCKER_CMD} build
up:
	${DOCKER_CMD} up -d
app:
	${DOCKER_CMD} exec app bash
clear:
	${APP_CMD} php artisan view:clear
	${APP_CMD} php artisan cache:clear
	${APP_CMD} php artisan config:clear
	${APP_CMD} php artisan route:clear
fresh:
	${APP_CMD} php artisan migrate:fresh --seed
refresh:
	${APP_CMD} php artisan migrate:refresh --seed
route-list:
	${APP_CMD} php artisan route:list
test:
	${APP_CMD} php artisan test
tail-log:
	tail -f ./src/storage/logs/laravel.log
sql:
	${DOCKER_CMD} exec -it db mysql -u root -D jayden -proot
rector:
	${APP_CMD} vendor/bin/rector process
model-ide-helper:
	${APP_CMD} php artisan ide-helper:models -W
