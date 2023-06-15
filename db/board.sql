create table board (
    number int not null auto_increment primary key,
    title varchar(150) not null,
    content text not null,
    id varchar(20) not null,
    date datetime not null,
    hit int not null default 0
);