# _Shoe Store_
###_Epicodus PHP Code Review for week 4, 9.30.2016_

#### By _Seth Kendall_

## Description

_This program is designed to manage the distribution of shoe brands through retail outlets._

## Specifications

|Behavior|Input|Output|
|--------|:---:|-----:|
|The program will accept and save different store information. It can display all the stores that it has saved.|"Foot Locker", "888-888-8888", "123 Way Ave. Portland, OR"|[Adds store to list]|
|It will accept and save different brand information. It can display all the brands that it has saved.|"Nike", "Bourgeois-end Shows"|[Adds brand to list]|
|It will link brands to stores and stores to brands so that the user can view the brands sold at a particular store and the stores at which a brand is sold.|"Nike"|[List of outlets for Nike shoes.]|
|It will take update information about the stores that are saved in the program.|New store address: 456 Way Ave. Portland, OR 97204|[Updates store information displayed on page]|

## Setup Instructions

* _Clone repository from github_
* _While in the project directory, run 'composer install' in the terminal._
* _Open terminal and type apachectl start._
* _In terminal type mysql.server start followed by mysql -uroot -proot_
* _In terminal type Database commands from section below_
* _Navigate in a browser to localhost:8080/phpmyadmin and log in with username: root, password: root._
* _Click Import tab at top of page._
* _Select database file from cloned repository._
* _In terminal, navigate to web subfolder of project directory and type in php -S localhost:8000_
* _Navigate to localhost:8000 in browser window._

## Database Commands
* _Create database shoes;_
* _Use shoes;_
* _Create table brands (name VARCHAR (255), price_range VARCHAR (255), id serial PRIMARY KEY);_
* _Create table stores (name VARCHAR (255), phone VARCHAR (255), address VARCHAR (255), id serial primary key);_
* _Insert into stores (name, phone, address) values ("Foot Locker", "888-888-8888", "123 Way Ave. Portland, OR 97204");_
* _Insert into stores (name, phone, address) values ("Getcha Shoes Heah!", "999-999-9999", "456 Way Ave. Portland, OR 97204");_
* _Insert into stores (name, phone, address) values ("Dick's Sporting Goods", "777-777-7777", "789 Way Ave. Portland, OR 97204");_
* _Insert into brands (name, price_range) values ("Nike", "Medium");_
* _Insert into brands (name, price_range) values ("Keds", "Low");_
* _Insert into brands (name, price_range) values ("Louis Vuitton", "High");_


## Licensing

*This product can be used in accordance with the provisions under its MIT license.*

copyright (c) 2016 **_Seth Kendall_**
