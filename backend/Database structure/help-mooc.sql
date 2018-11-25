-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2018 at 06:51 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `help-mooc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'ACCOUNTING,\r\nBANKING & FINANCE'),
(2, 'BUSINESS'),
(3, 'COMMUNICATION'),
(4, 'ENTREPRENEURSHIP'),
(5, 'EARLY CHILDHOOD EDUCATION'),
(6, 'ENGINEERING'),
(7, 'ENGLISH & LANGUAGE STUDIES'),
(8, 'HUMAN RESOURCE MANAGEMENT'),
(9, 'HOSPITALITY & TOURISM'),
(10, 'INFORMATION TECHNOLOGY & COMPUTER SCIENCE'),
(11, 'LAW'),
(12, 'MARKETING'),
(13, 'MANAGEMENT'),
(14, 'PSYCHOLOGY');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `crs_uniqueID` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `starting_date` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `pre_requirments` varchar(255) NOT NULL,
  `learning_outcomes` varchar(255) NOT NULL,
  `descriptions` text NOT NULL,
  `instructor_id` varchar(50) NOT NULL,
  `course_path_fol` varchar(255) NOT NULL,
  `course_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `crs_uniqueID`, `course_name`, `category_id`, `starting_date`, `duration`, `pre_requirments`, `learning_outcomes`, `descriptions`, `instructor_id`, `course_path_fol`, `course_image`) VALUES
