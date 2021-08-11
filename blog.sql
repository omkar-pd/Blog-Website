-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2021 at 11:07 AM
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
(1, 1, 'How to Write Clean Code', 0, 'randomImg.jpg', '&lt;p&gt;There are two things- Programming and Good Programming. Programming is what we have all been doing. Now is the time to do good programming. We all know that even the bad code works. But it takes time and resources to make a program good. Moreover, other developers mock you when they are trying to find what all is happening in your code. But it&amp;rsquo;s never too late to care for your programs.&lt;/p&gt;\r\n\r\n&lt;p&gt;This book has given me a lot of knowledge on what are the best practices and how to actually write code. Now I feel ashamed of my coding skills. Though I always strive to better my code, this book has taught a lot more.&lt;/p&gt;\r\n\r\n&lt;p&gt;Now, you are reading this blog for two reasons. First, you are a programmer. Second, you want to be a better programmer. Good. We need better programmers.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;haracteristics of a Clean code&lt;/strong&gt;:&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;It should be elegant &amp;mdash; Clean code should be&amp;nbsp;&lt;em&gt;pleasing&amp;nbsp;&lt;/em&gt;to read. Reading it should make you smile the way a well-crafted music box or well-designed car would.&lt;/li&gt;\r\n	&lt;li&gt;Clean code is focused &amp;mdash;Each function, each class, each module exposes a single-minded attitude that remains entirely undistracted, and unpolluted, by the surrounding details.&lt;/li&gt;\r\n	&lt;li&gt;Clean code is taken care of. Someone has taken the time to keep it simple and orderly. They have paid appropriate attention to details. They have cared.&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;&lt;em&gt;4.&amp;nbsp;&lt;/em&gt;Runs all the tests&lt;/p&gt;\r\n\r\n&lt;p&gt;5. Contains no duplication&lt;/p&gt;\r\n\r\n&lt;p&gt;6. Minimize the number of entities such as classes, methods, functions, and the like.&lt;/p&gt;\r\n\r\n&lt;h1&gt;How to write Clean code?&lt;/h1&gt;\r\n\r\n&lt;h1&gt;&lt;strong&gt;&lt;em&gt;Meaningful Names&lt;/em&gt;&lt;/strong&gt;&lt;/h1&gt;\r\n\r\n&lt;p&gt;Use intention revealing names. Choosing good names takes time but saves more than it takes.The name of a variable, function, or class, should answer all the big questions. It should tell you why it exists, what it does, and how it is used. If a name requires a comment, then the name does not reveal its intent.&lt;/p&gt;\r\n\r\n&lt;p&gt;Eg- int d; // elapsed time in days.&lt;/p&gt;\r\n\r\n&lt;blockquote&gt;\r\n&lt;p&gt;&lt;em&gt;We should choose a name that specifies what is being measured and the unit of that measurement.&lt;/em&gt;&lt;/p&gt;\r\n&lt;/blockquote&gt;\r\n\r\n&lt;p&gt;A better name would be:- int elapsedTime. (Even though the book says elapsedTimeInDays, I would still prefer the former one. Suppose the elapsed time is changed to milliseconds. Then we would have to change long to int and elapsedTimeInMillis instead of elapsedTimeInDays. And for how long we&amp;rsquo;ll keep changing both the data type and name.)&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Class Names&lt;/strong&gt;&amp;nbsp;&amp;mdash; Classes and objects should have noun or noun phrase names like Customer, WikiPage, Account, and AddressParser. Avoid words like Manager, Processor, Data, or Info in the name of a class. A class name should not be a verb.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Method Names &amp;mdash;&lt;/strong&gt;Methods should have verb or verb phrase names like postPayment, deletePage, or save. Accessors, mutators, and predicates should be named for their value and prefixed with get, set.&lt;/p&gt;\r\n\r\n&lt;p&gt;When constructors are overloaded, use static factory methods with names that describe the arguments. For example,&lt;/p&gt;\r\n\r\n&lt;p&gt;Complex fulcrumPoint = Complex.FromRealNumber(23.0); is generally better than Complex fulcrumPoint = new Complex(23.0);&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Pick One Word per Concept &amp;mdash;&lt;/strong&gt;Pick one word for one abstract concept and stick with it. For instance, it&amp;rsquo;s confusing to have fetch, retrieve, and get as equivalent methods of different classes. How do you remember which method name goes with which class? Likewise, it&amp;rsquo;s confusing to have a controller and a manager and a driver in the same code base. What is the essential difference between a DeviceManager and a Protocol- Controller?&lt;/p&gt;\r\n', '2021-08-11 08:53:23', '2021-08-11 08:53:23'),
(2, 4, '5 Reasons why you should use Drupal', 0, 'drupal.png', '&lt;p&gt;It&amp;#39;s Powerful&lt;/p&gt;\r\n\r\n&lt;p&gt;With great power comes great flexibility. Drupal does not so much see itself as a content management system, but more as a content management framework. This means, it can be used to build any type of web application &amp;ndash; website, intranet, secure portal &amp;ndash; including a content management system. To put it simply, there is nothing that can&amp;#39;t be built in PHP (Facebook for example), that can&amp;#39;t be built with Drupal.&lt;/p&gt;\r\n\r\n&lt;h2&gt;It&amp;#39;s Secure&lt;/h2&gt;\r\n\r\n&lt;p&gt;Since Drupal is built as an Open Source platform, its codebase is very closely scrutinised. Open Source means the code that powers it is freely available for anyone to look at, use, modify, and contribute to. When you make your source code available in this manner, you&amp;#39;ve to make sure it&amp;#39;s top notch code. Since anyone can contribute to it &amp;ndash; and thousands of people across the world do &amp;ndash; you then get code that has thousands of pairs of eyes invigilating it at all times. Proprietary code manufacturers cannot give this guarantee; when using closed source software, you have no idea what potential security flaws are present.&lt;/p&gt;\r\n\r\n&lt;h2&gt;It&amp;#39;s Search Engine Friendly&lt;/h2&gt;\r\n\r\n&lt;p&gt;Drupal &amp;ldquo;out of the box&amp;rdquo; is quite well optimised for search engines, especially when Drupal 7 arrived back in 2011 with RDF support enabled. Drupal code is written quite semantically, and its ability to use alt and title tags for images and other uploaded media gives it quite a push in SEO terms. Okay, I&amp;#39;ve used the word quite three times now. And &amp;#39;quite&amp;#39; is not quite good enough. The brilliance of Drupal lies in the 20,000+ contributed modules that are available for it. When it comes to SEO there is no shortage of modules to turn something that is quite good into something that is super, such as the SEO compliance checker, SEO checklist, Global Redirect, Metatag, Search 404, XML Sitemap, and Pathauto modules to name just a few that made it onto Netmag&amp;#39;s 20 Best Drupal Modules for SEO list.&lt;/p&gt;\r\n\r\n&lt;h2&gt;It&amp;#39;s Cutting Edge&lt;/h2&gt;\r\n\r\n&lt;p&gt;Whatever is the latest up-and-coming trend in the software development world, is the latest up-and-coming trend in the Drupalverse. Drupal was the first to make responsive (base) themes available to ensure that any site could benefit from the increased user-experience that a mobile-friendly website brings with it. In Drupal 8 all themes will be responsive by default. It was the first major CMS to adopt RDF for semantic data. Also in Drupal 8 will be the awesomeness of in-line editing &amp;ndash; if you want to change a page title, then you can do so without having to load the full edit screen; same for menu items, images, footer links, copy &amp;ndash; anything. Perhaps the biggest feature to come in Drupal 8 will be the configuration in code aspect &amp;ndash; so no longer will configuration be stored in a database (needing the features module to come rescue it!), from now on (almost) the only thing to be placed in your content management system&amp;#39;s database is ... content!&lt;/p&gt;\r\n\r\n&lt;h2&gt;It&amp;#39;s Free&lt;/h2&gt;\r\n\r\n&lt;p&gt;Drupal is 100% free. You do not pay for Drupal. You do not pay a licence fee to use it. You do not pay a repeating licence fee each year. It is free, free, free. This means anyone can download it and build a website as complex as The Economist&amp;#39;s, The White House&amp;#39;s, or Harvard University&amp;#39;s. All you need to do is roll up your sleeves, be prepared to learn something new, and have fun. Failing that, you could call the experts who have gone through this learning curve already (that&amp;#39;s us, Annertech!).&lt;/p&gt;\r\n', '2021-08-11 08:56:58', '2021-08-11 08:56:58'),
(9, 1, 'What is Drupal?', 0, 'drupal.png', '&lt;h2&gt;The digital experiences you love. The organizations you trust most. The software they depend on.&lt;/h2&gt;\r\n\r\n&lt;h3&gt;Make something amazing, for anyone&lt;/h3&gt;\r\n\r\n&lt;p&gt;Drupal is content management software. It&amp;#39;s used to make many of the websites and applications you use every day. Drupal has great standard features, like easy content authoring, reliable performance, and excellent security. But what sets it apart is its flexibility; modularity is one of its core principles. Its tools help you build the versatile, structured content that dynamic web experiences need.&lt;/p&gt;\r\n\r\n&lt;p&gt;It&amp;#39;s also a great choice for creating integrated digital frameworks. You can extend it with any one, or many, of thousands of add-ons. Modules expand Drupal&amp;#39;s functionality. Themes let you customize your content&amp;#39;s presentation. Distributions are packaged Drupal bundles you can use as starter-kits. Mix and match these components to enhance Drupal&amp;#39;s core abilities. Or, integrate Drupal with external services and other applications in your infrastructure. No other content management software is this powerful and scalable.&lt;/p&gt;\r\n\r\n&lt;p&gt;The Drupal project is open source software. Anyone can download, use, work on, and share it with others. It&amp;#39;s built on principles like collaboration, globalism, and innovation. It&amp;#39;s distributed under the terms of the&amp;nbsp;&lt;a href=&quot;http://www.gnu.org/copyleft/gpl.html&quot; target=&quot;_blank&quot;&gt;GNU General Public License&lt;/a&gt;&amp;nbsp;(GPL). There are&amp;nbsp;&lt;a href=&quot;https://www.drupal.org/about/licensing&quot;&gt;no licensing fees&lt;/a&gt;, ever. Drupal will always be free.&lt;/p&gt;\r\n', '2021-08-11 08:56:16', '2021-08-11 08:56:16'),
(10, 1, 'Secrets to Living a Happier Life', 0, 'uwp1302251.jpeg', '&lt;h2&gt;&lt;strong&gt;1. Focus on Positive&lt;/strong&gt;&lt;/h2&gt;\n\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;Choose a positive mantra for the day -- something you will repeat to yourself, such as &amp;ldquo;Today is beautiful&amp;rdquo; or &amp;ldquo;I feel grateful for all I have.&amp;rdquo; And when things go south, take a moment to try and see it from a positive light. Never underestimate the importance of recognizing the silver linings in life.&lt;/p&gt;\n\n&lt;h2&gt;2. &lt;strong&gt;Celebrate Little Victories&lt;/strong&gt;&lt;/h2&gt;\n\n&lt;p&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp;&lt;/strong&gt;Life is full of ups and downs, but in between we have a lot of little victories that go unnoticed. Take a moment to celebrate these Small wins.&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp; &amp;nbsp; Did you check off all the things on your to-do list that you&amp;rsquo;ve been procrastinating on? Yay! Did you finally clear out a thousand emails that have been filling up your inbox? Woohoo! Take pleasure in these little achievements. They add up!&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;h2&gt;3. Find your work-life balance.&lt;/h2&gt;\n\n&lt;p&gt;&amp;nbsp; &amp;nbsp;&amp;nbsp;Work takes up a lot of our day, but it shouldn&amp;rsquo;t be the only thing we do. It&amp;rsquo;s important to pursue activities and interests beyond our job. Do you have a hobby? Are you spending&amp;nbsp;&lt;a href=&quot;https://www.entrepreneur.com/topic/time&quot;&gt;t&lt;/a&gt;ime&amp;nbsp;with friends and loved ones? Are you getting exercise? Creating balance in your life will reduce stress and give you other outlets to express yourself and have fun.&lt;/p&gt;\n\n&lt;h2&gt;4.Be Creative.&lt;/h2&gt;\n\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;You may think of artists as being moody and depressed, but studies show that engaging in creative activities&amp;nbsp;on a regular basis actually makes you happier. Those who spend time using their imagination and being creative have more enthusiasm and are more likely to have feelings&amp;nbsp;of long-term happiness and well-being. Such creative activities can include writing, painting, drawing and musical performance.&lt;/p&gt;\n', '2021-08-11 07:41:48', '2021-08-11 07:40:27');

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
(4, 'omkard', 'omkar12@gmail.com', 'Author', '4c1a0c3674cdd28eba67844dfe60bab9', '2021-08-06 06:41:07', '2021-08-06 06:41:07'),
(5, 'omkarpd1', 'omkarpd105@gmail.com', 'Author', 'e10e17446584ec70366db4f9b90b14c8', '2021-08-11 07:25:56', '2021-08-11 07:25:56');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
