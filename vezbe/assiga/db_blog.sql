-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2017 at 06:26 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(60) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`) VALUES
(1, 'PHP'),
(2, 'JAVASCRIPT'),
(3, 'HTML 5'),
(4, 'CSS'),
(25, 'MYSQL'),
(26, 'WORDPRESS'),
(27, 'JAVA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `author` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_comments`
--

INSERT INTO `tbl_comments` (`comment_id`, `comment_post_id`, `author`, `content`, `date`) VALUES
(1, 11, 'Petar', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2017-04-18 12:17:00'),
(4, 11, 'proba ', 'cao kako je?', '2017-04-18 13:58:28'),
(6, 11, 'proba ', 'cao kako je?', '2017-04-18 14:00:50'),
(11, 15, 'Pera', 'cao, kako je?', '2017-04-18 18:21:40'),
(12, 14, 'Pera', 'cao kako je?', '2017-04-18 20:51:29'),
(13, 16, 'Nikola', 'Proba komentara', '2017-04-18 21:47:41'),
(14, 16, 'Nikola', 'Proba komentara', '2017-04-18 21:48:54'),
(16, 20, 'proba', 'proba avatar-a', '2017-04-19 12:22:18'),
(17, 20, 'proba', 'proba avatar-a', '2017-04-19 12:23:18'),
(19, 21, 'proba', 'cao, kako je?', '2017-04-19 15:51:53'),
(20, 21, 'proba', 'cao, kako je?', '2017-04-19 15:52:12'),
(21, 21, 'proba', 'cao, kako je?', '2017-04-19 15:52:45'),
(22, 21, 'proba', 'cao, kako je?', '2017-04-19 15:52:59'),
(23, 21, 'proba', 'cao, kako je?', '2017-04-19 15:54:39'),
(24, 21, 'proba', 'cao, kako je?', '2017-04-19 15:58:51'),
(29, 16, 'makarije', 'proba brisanja', '2017-04-19 16:25:11'),
(31, 16, 'makarije', 'proba brisanja', '2017-04-19 16:28:27'),
(32, 16, 'makarije', 'proba brisanja', '2017-04-19 16:30:02'),
(33, 16, 'makarije', 'proba brisanja', '2017-04-19 16:30:49'),
(36, 15, 'makarije', 'proba', '2017-04-19 17:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(10) NOT NULL,
  `firstname` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tbl_contact';

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `firstname`, `lastname`, `email`, `message`, `status`, `date`) VALUES
(6, 'Aleksandar', 'Ljubisic', 'simke20@yahoo.com', 'cao kako je?cao kako je?cao kako je?cao kako je?cao kako je?cao kako je?cao kako je?cao kako je?cao kako je?cao kako je?cao kako je?', 1, '2017-04-15 20:17:14'),
(9, 'Simke', 'Simke', 'simke@yahoo.com', 'cao, kako je danas?', 1, '2017-04-15 22:38:41'),
(10, 'mako', 'markovic', 'makarije@gmail.com', 'cao, kako je?', 1, '2017-04-15 22:40:03'),
(11, 'Petar', 'Petrovic', 'pera@per.com', 'CAO, KAKO JE?', 0, '2017-04-18 21:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE `tbl_footer` (
  `id` tinyint(10) NOT NULL,
  `footer` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`id`, `footer`) VALUES
(1, 'Copyright: Aleksandar LjubiÅ¡iÄ‡');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id`, `name`, `body`) VALUES
(8, 'About us', '<p>About us..Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.</p>\r\n<p>About me..Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.</p>\r\n<p>About me..Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.</p>'),
(11, 'Zdravlje', '<p><img title="Zdravlje" src="http://infoeverything.com/wp-content/uploads/2016/09/health-at-work.jpg" alt="" width="1608" height="644" />cao cao, kako je?</p>'),
(13, 'Spot', '<p><iframe src="http://www.youtube.com/embed/DG0C3Tntl1M" frameborder="0" width="425" height="350"></iframe></p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `cat`, `title`, `body`, `image`, `author`, `tags`, `date`, `userid`) VALUES
(11, 2, 'Å ta je Javascript?', '<p>On pomaÅ¾e klijentskoj strani u interakciji sa web stranicama Äije su funkcionalnosti prethodno definisane u Javascript jeziku. Iako je njegov nastanak prvenstveno vezan za programski jezik Java koji je objektno-orijentisan, on nema skoro nikakve veze sa objektno-orijentisanim jezicima. Jedina stvar koju ima zajedniÄku sa Java programskim jezikom jeste sintaksa koja je nalik programskom jeziku C, odakle su je i nasledili.</p>\r\n<p>Brendan Ajh (Brendan Eich) je razvio Javascript programski jezik dok je radio za Netscape Communication korporaciju. Iako je naziv projekta razvoja novog programskog jezika bio Mocha, jezik je zvaniÄno nazvan Livescript i pod tim imenom se prvi put i pojavio septembra 1995. godine. MeÄ‘utim, ime je kasnije promenjeno u Javascript marketin&scaron;kim dogovorom kompanija Netscape i Sun. JavaScript je usvojen od strane Microsoft-a jula 1996. godine u novoj verziji njihovog pretraÅ¾ivaÄa, Internet Explorer 4. Iste godine Javascript je bio omoguÄ‡en i na serverskoj strani IIS, omoguÄ‡eno je kori&scaron;Ä‡enje prvog CSS-a kao i nove funkcionalnosti HTML-a. Razlike izmeÄ‘u statiÄnosti HTML-a i dinamiÄnosti JavaScript jezika pravile su dosta problema koji su kasnije re&scaron;eni u novijoj vetziji Internet Explorer 4. Koncept dinamiÄkog HTML-a je pobolj&scaron;ao interakciju sa JavaScript-om meÄ‘utim neke razlike su ipak ostale iste &scaron;to je otvorilo vrata kompaniji Oracle da preuzme stvari u svoje ruke kada je ovaj skriptni jezik u pitanju.</p>\r\n<p>Javascript je danas za&scaron;titni znak Oracle korporacije. Koristi se pod licencom razvijenom od strane Netscape Communications.</p>\r\n<p><span style="font-size: small;"><br /></span></p>', 'upload/44b1fcbb04.jpg', 'Simke021', 'java, js', '2017-04-13 17:14:43', 3),
(12, 3, 'Å ta je HTML?', '<p>Napisan je u formi HTML elemenata koji se otvaraju i zatvaraju tagovima. HTML tagovi su uglavnom upareni kao &scaron;to je sluÄaj na primer sa H tagovima, meÄ‘utim ima i tagova koji se ne zatvaraju kao &scaron;to je sliÄaj sa IMG tagovima. Prvi neupareni HTML tag je start koji se zavr&scaron;ava sa end tagom. HTML elementi su gradivni blokovi svakog web sajta.</p>\r\n<p>Web browser-i Äitaju HTML dajuÄ‡i korisniku vizuelni prikaz opisane stranice, ali ne i prikaz HTML tagova i kori&scaron;Ä‡enih skripti. Ipak, napredovanjem web pretraÅ¾ivaÄa moguÄ‡e je pogledati kod na svakoj stranici na internetu ukoliko Å¾elite da vidite &scaron;ta se krije iza interfejsa koji je iscrtan na va&scaron;em ekranu. Pored opisnog jezika HTML koristi se i CSS koji sluÅ¾i za opis pomenutih elemenata, i definisanje njihovog izgleda (layout-a).</p>\r\n<p>PoÄeci nastanka HTML jezika datiraju jo&scaron; u ranim osamdesetim. FiziÄar Tim Berners Li (Tim Berners-Lee) zaposlen u CERN-u predloÅ¾io je i dizajnirao ENQUIRE, sistem koji su istraÅ¾ivaÄi u CERN--u koristili za razmenu dokumenata. Tim Berners je kasnije 1989 godine do&scaron;ao na ideju kori&scaron;Ä‡enja definisanog hipertekst sistema koji Ä‡e se koristiti na internetu. Prva forma HTML-a se pojavila davne 1991 godine. SadrÅ¾ala je 18 elemenata i bila je dosta ograniÄena &scaron;to se sadrÅ¾aja tiÄe. Moramo da pomenemo da je prethodnik HTML-a bio SGML (Standard Generalized Markup Language) i da je HTML tada bio neka vrsta upro&scaron;Ä‡enog SGML jezika. Razvojem interneta, razvijali su se web pretraÅ¾ivaÄi kao i HTML koji je vremenom pored oznaÄavanja tekstualnog sadrÅ¾aja, omoguÄ‡avao oznaÄavanje multimedijalnog sadrÅ¾aja i ukljuÄivanje skriptnih kodova.</p>', 'upload/520c21680e.jpg', 'Simke021', 'html, 5, html5', '2017-04-13 17:20:58', 3),
(13, 4, 'Å ta je CSS?', '<p>ako koristi da se njime opisuju web stranice i korisniÄki interfejsi napisani u HTML-u i XHTML-u, CSS-om se takoÄ‘e mogu opisati bilo koje vrste XML dokumenata ukljuÄujuÄ‡i i sam XML, SVG ili XUL. Uz kori&scaron;Ä‡enje HTML i Javascript jezika, CSS daje vizuelnu strukturu i opis web sajtova, web aplikacija kao i aplikacija za mobilne telefone.</p>\r\n<p>Tri osnovne karakteristike CSS jezika su moguÄ‡nost za definisanje klasa za izgled, boje i fontova. Ovi elementi omoguÄ‡avaju pristupaÄniji i fleksibilniji sadrÅ¾aj kao i kontrolu web dizajnera nad odreÄ‘enom grupom HTML elemenata u sadrÅ¾aju. Na primer, znamo da HTML ima pojedine tagove kojima mogu da se defini&scaron;u pojedini elementi, kao &scaron;to je sluÄaj sa tagom. On omoguÄ‡ava podebljanost teksta na stranici. Ukoliko Å¾elimo da nam svaki naslov bude podebljan, kori&scaron;Ä‡enjem CSS-a Ä‡emo izbeÄ‡i konstantno ponavljanjetagova na svakom mestu gde se nalazi naslov tako &scaron;to Ä‡emo definisati klasu za izgled</p>\r\n<h1>tagova unutar CSS-a i samo pozvati tu klasu prilikom ispisivanja naslova.</h1>\r\n<p>Sintaksa CSS jezika je krajnje jednostavna i koristi odreÄ‘eni broj engleskih reÄi kako bi definisala pojedine elemente. Svaki opis se sastoji iz definisanja ciljnih elemenata, svojstva i vrednosti. U najnovijij CSS3 verziji postoji lista veÄ‡ postojeÄ‡ih elemenata koje je poÅ¾eljno definisati kako bi se kasnije u ispisivanju HTML stranice ispo&scaron;tovali standardi HTML 5 verzije kao &scaron;to su header, footer, section, media, audio... Definisanje klasa se vr&scaron;i na drugaÄiji naÄin, i njih moÅ¾emo da nazovemo onako kako Å¾elimo. Ispred svakog naziva se nalazi taÄka (.) a unutra&scaron;njost klase se defini&scaron;e unutar vitiÄastih zagrada {..}. ID klase sluÅ¾e za definisanje jedinstvenih objekata u HTML dokumentu. Sve deklaracije unutar klasa, ID ili elemenata su striktno definisane reÄi kao &scaron;to je font-size, color, width, height... Svaka od deklaracija se zatvara taÄka-zarezom (;). CSS je moguÄ‡e koristiti i unutar HTML, direktno ispisujuÄ‡i ga u okviru tagova, meÄ‘utim takva vrsta kori&scaron;Ä‡enja CSS-a se ne preporuÄuje zbog preglednosti i snalaÅ¾enju u kodu.</p>\r\n<p>Ekstenzija CSS dokumenata je .css. Definisani CSS fajl se ukljuÄuje unutar HTML dokumenta na sledeÄ‡i naÄin:</p>', 'upload/d141889dcb.jpg', 'Simke021', 'css, css3', '2017-04-13 17:26:40', 6),
(14, 1, 'Å ta je PHP?', '<p>Do januara 2013. godine PHP je instaliran na vi&scaron;e od 240 miliona sajtova i 2 miliona servera. Kreirao ga je Rasmus Lerdorf 1994. godine dok je traÅ¾io naÄin da direktno i &scaron;to lak&scaron;e upravlja svojim web stranicama i bazama podataka. Pisao ga je tako da omoguÄ‡i interakciju izmeÄ‘u web sadrÅ¾aja i baza podataka a da upravo on bude ta sprega izmeÄ‘u ta dva entiteta. Prva verzija PHP-a je iza&scaron;la 8.juna 1995. godine pod nazivom Personal Home Page Tools (PHP Tools v1.0) kako bi oni koji Ä‡e ga koristiti prona&scaron;li nedostatke i na taj naÄin pomogli napredovanju i pobolj&scaron;anju programskog jezika.</p>\r\n<p>PHP k&ocirc;d se moÅ¾e koristiti u kombinaciji sa HTML kodom tako &scaron;to Ä‡e se prethodno definisane PHP funkcije pozivati unutar HTML tagova. TakoÄ‘e se moÅ¾e koristiti u kombinaciji sa gotovim, besplatnim (tzv. open source) templejtima i web frejmvorkovima (framework). PHP k&ocirc;d se uglavnom izvr&scaron;ava uz pomoÄ‡ PHP interpretatora koji se nalazi na serveru kao modul web servera ili CGI. U PHP-u se mogu pisati i konzolne aplikacije i grafiÄki interfejsi iako je njegova primarna uloga kreiranje dinamiÄkih web stranica. Neki od najposeÄ‡enijih sajtova na svetu koriste PHP, kao &scaron;to su Fejsbuk, Vikipedija, Jahua, Jutjub i Fliker.</p>\r\n<p>PHP programi ne zahtevaju prevoÄ‘enje (kompajliranje) kao &scaron;to je sluÄaj recimo sa Java programskim jezikom ili programskim jezikom C, veÄ‡ se interpretira uz pomoÄ‡ PHP interpretatora koji radi po PHP CGI principu, dakle, interpretator se poziva za izvr&scaron;enje PHP skripte svaki put kada korisniÄka strana to od njega zahteva. Onog trenutka kada je PHP skripta izvr&scaron;ena, server &scaron;alje rezultate klijentskoj strani u formi podataka na odreÄ‘enoj generisanoj web stranici. PHP kod moÅ¾e da generi&scaron;e gotov HTML k&ocirc;d jedne web stranice kao i sliku i druge podatke.</p>\r\n<p>PHP k&ocirc;d je hijerarhijski organizovan i sastoji se od niza naredbi koje se izvr&scaron;avaju jedna za drugom. Poslednja naredba ujedno oznaÄava i kraj PHP koda.</p>', 'upload/bee23a9d75.png', 'Simke021', 'php', '2017-04-13 17:33:18', 6),
(15, 25, 'Å ta je MySQL?', '<p>Dobio je ime po Ä‡erci osnivaÄa Majkla Videniusa (Michael Widenius) koje se zove Maj (My). SQL je jezik koji se koristi za pisanje kverija unutar MySQL baze podataka. Prvobitan vlasnik MySQL-a je bila &scaron;vedska kompanija MySQL AB, dok je dana&scaron;nji vlasnik Oracle. Prva verzija MySQL baze podataka iza&scaron;la je 1995. godine. MySQL baza podataka je najpopularnija baza meÄ‘u web aplikacijama i koristi LAMP platformu. Aplikacije koje koriste MySQL bazu podataka su TYPO3, MODx, Joomla, Wordpress, phpBB, MyBB, Drupal kao i mnogi drugi softveri. MySQL takoÄ‘e koriste i najpoznatiji web sajtovi kao &scaron;to su Facebook, Twitter, Flickr, Youtube i Google (ne ukljuÄujuÄ‡i pretragu).</p>\r\n<p>MySQL omoguÄ‡ava pristup bazi podataka uz pomoÄ‡ veÄ‡ine programskih jezika. MySQL server i podrÅ¾ane bibilioteke pisane su u C i C++ programskim jezicima. MySQL radi na mnogim sistemskim platformama kao &scaron;to su AIX, BSDi, FreeBSD, HP-UX, eComStation, i5/OS, IRIX, Linux, OS X, Microsoft Windows, NetBSD, Novell NetWare, OpenBSD, OpenSolaris, OS/2 Wrap, QNX, Oracle Solaris, Symbian, SCO OpenServer, SCO UnixWare, Sanos i Tru64. Portovi MySQL-a prema OpenVMS takoÄ‘e postoje.</p>', 'upload/5ba3b928dc.png', 'Simke021', 'mysql, php', '2017-04-13 17:35:14', 3),
(16, 26, 'Å ta je Wordpress?', '<p>Pored osnovnih postavki Wordpress omoguÄ‡ava besplatnu nadogradnju i ukljuÄivanje dodataka, templejta i drugih elemenata koji omoguÄ‡avaju korisniku lak&scaron;e kori&scaron;Ä‡enje i upravljanje sadrÅ¾ajem svog sajta/bloga. Wordpress je najpopularniji sistem za blogovanje na svetu. Koristi ga preko 60 miliona web sajtova na internetu.</p>\r\n<p>Osnovali su ga Met Mulenveg (Matt Mullenweg) i Majk Litl (Mike Little). Prvi put se pojavio 26.maja 2003. godine i bio je besplatan za preuzimanje. Licenca pod kojom je iza&scaron;ao je bila GPLv2 koja je kasnije postala Free Software Foundation.</p>\r\n<p>Wordpress omoguÄ‡ava jednostavno menjanje tema sajta ili bloga. Teme omoguÄ‡avaju korisniku da menja izgled i funkcionalnosti svoje web prezentacije i one se mogu instalirati bez rizika da poremete sadrÅ¾aj sajta. Svaki Wordpress sajt zahteva instaliranu bar jednu temu. Svaka od teba mora imati neke osnovne strukture PHP-a, HTML-a i CSS-a. Danas se koriste Javascript i Jquery kako bi teme bile responsive, odnosno prilagodljive svim veliÄinama ekrana. Teme se mogu preuzeti direktno u Wordpress administraciji ili se jednostavno mogu zaÄaÄiti koristeÄ‡i FTP klijent. Wordpress korisnici takoÄ‘e sami mogu da razvijaju sopstvene teme i koriste ih po potrebama svoje web prezentacije.</p>\r\n<p>Wordpress prikljuÄci omoguÄ‡avaju korisniku da pro&scaron;iri svoje moguÄ‡nosti. Trenutno postoji preko 30.000 prikljuÄaka za preuzimanje u Wordpress-u. Neke od najbitnijih su prikljuÄci za galerije, SEO optimizaciju, kontakt forme, vidÅ¾eti (widgets) i navigacioni sistemi.</p>\r\n<p>Wordpress sadrÅ¾i mobilne aplikacije za WebOS, Adroid, iOS, Windows Phone i Blackberry. Ove aplikacije imaju ograniÄene moguÄ‡nosti u odnosu na web prezentaciju koju predstavljaju. Preko njih je moguÄ‡e dodavati nove stranice, tekstove, komentare, upravljati komentarima i replicirati na komentare.</p>\r\n<p>Za buduÄ‡nost, Met Mulenveg planira da zapoÄne projekat razvoje Wordpress-a u okviru dru&scaron;tvenih mreÅ¾a, mobilnih telefona kao i razvoj platformi za mobilne i druge aplikacije.</p>', 'upload/6b29e75df0.jpg', 'Simke021', 'wordpress, wp', '2017-04-13 17:40:44', 6),
(19, 2, 'Java Script', '<p>JavaScript programski jezik unapredjuje HTML dokument u smislu dinamiÄnosti, realizuje razne grafiÄke efekte, ali i funkcionalno i interaktivno. Kao takav JavaScript se integri&scaron;e u HTML kod. Iz ovoga verovatno pretpostavljate da vam je besmisleno uÄiti JavaScript ukoliko neznate HTML. Medjutim preporuÄujemo da takodje nauÄite i CSS pre nego krenete sa uÄenjem JavaScript-a.</p>\r\n<p>JavaScript se izvr&scaron;ava jedino na klijentskoj strani, odnosno u brauzeru. JavaScript ne moÅ¾e da razmenjuje podatke sa hard diskom.</p>\r\n<p>Evo konkretno na primer, JavaScript moÅ¾e izvr&scaron;avati odredjene akcije kada se recimo zavr&scaron;i uÄitavanje stranice, ili kada korisnik klikne, ili predje preko nekog HTML elementa-. Takodje JavaScript moÅ¾e napisati neki tekst u zavisnosti od neke akcije koju izvede posetilac na stranici. MoÅ¾e Äitati i menjati sadrÅ¾aj nekog HTML elementa. MoÅ¾e se koristiti za proveru valjanosti podataka koji se unose u HTML forme pre nego &scaron;to se po&scaron;alju na server. To &scaron;tedi resurse servera. I jo&scaron; mnoge druge korisne stvari moÅ¾emo obaviti JavaScript-om unutar HTML dokumenta koji sam HTML ne moÅ¾e.</p>\r\n<p>JavaScript je stvorio Brendan Eich na Netscape 1997 godine. JavaScript se i danas usavr&scaron;ava i razvija. Dodatnu popularnost JavaScript jeziku doneo je AJAX koji omoguÄ‡ava JavaScript-u da u svakom trenutku nezavisno od akcije posetioca razmenjuje u oba smera podatke sa serverom. To Äini jako dnamiÄnim internet strane.</p>\r\n<p>I jo&scaron; ne&scaron;to. JavaScript moÅ¾e manipulisati i odredjenim sadrÅ¾ajima, ali mora se znati da taj sadrÅ¾aj nije vidljiv pretraÅ¾ivaÄima, &scaron;to znaÄi da nikad neÄ‡e se naÄ‡i u rezultatima pretrage. E sad sa druge strane ako je nekom i potrebno da se sadrÅ¾aj sajta ne nadje u rezultatima pretrage onda moÅ¾e sav sadr&scaron;aj sajta da ide preko JavaScript.</p>', 'upload/38f3ba711f.jpg', 'Simke', 'js, java', '2017-04-14 00:18:58', 6),
(20, 4, 'Å ta je Responsive Web Design?', '<p>Jedna od glavnih karakteristika savremenog Interneta sa aspekta njegovog kori&scaron;Ä‡enja je da sve veÄ‡i broj osoba koristi sve veÄ‡i broj razliÄitih ureÄ‘aja da bi pristupao Internetu sa razliÄitih mesta, na razliÄite naÄine.</p>\r\n<p>Objedinjavanje doÅ¾ivljaja pri pregledanju nekog Web sadrÅ¾aja i prilagoÄ‘avanje doÅ¾ivljaja njegovog kori&scaron;Ä‡enja (korisniÄki doÅ¾ivljaj &ndash; <em>User Experience</em> &ndash; <strong>UX</strong>) odreÄ‘enoj platformi (kopjuter, tablet, mobilni telefon&hellip;) naziva se <span style="outline: medium none;"><strong>Responsive Web Design</strong></span>.</p>\r\n<p>Za rezolucije koje su bliske prikazu na mobilnim telefonima, odabrana je verzija bloga bez prikaza reklama, a i korisniÄki doÅ¾ivljaj je potpuno promenjen u odnosu na sam ureÄ‘aj preko koga se pristupa ovom blogu.</p>\r\n<p>U ovom konkretnom sluÄaju, izgled bloga je prilagoÄ‘en za tri razliÄite &scaron;irine ekrana, &scaron;to predstavlja i minimum dimenzija za prilagoÄ‘avanje (mobilni tel., tablet i kompjuter). U zavisnosti od potrebe, svaka definisana dimenzija (kojih moÅ¾e biti veoma veliki broj) moÅ¾e biti potpuno prilagoÄ‘ena konkretnim potrebama onoga &scaron;to je cilj samog Web sajta (npr. naruÄivanje, prodaja), tako da npr. u dimenzijama za tablet i za mobilne tel. moÅ¾e da se kreira korisniÄki doÅ¾ivljaj koji veoma liÄi na sada&scaron;nje varijante kreiranja posebnih mobilnih aplikacija.</p>\r\n<p>Jedini problem filozofije Responsive Web Design-a je &scaron;to je zahtevniji proces prilagoÄ‘avanja izgleda i &scaron;to ima veÄ‡i broj potrebnih rezolucija za prilagoÄ‘avanje &ndash; veÄ‡i je posao i veÄ‡a cena, samim tim. PraktiÄno, za jedan Web sajtpravi se veÄ‡i broj re&scaron;enja Web dizajna. Ali, ako se ovakve cene u nekom (da kaÅ¾emo) proseÄnom sluÄaju sloÅ¾enosti primene adekvatno &ndash; cena ove operacije bi trebalo da bude znantno niÅ¾a nego &scaron;to je potrebno za kreiranje posebnih mobilnih aplikacija za veliki broj razliÄitih platformi (Android, Symbian, iOS, Widows&hellip;).</p>', 'upload/808f4a0a06.jpg', 'Editor', 'css, media queries, ', '2017-04-17 23:53:11', 6),
(21, 27, 'Å ta je JAVA ???', '<p>Verovatno ste se bezbroj puta pitali: &Scaron;ta je JAVA , Äemu sluÅ¾i i za&scaron;to mi stalno izlazi neko upozorenje itd.<br /> <br />Java je raÄunarski programski jezik koji je razvila firma Sun Microsystems. Programski jezik se koristi za izdavanje instrukcija raÄunaru da obavi konkretne poslove. Java, mada relativno novi jezik, nastao 1995. godine, izuzetno je popularna.</p>\r\n<p>Prvi razlog za popularnost je njena cena &ndash; potpuno je besplatna!. Mnogi drugi programski jezici prodaju ce po ceni od vi&scaron;e stotina ili hiljada dolara, &scaron;to je za veÄ‡inu ljudi glavna prepreka da poÄnu da uÄe programiranje. <br /> <br /> Drugi razlog za popularnost Jave je to &scaron;to je Java programi mogu da se izvr&scaron;avaju na skoro svakom tipu raÄunara. KaÅ¾emo da su Java programi nezavisni od platforme na kojoj se izvr&scaron;avaju. <br /> <br /> Java moÅ¾e da se koristi za razvoj raznovrsnih aplikacija. Postoje jednostavni tekstualno-zasnovani programi koji se nazivaju konzolnim aplikacijama. Takvi programi podrÅ¾avaju samo tekstualni unos i ispis na monitoru va&scaron;eg raÄuanara. TakoÄ‘e, moÅ¾ete da pravite aplikacije sa grafiÄkim korisniÄkim interfejsom (engl. Graphical User Interface &ndash; GUI). Ove aplikacije raspolaÅ¾u sa menijima, paletama alatki, dugmadima, trakama za pomeranje sadrÅ¾aja&nbsp; drugim kontrolama koje reaguju na mi&scaron;a. Primeri GUI aplikacija koje ste u svom radu na raÄunaru veÄ‡ koristili su programi za obradu teksta, programi za rad sa tabelama i raÄunarske igrice. TakoÄ‘e, moÅ¾ete praviti i aplikacije koje se nazivaju apleti (engl. Applets). To su male GUI aplikacije koje mogu da se izvr&scaron;avaju unutar web stranice. Apleti daju dinamiÄnost web stranicama. <br /> <br />Poslednja prednost Jave je to &scaron;to je ona prost jezik,u poreÄ‘enju sa drugim programskim jezicima i zbog toga se relativno lako uÄi. Ta jednostavnost je neophodna da bi se podrÅ¾ala nezavisnost Java aplikacija od tipa platforme (sposobnost da se izvr&scaron;ava na svakom tipu <br /> raÄunara). MeÄ‘utim, ta jednostavnost ne znaÄi da Java nije moÄ‡an programski jezik. MoÅ¾ete pomoÄ‡u Jave da uradite sve ono &scaron;to moÅ¾ete da uradite sa bilo kojim mnogo sloÅ¾enijim programskim jezikom.</p>', 'upload/c70c8bd5cc.jpg', 'makarije', 'java', '2017-04-18 22:19:55', 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `id` tinyint(10) NOT NULL,
  `facebook` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `google` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `facebook`, `twitter`, `linkedin`, `google`) VALUES
(1, 'http://facebook.com/', 'http://twitter.com/', 'http://linkedin.com/', 'http://google.com/');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theme`
--

CREATE TABLE `tbl_theme` (
  `id` int(3) NOT NULL,
  `theme` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_theme`
--

INSERT INTO `tbl_theme` (`id`, `theme`) VALUES
(1, 'green');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8_unicode_ci,
  `role` tinyint(5) NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`, `details`, `role`, `name`) VALUES
(3, 'Admin', '202cb962ac59075b964b07152d234b70', 'simke@simke.com', '<p>Ja sam novi admininistrator sajta</p>', 0, 'Simke'),
(5, 'Autor', '250cf8b51c773f3f8dc8b4be867a9a02', 'veske@veske.com', '<p>Ja sam novi autor postova</p>', 1, 'Veske'),
(6, 'Editor', '68053af2923e00204c3ca7c6a3150cf7', 'milos@milos.com', '<p>Ja sam novi Etitor sajta</p>', 2, 'Milos'),
(16, 'makarije', '202cb962ac59075b964b07152d234b70', 'makarije@gmail.com', NULL, 3, NULL),
(17, 'pera', '202cb962ac59075b964b07152d234b70', 'pera@gmail.com', NULL, 3, NULL),
(18, 'simke', '356e543412c3353ae488254fad1ee643', '123', NULL, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `title_slogan`
--

CREATE TABLE `title_slogan` (
  `id` tinyint(10) NOT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `slogan` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `title_slogan`
--

INSERT INTO `title_slogan` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'Ovo se ucitava dinamicki, kao i logo', 'Ovo se ucitava dinamicki', 'upload/logo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_theme`
--
ALTER TABLE `tbl_theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title_slogan`
--
ALTER TABLE `title_slogan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  MODIFY `id` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `id` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_theme`
--
ALTER TABLE `tbl_theme`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `title_slogan`
--
ALTER TABLE `title_slogan`
  MODIFY `id` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
