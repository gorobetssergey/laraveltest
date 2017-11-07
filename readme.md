#Backend

#####Homestead

**Laravel Homestead is an official, pre-packaged Vagrant box**
Documentation [here](https://laravel.com/docs/5.5/homestead)

----------------------------
#####Without homestead

However, if you are not using Homestead, you will need to make sure your server meets the following requirements:

* PHP >= 7
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension

* `git clone https://github.com/gorobetssergey/laraveltest.git`
* `cd laraveltest`
* `composer install`
_________________
#### Setup environment
* create database

Copy `.env.example` in your project root, and name it `.env`
Fillout this fields according to your settings

```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db-name
DB_USERNAME=user-name
DB_PASSWORD=user-pass
```
#### Key, Seed & Migrate

* `php artisan migrate --seed`
* `php artisan add:folder`

#### login and password

* use any user with a role equal to 1
* password = secret