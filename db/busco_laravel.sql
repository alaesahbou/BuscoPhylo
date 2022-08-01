-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 02 août 2022 à 00:42
-- Version du serveur :  5.7.34-log
-- Version de PHP : 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `busco_laravel`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `id` int(11) NOT NULL,
  `about` longtext NOT NULL,
  `tagline` longtext NOT NULL,
  `choose_plan` longtext NOT NULL,
  `account` longtext NOT NULL,
  `enjoy` longtext NOT NULL,
  `documentation` text NOT NULL,
  `citation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbl_about`
--

INSERT INTO `tbl_about` (`id`, `about`, `tagline`, `choose_plan`, `account`, `enjoy`, `documentation`, `citation`) VALUES
(1, '<p style=\"color: #000;\">In the era of Big data in genomics, thousands of genome sequences of living organisms are released in the public databases such as GenBank.</p>\r\n\r\n<p style=\"color: #000;\">BuscoPhylo has been implemented to provide a fully automated and complete pipeline to quickly perform BUSCO-based phylogenomic analysis starting from assembled genome sequences as inputs. The BuscoPhylo is a free, on-line and user-friendly webserver accepting genome sequences in fasta format as inputs and enabling to the user to export the tree ready for publication and all the results of the steps included in the pipeline for downstream analyses.</p>', '', '', '', '', '<h2><strong>Statistics :</strong></h2>\r\n<table>\r\n  <tr>\r\n    <th>Type</th>\r\n    <th>Nombre files</th>\r\n    <th>size</th>\r\n    <th>Time</th>\r\n  </tr>\r\n  <tr>\r\n    <td>bactérie</td>\r\n    <td>6 files</td>\r\n    <td>5,911 MB</td>\r\n    <td>2min21s</td>\r\n  </tr>\r\n  <tr>\r\n    <td>champignon</td>\r\n    <td>8 files</td>\r\n    <td>343,98 MB</td>\r\n    <td>2h7min27s</td>\r\n  </tr>\r\n</table>\r\n<h2><strong>How to use this server</strong></h2>\r\n<h3>Step 1: Data insertion</h3>\r\n<br>\r\n<ul>\r\n	<li><strong>UPLOAD FILE-</strong> Upload your multi-FASTA file.</strong> </li>\r\n	<li><strong>Custimize your input by choosing outgroup, lineage, mode and name of the project.</strong></li>\r\n	<li><strong>Submit the job by clicking on Submit button.</strong></li>\r\n</ul> \r\n<br>\r\n<center><img src=\"../img/step_1.png\" width=\"50%\"></center>\r\n<br>\r\n<h3>Step 2:</h3>\r\n<br>\r\n<p>If you are logged into the app : The projects will be stored automatically into your Account page.</p>\r\n<br>\r\n<p>Else : You can find your projects using the job ID or by clicking on add to favorite (this option requires cookies in order to retain your submission information).</p>\r\n<br>\r\n<center><img src=\"../img/step_2.png\" width=\"70%\"></center>\r\n<br>\r\n<h3>Step 3: Results</h3>\r\n<br>\r\n<p>Once the file upload has been completed, the following results page will be shown; you can download the result as a PNG or PDF or you can download the whole PROJECT FOLDER as a ZIP using the buttons at the bottom of the result section.</p>\r\n<br>\r\n<center><img src=\"../img/step_3.png\" width=\"50%\"></center>', '<h3>If using BuscoPhylo, please cite:</h3><br>\r\n<ul style=\"list-style-type:circle\">\r\n  <li>Manni, Mosè, Matthew R. Berkeley, Mathieu Seppey, and Evgeny M. Zdobnov. “BUSCO: Assessing Genomic Data Quality and Beyond.” Current Protocols 1, no. 12 (December 2021). https://doi.org/10.1002/cpz1.323.</li><br>\r\n  <li>“ETE Toolkit - Analysis and Visualization of (Phylogenetic) Trees.” Accessed August 1, 2022. http://etetoolkit.org/.</li>\r\n  <br><li>“IQ-TREE: Efficient Phylogenomic Software by Maximum Likelihood.” Accessed August 1, 2022. http://www.iqtree.org/.</li>\r\n  <br><li>“MUSCLE < Multiple Sequence Alignment < EMBL-EBI.” Accessed August 1, 2022. https://www.ebi.ac.uk/Tools/msa/muscle/.</li>\r\n  <br><li>“Trimal [TrimAl].” Accessed August 1, 2022. http://trimal.cgenomics.org/.</li>\r\n</ul>');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_alerts`
--

CREATE TABLE `tbl_alerts` (
  `code` varchar(50) NOT NULL,
  `type` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbl_alerts`
--

INSERT INTO `tbl_alerts` (`code`, `type`, `comment`) VALUES
('001', 'warning', 'Email address is used'),
('002', 'warning', 'Username is used'),
('003', 'success', 'Account created successfully'),
('004', 'danger', 'Invalid login details'),
('005', 'danger', 'Your account is blocked'),
('006', 'danger', 'You are not logged in'),
('007', 'danger', 'Invalid session key'),
('008', 'danger', 'You dont have privileges to perform this action'),
('009', 'danger', 'Multiple records founded'),
('010', 'success', 'Created successfully'),
('011', 'success', 'Deleted successfully'),
('012', 'success', 'Updated successfully'),
('013', 'warning', 'Sorry, only JPG, JPEG & PNG files are allowed'),
('014', 'danger', 'Sorry, there was an error uploading your file'),
('015', 'success', 'Link created successfully'),
('016', 'danger', 'Authentication failed : Invalid old password'),
('017', 'warning', 'Sorry, only JPG, JPEG & PNG files are allowed'),
('018', 'success', 'Sorry, only JPG, JPEG, ICO & PNG files are allowed'),
('019', 'success', 'Review deleted'),
('020', 'success', 'Comment deleted'),
('021', 'success', 'Account status changed'),
('022', 'success', 'User profile deleted successfully'),
('023', 'success', 'Item status changed'),
('024', 'success', 'Item deleted successfully'),
('025', 'success', 'Account was not found'),
('026', 'success', 'Instructions were sent to your email'),
('027', 'danger', 'Unknown error occured, please try again'),
('028', 'danger', 'Invalid token supplied'),
('029', 'success', 'Password reset completed'),
('030', 'success', 'Plan created successfully');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `comment` longtext NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `dislikes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_countries`
--

CREATE TABLE `tbl_countries` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_countries`
--

INSERT INTO `tbl_countries` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_coupons`
--

CREATE TABLE `tbl_coupons` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `limit_c` varchar(255) NOT NULL,
  `usage_c` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_episodes`
--

CREATE TABLE `tbl_episodes` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `streaming` varchar(255) NOT NULL,
  `episode_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_episode_subs`
--

CREATE TABLE `tbl_episode_subs` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL,
  `episode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_favourites`
--

CREATE TABLE `tbl_favourites` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_genres`
--

