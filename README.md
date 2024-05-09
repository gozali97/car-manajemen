# Laravel 11 with inertia, Vue Js 3 and Filament

## Coding Test - Web Developer PT. Transindo Data Perkasa

##Screenshot Admin
![screencapture-127-0-0-1-8000-admin-login-2024-05-09-18_16_19](https://github.com/gozali97/car-manajemen/assets/58220137/71106b1f-13a9-4e47-9d0b-9d733878d30d)
![screencapture-127-0-0-1-8000-admin-categories-2024-05-09-18_14_34](https://github.com/gozali97/car-manajemen/assets/58220137/273ef4aa-79fb-4be3-9844-692a4af83828)
![screencapture-127-0-0-1-8000-admin-brands-2024-05-09-18_14_55](https://github.com/gozali97/car-manajemen/assets/58220137/c35c550c-d94b-4683-87f8-2285172e3933)
![screencapture-127-0-0-1-8000-admin-cars-2024-05-09-18_15_08](https://github.com/gozali97/car-manajemen/assets/58220137/f86e02ce-257a-42b9-bfdc-9b9b1eef9f62)
![screencapture-127-0-0-1-8000-admin-cars-create-2024-05-09-18_15_21](https://github.com/gozali97/car-manajemen/assets/58220137/62801e19-9ee1-4cff-9b5c-3648e44acb3e)
![screencapture-127-0-0-1-8000-admin-transaksis-2024-05-09-18_15_33](https://github.com/gozali97/car-manajemen/assets/58220137/791c9613-0495-43cc-8d4a-5eec0ff5474b)


##Screenshot User

![screencapture-127-0-0-1-8000-2024-05-09-18_18_42](https://github.com/gozali97/car-manajemen/assets/58220137/642eb050-2901-4aea-a16f-0a53cbbf49ac)
![screencapture-127-0-0-1-8000-product-2024-05-09-18_19_16](https://github.com/gozali97/car-manajemen/assets/58220137/9a87ce54-64fe-4c49-8dd5-1bffe40a88f1)
![11](https://github.com/gozali97/car-manajemen/assets/58220137/739194f7-2e9d-4124-aaa9-6f3493cf3bff)
![screencapture-127-0-0-1-8000-transaksi-add-daihatsu-sigra-2024-05-09-18_25_42](https://github.com/gozali97/car-manajemen/assets/58220137/6843a5bb-9bb3-4643-8310-061bc114126a)
![screencapture-127-0-0-1-8000-dashboard-2024-05-09-18_20_31](https://github.com/gozali97/car-manajemen/assets/58220137/a4f10e66-afed-43fd-9382-c47d1c215241)

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
