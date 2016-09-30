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
|The program will link brands to stores and stores to brands so that the user can view the brands sold at a particular store and the stores at which a brand is sold.|"Nike"|[List of outlets for Nike shoes.]|

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
* _Hair_salon_test commands executed:_
  * _create database hair_salon;_
  * _use hair_salon;_
  * _create table stylists (name VARCHAR (255), id serial PRIMARY KEY);_
  * _create table clients (name VARCHAR (255), stylist_id INT, id serial PRIMARY KEY);_
* _Hair_salon commands executed:_
  * _insert into stylists (name) values ('John');_
  * _insert into stylists (name) values ('Mary');_
  * _insert into stylists (name) values ('Gena');_
  * _insert into clients (name, stylist_id) values ('Gary', 1);_
  * _insert into clients (name, stylist_id) values ('Mandy', 1);_
  * _insert into clients (name, stylist_id) values ('Jacob', 1);_
  * _insert into clients (name, stylist_id) values ('Molly', 2);_
  * _insert into clients (name, stylist_id) values ('Curtis', 2);_
  * _insert into clients (name, stylist_id) values ('Bill', 2);_
  * _insert into clients (name, stylist_id) values ('Carol', 3);_
  * _insert into clients (name, stylist_id) values ('Cassie', 3);_
  * _insert into clients (name, stylist_id) values ('Dan', 3);_


## Licensing

*This product can be used in accordance with the provisions under its MIT license.*

copyright (c) 2016 **_Seth Kendall_**
