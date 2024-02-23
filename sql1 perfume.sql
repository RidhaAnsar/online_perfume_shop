/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 5.7.9 : Database - perfume
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`perfume` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `perfume`;

/*Table structure for table `tbl_brand` */

DROP TABLE IF EXISTS `tbl_brand`;

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(15) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_brand` */

insert  into `tbl_brand`(`brand_id`,`brand_name`) values 
(1,'Woody'),
(2,'Citrus'),
(3,'Gourmand'),
(4,'Floral');

/*Table structure for table `tbl_card` */

DROP TABLE IF EXISTS `tbl_card`;

CREATE TABLE `tbl_card` (
  `card_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) NOT NULL,
  `card_no` varchar(20) NOT NULL,
  `card_name` varchar(20) NOT NULL,
  `bank_name` varchar(20) NOT NULL,
  `exp_date` varchar(20) NOT NULL,
  PRIMARY KEY (`card_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_card` */

insert  into `tbl_card`(`card_id`,`cust_id`,`card_no`,`card_name`,`bank_name`,`exp_date`) values 
(1,1,'1234567890123456','vbhgkjgjgk','ojhlhol','2022-12'),
(2,1,'1234567890123456','shlkdjlkdjjdl','dnsjnsalkhdla','2022-12'),
(3,2,'1234567890123456','dnskkndlj','snKJ MDSN','2022-12');

/*Table structure for table `tbl_cartchild` */

DROP TABLE IF EXISTS `tbl_cartchild`;

CREATE TABLE `tbl_cartchild` (
  `cart_child_id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_master_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `total_price` decimal(12,2) DEFAULT NULL,
  `qty` decimal(20,0) DEFAULT NULL,
  PRIMARY KEY (`cart_child_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_cartchild` */

insert  into `tbl_cartchild`(`cart_child_id`,`cart_master_id`,`item_id`,`total_price`,`qty`) values 
(4,3,3,400.00,1),
(3,2,3,400.00,1),
(5,4,4,300.00,1);

/*Table structure for table `tbl_cartmaster` */

DROP TABLE IF EXISTS `tbl_cartmaster`;

CREATE TABLE `tbl_cartmaster` (
  `cart_master_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) NOT NULL,
  `total_amount` decimal(12,2) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`cart_master_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_cartmaster` */

insert  into `tbl_cartmaster`(`cart_master_id`,`cust_id`,`total_amount`,`status`) values 
(2,1,400.00,'paid'),
(3,1,400.00,'paid'),
(4,2,300.00,'paid');

/*Table structure for table `tbl_category` */

DROP TABLE IF EXISTS `tbl_category`;

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(20) NOT NULL,
  `cat_description` varchar(60) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_category` */

insert  into `tbl_category`(`cat_id`,`cat_name`,`cat_description`) values 
(1,'Pure Perfume ','fdsg vdafa'),
(2,'Extrait de Parfum','dasf sfa'),
(3,' de Parfum.','safag'),
(4,'Toilette.','fdsg'),
(5,' Cologne','fdzfa'),
(6,' Fraiche.','sfSG');

/*Table structure for table `tbl_courier` */

DROP TABLE IF EXISTS `tbl_courier`;

CREATE TABLE `tbl_courier` (
  `courier_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `courier_name` varchar(20) NOT NULL,
  `courier_phone` decimal(10,0) NOT NULL,
  `courier_mail` varchar(30) NOT NULL,
  `c_location` varchar(20) NOT NULL,
  PRIMARY KEY (`courier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_courier` */

insert  into `tbl_courier`(`courier_id`,`username`,`staff_id`,`courier_name`,`courier_phone`,`courier_mail`,`c_location`) values 
(1,'ramu@gmail.com',0,'ramu',2345678907,'ranu@gmail.com','hdoiwdh hlkh '),
(2,'shyam@gmail.com',0,'shyam',987654321,'shyam@gmail.com','ggoig ouhio ');

/*Table structure for table `tbl_customer` */

DROP TABLE IF EXISTS `tbl_customer`;

CREATE TABLE `tbl_customer` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `cust_fname` varchar(10) NOT NULL,
  `cust_lname` varchar(10) NOT NULL,
  `cust_city` varchar(15) NOT NULL,
  `cust_district` varchar(15) NOT NULL,
  `cust_state` varbinary(15) NOT NULL,
  `cust_pincode` int(6) NOT NULL,
  `cust_phone` decimal(10,0) NOT NULL,
  `cust_gender` varchar(10) NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_customer` */

insert  into `tbl_customer`(`cust_id`,`username`,`cust_fname`,`cust_lname`,`cust_city`,`cust_district`,`cust_state`,`cust_pincode`,`cust_phone`,`cust_gender`) values 
(1,'riya@gmail.com','riya','go','kaloor','ekm','Kerala ',682032,1234567890,'female'),
(2,'siya@gmail.com','siya','nk','aluva','Ernakulam','Kerala ',682999,987654321,'male');

/*Table structure for table `tbl_delivery` */

DROP TABLE IF EXISTS `tbl_delivery`;

CREATE TABLE `tbl_delivery` (
  `delivery_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `courier_id` int(11) DEFAULT NULL,
  `delivery_date` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`delivery_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_delivery` */

/*Table structure for table `tbl_item` */

DROP TABLE IF EXISTS `tbl_item`;

CREATE TABLE `tbl_item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `item_name` varchar(25) NOT NULL,
  `description` varchar(30) NOT NULL,
  `item_image` varchar(1000) NOT NULL,
  `item_rate` decimal(10,0) NOT NULL,
  `stock` varchar(12) NOT NULL,
  `item_status` varchar(15) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_item` */

insert  into `tbl_item`(`item_id`,`cat_id`,`type_id`,`brand_id`,`item_name`,`description`,`item_image`,`item_rate`,`stock`,`item_status`) values 
(1,1,1,1,'Fogg','Fogg is one of the Brand','image/image_6352a0783e976.jpg',500,'42','1'),
(2,2,2,2,'Nivea','Advertisement','image/image_6352a0ac16c54.jpg',200,'499','1'),
(3,3,3,3,'Engage','ITC has launched Engage','image/image_6352a0e46b089.jpg',400,'97','1'),
(4,5,4,4,'Axe.','one the top perfume brands','image/image_6352a1240f37d.jpg',300,'95','1');

/*Table structure for table `tbl_login` */

DROP TABLE IF EXISTS `tbl_login`;

CREATE TABLE `tbl_login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_login` */

insert  into `tbl_login`(`username`,`password`,`user_type`,`status`) values 
('riya@gmail.com','riya','Customer','1'),
('siya@gmail.com','siya','Customer','1'),
('admin@gmail.com','admin','admin','1'),
('staff@gmail.com','staff','Staff','1'),
('ramu@gmail.com','ram','Courier','1'),
('shyam@gmail.com','shyam','Courier','0');

/*Table structure for table `tbl_order` */

DROP TABLE IF EXISTS `tbl_order`;

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_master_id` int(11) NOT NULL,
  `o_date` varchar(10) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_order` */

insert  into `tbl_order`(`order_id`,`cart_master_id`,`o_date`) values 
(1,1,'2022-11-03'),
(2,2,'2022-11-03'),
(3,3,'2022-11-03'),
(4,4,'2022-11-03');

/*Table structure for table `tbl_payment` */

DROP TABLE IF EXISTS `tbl_payment`;

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `card_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_date` varchar(10) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_payment` */

insert  into `tbl_payment`(`payment_id`,`card_id`,`cust_id`,`order_id`,`payment_date`) values 
(1,1,1,2,'2022-11-03'),
(2,2,1,3,'2022-11-03'),
(3,3,2,4,'2022-11-03');

/*Table structure for table `tbl_purchase_child` */

DROP TABLE IF EXISTS `tbl_purchase_child`;

CREATE TABLE `tbl_purchase_child` (
  `pur_child_id` int(11) NOT NULL AUTO_INCREMENT,
  `pur_master_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `cost_price` decimal(10,2) NOT NULL,
  `quantity` decimal(6,0) NOT NULL,
  PRIMARY KEY (`pur_child_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_purchase_child` */

insert  into `tbl_purchase_child`(`pur_child_id`,`pur_master_id`,`item_id`,`cost_price`,`quantity`) values 
(1,1,1,100.00,50),
(2,2,2,200.00,1);

/*Table structure for table `tbl_purchase_master` */

DROP TABLE IF EXISTS `tbl_purchase_master`;

CREATE TABLE `tbl_purchase_master` (
  `pur_master_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `tot_amount` decimal(12,0) NOT NULL,
  `date` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`pur_master_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_purchase_master` */

insert  into `tbl_purchase_master`(`pur_master_id`,`staff_id`,`vendor_id`,`tot_amount`,`date`) values 
(1,0,1,0,'2022-11-03'),
(2,0,2,0,'2022-11-03');

/*Table structure for table `tbl_staff` */

DROP TABLE IF EXISTS `tbl_staff`;

CREATE TABLE `tbl_staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `staff_fname` varchar(10) NOT NULL,
  `staff_lname` varchar(10) NOT NULL,
  `staff_phone` decimal(10,0) NOT NULL,
  `staff_city` varchar(15) NOT NULL,
  `staff_dist` varchar(15) NOT NULL,
  `staff_pin` int(6) NOT NULL,
  `staff_gender` varchar(10) NOT NULL,
  `date` varchar(10) NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_staff` */

insert  into `tbl_staff`(`staff_id`,`username`,`staff_fname`,`staff_lname`,`staff_phone`,`staff_city`,`staff_dist`,`staff_pin`,`staff_gender`,`date`) values 
(1,'staff@gmail.com','staff','qwerty',2345678900,'kaloor','Ernakulam',682999,'male','2022-10-23');

/*Table structure for table `tbl_type` */

DROP TABLE IF EXISTS `tbl_type`;

CREATE TABLE `tbl_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(20) NOT NULL,
  `description` varchar(60) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_type` */

insert  into `tbl_type`(`type_id`,`type_name`,`description`) values 
(1,'Ojai Wild','Redwood Leaves Eau de Cologne'),
(2,'Le Labo','Santal 33 Eau de Parfum'),
(3,'Montale Paris','Soleil de Capri Eau de Parfum'),
(4,'Prada',' Candy Eau de Parfum Spray');

/*Table structure for table `tbl_vendor` */

DROP TABLE IF EXISTS `tbl_vendor`;

CREATE TABLE `tbl_vendor` (
  `vendor_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(20) NOT NULL,
  `vendor_phone` decimal(10,0) NOT NULL,
  `vendor_email` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`vendor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_vendor` */

insert  into `tbl_vendor`(`vendor_id`,`vendor_name`,`vendor_phone`,`vendor_email`,`status`) values 
(1,'abhi',2345678907,'abhi@gmail.com','1'),
(2,'subi',1234567890,'subi@gmail.com','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
