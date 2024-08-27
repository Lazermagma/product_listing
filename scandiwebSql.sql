USE`scandiweb`;

 CREATE TABLE `products` (
  `sku` varchar(255) PRIMARY KEY  NOT NULL,
  `name` varchar(255) NOT NULL ,
   `price`int  NOT NULL ,
 `type` varchar(255) NOT NULL ,
   `attrribute` varchar(200) NOT NULL
) ;


INSERT INTO `products`( `sku` ,`name` , `price` ,`type` ,`attrribute`)
VALUES ('1F01' , 'chair' , 350 , 'furniture' , '50x20x60'),
('1F02' , 'Bed' , 1500 , 'furniture' , '150x200x600'),
('1F03' , 'table' , 500 , 'furniture' , '500x20x60'),
('1B01' , 'Atomic habits ' , 50 , 'Book' , '0.5KG'),
('1B02' , 'ikigai' , 60 , 'Book' , '0.25KG'),
('1B03' , 'The Laws of Human Nature' , 100 , 'Book' , '0.6KG'),
('1D01' , 'DISC_01 ' , 80 , 'DVD' , '200MB'),
('1D02' , 'DISC_02' , 150 , 'DVD' , '300MB'),
('1D03' , 'DISC_03' , 300 , 'DVD' , '400MB');
