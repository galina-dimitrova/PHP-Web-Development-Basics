-- create database exam_prep;

use exam_prep;

create table `users` (
  `id` int(11) not null auto_increment,
  `username` varchar(255) not null,
  `password` varchar(255) not null,
  `first_name` varchar(255) null default null,
  `last_name` varchar(255) null default null,
  primary key (`id`),
  unique index `username` (`username`)
)
  engine=innodb
;

create table `categories` (
  `id` int(11) not null auto_increment,
  `name` varchar(50) not null default '0',
  primary key (`id`)
)
  engine=innodb
;

create table `tasks` (
  `id` int(11) not null auto_increment,
  `title` varchar(50) not null,
  `description` text null,
  `location` varchar(100) null default null,
  `user_id` int(11) not null,
  `category_id` int(11) not null,
  `started_on` datetime not null,
  `due_date` datetime not null,
  primary key (`id`),
  index `fk_tasks_users` (`user_id`),
  index `fk_tasks_categories` (`category_id`),
  constraint `fk_tasks_categories` foreign key (`category_id`) references `categories` (`id`),
  constraint `fk_tasks_users` foreign key (`user_id`) references `users` (`id`)
)
  collate='latin1_swedish_ci'
  engine=innodb
;

insert into `categories` (`name`) values ('anniversary');
insert into `categories` (`name`) values ('birthday');
insert into `categories` (`name`) values ('business');