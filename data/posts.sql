-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 17, 2018 at 04:17 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ciblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `body`, `post_image`, `created_at`) VALUES
(6, 2, 1, 'Hacker Culture', 'Hacker-Culture', '<p>The <strong>hacker culture</strong> is a <a href=\"https://en.wikipedia.org/wiki/Subculture\">subculture</a> of individuals who enjoy the intellectual challenge of creatively overcoming limitations of software systems to achieve novel and clever outcomes.<a href=\"https://en.wikipedia.org/wiki/Hacker_culture#cite_note-Gehring_2004_43-1\">[1]</a> The act of engaging in activities (such as programming or other media<a href=\"https://en.wikipedia.org/wiki/Hacker_culture#cite_note-rms_hack-2\">[2]</a>) in a spirit of playfulness and exploration is termed \"hacking\". However, the defining characteristic of a <a href=\"https://en.wikipedia.org/wiki/Hacker\">hacker</a> is not the activities performed themselves (e.g. <a href=\"https://en.wikipedia.org/wiki/Computer_programming\">programming</a>), but the manner in which it is done<a href=\"https://en.wikipedia.org/wiki/Hacker_culture#cite_note-on_hacking-3\">[3]</a> and whether it is something exciting and meaningful.<a href=\"https://en.wikipedia.org/wiki/Hacker_culture#cite_note-rms_hack-2\">[2]</a>Activities of playful cleverness can be said to have \"hack value\" and therefore the term \"hacks\" came about,<a href=\"https://en.wikipedia.org/wiki/Hacker_culture#cite_note-on_hacking-3\">[3]</a> with early examples including <a href=\"https://en.wikipedia.org/wiki/Hacks_at_the_Massachusetts_Institute_of_Technology\">pranks at MIT</a> done by students to demonstrate their technical aptitude and cleverness. Therefore, the hacker culture originally emerged in academia in the 1960s around the <a href=\"https://en.wikipedia.org/wiki/Massachusetts_Institute_of_Technology\">Massachusetts Institute of Technology</a>(MIT)\'s <a href=\"https://en.wikipedia.org/wiki/Tech_Model_Railroad_Club\">Tech Model Railroad Club</a> (TMRC)<a href=\"https://en.wikipedia.org/wiki/Hacker_culture#cite_note-4\">[4]</a> and <a href=\"https://en.wikipedia.org/wiki/MIT_Artificial_Intelligence_Laboratory\">MIT Artificial Intelligence Laboratory</a>.<a href=\"https://en.wikipedia.org/wiki/Hacker_culture#cite_note-5\">[5]</a></p><p><a href=\"https://en.wikipedia.org/wiki/Richard_Stallman\">Richard Stallman</a> explains about hackers who program:</p><blockquote><p>What they had in common was mainly love of excellence and programming. They wanted to make their programs that they used be as good as they could. They also wanted to make them do neat things. They wanted to be able to do something in a more exciting way than anyone believed possible and show \"Look how wonderful this is. I bet you didn\'t believe this could be done.\"<a href=\"https://en.wikipedia.org/wiki/Hacker_culture#cite_note-6\">[6]</a></p></blockquote><p>Hackers from this subculture tend to emphatically differentiate themselves from what they pejoratively call \"<a href=\"https://en.wikipedia.org/wiki/Security_hacker\">crackers</a>\"; those who are generally referred to by media and members of the general public using the term \"hacker\", and whose primary focus?—?be it to malign or for malevolent purposes?—?lies in <a href=\"https://en.wikipedia.org/wiki/Exploit_(computer_security)\">exploiting</a> weaknesses in computer security.<a href=\"https://en.wikipedia.org/wiki/Hacker_culture#cite_note-ESR_howto-7\">[7]</a></p>', 'hacker.jpg', '2018-02-14 22:47:52'),
(15, 3, 1, 'Birinci', 'Birinci', '<p>Birinci</p>', 'linux.png', '2018-02-15 21:58:59'),
(16, 3, 1, 'Ikinci', 'Ikinci', '<p>Ikinci</p>', 'linux.png', '2018-02-15 21:59:17'),
(17, 3, 1, 'Ucuncu', 'Ucuncu', '<p>Ucuncu</p>', 'noimage.png', '2018-02-15 21:59:36'),
(18, 4, 1, 'Secret', 'Secret', '<p>Secret</p>', 'linux.png', '2018-02-15 22:33:29'),
(19, 4, 1, 'yoxlama', 'yoxlama', '<p>asdasdjasd</p>', 'hacker.jpg', '2018-02-15 22:56:02'),
(20, 4, 1, 'asfasfasf', 'asfasfasf', '<p>asfasfasf</p>', 'dev.jpg', '2018-02-16 21:54:13'),
(21, 4, 1, 'fotosuz', 'fotosuz', '<p>fotosuz</p>', 'noimage.png', '2018-02-16 21:57:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
