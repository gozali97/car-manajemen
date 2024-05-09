# Laravel 11 with inertia, Vue Js 3 and Filament

## Coding Test - Web Developer PT. Transindo Data Perkasa

Clone Projek

```bash
  git clone git@github.com:gozali97/car-manajemen.git nama_project
```

Masuk ke folder dengan perintah

```bash
  cd nama_projek
```

-   Copy .env.example menjadi .env kemudia edit database dan api key nya

```bash
    composer install
    npm install
```

```bash
    php artisan key:generate
```

```bash
    php artisan artisan migrate:fresh --seed
```


#### Login Admin
http://127.0.0.1:8000/admin/login

-   email = admin@gmail.com
-   password = password


#### Login User
http://127.0.0.1:8000/login

-   email = user@test.com
-   password = 12345678
