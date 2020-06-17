# BizB

### Introduction

...

### Installation

Assuming your machine meets all requirements - let's process to installation of Metronic Laravel integration (skeleton).

1. Open in cmd or terminal app and navigate to this folder
2. Run following commands

```bash
composer install
```

```bash
cp .env.example .env
```

```bash
php artisan key:generate
```


```bash
php artisan migrate
```

```bash
php artisan db:seed
```
```bash
php artisan serve

And navigate to generated server link (http://127.0.0.1:8000)
```

### FOLDER STRUCTURE

App divided into 3 parts Backend, Frontend and API.


### Routes Structure

```
Controllers structure

app/Http/Controllers
    |__Backend
        |__Auth
            |__LoginController.php
            |__RegisterController.php
    |__Frontend
        |__Auth
            |__UserController.php
        |__Post
            |__PostController.php
   |__API
        |__V1
            |__Auth
                |__UserController.php
            |__Post
                |__PostController.php
```

### Routes Structure

```
Routes Structure

routes
    |__api.php       (In this file, need to define api folder which contain all api related routes file)
    |__channels.php  (Same as above)
    |__console.php   (Same as above)
    |__web.php       (Same as above)
    |__fronend
        |__auth.php  (User related routes)
        |__post.php
    |__backend
        |__auth.php  (User related routes)
    |__api
        |__auth.php  (User related routes)
        |__post.php

 

