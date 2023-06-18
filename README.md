<br/>

## Table Of Contents

- [About The Project](#about-the-project)
- [Features](#features)
- [Demo Video](#demo_video)
- [Built With](#built-with)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
- [Contributing](#contributing)
  - [Creating A Pull Request](#creating-a-pull-request)
- [License](#license)

## About The Project

It is a backend system for an E-Commerce built with the Laravel framework, provides a simple and secure platform for online buying and selling. With features like user authentication, and product management.

## Features
- User authentication with different levels of access (admin, vendor)
- User login/signup using Google or creating an account
- Admin privileges for managing the entire system
- Vendor capabilities to manage their own shop
- CRUD operations for managing brands, coupons, products, categories, and subcategories
- Automatic coupon deactivation using events in MySQL ( No need to do it manually )

### Screenshots
![screenshot_1](https://github.com/MUSTAFA-Hamzawy/Multi-vendor-eCommerce-laravel/assets/72188665/ed55f8ab-62ec-4bf6-86ac-d1a46b164841)


<hr />

![screenshot_2](https://github.com/MUSTAFA-Hamzawy/Multi-vendor-eCommerce-laravel/assets/72188665/40906698-aa10-48dc-b2ea-0e83eb48d5ca)


### Database Diagram

![db_diagram](https://github.com/MUSTAFA-Hamzawy/Multi-vendor-eCommerce-laravel/assets/72188665/11bf6490-056b-4356-ad33-3d382c48cb6c)



## Demo Video
Video : <a href="https://www.youtube.com/watch?v=goU6Rim3VOY" id="demo_video"> Youtube Link </a>




https://github.com/MUSTAFA-Hamzawy/Multi-vendor-eCommerce-laravel/assets/72188665/eef57cea-6e74-43b1-8c26-58efd52e72b8





## Built With

* PHP
* Laravel
* MySql
* Ajax
* Composer

## Getting Started

To get a local copy up and running follow these simple steps.

### Prerequisites

* install php 8 or above
* install apache2 ( or any local serve )
* install mysql
* install composer

### Installation

1. Clone the repo

```sh
    git clone https://github.com/MUSTAFA-Hamzawy/Multi-vendor-eCommerce-laravel.git
```

2. Import the database file from the folder "SQL File"
3. Make your own copy of the .env file
```sh
    cp .env.example .env
 
    DB_DATABASE= your db name here
    DB_USERNAME= your db username
    DB_PASSWORD= your password 
```

4. Install dependecies

```sh
    composer install
```
5. Generate a key
```sh
    php artisan key:generate
```
6. Start Running
```sh
    php artisan serve
```

## Contributing

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.
- If you have suggestions for adding or removing projects, feel free to [open an issue](https://github.com/MUSTAFA-Hamzawy/Multi-vendor-eCommerce-laravel/issues/new) to discuss it, or
-  Directly create a pull request after you edit the files with necessary changes.

### Creating A Pull Request

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License
See [LICENSE](https://github.com/MUSTAFA-Hamzawy/Multi-vendor-eCommerce-laravel/blob/main/LICENSE) for more information.
