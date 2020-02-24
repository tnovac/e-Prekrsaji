SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
USE `iwa_2016_zb_projekt` ;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


--
-- Dumping data for table 'tip_korisnika'
--

INSERT INTO tip_korisnika (tip_id, naziv) VALUES
(0, 'administrator'),
(1, 'moderator'),
(2, 'korisnik');

--
-- Dumping data for table 'korisnik'
--

INSERT INTO korisnik (korisnik_id, tip_id, korisnicko_ime, lozinka, ime, prezime, email, slika) VALUES
(1, 0, 'admin', 'foi', 'Administrator', 'Administrator', '', 'korisnici/admin.jpg'),

(2 , 1, 'voditelj', '123456', 'Voditelj', 'Voditelj', '', 'korisnici/admin.jpg'),

(3 , 2, 'pkos', '123456', 'Pero', 'Kos', 'pkos@fff.hr', 'korisnici/pkos.jpg'),
(4 , 2, 'vzec', '123456', 'Vladimir', 'Zec', 'vzec@fff.hr', 'korisnici/vzec.jpg'),
(5 , 2, 'qtarantino', '123456', 'Quentin', 'Tarantino', 'qtarantino@foi.hr', 'korisnici/qtarantino.jpg'),
(6 , 2, 'mbellucci', '123456', 'Monica', 'Bellucci', 'mbellucci@foi.hr', 'korisnici/mbellucci.jpg'),
(7 , 2, 'vmortensen', '123456', 'Viggo', 'Mortensen', 'vmortensen@foi.hr', 'korisnici/vmortensen.jpg'),
(8 , 2, 'jgarner', '123456', 'Jennifer', 'Garner', 'jgarner@foi.hr', 'korisnici/jgarner.jpg'),
(9 , 2, 'nportman', '123456', 'Natalie', 'Portman', 'nportman@foi.hr', 'korisnici/nportman.jpg'),
(10, 2, 'dradcliffe', '123456', 'Daniel', 'Radcliffe', 'dradcliffe@foi.hr', 'korisnici/dradcliffe.jpg'),
(11, 2, 'hberry', '123456', 'Halle', 'Berry', 'hberry@foi.hr', 'korisnici/hberry.jpg'),
(12, 2, 'vdiesel', '123456', 'Vin', 'Diesel', 'vdiesel@foi.hr', 'korisnici/vdiesel.jpg'),
(13, 2, 'ecuthbert', '123456', 'Elisha', 'Cuthbert', 'ecuthbert@foi.hr', 'korisnici/ecuthbert.jpg'),
(14, 2, 'janiston', '123456', 'Jennifer', 'Aniston', 'janiston@foi.hr', 'korisnici/janiston.jpg'),
(15, 2, 'ctheron', '123456', 'Charlize', 'Theron', 'ctheron@foi.hr', 'korisnici/ctheron.jpg'),
(16, 2, 'nkidman', '123456', 'Nicole', 'Kidman', 'nkidman@foi.hr', 'korisnici/nkidman.jpg'),
(17, 2, 'ewatson', '123456', 'Emma', 'Watson', 'ewatson@foi.hr', 'korisnici/ewatson.jpg'),

(18, 1, 'kdunst', '123456', 'Kirsten', 'Dunst', 'kdunst@foi.hr', 'korisnici/kdunst.jpg'),

(19, 2, 'sjohansson', '123456', 'Scarlett', 'Johansson', 'sjohansson@foi.hr', 'korisnici/sjohansson.jpg'),
(20, 2, 'philton', '123456', 'Paris', 'Hilton', 'philton@foi.hr', 'korisnici/philton.jpg'),
(21, 2, 'kbeckinsale', '123456', 'Kate', 'Beckinsale', 'kbeckinsale@foi.hr', 'korisnici/kbeckinsale.jpg'),
(22, 2, 'tcruise', '123456', 'Tom', 'Cruise', 'tcruise@foi.hr', 'korisnici/tcruise.jpg'),
(23, 2, 'hduff', '123456', 'Hilary', 'Duff', 'hduff@foi.hr', 'korisnici/hduff.jpg'),
(24, 2, 'ajolie', '123456', 'Angelina', 'Jolie', 'ajolie@foi.hr', 'korisnici/ajolie.jpg'),
(25, 2, 'kknightley', '123456', 'Keira', 'Knightley', 'kknightley@foi.hr', 'korisnici/kknightley.jpg'),
(26, 2, 'obloom', '123456', 'Orlando', 'Bloom', 'obloom@foi.hr', 'korisnici/obloom.jpg'),
(27, 2, 'llohan', '123456', 'Lindsay', 'Lohan', 'llohan@foi.hr', 'korisnici/llohan.jpg'),
(28, 2, 'jdepp', '123456', 'Johnny', 'Depp', 'jdepp@foi.hr', 'korisnici/jdepp.jpg'),
(29, 2, 'kreeves', '123456', 'Keanu', 'Reeves', 'kreeves@foi.hr', 'korisnici/kreeves.jpg'),

