# 4-Ads



4-Ads is a web application to buy and sell anything you can think of your old mobile phone, your used sofa, your car, or even your flat. It might even help you find a new job!



## Contributing

* **Abd El-Rahman Anwer Hellawy** -  [El-Hellawy](https://github.com/Elhellawy)
* **Sabry Ragab** -  [Sabry Ragab](https://github.com/sabryRagab)
* **Ahmed Said** -  [Ahmed Said](https://github.com/3naba)
* **Osama Al-Shafay** -  [Osama Al-Shafay](https://github.com/osossh)

## Installation
1. git clonehttps://github.com/sabryRagab/4-Ads 4-Ads
2. cd 4-Ads
3. composer install
4. copy .env.example file and change the new file name to .env
5. The next thing you should do after that is to fill .env with your configuration data such that:
6. php artisan migrate

##### For step 5 you can do something like that:
- APP_KEY=base64:SabryCP7vzRwF6ZY00PxL03NpeLtHrOPOZoxzsGZbrs=
- APP_URL=http://localhost
- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=database_name
- DB_USERNAME=user_name
- DB_PASSWORD=database_password
- ..
