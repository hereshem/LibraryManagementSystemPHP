<?php

include_once("return/connect/connect.php");

mysql_query("create database library");
if(mysql_error())
die("<body bgcolor='#4A6984'><h1>Database already created</h1></body>");	
mysql_query("use library");
mysql_query("create table students(st_id varchar(15) primary key,fname text,lname text,address text,dob text,sex text,upload text,pass varchar(20))");
mysql_query("create table books(mfn int(10) primary key auto_increment,title text,name text,author text,call_no text,edition text,place_n_publisher text,year_of_publication text,physical_description text,isbn text,price text,source text);");
mysql_query("create table acc_no(acc_no int(10) primary key,mfn int(10) not null,bool int(3))");
mysql_query("create table issue(sn int(10) primary key auto_increment,st_id varchar(15),acc_no int(10),issue_date text,return_date text,fine int(5))");
mysql_query("create table users(id varchar(20) primary key,pass varchar(20),name text,address text,phone text,access int(2),upload text)");
mysql_query("insert into users values('hem','','hem','lalbandi','9804337083',1,'upload/hem.jpg')");
mysql_query("create table message(sn int(4) auto_increment primary key,m_to text,m_from text,subject text,msg longtext,time text,date text)");
mysql_query("grant all privileges on *.* to hem@localhost identified by 'lab'");
if(mysql_error())
echo "error";	
else
echo "<body bgcolor='#4A6984'><h2>Databases Created Successfully</h2>";
?>