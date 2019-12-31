-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2019 at 03:46 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `Fname` varchar(30) NOT NULL,
  `Lname` varchar(30) NOT NULL,
  `DOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`Fname`, `Lname`, `DOB`) VALUES
(' Akshay', 'DiCaprio', '1979-01-01'),
(' Akshay', 'Kumar', '1996-11-10'),
(' Akshay', 'Washington', '1979-01-01'),
('Denzel', 'BALAN', '1979-01-01'),
('Denzel', 'Kumar', '1979-01-01'),
('Denzel', 'Washington', '1996-11-10'),
('Leonardo', 'BALAN', '1979-01-01'),
('Leonardo', 'DiCaprio', '1973-06-02'),
('Leonardo', 'Kumar', '1973-06-02'),
('Leonardo', 'Kumar,', '1996-11-10'),
('VIDYA ', 'BALAN', '1979-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `directed_by`
--

CREATE TABLE `directed_by` (
  `title` varchar(30) NOT NULL,
  `year` date NOT NULL,
  `Fname` varchar(30) NOT NULL,
  `Lname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `directed_by`
--

INSERT INTO `directed_by` (`title`, `year`, `Fname`, `Lname`) VALUES
('allengiant', '2017-01-04', 'Christian', 'Bale'),
('allengiant', '2017-01-04', 'Leonardo', 'DiCaprio'),
('avengers endgame', '2019-07-18', 'Christian', 'Bale'),
('avengers endgame', '2019-07-18', 'Jagan', 'Shakti'),
('bird box', '2015-01-04', 'Christian', 'Bale'),
('dark phoenix', '2018-01-04', 'Jagan', 'Shakti'),
('harry potter', '2005-01-04', 'Jagan', 'Shakti'),
('misson mangle', '2019-11-04', 'Jagan', 'Shakti'),
('razz', '2015-07-16', 'Christian', 'Bale'),
('the silence', '2008-08-23', 'Paul', 'Shakti'),
('twilight', '2004-07-18', 'Christian', 'Verhoeven');

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `Fname` varchar(30) NOT NULL,
  `Lname` varchar(30) NOT NULL,
  `DOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`Fname`, `Lname`, `DOB`) VALUES
('Christian', 'Bale', '1970-01-30'),
('Christian', 'Shakti', '1970-01-30'),
('Christian', 'Verhoeven', '1970-01-30'),
('Jagan', 'Bale', '1996-11-10'),
('Jagan', 'Shakti', '1996-11-10'),
('Leonardo', 'DiCaprio', '1973-06-02'),
('Paul', 'Shakti', '1970-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `title` varchar(50) NOT NULL,
  `year` date NOT NULL,
  `length` time NOT NULL,
  `description` varchar(500) NOT NULL,
  `video_name` varchar(50) NOT NULL,
  `image_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`title`, `year`, `length`, `description`, `video_name`, `image_name`) VALUES
