-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2021 at 05:20 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '2021-08-08 05:50:25'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `views`, `image`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 'How to Write Clean Code', 0, 'randomImg.jpg', 'There are two things- Programming and Good Programming. Programming is what we have all been doing. Now is the time to do good programming. We all know that even the bad code works. But it takes time and resources to make a program good. Moreover, other developers mock you when they are trying to find what all is happening in your code. But it’s never too late to care for your programs.\r\n\r\nThis book has given me a lot of knowledge on what are the best practises and how to actually write code. Now I feel ashamed of my coding skills. Though I always strive to better my code, this book has taught a lot more.\r\n\r\nNow, you are reading this blog for two reasons. First, you are a programmer. Second, you want to be a better programmer. Good. We need better programmers.\r\n\r\nCharacteristics of a Clean code:\r\n\r\n    It should be elegant — Clean code should be pleasing to read. Reading it should make you smile the way a well-crafted music box or well-designed car would.\r\n    Clean code is focused —Each function, each class, each module exposes a single-minded attitude that remains entirely undistracted, and unpolluted, by the surrounding details.\r\n    Clean code is taken care of. Someone has taken the time to keep it simple and orderly. They have paid appropriate attention to details. They have cared.\r\n\r\n4. Runs all the tests\r\n\r\n5. Contains no duplication\r\n\r\n6. Minimize the number of entities such as classes, methods, functions, and the like.\r\nHow to write Clean code?\r\nMeaningful Names\r\n\r\nUse intention revealing names. Choosing good names takes time but saves more than it takes.The name of a variable, function, or class, should answer all the big questions. It should tell you why it exists, what it does, and how it is used. If a name requires a comment, then the name does not reveal its intent.\r\n\r\nEg- int d; // elapsed time in days.\r\n\r\n    We should choose a name that specifies what is being measured and the unit of that measurement.\r\n\r\nA better name would be:- int elapsedTime. (Even though the book says elapsedTimeInDays, I would still prefer the former one. Suppose the elapsed time is changed to milliseconds. Then we would have to change long to int and elapsedTimeInMillis instead of elapsedTimeInDays. And for how long we’ll keep changing both the data type and name.)\r\n\r\nClass Names — Classes and objects should have noun or noun phrase names like Customer, WikiPage, Account, and AddressParser. Avoid words like Manager, Processor, Data, or Info in the name of a class. A class name should not be a verb.\r\n\r\nMethod Names —Methods should have verb or verb phrase names like postPayment, deletePage, or save. Accessors, mutators, and predicates should be named for their value and prefixed with get, set.\r\n\r\nWhen constructors are overloaded, use static factory methods with names that describe the arguments. For example,\r\n\r\nComplex fulcrumPoint = Complex.FromRealNumber(23.0); is generally better than Complex fulcrumPoint = new Complex(23.0);\r\n\r\nPick One Word per Concept —Pick one word for one abstract concept and stick with it. For instance, it’s confusing to have fetch, retrieve, and get as equivalent methods of different classes. How do you remember which method name goes with which class? Likewise, it’s confusing to have a controller and a manager and a driver in the same code base. What is the essential difference between a DeviceManager and a Protocol- Controller?', '2021-08-07 06:29:10', '2021-08-07 06:22:38'),
(2, 4, '8 Best Mechanical Keyboards', 1, 'keyboard.jpg', ' 1) Keychron K4 V2 Wireless.  2) Corsair K70 RGB MK. Best Gaming Keyboard. \r\n    3) Logitech K780. Best Travel Keyboard. ...\r\n    4) Corsair K83 Wireless. Best Multi-purpose Keyboard. ...\r\n    5) Keychron K1 (Version 4) Best Low-Profile Keyboard. ...\r\n   6) Microsoft Sculpt Ergonomic Desktop. Best Ergonomic Keyboard. ...\r\n   7) Das Keyboard 4C TKL. ...\r\n   8) Razer Pro Type.', '2021-08-06 07:01:14', '2021-08-05 08:44:31'),
(9, 1, 'What is Drupal?', 0, 'drupal.png', 'Why Drupal?\r\nDrupal is a free and open-source content-management framework that can be tailored and customized to simple websites or complex web applications. Drupal grows as you grow with thousands of free modules and themes that will help you attract the web audience you need to deliver your message, grow brand awareness, and build your community.\r\n\r\nDrupal is accessible and multilingual. The latest release of Drupal is the most powerful and accessible version of Drupal to date. With accessibility and multilingual capabilities built into Drupal, you can be assured that you\'ll have the capability to reach the audience that you are targeting to convey your message.\r\n\r\nDrupal is flexible by design. From desktop applications such as Aquia Dev Desktop that allows you to build your web application on your own computer, or hosting from a Drupal hosting provider, you can be sure that your Drupal website and/or application will run on the platform that meets your needs. Drupal is easy to move and scale. Drupal conforms to your needs.', '2021-08-07 07:31:41', '2021-08-07 07:27:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('Author','Admin') DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `role`, `password`, `created_at`, `updated_at`) VALUES
(1, 'omkar', 'omkarpd109@gmail.com', 'Admin', '68115705108ddd6f7ba9a458bb175363', '2021-08-04 07:22:58', '2021-08-04 23:32:51'),
(3, 'omkar95', 'omkar@gmail.com', NULL, 'acc735278d826217a333e9b482b5c1bd', '2021-08-05 11:24:39', '2021-08-05 11:24:39'),
(4, 'omkard', 'omkar12@gmail.com', 'Author', '4c1a0c3674cdd28eba67844dfe60bab9', '2021-08-06 06:41:07', '2021-08-06 06:41:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
