-- CREATE DATABASE expense_tracker

create table amount (
    id int primary key auto_increment,
    amount varchar(20) not null,
    type varchar(100) not null,
    category varchar(100) not null, 
    date date not null,
    description varchar(255) 
);
