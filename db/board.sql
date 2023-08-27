create table board (
   num int not null auto_increment,
   id char(15) not null,
   name char(10) not null,
   subject char(200) not null,
   content text not null,        
   regist_day char(20) not null,
   hit int not null,
   file_name char(40),
   file_type char(40),
   file_copied char(40),
   primary key(num)
);

--id,name,pass,subject,content,regist_day,hit

create table noticeboard (
   num int not null auto_increment,
   id char(15) not null,
   name char(10) not null,
   pass char(10) not null,
   subject char(200) not null,
   content text not null,        
   regist_day char(20) not null,
   hit int not null,
   primary key(num)
);