(30, 1, 'thanks', '123456', 'Tom', 'Hanks', 'thanks@foi.hr', 'korisnici/thanks.jpg'),

(31, 2, 'elongoria', '123456', 'Eva', 'Longoria', 'elongoria@foi.hr', 'korisnici/elongoria.jpg'),
(32, 2, 'rde', '123456', 'Robert', 'De', 'rde@foi.hr', 'korisnici/rde.jpg'),
(33, 2, 'jheder', '123456', 'Jon', 'Heder', 'jheder@foi.hr', 'korisnici/jheder.jpg'),
(34, 2, 'rmcadams', '123456', 'Rachel', 'McAdams', 'rmcadams@foi.hr', 'korisnici/rmcadams.jpg'),
(35, 2, 'cbale', '123456', 'Christian', 'Bale', 'cbale@foi.hr', 'korisnici/cbale.jpg'),

(36, 1, 'jalba', '123456', 'Jessica', 'Alba', 'jalba@foi.hr', 'korisnici/jalba.jpg'),

(37, 2, 'bpitt', '123456', 'Brad', 'Pitt', 'bpitt@foi.hr', 'korisnici/bpitt.jpg'),
(43, 2, 'apacino', '123456', 'Al', 'Pacino', 'apacino@foi.hr', 'korisnici/apacino.jpg'),
(44, 2, 'wsmith', '123456', 'Will', 'Smith', 'wsmith@foi.hr', 'korisnici/wsmith.jpg'),
(45, 2, 'ncage', '123456', 'Nicolas', 'Cage', 'ncage@foi.hr', 'korisnici/ncage.jpg'),
(46, 2, 'vanne', '123456', 'Vanessa', 'Anne', 'vanne@foi.hr', 'korisnici/vanne.jpg'),
(47, 2, 'kheigl', '123456', 'Katherine', 'Heigl', 'kheigl@foi.hr', 'korisnici/kheigl.jpg'),
(48, 2, 'gbutler', '123456', 'Gerard', 'Butler', 'gbutler@foi.hr', 'korisnici/gbutler.jpg'),
(49, 2, 'jbiel', '123456', 'Jessica', 'Biel', 'jbiel@foi.hr', 'korisnici/jbiel.jpg'),
(50, 2, 'ldicaprio', '123456', 'Leonardo', 'DiCaprio', 'ldicaprio@foi.hr', 'korisnici/ldicaprio.jpg'),
(51, 2, 'mdamon', '123456', 'Matt', 'Damon', 'mdamon@foi.hr', 'korisnici/mdamon.jpg'),
(52, 2, 'hpanettiere', '123456', 'Hayden', 'Panettiere', 'hpanettiere@foi.hr', 'korisnici/hpanettiere.jpg'),
(53, 2, 'rreynolds', '123456', 'Ryan', 'Reynolds', 'rreynolds@foi.hr', 'korisnici/rreynolds.jpg'),
(54, 2, 'jstatham', '123456', 'Jason', 'Statham', 'jstatham@foi.hr', 'korisnici/jstatham.jpg'),
(55, 2, 'enorton', '123456', 'Edward', 'Norton', 'enorton@foi.hr', 'korisnici/enorton.jpg'),
(56, 2, 'mwahlberg', '123456', 'Mark', 'Wahlberg', 'mwahlberg@foi.hr', 'korisnici/mwahlberg.jpg'),
(57, 2, 'jmcavoy', '123456', 'James', 'McAvoy', 'jmcavoy@foi.hr', 'korisnici/jmcavoy.jpg'),
(58, 2, 'epage', '123456', 'Ellen', 'Page', 'epage@foi.hr', 'korisnici/epage.jpg'),
(59, 2, 'mcyrus', '123456', 'Miley', 'Cyrus', 'mcyrus@foi.hr', 'korisnici/mcyrus.jpg'),
(60, 2, 'kstewart', '123456', 'Kristen', 'Stewart', 'kstewart@foi.hr', 'korisnici/kstewart.jpg'),
(61, 2, 'mfox', '123456', 'Megan', 'Fox', 'mfox@foi.hr', 'korisnici/mfox.jpg'),
(62, 2, 'slabeouf', '123456', 'Shia', 'LaBeouf', 'slabeouf@foi.hr', 'korisnici/slabeouf.jpg'),
(63, 2, 'ceastwood', '123456', 'Clint', 'Eastwood', 'ceastwood@foi.hr', 'korisnici/ceastwood.jpg'),
(64, 2, 'srogen', '123456', 'Seth', 'Rogen', 'srogen@foi.hr', 'korisnici/srogen.jpg'),
(65, 2, 'nreed', '123456', 'Nikki', 'Reed', 'nreed@foi.hr', 'korisnici/nreed.jpg'),
(66, 2, 'agreene', '123456', 'Ashley', 'Greene', 'agreene@foi.hr', 'korisnici/agreene.jpg'),
(67, 2, 'zdeschanel', '123456', 'Zooey', 'Deschanel', 'zdeschanel@foi.hr', 'korisnici/zdeschanel.jpg'),
(68, 2, 'dfanning', '123456', 'Dakota', 'Fanning', 'dfanning@foi.hr', 'korisnici/dfanning.jpg'),
(69, 2, 'tlautner', '123456', 'Taylor', 'Lautner', 'tlautner@foi.hr', 'korisnici/tlautner.jpg'),
(70, 2, 'rpattinson', '123456', 'Robert', 'Pattinson', 'rpattinson@foi.hr', 'korisnici/rpattinson.jpg');

