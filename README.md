# お問い合わせフォーム
## 環境構築  
Dockerビルド  

1. git clone git@github.com:coachtech-material/laravel-docker-template.git  
2. Docker-compose up -d --build  

Laravel環境構築  
1. docker-compose exec php bash
2. composer install  
3. cp .env.example .env
4. php artisan key:generate  
5. php artisan migrate
6. php artisan db:seed  
## 使用技術  
・PHP 7.4  
・Laravel 8.3  
・MYSQL 8.0  
## URL  
・開発環境:http://localhost/  
・phpmyadmin:http://localhost:8080/  