(1, 'CRS5bf3b262b8e250.64245568', 'Learn Advanced C++ Programming', 10, '2018-11-26', 14, 'You will need a grasp of basic C++, together with a C++ compiler.', 'Develop complex C++ applications. Be in a position to apply for jobs requiring good C++ knowledge. Understand C++ 11.', 'This course will take you from a basic knowledge of C++ to using more advanced features of the language. This course is for you if you want to deepen your basic knowledge of C++, you want to learn C++ 11 features, or you\'ve taken my free beginners\' C++ course and you\'re looking for the next step.  We\'ll start with a look at C++ file handling and move through STL, template classes, operator overloading, lambda expressions, move constructors and much more besides.  At the end of the course I\'ll show you how to create a program that generates fractal images, using a a few of the language features we\'ve seen in the course and giving you a great work out with smart pointers and arrays.  I\'ll give you exercises throughout the course, ranging from easy near the start, to quite tricky (but optional!) near the end of the course.', 'INS_5bdbe6b61428f9.96761451', './src/courses/Learn Advanced C++ Programming', 'c++_image.jpg'),
(4, 'CRS5bf503ec83b320.09956687', 'AWS Certified Solutions Architect - Associate 2018 ', 10, '2018-11-26', 14, 'You will need to set up an AWS Account (you can use the free tier for this course)     Your own domain name (optional, but recommended)     A Windows, Linux or Mac PC/Laptop', 'Pass the AWS Certified Solutions Architect - Associate Exam Design Highly Resilient and Scaleable Websites on AWS Become Intimately Familiar With The AWS Platform Become Amazon Certified Become A Cloud Guru ', 'Are you looking for AWS Training?  Amazon Web Services (AWS) Certification is fast becoming the must have certificates for any IT professional working with AWS. This course is designed to help you pass the AWS Certified Solutions Architect (CSA) - Associate Exam. Even if you have never logged in to the AWS platform before, by the end of our AWS training you will be able to take the CSA exam. No programming knowledge needed and no prior AWS experience required. With this AWS certification under your belt (and optionally after completing our AWS Certified Developer 2018 - also available on Udemy), you will be in high demand by many employers and you can command a superior salary.  In this course we will start with a broad overview of the AWS platform and then deep dive into the individual elements of the AWS platform. You will explore Route53, EC2, S3, Cloud Front, Autoscaling, Load Balancing, RDS, RedShift, DynamoDB, EMR, VPC etc.  Read the fantastic reviews of our course!  Alex describes this course as \"The b', 'INS_5bdbe6b61428f9.96761451', './src/courses/AWS Certified Solutions Architect - Associate 2018 ', 'aws.png'),
(5, 'CRS5bf57dd1b867c0.24701603', 'Build a PHP MVC Framework From Scratch ', 10, '2019-01-01', 14, '      You should already be familiar with PHP and HTML.     You should be comfortable installing software on your computer - in the first section we\'ll be installing a web server.', 'Separate application code from presentation code Organise your PHP code into models, views and controllers in an MVC framework Use namespaces and an autoloader to load PHP classes automatically Use the Composer tool to manage third-party package dependenc', 'Learn the basic concepts of using a model-view-controller framework that will make your PHP projects faster, easier to write and maintain, and more secure.  Learn to Structure your PHP Code Like a Professional by Building a PHP MVC Framework from Scratch.      Model-view-controller (MVC) pattern concepts     Build an MVC framework in PHP from scratch     Separate application code from presentation code     Use namespaces and an autoloader to load classes automatically  Take your PHP Projects to the Next Level  Learning how to use an MVC framework puts a very powerful tool at your fingertips. Most commercial websites and web applications written in PHP use some sort of framework, and the MVC pattern is the most popular type of framework in use.  The gap between knowing PHP and using a framework can be huge. This course bridges that gap. By writing your own framework from scratch, you\'ll gain an understanding of just how each component works. Frameworks like Laravel, Symfony and CodeIgniter all use the MVC patt', 'INS_5bf57b2ce6ca93.54920529', './src/courses/Build a PHP MVC Framework From Scratch ', 'php.png'),
(6, 'CRS5bf57f1fdf6911.21308780', 'Modern React with Redux 2019 Update', 10, '2019-01-01', 10, 'A Mac or Windows Computer', 'Build amazing single page applications with React JS and Redux Master fundamental concepts behind structuring Redux applications Realize the power of building composable components Be the engineer who explains how Redux works to everyone else, because you', 'Course Last Updated November 2018 for React v16.6.3 and Redux v4.0.1!  All content is brand new!  Congratulations!  You\'ve found the most popular, most complete, and most up-to-date resource online for learning React and Redux!  Thousands of other engineers have learned React and Redux, and you can too.  This course uses a time-tested, battle-proven method to make sure you understand exactly how React and Redux work, and will get you a new job working as a software engineer or help you build that app you\'ve always been dreaming about.  The difference between this course and all the others: you will understand the design patterns used by top companies to build massively popular web apps.  React is the most popular Javascript library of the last five years, and the job market is still hotter than ever.  Companies large and small can\'t hire engineers who understand React and Redux fast enough, and salaries for engineers are at an all time high.  It\'s a great time to learn React!  ----------------------  What will you build?  This course features hundreds of videos with dozens of custom diagrams to help you understand how React and Redux work.  No prior experience with either is necessary. Through tireless, patient explanations and many interesting practical examples, you\'ll learn the fundamentals of building dynamic and live web apps using React.  Each topic included in this course is added incrementally, to make sure that you have a solid foundation of knowledge.  You\'ll find plenty of discussion added in to help you understand exactly when and where to use each feature of React and Redux.  My guarantee to you: there is no other course online that teaches more features of React and Redux.  This is the most comprehensive resource there is.   Below is a partial list of the topics you\'ll find in this course:      Master the fundamental features of React, including JSX, state, and props      From square one, understand how to build reusable components      Dive into the source code of Redux to understand how it works behind the scenes      Test your knowledge and hone your skills with numerous coding exercises      Integrate React with advanced browser features, even geolocation API\'s!      Use popular styling libraries to build beautiful apps      Master different techniques of deployment so you can show off the apps you build!      See different methods of building UI\'s through composition of components   Besides just React and Redux, you\'ll pick up countless other tidbits of knowledge, including ES2015 syntax, popular design patterns, even the clearest explanation of the keyword \'this\' in Javascript that you\'ll ever hear.  This is the course I wanted to take when I first learned React: complete, up-to-date, and clear.   Who is the target audience?      Programmers looking to learn React     Developers who want to grow out of just using jQuery     Engineers who have researched React but have had trouble mastering some concepts', 'INS_5bf57b2ce6ca93.54920529', './src/courses/Modern React with Redux 2019 Update', 'react.png'),
(7, 'CRS5bf581a165e472.55878742', 'Instagram Masterclass 2018', 12, '2019-01-01', 14, '      Have access to a smartphone and a consistent internet connection     No prior experience with Instagram required', 'Learn how to create a successful themed, business, or personal account on Instagram Be able to pick an effective name for their account Understand the platform specific and growth marketing jargon associated with Instagram Create an attractive logo and fu', '***Join the over 8,900 students that have joined this course in the first 4 days of being live!***   This is the most comprehensive course on Instagram Marketing anywhere.   With over 21 hours of video and 60+ custom resources & guides, you won’t find a more thorough and up to date course out there.   We cover everything you need to know to start from scratch and grow an account to 20k, 40k, even 100k followers.   This course is for both beginners to Instagram and more advanced students that have some experience with the platform.   We’ll first start by teaching the basics of:  • Setting up and optimizing an account  • Developing a content strategy  • Creating your first batch of content  • Learning how to post & how to optimize hashtags   After that, we’ll start exploring intermediate growth strategies like:  • Shoutouts  • Bots & automated systems  • Top post targeted hashtags   After we establish a consistent system for growing our audience we’ll start diving into advanced concepts:   • Hiring low cost content producers and designing a production system  • Introducing automation into content production, posting, and even outreach  • Using stories to increase engagement through your feed and expand your reach  • Designing an Instagram Live strategy to consistently create spikes in follows  • Creating zombie accounts that help drive traffic to your main account  • Design effective Instagram ads and how to incorporate them into your overall growth strategy  • How to run competitions to grow engagement and follows.   And much much more!   This course is designed to apply to both individuals that want to grow a following for themselves, but also businesses that want to start a presence on the platform and use it to grow their brand.                                                     ----------------------------------------------------   Are you tired of courses that just repeat information you could have found on a blog or YouTube? Or maybe you’ve been stuck with instructors that TELL you what to do but have no idea what it takes to really accomplish what they’re teaching?  In this course, we don’t just TALK the TALK. We will actually DO what we are teaching.   Follow along as we take an account from complete scratch to 43,000 followers.   We start from the absolute beginning with conceptualizing the account, and we end with a well defined content strategy, over 700 posts, and have even started to generate revenue with our account.   @innovationstation <<check it out  No fake followers, no boosted posts, & no cheating. 43,000 REAL followers with an average engagement rate over 7%. Our account is growing by over 300+ followers a day, using the strategies taught in this course.                                                     ----------------------------------------------------   Beware other Instagram courses are outdated, shallow, and taught by instructors who have never grown an account themselves.    Outdated: Instagram changes its system, it’s features, and it’s algorithm at least 3 times a year. That means if your instructor filmed their course in 2015, they’ve missed at least 9 different cycles! Their advice is not only out-dated, it’s worthless.   Shallow: Instagram is a huge opportunity and very complicated product. Anyone who tells you that you can “master Instagram” in 4 hours simply is not telling the truth. It’s not enough to just SHOW you how to add a hashtag. You have to understand how they work, how to track them, and how you can apply a comprehensive strategy to your posts to stay ahead of the game.   Your Instructor:  Evan Kimbrell is a top-rated Udemy instructor with over 30 courses on Entrepreneurship & Marketing. His courses have over 280,000 students, 16,000+ 5 star reviews, and have been covered in publications such as TechCrunch, Entrepreneur Magazine, and Buzzfeed. Who is the target audience?      Anyone interested in starting an Instagram account for theirself or their business     Anyone with an already existing account that they want to improve and grow', 'INS_5bf57b2ce6ca93.54920529', './src/courses/Instagram Masterclass 2018', 'instagram.png'),
(8, 'CRS5bf5837d5dfbb6.84482592', 'Introduction to Finance, Accounting, Modeling and Valuation', 1, '2019-01-01', 14, 'You don’t need to have any accounting or finance experience as we will cover all of the concepts from scratch. A requirement is that you have access to and a very basic understanding of how to use Microsoft Excel as we will use Microsoft Excel in the cour', 'Analyze and understand a balance sheet (even if you have no experience with balance sheets).Understand and use modeling best practices so you can create financial models. Know where to get data in order to build a financial model (in depth understanding o', '1 Best Selling Accounting Course on Udemy (Learn Finance and Accounting the Easy Way)!     ** ACCORDING TO BUSINESS INSIDER: \"Haroun is one of the highest rated professors on Udemy, so you can expect to be in good hands through the course of your education.\" **  He is the author of the best selling business course on Udemy this year called \'An Entire MBA in 1 Course\'  This course will help you understand accounting, finance, financial modeling and valuation from scratch (no prior accounting, finance, modeling or valuation experience is required).  After taking this course you will understand how to create, analyze and forecast an income statement, balance sheet and cash flow statement.   By the end of his course you will also know how to value companies using several different valuation methodologies that I have used during my Wall Street career so you can come up with target prices for the companies that you are analyzing.  By the end of this course you will also know how to analyze financial statements usin', 'INS_5bdbe6b61428f9.96761451', './src/courses/Introduction to Finance, Accounting, Modeling and Valuation', 'finance.jpg'),
(9, 'CRS5bf59afa380cc1.59183764', 'Learn Advanced C++ Programming', 10, '2018-12-03', 14, 'You will need a grasp of basic C++, together with a C++ compiler.', 'Develop complex C++ applications. Be in a position to apply for jobs requiring good C++ knowledge. Understand C++ 11.', 'This course will take you from a basic knowledge of C++ to using more advanced features of the language. This course is for you if you want to deepen your basic knowledge of C++, you want to learn C++ 11 features, or you\'ve taken my free beginners\' C++ course and you\'re looking for the next step.  We\'ll start with a look at C++ file handling and move through STL, template classes, operator overloading, lambda expressions, move constructors and much more besides.  At the end of the course I\'ll show you how to create a program that generates fractal images, using a a few of the language features we\'ve seen in the course and giving you a great work out with smart pointers and arrays.  I\'ll give you exercises throughout the course, ranging from easy near the start, to quite tricky (but optional!) near the end of the course.', 'INS_5bf59a9b237236.61314317', './src/courses/Learn Advanced C++ Programming', 'c++_image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `course_cirriculum`
--

CREATE TABLE `course_cirriculum` (
  `id` int(11) NOT NULL,
  `week_number` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `id` int(11) NOT NULL,
  `course_id` varchar(50) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `joining_data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`id`, `course_id`, `student_id`, `joining_data`) VALUES
(1, 'CRS5bf57f1fdf6911.21308780', 'STD_5bf58233577018.44407051', '2018-11-22 00:00:00'),
(2, 'CRS5bf581a165e472.55878742', 'STD_5bf58233577018.44407051', '2018-11-22 00:00:00'),
(3, 'CRS5bf503ec83b320.09956687', 'STD_5bf58233577018.44407051', '2018-11-22 00:00:00'),
(4, 'CRS5bf3b262b8e250.64245568', 'STD_5bf59a439d0ac3.43736015', '2018-11-22 00:00:00'),
(5, 'CRS5bf3b262b8e250.64245568', 'STD_5bf58233577018.44407051', '2018-11-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `id` int(11) NOT NULL,
  `ins_uniquID` varchar(50) NOT NULL,
  `instructor_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`id`, `ins_uniquID`, `instructor_name`, `email`, `password`) VALUES
(1, 'INS_5bdbe6b61428f9.96761451', 'Thierno Abdoul Rahimi Diallo', 'tard916@gmail.com', '$2y$10$v84aawFqKmdQjk0WZxMk0e0uiuU1oplexqVuaK.tXZyhbjYieDjuK'),
(2, 'INS_5be28fe1492a74.88822101', 'Mamadou Cellou Diallo', 'c@c.com', '$2y$10$vKtMMzFI18w0VZ5EjSRt2uu7uMh9I1hcu79qZJ2UWD.0M76lMI1MC'),
(3, 'INS_5bf57b2ce6ca93.54920529', 'Mamadou Saidou Diallo', 'mds@helpmooc.com', '$2y$10$Po8QiJgcdiy0NN1XVlOGjeclhBTPu5v/1VogL/YRgAakhvxuLo8R6'),
(4, 'INS_5bf59a9b237236.61314317', 'Rahimi', 'r@rr.com', '$2y$10$1vdnLeTUlWYND3J8Qs8AzO/Rg3kdZisH6Yk0nD7fvptVstgHI79lm');

-- --------------------------------------------------------

--
-- Table structure for table `login_tokens`
--

CREATE TABLE `login_tokens` (
  `id` int(11) NOT NULL,
  `token` char(64) NOT NULL,
  `user_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_tokens`
--

INSERT INTO `login_tokens` (`id`, `token`, `user_id`) VALUES
(1, 'bbea9eb7b7c9696a489dc8c8642b8b74e7e1b919', 'std0000001'),
(2, 'afbb438e6f525012a9809423668185704875c1e8', 'STD_5bdbd6c50e20d3.65807706'),
(3, 'b55d51e44100d8f98a8a27bcf7fde71f3f2acc10', 'INS_5bdbe6b61428f9.96761451'),
(4, '7995ec1e115179d9308184ebd8000fde683af5ec', 'INS_5bdbe6b61428f9.96761451'),
(5, '3cfadcfa1d4b1655e5e2097c973730ff3b6d7c2a', 'INS_5bdbe778153f40.94600672'),
(6, '7f98fe5493e87084d043e07b4a932be3c60dd6ff', 'std0000001'),
(17, 'b118ae3b38d449154a39527ce684d310fbc1cf1c', 'STD_0000001'),
(24, 'fc0349e3466839201fc4bc5b911d1ec428c6d75a', 'INS_5bf59a9b237236.61314317');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `std_uniquID` varchar(50) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `std_uniquID`, `student_name`, `email`, `password`) VALUES
(1, 'STD_0000001', 'Thierno Abdoul Rahimi Diallo', 'rahimi.diallo@outlook.com', '$2y$10$5IRrS5OzhtXV4onQCVGWKOrpBo8AF5EYIG2QXV3aSmcyxyHJPSZ.K'),
(2, 'STD_5bdba499dcd753.58083666', 'thierno', 't@t.t', '$2y$10$9S88UNVkeMPt7JKaSozRDO4tpFE8LeZg0nac4V1oGO/pxJg0eUQ6S'),
(3, 'STD_5bdbd6c50e20d3.65807706', 'jfnonvskm', 'ng@ng.ng', '$2y$10$DmmI9mGUyt34Sz8PFj4mm.mmY0d1ItjPxvsD2X4remksJETJq3Tdi'),
(4, 'STD_5bdbd77ecab113.21600311', 'Mehrab', 'b@b.b', '$2y$10$zSb4wsChZLk/9/FRQP5ZZ.kBJaHLeMGSo8YCU4kcBPQl2HTmorcAO'),
(5, 'STD_5bdbe4ded307b6.80670940', 'sdfcnbnlands', 'h@h.h', '$2y$10$2Hal1G5lgsUuuWp94cWU7uTG2lUNZ0kHxuAn7oJ5jjBCl73z/QXlO'),
(6, 'STD_5bdbe778153f40.94600672', 'Hassan', 'h1@h.h', '$2y$10$JFX/L5tHTWANarZoClv9r.9rwXbcSPgS7eVSRi7sZA0e4wjC.szNe'),
(7, 'STD_5bdbfc006984e0.62219977', 'Ehab Nabiel', 'ehab@help.com.my', '$2y$10$62y77imV94J8kr.x2UuJ9ueOANwbyN3UGQFU4e803GxuI/1Lze3Dy'),
(8, 'STD_5be2917f3abae1.66661482', 'Hassan Saleem', 'hs@hs.hs', '$2y$10$03T384aPqcxFVwKeN96RJetrGMkoB/eOvDFPfVK7pdKqvSfajEUtG'),
(9, 'STD_5bf0996ea11f17.90853588', 'Virago', 'ema@virago.com', '$2y$10$3I6lZEPOVa5Wzni.iImE3e5XnzPSpUbm7J5hj/G92SVi0qeVWEsAm'),
(10, 'STD_5bf4ddde111374.26322502', 'Saikou Sall ', 'saikou@helpmooc.com', '$2y$10$m4cO0N7gwec3R6TbQilYze/rTYrYMj.jIcL03fYpYck0TvzzxF74W'),
(11, 'STD_5bf58233577018.44407051', 'Kvin Wong', 'kw@helpmooc.com', '$2y$10$nOMY27XgfPJdVHmzychPKO6Vk5S7UfkYqHJiyNhVEtAXjMysedeji'),
(12, 'STD_5bf59a439d0ac3.43736015', 'Alpha', 'alpha@hlp.com', '$2y$10$Pn7WO0HX.D4MAkF7UD.LAudWqZTTpeHDiQ/KSkvBckFYW5sQf0RZe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `crs_uniqueID` (`crs_uniqueID`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `course_cirriculum`
--
ALTER TABLE `course_cirriculum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `ins_uniquID` (`ins_uniquID`);

--
-- Indexes for table `login_tokens`
--
ALTER TABLE `login_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `std_uniquID` (`std_uniquID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `course_cirriculum`
--
ALTER TABLE `course_cirriculum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_tokens`
--
ALTER TABLE `login_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_cirriculum`
--
ALTER TABLE `course_cirriculum`
  ADD CONSTRAINT `course_cirriculum_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
