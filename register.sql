

-- Table structure for table `data`

CREATE TABLE IF NOT EXISTS `data` (
  `Scarlet` int(50) NOT NULL ,
  `Banking` varchar(100) NOT NULL,
  `Bouncer` int(10) NOT NULL,
    PRIMARY KEY (`Scarlet`)
) ;


-- Table structure for table `users`

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ;