('allengiant', '2017-01-04', '02:41:10', 'The series was mainly produced by David Heyman, and stars Daniel Radcliffe, Rupert Grint, and Emma Watson as the three leading characters: Harry Potter, Ron Weasley, and Hermione Granger. Four directors worked on the series: Chris Columbus, Alfonso Cuarón, Mike Newell, and David Yates.[5] Michael Goldenberg wrote the screenplay for Harry Potter and the Order of the Phoenix (2007), while the remaining films had their scree				', '5e08b0ce0425b6.05053989.mp4', '5e08b0ce042403.09738917.jpg'),
('avengers endgame', '2019-07-18', '03:05:10', 'Avengers: Endgame is a 2019 American superhero film based on the Marvel Comics superhero team the Avengers, produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures. It is the sequel to 2012\'s The Avengers, 2015\'s Avengers: Age of Ultron, and 2018\'s Avengers: Infinity War, and the twenty-second film in the Marvel Cinematic Universe (MCU). It was directed by Anthony and Joe Russo and written by Christopher Markus and Stephen McFeely, and features an ensemble cast includin', '5e098f088b2c19.45280363.mp4', '5e098f088b2b00.07648728.jpg'),
('bird box', '2015-01-04', '01:05:10', 'The series was mainly produced by David Heyman, and stars Daniel Radcliffe, Rupert Grint, and Emma Watson as the three leading characters: Harry Potter, Ron Weasley, and Hermione Granger. Four directors worked on the series: Chris Columbus, Alfonso Cuarón, Mike Newell, and David Yates.[5] Michael Goldenberg wrote the screenplay for Harry Potter and the Order of the Phoenix (2007), while the remaining films had their scree				', '5e08b256276734.74325884.mp4', '5e08b2562766e7.83586571.png'),
('dark phoenix', '2018-01-04', '02:51:10', '2002 Indian horror film directed by Vikram Bhatt and produced by Mukesh Bhatt, Kumar S. Taurani, Ramesh S. Taurani. The film stars Bipasha Basu and Dino Morea as a couple who have moved to Ooty to save their failing marriage. However, what they find in their new home is more than they expected when a ghost starts haunting the place. The wife, Sanjana suddenly finds that her husband is part of the ghostly conspiracy, which she must fix to escape.[2] The film is an unofficial adaptation of What Li', '5e08b5f8dc91f4.53147228.mp4', '5e08b5f8dc91a2.45471944.jpg'),
('harry potter', '2005-01-04', '01:05:10', 'Avengers: Endgame is a 2019 American superhero film based on the Marvel Comics superhero team the Avengers, produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures. It is the sequel to 2012\'s The Avengers, 2015\'s Avengers: Age of Ultron, and 2018\'s Avengers: Infinity War, and the twenty-second film in the Marvel Cinematic Universe (MCU). It was directed by Anthony and Joe Russo and written by Christopher Markus and Stephen McFeely, and features an ensemble cast includin', '5e09904535baf5.22454734.mp4', '5e09904535ba97.00152514.jpg'),
('misson mangle', '2019-11-04', '02:51:10', 'Mission Mangal (transl. Mission Mars) is a 2019 Indian Hindi-language drama film directed by Jagan Shakti and jointly produced by Cape of Good Films, Hope Productions, Fox Star Studios, Aruna Bhatia, and Anil Naidu. The film stars an ensemble cast of Akshay Kumar, Vidya Balan, Taapsee Pannu, Nithya Menen, Kirti Kulhari, Sharman Joshi, H. G. Dattatreya, Vikram Gokhale, and Sonakshi Sinha. The film is loosely based on the life of scientists at the Indian Space Research Organisation who contributed', '5e037261f31765.15249336.mkv', '5e037261f316d2.45250685.jpg'),
('razz', '2015-07-16', '02:31:10', 'Avengers: Endgame is a 2019 American superhero film based on the Marvel Comics superhero team the Avengers, produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures. It is the sequel to 2012\'s The Avengers, 2015\'s Avengers: Age of Ultron, and 2018\'s Avengers: Infinity War, and the twenty-second film in the Marvel Cinematic Universe (MCU). It was directed by Anthony and Joe Russo and written by Christopher Markus and Stephen McFeely, and features an ensemble cast includin', '5e0992ce6962d7.74088147.mp4', '5e0992ce696283.52736385.jpg'),
('the silence', '2008-08-23', '02:50:09', 'Avengers: Endgame is a 2019 American superhero film based on the Marvel Comics superhero team the Avengers, produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures. It is the sequel to 2012\'s The Avengers, 2015\'s Avengers: Age of Ultron, and 2018\'s Avengers: Infinity War, and the twenty-second film in the Marvel Cinematic Universe (MCU). It was directed by Anthony and Joe Russo and written by Christopher Markus and Stephen McFeely, and features an ensemble cast includin', '5e09946b188611.86950570.mp4', '5e09946b1885b2.69413676.jpg'),
('twilight', '2004-07-18', '01:55:10', 'Avengers: Endgame is a 2019 American superhero film based on the Marvel Comics superhero team the Avengers, produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures. It is the sequel to 2012\'s The Avengers, 2015\'s Avengers: Age of Ultron, and 2018\'s Avengers: Infinity War, and the twenty-second film in the Marvel Cinematic Universe (MCU). It was directed by Anthony and Joe Russo and written by Christopher Markus and Stephen McFeely, and features an ensemble cast includin', '5e0994de21d5e9.34334410.mp4', '5e0994de21d576.86478224.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `movie_genres`
--

CREATE TABLE `movie_genres` (
  `title` varchar(30) NOT NULL,
  `year` date NOT NULL,
  `genres` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie_genres`
--

INSERT INTO `movie_genres` (`title`, `year`, `genres`) VALUES
('allengiant', '2017-01-04', 'Action'),
('avengers endgame', '2019-07-18', 'Action'),
('avengers endgame', '2019-07-18', 'Sci-Fi'),
('bird box', '2015-01-04', 'Action'),
('bird box', '2015-01-04', 'Sci-Fi'),
('dark phoenix', '2018-01-04', 'Adventure'),
('harry potter', '2005-01-04', 'Action'),
('harry potter', '2005-01-04', 'Adventure'),
('misson mangle', '2019-11-04', 'Sci-Fi'),
('razz', '2015-07-16', 'Action'),
('the silence', '2008-08-23', 'Action'),
('the silence', '2008-08-23', 'Comedy'),
('twilight', '2004-07-18', 'Action'),
('twilight', '2004-07-18', 'Adventure'),
('twilight', '2004-07-18', 'Comedy');

-- --------------------------------------------------------

--
-- Table structure for table `movie_lang`
--

CREATE TABLE `movie_lang` (
  `title` varchar(50) NOT NULL,
  `year` date NOT NULL,
  `lang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie_lang`
--

INSERT INTO `movie_lang` (`title`, `year`, `lang`) VALUES
('allengiant', '2017-01-04', 'english'),
('avengers endgame', '2019-07-18', 'english'),
('avengers endgame', '2019-07-18', 'franch'),
('avengers endgame', '2019-07-18', 'hindi'),
('bird box', '2015-01-04', 'english'),
('dark phoenix', '2018-01-04', 'english'),
('harry potter', '2005-01-04', 'english'),
('harry potter', '2005-01-04', 'franch'),
('harry potter', '2005-01-04', 'hindi'),
('misson mangle', '2019-11-04', 'hindi'),
('razz', '2015-07-16', 'hindi'),
('the silence', '2008-08-23', 'english'),
('the silence', '2008-08-23', 'franch'),
('twilight', '2004-07-18', 'english');

-- --------------------------------------------------------

--
-- Table structure for table `performed_by`
--

CREATE TABLE `performed_by` (
  `title` varchar(50) NOT NULL,
  `year` date NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `cast` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `performed_by`
--

INSERT INTO `performed_by` (`title`, `year`, `Fname`, `Lname`, `cast`) VALUES
('allengiant', '2017-01-04', 'Denzel', 'Washington', 'Kumar'),
('allengiant', '2017-01-04', 'Leonardo', 'DiCaprio', 'denzel'),
('avengers endgame', '2019-07-18', 'Leonardo', 'Kumar', 'denzel'),
('avengers endgame', '2019-07-18', 'VIDYA ', 'BALAN', 'Vidya Balan'),
('bird box', '2015-01-04', 'Denzel', 'Washington', 'Kumar'),
('dark phoenix', '2018-01-04', 'Leonardo', 'DiCaprio', 'denzel'),
('harry potter', '2005-01-04', 'Leonardo', 'BALAN', 'Leonardo'),
('misson mangle', '2019-11-04', ' Akshay', 'Kumar', 'Kumar,'),
('razz', '2015-07-16', 'Denzel', 'Kumar', 'Leonardo'),
('the silence', '2008-08-23', 'Denzel', 'BALAN', 'Kumar'),
('twilight', '2004-07-18', ' Akshay', 'Washington', 'denzel');

-- --------------------------------------------------------

--
-- Table structure for table `produce`
--

CREATE TABLE `produce` (
  `title` varchar(50) NOT NULL,
  `year` date NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produce`
--

INSERT INTO `produce` (`title`, `year`, `name`) VALUES
('allengiant', '2017-01-04', 'Cape of Good Films'),
('avengers endgame', '2019-07-18', 'Cape of Good Films'),
('bird box', '2015-01-04', 'Reliance Entertainment'),
('dark phoenix', '2018-01-04', 'Cape of Good Films'),
('harry potter', '2005-01-04', 'Reliance Entertainment'),
('misson mangle', '2019-11-04', 'Cape of Good Films'),
('razz', '2015-07-16', 'Reliance Entertainment'),
('the silence', '2008-08-23', 'Reliance Entertainment'),
('twilight', '2004-07-18', 'Cape of Good Films');

-- --------------------------------------------------------

--
-- Table structure for table `production_companies`
--

CREATE TABLE `production_companies` (
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `production_companies`
--

INSERT INTO `production_companies` (`name`) VALUES
('Cape of Good Films'),
('Reliance Entertainment');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`Fname`,`Lname`);

--
-- Indexes for table `directed_by`
--
ALTER TABLE `directed_by`
  ADD PRIMARY KEY (`title`,`year`,`Fname`,`Lname`),
  ADD KEY `Fname` (`Fname`,`Lname`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`Fname`,`Lname`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`title`,`year`);

--
-- Indexes for table `movie_genres`
--
ALTER TABLE `movie_genres`
  ADD PRIMARY KEY (`title`,`year`,`genres`);

--
-- Indexes for table `movie_lang`
--
ALTER TABLE `movie_lang`
  ADD PRIMARY KEY (`title`,`year`,`lang`);

--
-- Indexes for table `performed_by`
--
ALTER TABLE `performed_by`
  ADD PRIMARY KEY (`title`,`year`,`Fname`,`Lname`),
  ADD KEY `Fname` (`Fname`,`Lname`);

--
-- Indexes for table `produce`
--
ALTER TABLE `produce`
  ADD PRIMARY KEY (`title`,`year`,`name`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `production_companies`
--
ALTER TABLE `production_companies`
  ADD PRIMARY KEY (`name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `directed_by`
--
ALTER TABLE `directed_by`
  ADD CONSTRAINT `directed_by_ibfk_1` FOREIGN KEY (`Fname`,`Lname`) REFERENCES `director` (`Fname`, `Lname`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `directed_by_ibfk_2` FOREIGN KEY (`title`,`year`) REFERENCES `movies` (`title`, `year`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movie_genres`
--
ALTER TABLE `movie_genres`
  ADD CONSTRAINT `movie_genres_ibfk_1` FOREIGN KEY (`title`,`year`) REFERENCES `movies` (`title`, `year`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movie_lang`
--
ALTER TABLE `movie_lang`
  ADD CONSTRAINT `movie_lang_ibfk_1` FOREIGN KEY (`title`,`year`) REFERENCES `movies` (`title`, `year`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `performed_by`
--
ALTER TABLE `performed_by`
  ADD CONSTRAINT `performed_by_ibfk_1` FOREIGN KEY (`Fname`,`Lname`) REFERENCES `actors` (`Fname`, `Lname`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `performed_by_ibfk_2` FOREIGN KEY (`title`,`year`) REFERENCES `movies` (`title`, `year`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produce`
--
ALTER TABLE `produce`
  ADD CONSTRAINT `produce_ibfk_1` FOREIGN KEY (`title`,`year`) REFERENCES `movies` (`title`, `year`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produce_ibfk_2` FOREIGN KEY (`name`) REFERENCES `production_companies` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
