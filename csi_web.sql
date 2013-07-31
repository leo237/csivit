
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_user` varchar(100) NOT NULL,
  `admin_pass` varchar(500) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_user`, `admin_pass`, `id`) VALUES
('csi_admin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(250) DEFAULT NULL,
  `link` varchar(2000) DEFAULT NULL,
  `visible` varchar(4) NOT NULL DEFAULT 'yes',
  `addedBy` varchar(25) NOT NULL,
  `addedOn` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `text`, `link`, `visible`, `addedBy`, `addedOn`) VALUES
(4, 'CSI presents Explore C', 'www.csi_web.com', 'yes', 'admin', '2013-07-10 06:55:07'),
(5, 'CSI presents Riddler', 'www.csi_web.com', 'yes', 'admin', '2013-07-10 06:54:56');

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE IF NOT EXISTS `committee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `post` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`id`, `name`, `post`, `position`, `image`) VALUES
(1, 'Nikhil Loney', 'Convenor', 'board', '9469_Nikhil.jpg'),
(2, 'Nitin Nair', 'Co Convenor', 'board', '4887_Nitin.JPG'),
(3, 'Calvin Gomez', 'Co Convenor', 'board', '4718_Calvin.JPG'),
(4, 'Abhimanyu Arya', 'Events Director', 'board', '7269_Abhimanyu.JPG'),
(5, 'Nitish Victor', 'Technical Director', 'board', '2441_Nitish.JPG'),
(6, 'Ankit Duseja', 'Technical Advisor', 'board', '9531_Ankit.JPG'),
(7, 'Sanshray Agarwal', 'Finance Director', 'board', '3256_Sanshray.JPG'),
(8, 'Rubeena Shirin', 'Membership Director', 'board', '8621_Rubeena.JPG'),
(9, 'Advika Nigam', 'Documentation Director', 'board', '7130_Advika.jpg'),
(10, 'Abhilash Panigrahi', '', 'core2', ''),
(11, 'Aditi Mittal', '', 'core2', ''),
(12, 'Amriteya Pandey', '', 'core2', ''),
(13, 'Anshita Chandak', '', 'core2', ''),
(14, 'Anshuman Dhamoon', '', 'core2', ''),
(15, 'Bhavyanth Kolli', '', 'core2', ''),
(16, 'Kanika Parashar', '', 'core2', ''),
(17, 'Poorvi Narang', '', 'core2', ''),
(18, 'Pranav Bolar', '', 'core2', ''),
(19, 'Reetika Roy', '', 'core2', ''),
(20, 'Sankalp Mohapatra', '', 'core2', ''),
(21, 'Subhangi Agarwala', '', 'core2', ''),
(22, 'Umang Nath', '', 'core2', ''),
(23, 'Utkarsh Sharma', '', 'core2', '');

-- --------------------------------------------------------

--
-- Table structure for table `events_past`
--

CREATE TABLE IF NOT EXISTS `events_past` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `link` text NOT NULL,
  `added_on` datetime NOT NULL,
  `added_by` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `events_past`
--

INSERT INTO `events_past` (`id`, `name`, `link`, `added_on`, `added_by`) VALUES
(1, 'Firefox OS App Day', 'https://skydrive.live.com/embed?cid=7CB1858F8CE0C2A1&resid=7CB1858F8CE0C2A1%211325&authkey=AIO5P4zTUL__ySY&em=2', '2013-06-21 10:44:51', 'admin'),
(2, 'MasterChef VIT', 'https://skydrive.live.com/embed?cid=7CB1858F8CE0C2A1&resid=7CB1858F8CE0C2A1%211389&authkey=AJuYFaqQp--x-9E&em=2', '2013-06-21 13:13:31', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `events_upcoming`
--

CREATE TABLE IF NOT EXISTS `events_upcoming` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `added_by` varchar(200) NOT NULL,
  `added_on` datetime NOT NULL,
  `desc` text NOT NULL,
  `venue` varchar(200) NOT NULL,
  `image` text NOT NULL,
  `link` text NOT NULL,
  `title` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `events_upcoming`
--

INSERT INTO `events_upcoming` (`id`, `name`, `date`, `added_by`, `added_on`, `desc`, `venue`, `image`, `link`, `title`) VALUES
(9, 'Riddler', '0001-01-01', 'admin', '2013-07-11 18:51:18', 'An online event, throughout Gravitas. Free.', '', '3876_', '', 'Riddler'),
(10, 'Explore C', '2012-09-21', 'admin', '2013-07-10 08:38:04', '', 'SJT 416, 417', '5868_epicSized.jpg', '', 'Explore_C');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `event_name` varchar(200) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `reg_no` varchar(9) NOT NULL,
  `password` varchar(600) NOT NULL,
  `email_notif` varchar(4) NOT NULL,
  `registered_on` datetime NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unverified',
  `validity` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
