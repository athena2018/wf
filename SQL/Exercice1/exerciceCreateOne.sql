{\rtf1}CREATE DATABASE test
DEFAULT CHARACTER SET = utf8
COLLATE=utf8_bin;
use test;
CREATE TABLE roles(
	id INT UNSIGNED auto_increment PRIMARY KEY not null,
    createdAt DATETIME not null,
    label varchar(50) null
);
