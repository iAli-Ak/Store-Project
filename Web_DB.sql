CREATE DATABASE 7_Pixels;
USE 7_Pixels;

CREATE TABLE Customer_user(
C_id INT NOT NULL AUTO_INCREMENT,
C_name VARCHAR(20),
C_email VARCHAR(40) NOT NULL,
C_mobile_number INT(10),
C_password VARCHAR(20) NOT NULL,
C_address VARCHAR(60) NOT NULL,
PRIMARY KEY (C_id)
);

CREATE TABLE Admin_user(
A_id INT NOT NULL AUTO_INCREMENT,
A_name VARCHAR(20),
A_email VARCHAR(40) NOT NULL,
A_password VARCHAR(20) NOT NULL,
PRIMARY KEY(A_id)
);

CREATE TABLE Product(
P_id INT NOT NULL AUTO_INCREMENT,
P_name VARCHAR(100) NOT NULL,
P_price INT NOT NULL,
P_img VARCHAR (100) NOT NULL,
P_brand VARCHAR (30) NOT NULL,
P_desc VARCHAR (255) NOT NULL,
P_stock INT NOT NULL,
PRIMARY KEY(P_id)
);

CREATE TABLE Product_categories(
P_id INT NOT NULL,
P_categories VARCHAR(20) NOT NULL,
KEY(P_id),
FOREIGN KEY (P_id) REFERENCES Product (P_id)
		ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Edit(
A_id INT NOT NULL,
P_id INT NOT NULL,
KEY(A_id),
KEY(P_id),
FOREIGN KEY (A_id) REFERENCES Admin_user (A_id)
		ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (P_id) REFERENCES Product (P_id)
		ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE _Order(
O_id INT NOT NULL auto_increment ,
C_id INT NOT NULL,
PRIMARY KEY(O_id),
KEY(C_id),
FOREIGN KEY (C_id) REFERENCES Customer_user (C_id)
		ON DELETE CASCADE ON UPDATE CASCADE
 );
 
 CREATE TABLE order_data(
 O_id INT NOT NULL,
 P_id INT NOT NULL,
 quantity INT NOT NULL,
 total INT NOT NULL,
 FOREIGN KEY (O_id) REFERENCES _Order (O_id)
		ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (P_id) REFERENCES Product (P_id)
		ON DELETE CASCADE ON UPDATE CASCADE,
        
        PRIMARY KEY (O_id, P_id)
 );
 
 CREATE TABLE Bill(
 B_id INT NOT NULL,
 C_id INT NOT NULL,
 O_num INT NOT NULL,
 PRIMARY KEY(B_id),
 KEY(C_id),
 FOREIGN KEY (C_id) REFERENCES Customer_user (C_id)
		ON DELETE CASCADE ON UPDATE CASCADE

 );
 
 
 
 /*Inserting the Data*/
 
INSERT INTO Customer_user VALUES
(1,"Ali","Ali@gmail.com",0588472857,"123456789","Dammam"),
(2,"Ahmed","Ahmed@gmail.com",0543274664,"AB1234567","Dammam"),
(3,"Hassan","Hassan@gmail.com",0543348668,"ABC123","Khobar"),
(4,"Khalid","Khalid@gmail.com",0562787669,"234ABC232","Khobar"),
(5,"Hussain","Hussain@gmail.com",0583858835,"LFAF21145","Dammam"),
(6,"Ali","Ali.ak@gmail.com",0583474827,"AMLA123242","Khobar"),
(7,"Ahmed","Ahmed123@gmail.com",0572284885,"Ahmed12345","Saihat"),
(8,"Hassan","Hassan15323@gmail.com",0573385274,"Ha4242454","Dammam"),
(9,"Abdullah","Abdullah@gmail.com",0583382747,"H12342A","Dammam"),
(10,"Saleh","Saleh@gmail.com",0583736673,"S123321S","Khobar");

INSERT INTO Admin_user VALUES
(1,"Ali","Ali@outlook.com","0583474827"),
(2,"Ahmed","Ahmed@outlook.com","0543274664"),
(3,"Ibrahim ","Ibrahim@outlook.com","0543348668"),
(4,"Abdulaziz","Abdulaziz@outlook.com","0562787669"),
(5,"Hussain","Hussain@outlook.com","0583858835"),
(6,"Omar","Omar@outlook.com","0583474827");

INSERT INTO Product VALUES
(1,"iPhone 14",3749,'iphone14.png','Apple','iPhone 14 128GB Midnight 5G With FaceTime - Middle East Version',5),
(2,"Apple Watch SE 2 44 Smartwatch",1249,'AppleWatch.png','Apple','Watch SE GPS 44mm Aluminium Case With Sport Band Midnight (2022)',3),
(3,"Apple iPad Pro 11 - 2021 Tablet 5G",3599,'iPad Pro11.png','Apple','iPad Pro 2021 (3rd Generation) 11-inch M1 Chip 128GB Wi-Fi Space Gray with Facetime - Middle East Version',2),
(4,"Huwaei Matebook 14",2999,'LaptopH1.png','Huwaei','Matebook 14 2021 KELVIND-WDH9A Laptop With 14 Inch LED Display, Intel Core i5 11th Gen CPU 2.4GHz, 8GB RAM, 512GB SSD, Intel Iris Xe Graphics, Win 10 Arabic Space Grey',4),
(5,"Dell 17 XPS",10380,'LaptopD1.png','Dell','2021 Newest Dell XPS 17 Laptop 9710, 17" UHD+ Touch Display, Intel i7-11800H, GeForce RTX 3050, 32GB RAM, 1TB SSD, IR Camera, Backlit Keyboard, Fingerprint Reader, Wi-Fi 6, Thunderbolt, Win 10 Pro',10),
(6,"Xiaomi 12",2840,'MobileX1.png','Xiaomi','Xiaomi 12 Dual SIM 12GB RAM 256GB 5G Blue + Xiaomi Premium Card',30),
(7,"Samsung Galaxy S21 FE 5G",2149,'Samsung Galaxy S21 FE 5G.png','Samsung','Galaxy S21 FE Dual SIM Graphite 8GB RAM 256GB 5G - Middle East Version',15),
(8,"Huawei MatePad 11 Wi-Fi Tablet PC",1599,'Huawei MatePad 11 Wi-Fi Tablet PC.png','Huawei','Matepad 11 6GB RAM 128GB Wi-Fi Matte Grey - Middle East Version',3),
(9,"iPhone 12",2749,'iphone12.png','Apple','iPhone 12 With Facetime 128GB Blue 5G - Middle East Version',5),
(10, 'MacBook Air M1', '3999', 'Mac1.png','Apple','Macbook Air MGN63AB/A 13-Inch Display, M1 Chip With 8-Core Processor And 7-Core Graphics/8GB RAM/256GB SSD/Mac OS English/Arabic Space Grey',7),
(11, 'iPhone 13 Pro', '4089', 'iPhone 13 Pro.png','Apple','iPhone 13 Pro 128GB Alpine Green 5G With FaceTime - KSA Version',9),
(12, 'iPhone 13 Pro Max', '5199', 'iPhone 13 Pro Max.png','Apple','Apple iPhone 13 Pro Max (128GB) - Gold',10),
(13, 'iPhone 14 Plus', '3699', 'iPhone 14 Plus.png','Apple','iPhone 14 Plus 128GB (Product) Red 5G With FaceTime - Middle East Version',1),
(14, 'Huawei Watch Fit 2 Active Edition Smartwatch', '599', 'Huawei Watch Fit 2 Active Edition Smartwatch.png','Huawei','WATCH FIT 2 Active Edition Smartwatch With 1.74"FullView Display Durable Battery Life Automatic SpO2 Monitoring Midnight Black',3),
(15, 'Samsung Smart Monitor M8 32"', '1099', 'Monitor1.png','Samsung','32-Inch M5 FHD Smart Monitor White',5),
(16, 'MacBook Pro', 6838, 'MacPro.png', 'Apple', '2020 Apple MacBook Pro (13-inch, Apple M1 chip with 8‑Core CPU and 8‑Core GPU, 8GB RAM, 512GB SSD) - Space Grey Arabic/English',6);



INSERT INTO Product_categories VALUES
(1,"Phone"),
(2,"Smartwatch"),
(3,"Tablet"),
(4,"Laptop"),
(5,"Laptop"),
(6,"Phone"),
(7,"Phone"),
(8,"Tablet"),
(9,"Phone"),
(10,"Laptop"),
(11,"Phone"),
(12,"Phone"),
(13,"Phone"),
(14,"Smartwatch"),
(15,"Monitor"),
(16,"Laptop");





INSERT INTO Edit VALUES
(1,1),
(1,2),
(1,3),
(5,4),
(6,5);

INSERT INTO _Order VALUES
(1,1),
(2,1);

INSERT INTO Bill VALUES 
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4);