CREATE TABLE `tbl_genres` (
  `id` int(11) NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_items`
--

CREATE TABLE `tbl_items` (
  `c_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `item_id` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `year` varchar(255) NOT NULL,
  `run_time` varchar(255) NOT NULL,
  `plan` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `upload_type` varchar(255) NOT NULL,
  `genres` longtext NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `trailer_link` varchar(255) DEFAULT NULL,
  `upload_date` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `rates` int(11) NOT NULL DEFAULT '0',
  `views` varchar(255) NOT NULL DEFAULT '0',
  `status` varchar(255) NOT NULL DEFAULT 'Visible',
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_paypal`
--

CREATE TABLE `tbl_paypal` (
  `id` int(11) NOT NULL,
  `API_USER` varchar(255) NOT NULL,
  `API_PASS` varchar(255) NOT NULL,
  `API_SIG` varchar(255) NOT NULL,
  `API_USER_SB` varchar(255) NOT NULL,
  `API_PASS_SB` varchar(255) NOT NULL,
  `API_SIG_SB` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `switch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbl_paypal`
--

INSERT INTO `tbl_paypal` (`id`, `API_USER`, `API_PASS`, `API_SIG`, `API_USER_SB`, `API_PASS_SB`, `API_SIG_SB`, `status`, `switch`) VALUES
(1, 'Live API username', 'Live API Password', 'Live API signature', 'Sandbox API username', 'Sandbox API Password', 'Sandbox API signature', '0', '1');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_plans`
--

CREATE TABLE `tbl_plans` (
  `id` int(11) NOT NULL,
  `plan` varchar(255) NOT NULL,
  `valid` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `valid_type` varchar(255) NOT NULL,
  `max_size` varchar(255) NOT NULL DEFAULT '480'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbl_plans`
--

INSERT INTO `tbl_plans` (`id`, `plan`, `valid`, `cost`, `valid_type`, `max_size`) VALUES
(1000, 'BASIC', '1', '8', 'Months', '480'),
(1001, 'STANDARD', '1', '13', 'Months', '720'),
(1002, 'PREMIUM', '1', '17', 'Months', '1080');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_privacy`
--

CREATE TABLE `tbl_privacy` (
  `id` int(11) NOT NULL,
  `privacy` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbl_privacy`
--

INSERT INTO `tbl_privacy` (`id`, `privacy`) VALUES
(1, '');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_reset_tokens`
--

CREATE TABLE `tbl_reset_tokens` (
  `id` int(11) NOT NULL,
  `account` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_reviews`
--

CREATE TABLE `tbl_reviews` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `rates` int(11) NOT NULL,
  `comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_sessions`
--

CREATE TABLE `tbl_sessions` (
  `user` varchar(50) NOT NULL,
  `sessi_id` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_single_links`
--

CREATE TABLE `tbl_single_links` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `streaming` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_single_subs`
--

CREATE TABLE `tbl_single_subs` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_smtp`
--

CREATE TABLE `tbl_smtp` (
  `server` varchar(30) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `conn_type` varchar(255) NOT NULL,
  `conn_port` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_stripe`
--

CREATE TABLE `tbl_stripe` (
  `pub_key` varchar(255) NOT NULL,
  `sec_key` varchar(255) NOT NULL,
  `pub_key_test` varchar(255) NOT NULL,
  `sec_key_test` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `switch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbl_stripe`
--

INSERT INTO `tbl_stripe` (`pub_key`, `sec_key`, `pub_key_test`, `sec_key_test`, `status`, `switch`) VALUES
('PUB Key', 'SEC Key', 'PUB Key Sandbox', 'SEC Key Sandbox', '0', '1');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_time`
--

CREATE TABLE `tbl_time` (
  `item_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbl_time`
--

INSERT INTO `tbl_time` (`item_id`, `start_time`, `end_time`, `time`) VALUES
(1659084348, '13:32:55', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_timezones`
--

CREATE TABLE `tbl_timezones` (
  `zone_id` int(11) NOT NULL,
  `country_code` char(2) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `zone_name` varchar(35) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbl_timezones`
--

INSERT INTO `tbl_timezones` (`zone_id`, `country_code`, `zone_name`) VALUES
(1, 'AD', 'Europe/Andorra'),
(2, 'AE', 'Asia/Dubai'),
(3, 'AF', 'Asia/Kabul'),
(4, 'AG', 'America/Antigua'),
(5, 'AI', 'America/Anguilla'),
(6, 'AL', 'Europe/Tirane'),
(7, 'AM', 'Asia/Yerevan'),
(8, 'AO', 'Africa/Luanda'),
(9, 'AQ', 'Antarctica/McMurdo'),
(10, 'AQ', 'Antarctica/Casey'),
(11, 'AQ', 'Antarctica/Davis'),
(12, 'AQ', 'Antarctica/DumontDUrville'),
(13, 'AQ', 'Antarctica/Mawson'),
(14, 'AQ', 'Antarctica/Palmer'),
(15, 'AQ', 'Antarctica/Rothera'),
(16, 'AQ', 'Antarctica/Syowa'),
(17, 'AQ', 'Antarctica/Troll'),
(18, 'AQ', 'Antarctica/Vostok'),
(19, 'AR', 'America/Argentina/Buenos_Aires'),
(20, 'AR', 'America/Argentina/Cordoba'),
(21, 'AR', 'America/Argentina/Salta'),
(22, 'AR', 'America/Argentina/Jujuy'),
(23, 'AR', 'America/Argentina/Tucuman'),
(24, 'AR', 'America/Argentina/Catamarca'),
(25, 'AR', 'America/Argentina/La_Rioja'),
(26, 'AR', 'America/Argentina/San_Juan'),
(27, 'AR', 'America/Argentina/Mendoza'),
(28, 'AR', 'America/Argentina/San_Luis'),
(29, 'AR', 'America/Argentina/Rio_Gallegos'),
(30, 'AR', 'America/Argentina/Ushuaia'),
(31, 'AS', 'Pacific/Pago_Pago'),
(32, 'AT', 'Europe/Vienna'),
(33, 'AU', 'Australia/Lord_Howe'),
(34, 'AU', 'Antarctica/Macquarie'),
(35, 'AU', 'Australia/Hobart'),
(36, 'AU', 'Australia/Currie'),
(37, 'AU', 'Australia/Melbourne'),
(38, 'AU', 'Australia/Sydney'),
(39, 'AU', 'Australia/Broken_Hill'),
(40, 'AU', 'Australia/Brisbane'),
(41, 'AU', 'Australia/Lindeman'),
(42, 'AU', 'Australia/Adelaide'),
(43, 'AU', 'Australia/Darwin'),
(44, 'AU', 'Australia/Perth'),
(45, 'AU', 'Australia/Eucla'),
(46, 'AW', 'America/Aruba'),
(47, 'AX', 'Europe/Mariehamn'),
(48, 'AZ', 'Asia/Baku'),
(49, 'BA', 'Europe/Sarajevo'),
(50, 'BB', 'America/Barbados'),
(51, 'BD', 'Asia/Dhaka'),
(52, 'BE', 'Europe/Brussels'),
(53, 'BF', 'Africa/Ouagadougou'),
(54, 'BG', 'Europe/Sofia'),
(55, 'BH', 'Asia/Bahrain'),
(56, 'BI', 'Africa/Bujumbura'),
(57, 'BJ', 'Africa/Porto-Novo'),
(58, 'BL', 'America/St_Barthelemy'),
(59, 'BM', 'Atlantic/Bermuda'),
(60, 'BN', 'Asia/Brunei'),
(61, 'BO', 'America/La_Paz'),
(62, 'BQ', 'America/Kralendijk'),
(63, 'BR', 'America/Noronha'),
(64, 'BR', 'America/Belem'),
(65, 'BR', 'America/Fortaleza'),
(66, 'BR', 'America/Recife'),
(67, 'BR', 'America/Araguaina'),
(68, 'BR', 'America/Maceio'),
(69, 'BR', 'America/Bahia'),
(70, 'BR', 'America/Sao_Paulo'),
(71, 'BR', 'America/Campo_Grande'),
(72, 'BR', 'America/Cuiaba'),
(73, 'BR', 'America/Santarem'),
(74, 'BR', 'America/Porto_Velho'),
(75, 'BR', 'America/Boa_Vista'),
(76, 'BR', 'America/Manaus'),
(77, 'BR', 'America/Eirunepe'),
(78, 'BR', 'America/Rio_Branco'),
(79, 'BS', 'America/Nassau'),
(80, 'BT', 'Asia/Thimphu'),
(81, 'BW', 'Africa/Gaborone'),
(82, 'BY', 'Europe/Minsk'),
(83, 'BZ', 'America/Belize'),
(84, 'CA', 'America/St_Johns'),
(85, 'CA', 'America/Halifax'),
(86, 'CA', 'America/Glace_Bay'),
(87, 'CA', 'America/Moncton'),
(88, 'CA', 'America/Goose_Bay'),
(89, 'CA', 'America/Blanc-Sablon'),
(90, 'CA', 'America/Toronto'),
(91, 'CA', 'America/Nipigon'),
(92, 'CA', 'America/Thunder_Bay'),
(93, 'CA', 'America/Iqaluit'),
(94, 'CA', 'America/Pangnirtung'),
(95, 'CA', 'America/Atikokan'),
(96, 'CA', 'America/Winnipeg'),
(97, 'CA', 'America/Rainy_River'),
(98, 'CA', 'America/Resolute'),
(99, 'CA', 'America/Rankin_Inlet'),
(100, 'CA', 'America/Regina'),
(101, 'CA', 'America/Swift_Current'),
(102, 'CA', 'America/Edmonton'),
(103, 'CA', 'America/Cambridge_Bay'),
(104, 'CA', 'America/Yellowknife'),
(105, 'CA', 'America/Inuvik'),
(106, 'CA', 'America/Creston'),
(107, 'CA', 'America/Dawson_Creek'),
(108, 'CA', 'America/Fort_Nelson'),
(109, 'CA', 'America/Vancouver'),
(110, 'CA', 'America/Whitehorse'),
(111, 'CA', 'America/Dawson'),
(112, 'CC', 'Indian/Cocos'),
(113, 'CD', 'Africa/Kinshasa'),
(114, 'CD', 'Africa/Lubumbashi'),
(115, 'CF', 'Africa/Bangui'),
(116, 'CG', 'Africa/Brazzaville'),
(117, 'CH', 'Europe/Zurich'),
(118, 'CI', 'Africa/Abidjan'),
(119, 'CK', 'Pacific/Rarotonga'),
(120, 'CL', 'America/Santiago'),
(121, 'CL', 'America/Punta_Arenas'),
(122, 'CL', 'Pacific/Easter'),
(123, 'CM', 'Africa/Douala'),
(124, 'CN', 'Asia/Shanghai'),
(125, 'CN', 'Asia/Urumqi'),
(126, 'CO', 'America/Bogota'),
(127, 'CR', 'America/Costa_Rica'),
(128, 'CU', 'America/Havana'),
(129, 'CV', 'Atlantic/Cape_Verde'),
(130, 'CW', 'America/Curacao'),
(131, 'CX', 'Indian/Christmas'),
(132, 'CY', 'Asia/Nicosia'),
(133, 'CY', 'Asia/Famagusta'),
(134, 'CZ', 'Europe/Prague'),
(135, 'DE', 'Europe/Berlin'),
(136, 'DE', 'Europe/Busingen'),
(137, 'DJ', 'Africa/Djibouti'),
(138, 'DK', 'Europe/Copenhagen'),
(139, 'DM', 'America/Dominica'),
(140, 'DO', 'America/Santo_Domingo'),
(141, 'DZ', 'Africa/Algiers'),
(142, 'EC', 'America/Guayaquil'),
(143, 'EC', 'Pacific/Galapagos'),
(144, 'EE', 'Europe/Tallinn'),
(145, 'EG', 'Africa/Cairo'),
(146, 'EH', 'Africa/El_Aaiun'),
(147, 'ER', 'Africa/Asmara'),
(148, 'ES', 'Europe/Madrid'),
(149, 'ES', 'Africa/Ceuta'),
(150, 'ES', 'Atlantic/Canary'),
(151, 'ET', 'Africa/Addis_Ababa'),
(152, 'FI', 'Europe/Helsinki'),
(153, 'FJ', 'Pacific/Fiji'),
(154, 'FK', 'Atlantic/Stanley'),
(155, 'FM', 'Pacific/Chuuk'),
(156, 'FM', 'Pacific/Pohnpei'),
(157, 'FM', 'Pacific/Kosrae'),
(158, 'FO', 'Atlantic/Faroe'),
(159, 'FR', 'Europe/Paris'),
(160, 'GA', 'Africa/Libreville'),
(161, 'GB', 'Europe/London'),
(162, 'GD', 'America/Grenada'),
(163, 'GE', 'Asia/Tbilisi'),
(164, 'GF', 'America/Cayenne'),
(165, 'GG', 'Europe/Guernsey'),
(166, 'GH', 'Africa/Accra'),
(167, 'GI', 'Europe/Gibraltar'),
(168, 'GL', 'America/Godthab'),
(169, 'GL', 'America/Danmarkshavn'),
(170, 'GL', 'America/Scoresbysund'),
(171, 'GL', 'America/Thule'),
(172, 'GM', 'Africa/Banjul'),
(173, 'GN', 'Africa/Conakry'),
(174, 'GP', 'America/Guadeloupe'),
(175, 'GQ', 'Africa/Malabo'),
(176, 'GR', 'Europe/Athens'),
(177, 'GS', 'Atlantic/South_Georgia'),
(178, 'GT', 'America/Guatemala'),
(179, 'GU', 'Pacific/Guam'),
(180, 'GW', 'Africa/Bissau'),
(181, 'GY', 'America/Guyana'),
(182, 'HK', 'Asia/Hong_Kong'),
(183, 'HN', 'America/Tegucigalpa'),
(184, 'HR', 'Europe/Zagreb'),
(185, 'HT', 'America/Port-au-Prince'),
(186, 'HU', 'Europe/Budapest'),
(187, 'ID', 'Asia/Jakarta'),
(188, 'ID', 'Asia/Pontianak'),
(189, 'ID', 'Asia/Makassar'),
(190, 'ID', 'Asia/Jayapura'),
(191, 'IE', 'Europe/Dublin'),
(192, 'IL', 'Asia/Jerusalem'),
(193, 'IM', 'Europe/Isle_of_Man'),
(194, 'IN', 'Asia/Kolkata'),
(195, 'IO', 'Indian/Chagos'),
(196, 'IQ', 'Asia/Baghdad'),
(197, 'IR', 'Asia/Tehran'),
(198, 'IS', 'Atlantic/Reykjavik'),
(199, 'IT', 'Europe/Rome'),
(200, 'JE', 'Europe/Jersey'),
(201, 'JM', 'America/Jamaica'),
(202, 'JO', 'Asia/Amman'),
(203, 'JP', 'Asia/Tokyo'),
(204, 'KE', 'Africa/Nairobi'),
(205, 'KG', 'Asia/Bishkek'),
(206, 'KH', 'Asia/Phnom_Penh'),
(207, 'KI', 'Pacific/Tarawa'),
(208, 'KI', 'Pacific/Enderbury'),
(209, 'KI', 'Pacific/Kiritimati'),
(210, 'KM', 'Indian/Comoro'),
(211, 'KN', 'America/St_Kitts'),
(212, 'KP', 'Asia/Pyongyang'),
(213, 'KR', 'Asia/Seoul'),
(214, 'KW', 'Asia/Kuwait'),
(215, 'KY', 'America/Cayman'),
(216, 'KZ', 'Asia/Almaty'),
(217, 'KZ', 'Asia/Qyzylorda'),
(218, 'KZ', 'Asia/Qostanay'),
(219, 'KZ', 'Asia/Aqtobe'),
(220, 'KZ', 'Asia/Aqtau'),
(221, 'KZ', 'Asia/Atyrau'),
(222, 'KZ', 'Asia/Oral'),
(223, 'LA', 'Asia/Vientiane'),
(224, 'LB', 'Asia/Beirut'),
(225, 'LC', 'America/St_Lucia'),
(226, 'LI', 'Europe/Vaduz'),
(227, 'LK', 'Asia/Colombo'),
(228, 'LR', 'Africa/Monrovia'),
(229, 'LS', 'Africa/Maseru'),
(230, 'LT', 'Europe/Vilnius'),
(231, 'LU', 'Europe/Luxembourg'),
(232, 'LV', 'Europe/Riga'),
(233, 'LY', 'Africa/Tripoli'),
(234, 'MA', 'Africa/Casablanca'),
(235, 'MC', 'Europe/Monaco'),
(236, 'MD', 'Europe/Chisinau'),
(237, 'ME', 'Europe/Podgorica'),
(238, 'MF', 'America/Marigot'),
(239, 'MG', 'Indian/Antananarivo'),
(240, 'MH', 'Pacific/Majuro'),
(241, 'MH', 'Pacific/Kwajalein'),
(242, 'MK', 'Europe/Skopje'),
(243, 'ML', 'Africa/Bamako'),
(244, 'MM', 'Asia/Yangon'),
(245, 'MN', 'Asia/Ulaanbaatar'),
(246, 'MN', 'Asia/Hovd'),
(247, 'MN', 'Asia/Choibalsan'),
(248, 'MO', 'Asia/Macau'),
(249, 'MP', 'Pacific/Saipan'),
(250, 'MQ', 'America/Martinique'),
(251, 'MR', 'Africa/Nouakchott'),
(252, 'MS', 'America/Montserrat'),
(253, 'MT', 'Europe/Malta'),
(254, 'MU', 'Indian/Mauritius'),
(255, 'MV', 'Indian/Maldives'),
(256, 'MW', 'Africa/Blantyre'),
(257, 'MX', 'America/Mexico_City'),
(258, 'MX', 'America/Cancun'),
(259, 'MX', 'America/Merida'),
(260, 'MX', 'America/Monterrey'),
(261, 'MX', 'America/Matamoros'),
(262, 'MX', 'America/Mazatlan'),
(263, 'MX', 'America/Chihuahua'),
(264, 'MX', 'America/Ojinaga'),
(265, 'MX', 'America/Hermosillo'),
(266, 'MX', 'America/Tijuana'),
(267, 'MX', 'America/Bahia_Banderas'),
(268, 'MY', 'Asia/Kuala_Lumpur'),
(269, 'MY', 'Asia/Kuching'),
(270, 'MZ', 'Africa/Maputo'),
(271, 'NA', 'Africa/Windhoek'),
(272, 'NC', 'Pacific/Noumea'),
(273, 'NE', 'Africa/Niamey'),
(274, 'NF', 'Pacific/Norfolk'),
(275, 'NG', 'Africa/Lagos'),
(276, 'NI', 'America/Managua'),
(277, 'NL', 'Europe/Amsterdam'),
(278, 'NO', 'Europe/Oslo'),
(279, 'NP', 'Asia/Kathmandu'),
(280, 'NR', 'Pacific/Nauru'),
(281, 'NU', 'Pacific/Niue'),
(282, 'NZ', 'Pacific/Auckland'),
(283, 'NZ', 'Pacific/Chatham'),
(284, 'OM', 'Asia/Muscat'),
(285, 'PA', 'America/Panama'),
(286, 'PE', 'America/Lima'),
(287, 'PF', 'Pacific/Tahiti'),
(288, 'PF', 'Pacific/Marquesas'),
(289, 'PF', 'Pacific/Gambier'),
(290, 'PG', 'Pacific/Port_Moresby'),
(291, 'PG', 'Pacific/Bougainville'),
(292, 'PH', 'Asia/Manila'),
(293, 'PK', 'Asia/Karachi'),
(294, 'PL', 'Europe/Warsaw'),
(295, 'PM', 'America/Miquelon'),
(296, 'PN', 'Pacific/Pitcairn'),
(297, 'PR', 'America/Puerto_Rico'),
(298, 'PS', 'Asia/Gaza'),
(299, 'PS', 'Asia/Hebron'),
(300, 'PT', 'Europe/Lisbon'),
(301, 'PT', 'Atlantic/Madeira'),
(302, 'PT', 'Atlantic/Azores'),
(303, 'PW', 'Pacific/Palau'),
(304, 'PY', 'America/Asuncion'),
(305, 'QA', 'Asia/Qatar'),
(306, 'RE', 'Indian/Reunion'),
(307, 'RO', 'Europe/Bucharest'),
(308, 'RS', 'Europe/Belgrade'),
(309, 'RU', 'Europe/Kaliningrad'),
(310, 'RU', 'Europe/Moscow'),
(311, 'UA', 'Europe/Simferopol'),
(312, 'RU', 'Europe/Kirov'),
(313, 'RU', 'Europe/Astrakhan'),
(314, 'RU', 'Europe/Volgograd'),
(315, 'RU', 'Europe/Saratov'),
(316, 'RU', 'Europe/Ulyanovsk'),
(317, 'RU', 'Europe/Samara'),
(318, 'RU', 'Asia/Yekaterinburg'),
(319, 'RU', 'Asia/Omsk'),
(320, 'RU', 'Asia/Novosibirsk'),
(321, 'RU', 'Asia/Barnaul'),
(322, 'RU', 'Asia/Tomsk'),
(323, 'RU', 'Asia/Novokuznetsk'),
(324, 'RU', 'Asia/Krasnoyarsk'),
(325, 'RU', 'Asia/Irkutsk'),
(326, 'RU', 'Asia/Chita'),
(327, 'RU', 'Asia/Yakutsk'),
(328, 'RU', 'Asia/Khandyga'),
(329, 'RU', 'Asia/Vladivostok'),
(330, 'RU', 'Asia/Ust-Nera'),
(331, 'RU', 'Asia/Magadan'),
(332, 'RU', 'Asia/Sakhalin'),
(333, 'RU', 'Asia/Srednekolymsk'),
(334, 'RU', 'Asia/Kamchatka'),
(335, 'RU', 'Asia/Anadyr'),
(336, 'RW', 'Africa/Kigali'),
(337, 'SA', 'Asia/Riyadh'),
(338, 'SB', 'Pacific/Guadalcanal'),
(339, 'SC', 'Indian/Mahe'),
(340, 'SD', 'Africa/Khartoum'),
(341, 'SE', 'Europe/Stockholm'),
(342, 'SG', 'Asia/Singapore'),
(343, 'SH', 'Atlantic/St_Helena'),
(344, 'SI', 'Europe/Ljubljana'),
(345, 'SJ', 'Arctic/Longyearbyen'),
(346, 'SK', 'Europe/Bratislava'),
(347, 'SL', 'Africa/Freetown'),
(348, 'SM', 'Europe/San_Marino'),
(349, 'SN', 'Africa/Dakar'),
(350, 'SO', 'Africa/Mogadishu'),
(351, 'SR', 'America/Paramaribo'),
(352, 'SS', 'Africa/Juba'),
(353, 'ST', 'Africa/Sao_Tome'),
(354, 'SV', 'America/El_Salvador'),
(355, 'SX', 'America/Lower_Princes'),
(356, 'SY', 'Asia/Damascus'),
(357, 'SZ', 'Africa/Mbabane'),
(358, 'TC', 'America/Grand_Turk'),
(359, 'TD', 'Africa/Ndjamena'),
(360, 'TF', 'Indian/Kerguelen'),
(361, 'TG', 'Africa/Lome'),
(362, 'TH', 'Asia/Bangkok'),
(363, 'TJ', 'Asia/Dushanbe'),
(364, 'TK', 'Pacific/Fakaofo'),
(365, 'TL', 'Asia/Dili'),
(366, 'TM', 'Asia/Ashgabat'),
(367, 'TN', 'Africa/Tunis'),
(368, 'TO', 'Pacific/Tongatapu'),
(369, 'TR', 'Europe/Istanbul'),
(370, 'TT', 'America/Port_of_Spain'),
(371, 'TV', 'Pacific/Funafuti'),
(372, 'TW', 'Asia/Taipei'),
(373, 'TZ', 'Africa/Dar_es_Salaam'),
(374, 'UA', 'Europe/Kiev'),
(375, 'UA', 'Europe/Uzhgorod'),
(376, 'UA', 'Europe/Zaporozhye'),
(377, 'UG', 'Africa/Kampala'),
(378, 'UM', 'Pacific/Midway'),
(379, 'UM', 'Pacific/Wake'),
(380, 'US', 'America/New_York'),
(381, 'US', 'America/Detroit'),
(382, 'US', 'America/Kentucky/Louisville'),
(383, 'US', 'America/Kentucky/Monticello'),
(384, 'US', 'America/Indiana/Indianapolis'),
(385, 'US', 'America/Indiana/Vincennes'),
(386, 'US', 'America/Indiana/Winamac'),
(387, 'US', 'America/Indiana/Marengo'),
(388, 'US', 'America/Indiana/Petersburg'),
(389, 'US', 'America/Indiana/Vevay'),
(390, 'US', 'America/Chicago'),
(391, 'US', 'America/Indiana/Tell_City'),
(392, 'US', 'America/Indiana/Knox'),
(393, 'US', 'America/Menominee'),
(394, 'US', 'America/North_Dakota/Center'),
(395, 'US', 'America/North_Dakota/New_Salem'),
(396, 'US', 'America/North_Dakota/Beulah'),
(397, 'US', 'America/Denver'),
(398, 'US', 'America/Boise'),
(399, 'US', 'America/Phoenix'),
(400, 'US', 'America/Los_Angeles'),
(401, 'US', 'America/Anchorage'),
(402, 'US', 'America/Juneau'),
(403, 'US', 'America/Sitka'),
(404, 'US', 'America/Metlakatla'),
(405, 'US', 'America/Yakutat'),
(406, 'US', 'America/Nome'),
(407, 'US', 'America/Adak'),
(408, 'US', 'Pacific/Honolulu'),
(409, 'UY', 'America/Montevideo'),
(410, 'UZ', 'Asia/Samarkand'),
(411, 'UZ', 'Asia/Tashkent'),
(412, 'VA', 'Europe/Vatican'),
(413, 'VC', 'America/St_Vincent'),
(414, 'VE', 'America/Caracas'),
(415, 'VG', 'America/Tortola'),
(416, 'VI', 'America/St_Thomas'),
(417, 'VN', 'Asia/Ho_Chi_Minh'),
(418, 'VU', 'Pacific/Efate'),
(419, 'WF', 'Pacific/Wallis'),
(420, 'WS', 'Pacific/Apia'),
(421, 'YE', 'Asia/Aden'),
(422, 'YT', 'Indian/Mayotte'),
(423, 'ZA', 'Africa/Johannesburg'),
(424, 'ZM', 'Africa/Lusaka'),
(425, 'ZW', 'Africa/Harare');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_transactions`
--

CREATE TABLE `tbl_transactions` (
  `id` int(11) NOT NULL,
  `trans_id` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `ammount` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `purchase_date` varchar(255) NOT NULL,
  `confirm_rec` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_used_coupons`
--

CREATE TABLE `tbl_used_coupons` (
  `id` int(11) NOT NULL,
  `coupon` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `security` varchar(255) NOT NULL,
  `reg_date` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'user.svg',
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `badge` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `first_name`, `last_name`, `email`, `username`, `status`, `security`, `reg_date`, `image`, `role`, `badge`) VALUES
(17626867, 'admin', 'admin', 'admin@admin.com', 'admin', '1', '$2y$10$B2749SGOa7uVCECU9hkAKOzBC0eD0c33fnsD..NS5.zeiVzWFjd46', '05-07-2022', 'avator17626867643.jpg', 'user', '1'),


-- --------------------------------------------------------

--
-- Structure de la table `tbl_user_plans`
--

CREATE TABLE `tbl_user_plans` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `purchase_date` varchar(255) NOT NULL,
  `expire_date` varchar(255) NOT NULL,
  `max_size` int(11) NOT NULL DEFAULT '480'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_views`
--

CREATE TABLE `tbl_views` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `view_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbl_views`
--

INSERT INTO `tbl_views` (`id`, `item`, `ip`, `view_date`) VALUES
(1, '957464418398', '41.249.17.144', '2022-06-21 01:46:05'),
(2, '1655822170', '41.140.28.172', '2022-06-21 05:50:10'),
(3, '1655822170', '41.140.39.94', '2022-06-22 04:39:38'),
(4, '1655906587', '41.140.39.94', '2022-06-22 05:03:11'),
(5, '1655906587', '105.158.163.35', '2022-06-23 04:05:13'),
(6, '1655822170', '105.158.163.35', '2022-06-23 05:17:50'),
(7, '1655822295', '105.158.163.35', '2022-06-23 06:11:16'),
(8, '1655822295', '196.70.233.203', '2022-06-24 01:07:20'),
(9, '1655822170', '105.157.0.234', '2022-06-24 09:44:43'),
(10, '1655822170', '160.165.55.229', '2022-06-25 07:15:15'),
(11, '1655822295', '196.200.148.188', '2022-06-25 12:39:50'),
(12, '1656155937', '41.249.126.39', '2022-06-25 02:24:05'),
(13, '1656156042', '41.249.126.39', '2022-06-25 02:24:21'),
(14, '1656156042', '196.78.174.79', '2022-06-25 02:56:48'),
(15, '1656158539', '196.78.174.79', '2022-06-25 03:06:17'),
(16, '1656158864', '196.200.148.188', '2022-06-25 03:07:49'),
(17, '1656158864', '196.78.174.79', '2022-06-25 03:14:22'),
(18, '1656158539', '196.200.148.188', '2022-06-25 03:44:05'),
(19, '1655822170', '41.249.126.39', '2022-06-26 05:27:12'),
(20, '1655822171', '41.249.126.39', '2022-06-26 07:16:53'),
(21, '1655822171', '196.112.102.93', '2022-06-26 07:48:25'),
(22, '1655822171', '105.156.198.200', '2022-06-26 03:39:36'),
(23, '1655822171', '196.112.212.50', '2022-06-26 04:37:41'),
(24, '1655822171', '41.140.175.3', '2022-06-27 03:52:42'),
(25, '1655822170', '196.200.148.188', '2022-06-27 12:42:57'),
(26, '1656323499', '41.92.112.52', '2022-06-28 12:02:55'),
(27, '1655822170', '41.92.0.177', '2022-06-28 12:10:40'),
(28, '1655822171', '41.92.112.52', '2022-06-28 12:10:44'),
(29, '1655822170', '41.92.112.52', '2022-06-28 12:11:46'),
(30, '1656323499', '41.92.0.177', '2022-06-28 12:46:45'),
(31, '1655822170', '160.77.107.60', '2022-06-28 12:23:15'),
(32, '1655822171', '196.91.26.175', '2022-06-28 02:44:30'),
(33, '1655822171', '41.249.0.68', '2022-07-04 03:37:21'),
(34, '1656896885', '41.249.0.68', '2022-07-04 04:08:12'),
(35, '1656937059', '41.140.214.125', '2022-07-04 03:17:53'),
(36, '1655822170', '196.113.7.49', '2022-07-05 01:45:40'),
(37, '1656937059', '196.113.7.49', '2022-07-05 01:47:36'),
(38, '1656896885', '196.113.7.49', '2022-07-05 02:29:36'),
(39, '1655822170', '154.151.155.237', '2022-07-05 10:58:33'),
(40, '1657063465', '41.248.211.59', '2022-07-06 02:27:12'),
(41, '1657063684', '41.248.211.59', '2022-07-06 02:30:14'),
(42, '1657063827', '41.248.211.59', '2022-07-06 02:41:44'),
(43, '1657020223', '41.248.211.59', '2022-07-06 02:42:22'),
(44, '1657065454', '196.112.75.60', '2022-07-06 03:17:53'),
(45, '1657066691', '196.112.75.60', '2022-07-06 03:20:08'),
(46, '1657066733', '196.112.75.60', '2022-07-06 03:20:18'),
(47, '1657068301', '41.248.211.59', '2022-07-06 03:49:51'),
(48, '1657068617', '41.248.211.59', '2022-07-06 03:54:20'),
(49, '1657069094', '41.248.211.59', '2022-07-06 03:58:27'),
(50, '1657069094', '197.230.59.4', '2022-07-06 04:49:35'),
(51, '1657097881', '196.200.148.188', '2022-07-06 11:58:27'),
(52, '1657020223', '196.200.148.226', '2022-07-06 12:02:44'),
(53, '1657097881', '196.200.148.226', '2022-07-06 12:11:38'),
(54, '1657116098', '196.200.148.226', '2022-07-06 05:05:52'),
(55, '1657116966', '196.200.148.226', '2022-07-06 05:16:36'),
(56, '1657122191', '196.200.148.188', '2022-07-06 06:43:52'),
(57, '1657020223', '41.248.218.42', '2022-07-06 09:35:01'),
(58, '1657020223', '41.248.193.95', '2022-07-07 03:46:40'),
(59, '1657020223', '105.133.39.48', '2022-07-07 11:07:40'),
(60, '1657183194', '196.200.148.188', '2022-07-07 11:40:34'),
(61, '1657186416', '196.200.148.202', '2022-07-07 12:33:57'),
(62, '1657186504', '196.200.148.202', '2022-07-07 12:35:13'),
(63, '1657189081', '196.200.148.188', '2022-07-07 01:20:40'),
(64, '1657198796', '196.200.148.188', '2022-07-07 04:00:58'),
(65, '1657208550', '196.200.148.188', '2022-07-07 06:42:37'),
(66, '1657218641', '41.249.156.8', '2022-07-07 09:31:53'),
(67, '1657266805', '196.200.148.188', '2022-07-08 10:54:27'),
(68, '1657218641', '196.200.148.202', '2022-07-08 12:46:15'),
(69, '1656323499', '196.200.148.202', '2022-07-08 12:49:49'),
(70, '1657278424', '196.200.148.202', '2022-07-08 02:07:09'),
(71, '1657278891', '196.200.148.202', '2022-07-08 02:14:55'),
(72, '1657279777', '196.200.148.202', '2022-07-08 02:29:40'),
(73, '1657282969', '196.200.148.202', '2022-07-08 03:22:53'),
(74, '1657283631', '196.200.148.202', '2022-07-08 03:33:54'),
(75, '1657284926', '196.200.148.202', '2022-07-08 03:55:30'),
(76, '1657287613', '196.200.148.202', '2022-07-08 04:40:17'),
(77, '1656323499', '196.112.101.245', '2022-07-09 04:01:22'),
(78, '1657328549', '196.112.101.245', '2022-07-09 04:02:34'),
(79, '1657329064', '196.112.101.245', '2022-07-09 04:11:08'),
(80, '1657329657', '196.112.101.245', '2022-07-09 04:21:02'),
(81, '1657283631', '196.112.101.245', '2022-07-09 01:14:12'),
(82, '1657370233', '41.248.177.186', '2022-07-09 03:37:18'),
(83, '1657283631', '197.230.59.4', '2022-07-09 03:52:51'),
(84, '1657020223', '41.248.146.200', '2022-07-11 12:51:51'),
(85, '1657198796', '160.179.135.33', '2022-07-12 11:52:03'),
(86, '1657198796', '197.230.59.4', '2022-07-12 11:52:09'),
(87, '1657183194', '160.179.135.33', '2022-07-12 11:52:51'),
(88, '1657122191', '160.179.135.33', '2022-07-12 11:53:53'),
(89, '1657122191', '197.230.59.4', '2022-07-12 11:54:07'),
(90, '1657097881', '160.179.135.33', '2022-07-12 11:54:29'),
(91, '1657666745', '41.249.128.229', '2022-07-13 01:59:10'),
(92, '1657725400', '196.200.148.188', '2022-07-13 06:16:44'),
(93, '1657725400', '160.176.208.45', '2022-07-13 11:32:45'),
(94, '1657878126', '196.200.148.188', '2022-07-15 12:42:11'),
(95, '1657020223', '196.200.148.210', '2022-07-15 01:52:54'),
(96, '1657020223', '105.158.214.2', '2022-07-16 05:51:19'),
(97, '1655822171', '105.158.214.2', '2022-07-16 05:58:55'),
(98, '1657020223', '196.112.5.230', '2022-07-16 09:02:07'),
(99, '1656323499', '196.112.5.230', '2022-07-16 09:07:02'),
(100, '1657020223', '196.112.152.199', '2022-07-17 05:15:42'),
(101, '1658055790', '196.200.148.188', '2022-07-17 02:03:20'),
(102, '1658055790', '196.112.152.199', '2022-07-17 03:33:44'),
(103, '1658055786', '196.112.152.199', '2022-07-17 03:38:49'),
(104, '1658062706', '196.112.152.199', '2022-07-17 03:58:30'),
(105, '1658063221', '196.112.152.199', '2022-07-17 04:07:25'),
(106, '1657198796', '196.75.58.151', '2022-07-18 02:19:51'),
(107, '1658100992', '196.112.152.199', '2022-07-18 02:36:37'),
(108, '1658105062', '196.112.152.199', '2022-07-18 03:44:26'),
(109, '1658144265', '196.200.148.234', '2022-07-18 02:37:51'),
(110, '1658225229', '196.200.148.228', '2022-07-19 01:07:14'),
(111, '1658226511', '196.200.148.228', '2022-07-19 01:28:36'),
(112, '1658226990', '196.200.148.188', '2022-07-19 01:36:34'),
(113, '1658226990', '196.200.148.228', '2022-07-19 01:45:27'),
(114, '1658232904', '196.200.148.188', '2022-07-19 03:15:08'),
(115, '1658232904', '196.121.43.65', '2022-07-19 10:16:17'),
(116, '1658226990', '196.121.43.65', '2022-07-19 10:16:33'),
(117, '1658226990', '41.249.101.25', '2022-07-19 10:26:38'),
(118, '1657878126', '41.249.101.25', '2022-07-19 11:23:05'),
(119, '1658315717', '196.200.148.187', '2022-07-20 02:15:26'),
(120, '1658317541', '196.200.148.187', '2022-07-20 02:45:51'),
(121, '1658226511', '196.200.148.187', '2022-07-20 02:58:04'),
(122, '1657020223', '196.200.148.187', '2022-07-20 02:58:18'),
(123, '1658318360', '196.200.148.187', '2022-07-20 02:59:28'),
(124, '1658324838', '196.200.148.188', '2022-07-20 04:47:25'),
(125, '1658325462', '196.200.148.187', '2022-07-20 04:57:51'),
(126, '1658393457', '196.200.148.187', '2022-07-21 11:51:44'),
(127, '1658393760', '196.200.148.187', '2022-07-21 11:57:11'),
(128, '1658396117', '196.200.148.187', '2022-07-21 12:35:46'),
(129, '1658397493', '196.200.148.187', '2022-07-21 12:58:40'),
(130, '1658399923', '196.200.148.187', '2022-07-21 01:38:56'),
(131, '1658400749', '196.200.148.187', '2022-07-21 01:52:37'),
(132, '1658400927', '196.200.148.187', '2022-07-21 01:55:33'),
(133, '1658401509', '196.200.148.187', '2022-07-21 02:05:28'),
(134, '1658402350', '196.200.148.187', '2022-07-21 02:19:18'),
(135, '1658405142', '196.200.148.187', '2022-07-21 03:05:48'),
(136, '1658405142', '196.217.110.112', '2022-07-21 05:16:36'),
(137, '1658405142', '105.71.17.8', '2022-07-22 03:27:19'),
(138, '1658405142', '105.71.17.15', '2022-07-22 04:32:24'),
(139, '1658401509', '105.71.17.15', '2022-07-22 04:32:49'),
(140, '1658402350', '105.71.17.15', '2022-07-22 04:41:00'),
(141, '1658465468', '105.71.17.15', '2022-07-22 07:51:13'),
(142, '1658465468', '196.200.148.209', '2022-07-22 10:42:09'),
(143, '1658477380', '196.200.148.188', '2022-07-22 11:09:44'),
(144, '1658480433', '196.200.148.209', '2022-07-22 12:00:58'),
(145, '1658480957', '196.200.148.188', '2022-07-22 12:09:21'),
(146, '1658481736', '196.200.148.209', '2022-07-22 12:22:22'),
(147, '1658482261', '196.200.148.209', '2022-07-22 12:31:09'),
(148, '1658484452', '196.200.148.209', '2022-07-22 01:07:39'),
(149, '1658485985', '196.200.148.209', '2022-07-22 01:33:12'),
(150, '1658489093', '196.200.148.188', '2022-07-22 02:24:57'),
(151, '1658491786', '196.200.148.209', '2022-07-22 03:10:31'),
(152, '1658405142', '41.248.122.56', '2022-07-22 06:52:58'),
(153, '1658491786', '196.206.104.254', '2022-07-22 08:46:08'),
(154, '1658485985', '196.206.104.254', '2022-07-22 09:04:21'),
(155, '1658489093', '196.206.104.254', '2022-07-22 09:04:51'),
(156, '1658491786', '105.156.193.50', '2022-07-23 06:26:56'),
(157, '1658489093', '105.156.193.50', '2022-07-23 06:28:43'),
(158, '1658485985', '105.156.193.50', '2022-07-23 06:35:42'),
(159, '1658690431', '105.157.109.159', '2022-07-24 10:20:36'),
(160, '1658690431', '160.166.203.224', '2022-07-24 10:27:39'),
(161, '1658690431', '196.121.16.157', '2022-07-25 01:20:48'),
(162, '1658701390', '196.121.16.157', '2022-07-25 01:23:15'),
(163, '1658690431', '196.121.1.184', '2022-07-25 04:22:24'),
(164, '1658743038', '196.200.148.174', '2022-07-25 12:57:22'),
(165, '1658743940', '196.200.148.174', '2022-07-25 01:12:25'),
(166, '1658744398', '196.200.148.174', '2022-07-25 01:20:02'),
(167, '1658745033', '196.200.148.174', '2022-07-25 01:30:37'),
(168, '1658745372', '196.200.148.174', '2022-07-25 01:36:16'),
(169, '1658745428', '196.200.148.174', '2022-07-25 01:37:13'),
(170, '1658745428', '160.77.124.139', '2022-07-25 02:29:33'),
(171, '1658829473', '196.200.148.151', '2022-07-26 12:58:00'),
(172, '1658690431', '41.140.198.134', '2022-07-26 05:29:21'),
(173, '1658745428', '41.248.125.78', '2022-07-27 12:34:32'),
(174, '1658923766', '105.191.10.134', '2022-07-27 03:09:31'),
(175, '1658923882', '105.191.10.134', '2022-07-27 03:11:26'),
(176, '1658925058', '105.191.10.134', '2022-07-27 03:31:03'),
(177, '1658928304', '196.200.148.188', '2022-07-27 04:25:09'),
(178, '1658932541', '41.248.140.30', '2022-07-27 05:35:45'),
(179, '1658928304', '41.248.140.30', '2022-07-27 05:44:25'),
(180, '1658932541', '41.140.183.147', '2022-07-27 11:52:24'),
(181, 'admin', '41.140.183.147', '2022-07-28 12:20:45'),
(182, '1658932541', '196.112.158.243', '2022-07-28 01:16:27'),
(183, '1658932541', '105.191.11.118', '2022-07-28 01:51:54'),
(184, '1658925058', '105.191.11.118', '2022-07-28 03:04:03'),
(185, '1658998369', '196.200.148.188', '2022-07-28 11:52:53'),
(186, '1658998876', '196.200.148.211', '2022-07-28 12:01:20'),
(187, '1658932541', '196.200.148.211', '2022-07-28 12:04:03'),
(188, '1658998369', '196.200.148.211', '2022-07-28 12:11:09'),
(189, '1659003311', '196.200.148.211', '2022-07-28 01:15:16'),
(190, '1659005769', '196.200.148.211', '2022-07-28 01:56:22'),
(191, '1659084348', '196.200.148.229', '2022-07-29 11:45:54'),
(192, '1659096110', '196.200.148.188', '2022-07-29 03:01:55'),
(193, '1658998369', '196.200.148.160', '2022-07-29 03:06:38'),
(194, '1659084348', '196.200.148.160', '2022-07-29 03:06:46'),
(195, '1659096110', '196.200.148.229', '2022-07-29 03:30:50'),
(196, '1659084348', '196.113.7.194', '2022-07-29 06:07:57'),
(197, '1659084348', '41.140.20.253', '2022-07-30 05:39:22'),
(198, '1659084348', '41.92.97.239', '2022-07-30 04:28:39'),
(199, '1659084348', '41.250.232.22', '2022-07-31 03:26:19'),
(200, '1659084348', '196.217.121.226', '2022-07-31 08:05:54'),
(201, '1659084348', '196.112.70.231', '2022-07-31 03:48:35'),
(202, '1655822171', '196.112.70.231', '2022-07-31 04:59:30'),
(203, '1659084348', '41.248.189.121', '2022-07-31 09:40:39'),
(204, '1659084348', '105.159.100.110', '2022-07-31 09:48:20'),
(205, '1659084348', '41.249.124.243', '2022-08-01 01:02:50'),
(206, '1655822171', '41.249.124.243', '2022-08-01 01:04:55'),
(207, '1655822173', '41.249.124.243', '2022-08-01 03:05:04'),
(208, '1655822173', '196.112.70.231', '2022-08-01 03:12:11'),
(209, '1655822173', '41.140.7.221', '2022-08-01 04:00:19'),
(210, '1655822173', '196.200.148.229', '2022-08-01 01:04:33');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_web_info`
--

CREATE TABLE `tbl_web_info` (
  `name` varchar(50) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `timezone` varchar(255) NOT NULL,
  `top_text` varchar(255) NOT NULL DEFAULT 'Movies & TV Shows, Online cinema',
  `keywords` longtext NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT 'Movies Database website. Download free in 720p, 1080p and 3D quality. The fastest downloads at the smallest size.',
  `auth_bg` varchar(255) NOT NULL DEFAULT 'bg.jpg',
  `currency` varchar(255) DEFAULT '$',
  `iso` varchar(255) NOT NULL DEFAULT 'USD',
  `guest_view` varchar(255) NOT NULL DEFAULT '1',
  `item_detail_bg` varchar(255) NOT NULL DEFAULT 'details.jpg',
  `custom_script` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbl_web_info`
--

INSERT INTO `tbl_web_info` (`name`, `icon`, `logo`, `email`, `phone`, `timezone`, `top_text`, `keywords`, `description`, `auth_bg`, `currency`, `iso`, `guest_view`, `item_detail_bg`, `custom_script`) VALUES
('BuscoPhylo', 'logo.png', '<img src=\"img/logo-1.png\" style=\"height: 90px;\" />', 'slimane.khayi@inra.ma', '', 'Africa/Dar_es_Salaam', '', 'Busco', '', 'TreeA.png', NULL, '', '1', 'details.jpg', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_alerts`
--
ALTER TABLE `tbl_alerts`
  ADD PRIMARY KEY (`code`);

--
-- Index pour la table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_coupons`
--
ALTER TABLE `tbl_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_episodes`
--
ALTER TABLE `tbl_episodes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_episode_subs`
--
ALTER TABLE `tbl_episode_subs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_favourites`
--
ALTER TABLE `tbl_favourites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_genres`
--
ALTER TABLE `tbl_genres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `item_id` (`item_id`);

--
-- Index pour la table `tbl_paypal`
--
ALTER TABLE `tbl_paypal`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_plans`
--
ALTER TABLE `tbl_plans`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_privacy`
--
ALTER TABLE `tbl_privacy`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_reset_tokens`
--
ALTER TABLE `tbl_reset_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_sessions`
--
ALTER TABLE `tbl_sessions`
  ADD PRIMARY KEY (`user`);

--
-- Index pour la table `tbl_single_links`
--
ALTER TABLE `tbl_single_links`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_single_subs`
--
ALTER TABLE `tbl_single_subs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_smtp`
--
ALTER TABLE `tbl_smtp`
  ADD PRIMARY KEY (`server`);

--
-- Index pour la table `tbl_stripe`
--
ALTER TABLE `tbl_stripe`
  ADD PRIMARY KEY (`pub_key`);

--
-- Index pour la table `tbl_time`
--
ALTER TABLE `tbl_time`
  ADD PRIMARY KEY (`item_id`);

--
-- Index pour la table `tbl_timezones`
--
ALTER TABLE `tbl_timezones`
  ADD PRIMARY KEY (`zone_id`),
  ADD KEY `idx_country_code` (`country_code`),
  ADD KEY `idx_zone_name` (`zone_name`);

--
-- Index pour la table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_used_coupons`
--
ALTER TABLE `tbl_used_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_user_plans`
--
ALTER TABLE `tbl_user_plans`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_views`
--
ALTER TABLE `tbl_views`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_web_info`
--
ALTER TABLE `tbl_web_info`
  ADD PRIMARY KEY (`name`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT pour la table `tbl_coupons`
--
ALTER TABLE `tbl_coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_episodes`
--
ALTER TABLE `tbl_episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_episode_subs`
--
ALTER TABLE `tbl_episode_subs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_favourites`
--
ALTER TABLE `tbl_favourites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_genres`
--
ALTER TABLE `tbl_genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_items`
--
ALTER TABLE `tbl_items`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_paypal`
--
ALTER TABLE `tbl_paypal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tbl_privacy`
--
ALTER TABLE `tbl_privacy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tbl_reset_tokens`
--
ALTER TABLE `tbl_reset_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_single_links`
--
ALTER TABLE `tbl_single_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_single_subs`
--
ALTER TABLE `tbl_single_subs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_timezones`
--
ALTER TABLE `tbl_timezones`
  MODIFY `zone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=426;

--
-- AUTO_INCREMENT pour la table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_used_coupons`
--
ALTER TABLE `tbl_used_coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_user_plans`
--
ALTER TABLE `tbl_user_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_views`
--
ALTER TABLE `tbl_views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
