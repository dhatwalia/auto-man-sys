create database db;
use db;

create table Customer 
(
    cid varchar(17) primary key,
    cname varchar(30),
    phone varchar(10),
    address varchar(50),
    passwords varchar(50) not null
);

create table Factory 
(
    fid varchar(6),
    brand varchar(15) not null,
    model varchar(20),
    fowner varchar(30),
    floca varchar(13),
    fpasswords varchar(50) not null,
    primary key(fid,model)
);

create table Dealer 
(
    did varchar(10),
    brand varchar(15) not null,
    model varchar(20) not null,
    dcost int not null,
    downer varchar(30),
    dloca varchar(13),
    fid varchar(6),
    dpasswords varchar(50) not null,
    primary key(did,model)
);

create table Vehicle 
(
    vid int AUTO_INCREMENT,
    brand varchar(15),
    model varchar(20),
    color varchar(12),
    cylinder int,
    transmission varchar(9),
    cost int,
    primary key(vid)
);

create table Orders 
(
    vid int AUTO_INCREMENT,
    brand varchar(15),
    model varchar(20),
    deadline date,
    cid varchar(17),
    did varchar(10),
    statuss varchar(25),
    primary key(vid)
);

alter table Orders
add foreign key(vid)
references Vehicle(vid) on delete cascade;

alter table Orders
add foreign key(did)
references Dealer(did);

alter table Orders
add foreign key(cid)
references Customer(cid) on delete cascade;

alter table Dealer
add foreign key(fid)
references Factory(fid);

create trigger t1
after insert on Vehicle
for each row
insert into Orders(brand,model)
values(new.brand,new.model);

create trigger t2
after delete on Orders
for each row
delete from Vehicle where vid=old.vid;

delimiter //
create procedure p1(in vid2 int, in did2 varchar(10), in model2 varchar(20), in deadline2 date)
begin
	update Orders set deadline=deadline2 where vid=vid2;
    update Orders set did=did2 where vid=vid2; 
	update Vehicle set cost=(select dcost from Dealer where did=did2 and model=model2) where vid=vid2;
end //
delimiter ;

insert into Customer values
('123','Prajwal Dhatwalia','8746523952','S45,Beach-view Colony,Mumbai-349402','root'),
('111','Megha Hegde','9563582179','B21,Koramangla,Bangalore-560095','ilovechoco'),
('222','Darshan M Jain','8456563578','A4,DRDO Phase-1,Bangalore-560091','dontseehere'),
('333','Praveen Kumar','7568245689','B32,Defence Colony,Delhi-110045','boringjob'),
('444','Priya Batni','7865235689','N11,Panchkula,Chandigarh-120001','not45'),
('555','Malavika','8632569875','P34,Genius Colony,Bangalore-560048','ihaveapples'),
('666','Misha P','7568562459','P35,Genius Colony,Bangalore-560048','tips'),
('777','Madhusoodhan','8632566989','L23,Chill Colony,Srinagar-140045','50chars'),
('888','Pranav Nair','8635624569','M33,Business Colony,Rajkot-350147','34redo'),
('999','Mahesh','7896589659','K21,Super Vihar,Hyderabad-520045','yahoo');

insert into Factory values
('f1','Audi','R8 eTron','Karthik SK','Bangalore','f1'),
('f1','Audi','S5','Karthik SK','Bangalore','f1'),
('f2','BMW','Z4','Anil Kodavagi','Bangalore','f2'),
('f3','Mercedes-Benz','SLS AMG','Niharika Gupta','Delhi','f3'),
('f4','Pagani','Zonda','Pragyat Singh','Delhi','f5'),
('f5','Ford','Mushtang','Ayush Atul Hate','Mumbai','f5'),
('f6','McLaren','MP4-12C','Priyanka Srivastava','Kolkata','f6'),
('f7','Lamborghini','Gallardo','Manjunath','Kolar','f7'),
('f8','Ariel','Atom V8','Samartha','Shivamoga','f8'),
('f9','Audi','R8 eTron','Baneek','Barekpur','f9');

insert into Dealer values
('11','Audi','R8 eTron',560,'Srinivas','Bangalore','f9','11'),
('11','Audi','S5',230,'Srinivas','Bangalore','f1','11'),
('22','BMW','Z4',300,'Prajwal D','Bangalore','f2','22'),
('33','Lamborghini','Gallardo',450,'Raghavendra','Hyderabad','f7','33'),
('44','Mercedes-Benz','SLS AMG',320,'Lovely Singh','Chandigarh','f3','44'),
('55','McLaren','MP4-12C',390,'Hitesh Kumar','Patna','f6','55'),
('66','Ariel','Atom V8',230,'Nagabhavya','Hyderabad','f8','66'),
('77','Audi','R8 eTron',564,'Nageshwara Reddy','Hyderabad','f1','77'),
('77','Audi','S5',229,'Nageshwara Reddy','Patna','f1','55'),
('88','Pagani','Zonda',300,'Virat Kohli','Delhi','f4','88');

insert into Vehicle(brand,model,color,cylinder,transmission,cost) values
('Audi','R8 eTron','White',8,'Automatic',560),
('Lamborghini','Gallardo','Yellow',8,'Automatic',510),
('Ariel','Atom V8','Red',6,'Manual',120),
('McLaren','MP4-12C','Grey',8,'Automatic',420),
('Mercedes-Benz','SLS AMG','Silver',8,'Automatic',420),
('Audi','R8 eTron','Red',8,'Automatic',560),
('Audi','R8 eTron','Red',8,'Automatic',560);

update Orders 
set deadline = '2017-12-03',
cid = '123',
did = '11',
statuss = 'Delivered'
where vid = 1;

update Orders 
set deadline = '2018-04-12',
cid = '123',
did = '33',
statuss = 'Ready to ship'
where vid = 2;

update Orders 
set deadline = '2020-03-14', 
cid = '111',
did = '66',
statuss = 'Building body'
where vid = 3;

update Orders 
set deadline = '2018-04-12', 
cid = '222',
did = '55',
statuss = 'Ready to ship'
where vid = 4;

update Orders 
set deadline = '2019-05-15',
cid = '333',
did = '44',
statuss = 'Paint Job'
where vid = 5;

update Orders 
set deadline = '2020-01-12',
cid = '444',
did = '11',
statuss = 'Waiting for delievery'
where vid = 6;

update Orders
set deadline = '2021-01-21',
cid = '444',
did = '11',
statuss = 'Merging Chasis'
where vid = 7;