--
-- Dumping data for table 'kategorija'
--

INSERT INTO kategorija (kategorija_id, moderator_id, naziv, opis) VALUES
(1, 2, 'Brzina', 'Prekoračenje brzine u naselju i izvan naselja'),
(2, 2, 'Alkohol', 'Vožnja pod utjecajem alkohola'),
(3, 18, 'Ostalo', 'Ostali prometni prekršaji');


--
-- Dumping data for table 'vozilo'
--

INSERT INTO vozilo (korisnik_id, vozilo_id, registracija, marka_vozila, tip_vozila) VALUES
(3,1,'BJ-4868-HZ','VW','Golf 3'),
(4,2,'BM-8177-DP','VW','Polo'),
(5,3,'ČK-1022-TT','VW','Jetta'),
(6,4,'DA-810-KN','VW','Scirocco'),
(7,5,'DE-9608-UB','VW','Beetle'),
(8,6,'DJ-7139-RE','VW','Eos'),
(9,7,'DU-8523-BŠ','VW','Passat'),
(10,8,'GS-7845-CB','VW','Touran'),
(11,9,'IM-8543-ZŽ','VW','Sharan'),
(12,10,'KA-6334-PF','VW','Tiguan'),
(13,11,'KC-4594-NV','VW','Phaeton'),
(14,12,'KR-5845-RŽ','VW','Amarok'),
(15,13,'KT-3878-HO','Hyundai','Getz'),
(16,14,'KŽ-3876-IJ','Hyundai','Accent'),
(17,15,'MA-3306-NR','Hyundai','i10'),
(19,16,'NA-5817-OJ','Hyundai','Sonata'),
(20,17,'NG-3504-PU','Opel','Agila'),
(21,18,'OG-5575-JH','Opel','Antara'),
(22,19,'OS-9752-ZT','Opel','Astra'),
(23,20,'PU-4813-DB','Opel','Corsa'),
(24,21,'PŽ-551-IČ','Opel','Meriva'),
(25,22,'RI-3226-RC','Opel','Signum'),
(26,23,'SB-1071-BA','Opel','Tigra'),
(27,24,'SK-6634-MF','Opel','Vectra'),
(28,25,'SL-4504-FŽ','Opel','Zafira'),
(29,26,'ST-166-ZJ','Opel','Insignia'),
(31,27,'ŠI-2543-ČH','Opel','Vivaro'),
(32,28,'VK-7634-CŠ','Mazda','2'),
(33,29,'VT-1399-IN','Mazda','3'),
(34,30,'VU-7362-LJ','Mazda','5'),
(35,31,'VŽ-789-DS','Mazda','6'),
(37,32,'ZD-4293-GF','Mazda','CX-3'),
(43,33,'ZG-2186-AU','Mazda','CX-5'),
(44,34,'ŽU-9022-ŠN','Mazda','MX-5'),
(45,35,'SL-7060-FS','Mazda','RX-8'),
(46,36,'ST-5018-JU','Mazda','BT-50'),
(47,37,'ŠI-4116-VR','Mazda','CX-7'),
(48,38,'VK-6481-UJ','Peugeot','206'),
(49,39,'VT-5116-IB','Peugeot','307'),
(50,40,'VU-1958-IU','Peugeot','407'),
(51,41,'VŽ-7166-EP','Peugeot','1007'),
(52,42,'ZD-9292-ŽŠ','Renault','Clio'),
(53,43,'ZG-6482-TE','Renault','Espace'),
(54,44,'ŽU-5271-ŽV','Renault','Fluence'),
(55,45,'SL-2409-IS','Renault','Kangoo'),
(56,46,'ST-9192-UG','Renault','Koleos'),
(57,47,'ŠI-6588-PM','Renault','Laguna'),
(58,48,'VK-8848-PE','Renault','Latitude'),
(59,49,'VT-5615-BN','Renault','Mégane'),
(60,50,'VU-1103-HP','Renault','Twingo'),
(3,51,'BJ-984-JS','Citroën','C3'),
(10,52,'GS-7248-DŠ','Citroën','C4'),
(16,53,'KŽ-3261-ČJ','Audi','Q3'),
(21,54,'OG-9796-TR','Audi','TT'),
(24,55,'PŽ-9342-JE','Audi','A8'),
(27,56,'SK-1437-ŽF','BMW','M5'),
(33,57,'VT-2973-SN','BMW','M6'),
(43,58,'SL-583-IČ','Mercedes-Benz','A-klasa'),
(44,59,'VT-4074-UP','Mercedes-Benz','B-klasa'),
(52,60,'ŠI-1643-JO','Mercedes-Benz','C-klasa');

