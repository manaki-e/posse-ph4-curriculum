# posse-ph4-curriculum
プログラミング学習コミュニティ POSSE で学習する PH4 の内容です。

## phase3 Quizy sample code ( setup )

`git clone https://github.com/posse-ap/sample-ph3-quizy.git`

`cd sample-ph3-quizy`

`docker-compose up -d`

`docker exec -it <appコンテナID> composer install`

`docker exec -it <appコンテナID> php artisan migrate:refresh --seed`

And you can access `http://localhost`
