create table category 
(
    cid int not null auto_increment,
    name varchar(30)not null unique key,
    constraint pk_cat_cid primary key(cid)
)


create table product
(
    cid int not null,
    pid char(4)not null,
    name varchar(50)not null,
    price int not null,
    discount int not null default 0,
    isactive bit,
    description varchar(100),
    constraint pk_pid_product primary key(pid),
    constraint fk_cid_product foreign key(cid) references category(cid)
);
create table customer 
(
    mobile varchar(10) not null,
    name varchar(30)not null,
    password varchar(30)not null,
    address varchar(100) not null,
    constraint pk_id_primary primary key(mobile)
)
insert into customer values('8235165187','Shubham','pass','Office:404,Sri Ram Palaza,Bank More Dhanbad');
insert into customer values('8804805932','Amit','pass','Office:404,Sri Ram Palaza,Bank More Dhanbad');



create table orderDetails
(
    id int not null auto_increment,
    mobile varchar(10)not null,
    orderid varchar(20)not null,
    orderdate date,
    pid char(4)not null,
    qty int not null,
    price int not null,
    status int not null,
   constraint fk_mobile_order foreign key(mobile) references customer(mobile),
   constraint fk_pcode_order foreign key(pid) references product(pid),
   constraint pk_id_order primary key(id)
)

select * from customer;
select * from orderDetails;

select c.mobile,c.`name`,c.address,o.orderid,o.pid,o.price,o.qty from orderDetails o right outer join customer c  on c.mobile=o.mobile where o.orderid='O20160608075131'