--
-- Dumping data for table 'prekrsaj'
--

INSERT INTO prekrsaj (vozilo_id, kategorija_id, naziv, opis, status, novcana_kazna, datum_prekrsaja, vrijeme_prekrsaja, datum_placanja, vrijeme_placanja, slika, video) VALUES
(1,1,'Prekoračenje brzine do 10 km/h','U naselju izmjereno je prekoračenje brzine do 10 km/h','N',300,'2013-01-01','00:55:00','','','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png','https://www.html5rocks.com/en/tutorials/track/basics/treeOfLife/video/developerStories-en.webm'),
(2,1,'Prekoračenje brzine od 10 do 20 km/h','U naselju izmjereno je prekoračenje brzine od 10 do 20 km/h','N',500,'2013-01-04','02:55:00','','','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png','https://www.html5rocks.com/en/tutorials/track/basics/treeOfLife/video/developerStories-en.webm'),
(3,1,'Prekoračenje brzine od 20 do 30 km/h','U naselju izmjereno je prekoračenje brzine od 20 do 30 km/h','N',1000,'2013-01-06','04:55:00','','','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png','https://www.html5rocks.com/en/tutorials/track/basics/treeOfLife/video/developerStories-en.webm'),
(4,1,'Prekoračenje brzine između 30 i 50 km/h','U naselju izmjereno je prekoračenje brzine između 30 i 50 km/h','N',2000,'2013-01-11','06:55:00','','','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(5,1,'Prekoračenje brzine više od 50 km/h','U naselju izmjereno je prekoračenje brzine više od 50 km/h','N',10000,'2013-01-15','08:55:00','','','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(6,1,'Prekoračenje brzine između 10 i 30 km/h','Izvan naselja izmjereno je prekoračenje brzine između 10 i 30 km/h','N',500,'2013-01-16','10:55:00','','','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(7,1,'Prekoračenje brzine između 30 i 50 km/h','Izvan naselja izmjereno je prekoračenje brzine između 30 i 50 km/h','P',1000,'2013-01-22','12:55:00','2013-01-24','00:00:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(8,1,'Prekoračenje brzine više od 50 km/h','Izvan naselja izmjereno je prekoračenje brzine više od 50 km/h','P',7000,'2013-01-25','14:55:00','2013-01-27','15:55:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(9,2,'Udio alkohola do 0,50 promila','Izmjerena količina alkohola u krvi iznosila je do 0,50 promila','P',700,'2013-01-28','16:55:00','2013-01-30','00:00:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png','https://www.html5rocks.com/en/tutorials/track/basics/treeOfLife/video/developerStories-en.webm'),
(10,2,'Udio alkohola od 0,51 do 1,00 promila','Izmjerena količina alkohola u krvi iznosila je od 0,51 do 1,00 promila','P',2000,'2013-01-30','18:55:00','2013-02-05','00:00:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png','https://www.html5rocks.com/en/tutorials/track/basics/treeOfLife/video/developerStories-en.webm'),
(11,2,'Udio alkohola od 1,01 do 1,50 promila','Izmjerena količina alkohola u krvi iznosila je od 1,01 do 1,50 promila','P',3000,'2013-02-01','20:55:00','2013-02-03','00:00:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png','https://www.html5rocks.com/en/tutorials/track/basics/treeOfLife/video/developerStories-en.webm'),
(12,2,'Udio alkohola veći od 1,50 promila','Izmjerena količina alkohola u krvi iznosila je više od 1,50 promila','P',10000,'2013-02-05','22:55:00','2013-02-07','00:00:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png','https://www.html5rocks.com/en/tutorials/track/basics/treeOfLife/video/developerStories-en.webm'),
(13,3,'Nečitljive registarske tablice','Vožnja s nečitljivim registarskim tablicama','N',300,'2013-02-12','02:55:00','','','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(14,3,'Neposjedovanje vozačke dozvole','Vožnja bez prometne dozvole','N',300,'2013-02-14','04:55:00','','','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(15,3,'Nevažeća vozačka dozvola','Vožnja s nevažećom vozačkom dozvolom','N',300,'2013-02-17','00:55:00','','','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),

(16,3,'Neposjedovanje vozačke dozvole uz sebe','Vožnja bez vozačke dozvole uz sebe','N',300,'2014-02-19','02:55:00','','','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png','https://www.html5rocks.com/en/tutorials/track/basics/treeOfLife/video/developerStories-en.webm'),
(17,3,'Neposjedovanje zimske opreme u zimskim uvjetima','Vožnja u zimskim uvjetima bez zimske opreme','N',300,'2014-02-23','04:55:00','','','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png','https://www.html5rocks.com/en/tutorials/track/basics/treeOfLife/video/developerStories-en.webm'),
(18,3,'Nedavanje podataka svjedoka nesreće','Svjedok nesreće ne želi dati podatke o sebi','N',300,'2014-02-24','06:55:00','','','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(19,3,'Vožnja bez svjetla u tunelu','Vožnja bez svjetla u tunelu','P',300,'2014-02-28','08:55:00','2014-02-28','10:55:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(20,3,'Nekorištenje trake za ubrzavanje/usporavanje','Nekorištenje trake za ubrzavanje ili usporavanje na autocesti ili cesti za promet motornih vozila','P',300,'2014-03-01','10:55:00','2014-03-03','00:00:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(21,3,'Prelaženje željezničkog prijelaza','Prelaženje željezničkog prijelaza bez signalizacije i bez provjere','P',300,'2014-03-05','12:55:00','2014-03-07','00:00:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(22,3,'Vožnja s dugim svjetlima','Vožnja s dugim svjetlima ako ometa ostale sudionike','P',300,'2014-03-08','14:55:00','2014-03-10','00:00:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(23,3,'Vožnja danju bez kratkog svjetla','Vožnja danju bez kratkog svjetla','P',300,'2014-03-13','16:55:00','2014-03-15','00:00:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png','https://www.html5rocks.com/en/tutorials/track/basics/treeOfLife/video/developerStories-en.webm'),
(24,3,'Neosiguravanje vozila','Neosiguravanje vozila protiv samostalnog pokretanja ili krađe','P',300,'2014-03-17','18:55:00','2014-03-19','00:00:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(25,3,'Nestavljanje trokuta','Nestavljanje trokuta na cestu ili na oba vozila pri vuči','P',300,'2014-03-18','20:55:00','2014-03-20','00:00:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png','https://www.html5rocks.com/en/tutorials/track/basics/treeOfLife/video/developerStories-en.webm'),
(26,3,'Zaustavljanje na nedopuštenim mjestima','Parkiranje, zaustavljanje na nedopuštenim mjestima','P',300,'2014-03-21','22:55:00','2014-03-23','00:00:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(27,3,'Ugrožavanje ostalih sudionika u prometu','Otvaranje vrata na parkiranom vozilu i pritom ugrožavanje ostalih sudionika','P',300,'2014-03-24','00:55:00','2014-03-26','00:00:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(28,3,'Ostavljanje neregistriranog vozila','Ostavljanje neregistriranog vozila, prikolice...','P',300,'2014-03-30','02:55:00','2014-03-30','03:55:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(29,3,'Nepomicanje sporog vozila','Nepomicanje sporog vozila udesno dok ga se pretječe','P',300,'2014-04-01','04:55:00','2014-04-03','00:00:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(30,3,'Pretjecanje uz ugrožavanje ostalih sudionika','Obilaženje ili pretjecanje ako se ugroze ostali sudionici (nedovoljan razmak...)','N',300,'2014-04-04','00:55:00','','','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),

(31,3,'Nepravilno mimoilaženje','Nepravilno mimoilaženje (nedovoljan razmak, na usponu...)','N',300,'2015-04-07','02:55:00','','','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(32,3,'Mijenjanje trake pred raskrižjem','Mijenjanje trake pred raskrižjem','N',300,'2015-04-11','04:55:00','','','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png','https://www.html5rocks.com/en/tutorials/track/basics/treeOfLife/video/developerStories-en.webm'),
(33,3,'Vožnja presporo bez četiri žmigavca','Vožnja presporo bez četiri žmigavca','N',300,'2015-04-15','06:55:00','','','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png','https://www.html5rocks.com/en/tutorials/track/basics/treeOfLife/video/developerStories-en.webm'),
(34,3,'Vožnja unatrag bez četiri žmigavca','Vožnja unatrag bez četiri žmigavca ili ometanje ostalih sudionika','N',300,'2015-04-16','08:55:00','','','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(35,3,'Skretanje bez žmigavca','Skretanje ili slično bez žmigavca','P',300,'2015-04-25','10:55:00','2015-04-27','00:00:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png','https://www.html5rocks.com/en/tutorials/track/basics/treeOfLife/video/developerStories-en.webm'),
(36,3,'Nepoštivanje prometnih znakova','Nepoštivanje prometnih znakova i oznaka na kolniku','P',300,'2015-04-26','12:55:00','2015-04-28','00:00:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(37,3,'Nekorištenje naočala','Nekorištenje naočala ili sličnih pomagala','P',300,'2015-04-27','14:55:00','2015-04-29','00:00:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png','https://www.html5rocks.com/en/tutorials/track/basics/treeOfLife/video/developerStories-en.webm'),
(38,3,'Nepridržavanje potrebnog razmaka','Nepridržavanje potrebnog razmaka dok se kreće iza drugog vozila','P',400,'2015-04-30','16:55:00','2015-04-30','17:55:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(39,3,'Nedopušteno zaustavljanje na autocesti','Nedopušteno zaustavljanje na autocesti ili cesti za promet motornim vozilima','P',400,'2015-05-01','18:55:00','2015-05-12','00:00:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(40,3,'Skretanje u bočnu cestu','Skretanje u bočnu cestu bez poštivanja pješaka na prijelazu','P',400,'2015-05-02','20:55:00','2015-05-13','00:00:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png','https://www.html5rocks.com/en/tutorials/track/basics/treeOfLife/video/developerStories-en.webm'),
(41,3,'Vozilo nije u mogućnosti stati','Naglo kretanje pješaka preko pješačkog prijelaza tako da vozilo nije u mogućnosti stati','N',400,'2015-05-06','22:55:00','','','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(42,3,'Vožnja s nedovoljnim razmakom','Vožnja s nedovoljnim razmakom','N',400,'2015-05-08','00:55:00','','','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png','https://www.html5rocks.com/en/tutorials/track/basics/treeOfLife/video/developerStories-en.webm'),
(43,3,'Presijecanje kolone pješaka','Presijecanje kolone pješaka, vojnika...','N',400,'2015-05-12','02:55:00','','','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png','https://www.html5rocks.com/en/tutorials/track/basics/treeOfLife/video/developerStories-en.webm'),
(44,3,'Zaustavljanje na nedopuštenim mjestima','Parkiranje ili zaustavljanje na nedopuštenim mjestima','N',400,'2015-05-17','00:55:00','','','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),

(45,3,'Naglo mijenjanje načina vožnje','Naglo mijenjanje načina vožnje','N',400,'2016-05-23','02:55:00','','','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png','https://www.html5rocks.com/en/tutorials/track/basics/treeOfLife/video/developerStories-en.webm'),
(46,3,'Prespora vožnja','Prespora vožnja te ometanje ostalih sudionika','N',400,'2016-05-24','04:55:00','','','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png','https://www.html5rocks.com/en/tutorials/track/basics/treeOfLife/video/developerStories-en.webm'),
(47,3,'Nije predana vozačka dozvola zbog kazne','Nije predana vozačka dozvola zbog kazne','N',500,'2016-05-28','06:55:00','','','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png','https://www.html5rocks.com/en/tutorials/track/basics/treeOfLife/video/developerStories-en.webm'),
(48,3,'Preinake bez izvršene homologacije','Nadograđivanje vozila ili preinake bez izvršene homologacije','P',500,'2016-05-29','08:55:00','2016-05-29','09:55:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(49,3,'Neodjavljeno vozilo','Neodjavljeno vozilo, nevraćene tablice ili nije promijenjena adresa u prometnoj dozvoli unutar 15 dana','P',500,'2016-05-30','10:55:00','2016-05-30','11:55:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(50,3,'Registracija istekla','Registracija istekla prije manje od 15 dana','P',500,'2016-06-01','12:55:00','2016-06-03','00:00:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png','https://www.html5rocks.com/en/tutorials/track/basics/treeOfLife/video/developerStories-en.webm'),
(51,3,'Korištenje mobitela u vožnji','Korištenje mobitela bez handsfree uređaja pri vožnji','P',500,'2016-06-02','14:55:00','2016-06-04','00:00:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png','https://www.html5rocks.com/en/tutorials/track/basics/treeOfLife/video/developerStories-en.webm'),
(52,3,'Vozilo s kolnika nije uklonjeno','Prometna nesreća s manjom materijalnom štetom pri čemu vozila s kolnika nisu uklonjena','P',500,'2016-06-03','16:55:00','2016-06-05','00:00:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(53,3,'Ne vezanje pojasom','Ne vezanje pojasom odnosno ako dijete mlađe od 12 godina sjedi naprijed','P',500,'2016-06-04','18:55:00','2016-06-06','00:00:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png','https://www.html5rocks.com/en/tutorials/track/basics/treeOfLife/video/developerStories-en.webm'),
(54,3,'Nepropuštanje policije','Nepropuštanje policije, hitne pomoći ili vatrogasaca','P',500,'2016-06-15','20:55:00','2016-06-17','00:00:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png','https://www.html5rocks.com/en/tutorials/track/basics/treeOfLife/video/developerStories-en.webm'),
(55,3,'Ometanje vozila','Ometanje vozila pod pratnjom policije ili vojske','P',500,'2016-06-16','22:55:00','2016-06-18','00:00:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png','https://www.html5rocks.com/en/tutorials/track/basics/treeOfLife/video/developerStories-en.webm'),
(56,3,'Vožnja lijevom trakom ako nema kolone','Vožnja lijevom trakom autocestom ili cestom za promet motornim vozilima ako u desnoj traci nema kolone','P',500,'2016-06-27','00:55:00','2016-06-27','02:55:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(57,3,'Nepropuštanje pješaka','Nepropuštanje pješaka na pješačkom prijelazu bez semafora','P',500,'2016-06-28','02:55:00','2016-06-28','03:55:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(58,3,'Parkiranje na nedopuštenom mjestu','Parkiranje, zaustavljanje na nedopuštenim mjestima','P',500,'2016-06-29','04:55:00','2016-06-29','05:55:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(59,3,'Uključivanje u promet','Uključivanje u promet te pritom ometanje ostalih sudionika','P',500,'2016-06-30','00:55:00','2016-06-30','02:55:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png',''),
(60,3,'Započinjanje nedozvoljene radnje vozilom','Započinjanje neke radnje vozilom i pritom ometanje ostalih sudionika','P',500,'2016-07-01','02:55:00','2016-07-01','04:55:00','https://cdn4.iconfinder.com/data/icons/pretty_office_3/128/Sales-by-Payment-Method-rep.png','');


-- --------------------------------------------------------

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
