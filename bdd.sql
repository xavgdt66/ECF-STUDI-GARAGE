CREATE TABLE `annonces` (
  `id` int(11) NOT NULL,
  `Title` varchar(250) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `prix` int(11) NOT NULL,
  `imagePrincipale` varchar(255) NOT NULL,
  `circulation` year(4) NOT NULL,
  `kilometrage` int(11) NOT NULL,
  `galerieImages` text DEFAULT NULL,
  `caracteristiques` text DEFAULT NULL,
  `equipements` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `annonces` (`id`, `Title`, `content`, `created_at`, `prix`, `imagePrincipale`, `circulation`, `kilometrage`, `galerieImages`, `caracteristiques`, `equipements`) VALUES
(873, 'Peugeot 308 SW Allure', 'Peugeot 308 SW Allure break, gris, 7 cv, 5 portes, première mise en circulation le 25/02/2015.\r\n\r\n5 places\r\n\r\nOPTIONS ET EQUIPEMENTS :\r\nExtérieur :\r\n- allumage automatique des feux\r\n- rétroviseurs électriques\r\n- vitres électriques\r\n- caméra de recul\r\n- jantes alliage\r\n\r\nIntérieur et confort :\r\n- accoudoir central\r\n- auto-radio commandé au volant\r\n- banquette 1/3 - 2/3\r\n- ordinateur de bord\r\n- volant réglable\r\n- bluetooth\r\n- aide au démarrage en pente\r\n- volant cuir\r\n- radio CD\r\n- climatisation automatique\r\n- GPS tactile\r\n\r\nSécurité :\r\n- détecteur de pluie\r\n- direction assistée\r\n- fermeture centralisée\r\n- ABS\r\n- airbags frontaux\r\n- airbags latéraux\r\n- anti-démarrage\r\n- anti-patinage\r\n- contrôle pression des pneus\r\n- ESP\r\n- phares antibrouillard\r\n- radar avant de détection d\'obstacles\r\n- radar arrière de détection d\'obstacles\r\n- répartiteur électronique de freinage\r\n- fixation ISOFIX\r\n- airbags rideaux\r\n- régulateur de vitesse\r\n- limiteur de vitesse\r\n\r\nAutres équipements et informations :\r\n- puissance réelle : 150 ch\r\n- émission CO2 : 109 g/km\r\n- radar d\'aide au stationnement\r\n- Puissance kilowatt : 110 kw\r\n- auto-radio\r\n- réglages du volant : hauteur\r\n- Filtre à particule\r\n- Intérieur tissu\r\n- Reprise possible\r\n- Verrouillage automatiques des portes en roulant\r\n- Vitre surteintées\r\n- contactez-nous .......................... INFORMATIONS........................\r\n\r\nRéférence annonce : 209407', '2023-06-13 01:24:59', 7990, '/images/1f9bd2e1-7fc5-459c-a817-5ea5d36eb97f.webp', 2002, 237412, NULL, NULL, NULL),
(878, 'Volkswagen', 'Volkswagen POLO 2.0 TSI 200CH GTI DSG6 EURO6D-T, NOIR, 11cv, mise en circulation le 28-08-2019, garantie 6 mois.\r\n\r\n5 places, longueur : 4,05 mètres,\r\nboîte de vitesse : automatique\r\n\r\nOPTIONS ET EQUIPEMENTS :\r\nAudio - Télécommunications\r\n- 6 Haut parleurs\r\n- Commandes du système audio au volant\r\n- Ecran tactile\r\n- Fonction MP3\r\n- GPS Cartographique\r\n- Interface Media\r\n- Kit mains-libres Bluetooth\r\n- Lecteur CD\r\n- Lecteur carte SD\r\n- Prise USB\r\n- Prise iPod\r\n- Radio\r\n- Radio numérique DAB\r\n- Services connectés\r\n- TMC\r\n\r\nConduite\r\n- Aide au démarrage en côte\r\n- Arrêt et redémarrage auto. du moteur\r\n- Capteur de luminosité\r\n- Capteur de pluie\r\n- Chassis Sport\r\n- Différentiel autobloquant\r\n- Démarrage sans clé\r\n- Follow me home\r\n- Limiteur de vitesse\r\n- Palettes changement vitesses au volant\r\n- Régulateur de vitesse\r\n- Régulateur de vitesse adaptatif\r\n- Système d\'accès sans clé\r\n  ', '2023-06-14 16:50:56', 21990, '/images/47f941c5-66f2-4bf5-b18d-8421a0520671.jpg', 2008, 62953, 'C:\\xampp\\htdocs\\phpmvc\\public/images/a59dbf3c-6ee5-4dfa-9457-1133b1c8b8c4.jpg,C:\\xampp\\htdocs\\phpmvc\\public/images/48926558-ea05-4423-9108-591bed2e8f04.jpg', 'Essence', 'GPS Cartographique , Lecteur CD'),
(885, 'lambo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed elementum vehicula tincidunt. Donec eu placerat ante. Donec mollis turpis sed leo consectetur, faucibus aliquet quam fermentum. Nunc in mauris sit amet lectus gravida vestibulum. Suspendisse commodo gravida ultricies. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris commodo at tellus a ornare. Cras eu nibh facilisis, vehicula purus ac, dictum tellus.', '2023-07-18 19:56:19', 10000, '/images/24b618e1-f57b-4dad-b546-74ed20d68cf0.jpg', 2021, 660000, '', 'Essence', 'GPS Cartographique , Lecteur CD');



CREATE TABLE `avis` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `note` int(11) NOT NULL,
  `valide` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `avis` (`id`, `nom`, `commentaire`, `note`, `valide`) VALUES
(22, 'Annabel Medinilla', 'Très bon mécanicien auto et carrossier personne accueillante, je recommande ce garage', 5, 1),
(23, 'Laetitia Serie', 'Personnel compétent et souriant.\r\nPas de retard et une facture raisonnable.\r\nJe recommande sans hésiter', 5, 1),
(24, 'Emilie Guerinet', 'Très bon accueil disponibilité et rapidité. Ludivine qui c est occupée de ma voiture à été  agréable et très professionnel. Je recommande sans hésiter.', 4, 1),
(25, 'Marc Andre', 'Je suis client depuis plusieurs années. Personnel serieux et de bon conseil', 5, 1),
(26, 'Laure Pimenta', 'Bon rapport qualité/prix, prestation rapide et efficace.', 5, 1),
(27, 'studi', 'Très bien ', 3, 1),
(28, 'test', 'test', 5, 1),
(29, 'godet', 'ssqdsq', 4, 1),
(30, 'dfsdfds', 'sffds', 5, 1);



CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `horaire` (
  `id` int(11) NOT NULL,
  `jour_semaine` varchar(10) NOT NULL,
  `heure_debut` varchar(255) NOT NULL,
  `heure_fin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `horaire` (`id`, `jour_semaine`, `heure_debut`, `heure_fin`) VALUES
(1, 'Lundi', '08:00:00', '17:00:00'),
(2, 'Mardi', '08:00:00', '17:00:00'),
(3, 'Mercredi', '08:00:00', '17:00:00'),
(4, 'Jeudi', '08:00:00', '17:00:00'),
(5, 'Vendredi', '08:00:00', '17:00:00'),
(6, 'Samedi', 'Fermer', 'Fermer'),
(7, 'Dimanche', 'Fermer', 'Fermer');

-- --------------------------------------------------------



CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(9000) NOT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `service` (`id`, `title`, `content`, `created_at`) VALUES
(1, ' Réparation de la carrosserie', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis ut purus eu luctus. ', NULL),
(3, ' Réparation mécanique', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis ut purus eu luctus. ', NULL),
(4, 'Entretien véhicule ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis ut purus eu luctus. ', NULL);



CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `users` (`id`, `email`, `password`, `role`) VALUES
(2, 'test@gmail.com', '$2y$14$.7w/CBYgcZsLcvrnGYiVdOYGD0gjQuaOXD1vQnHxd55u4Szk8p.Za', 'admin'),
(6, 'code@gmail.com', '$2y$10$PrXq2F16fGy3FdqD3niZ4eT2fKgtrD99rDsh36A4p0hg/W9GAbcSS', 'employe'),
(7, 'php@gmail.com', '$2y$10$1Y.7yrsBvOmewLLaZqAc9OCxcNEwfcdN8dLa.VjkSU2HSE.K2P4A6', 'employe'),
(8, 'studi@gmail.com', '$2y$10$NfvIaQOkuwy6EgCZVkfeceTK75VlFlqS6EvqIgU3pZG.1YxcHDVhy', 'employe'),
(9, 'employe@gmail.com', '$2y$10$E9QG1.Fha41hK7j6kRLEHeKqv1y2uy19NzjL6cmeYyczVdyT.W3Cq', 'employe');


