-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2019 at 06:25 AM
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
(9, 'CRS5bf59afa380cc1.59183764', 'Learn Advanced C++ Programming', 10, '2018-12-03', 14, 'You will need a grasp of basic C++, together with a C++ compiler.', 'Develop complex C++ applications. Be in a position to apply for jobs requiring good C++ knowledge. Understand C++ 11.', 'This course will take you from a basic knowledge of C++ to using more advanced features of the language. This course is for you if you want to deepen your basic knowledge of C++, you want to learn C++ 11 features, or you\'ve taken my free beginners\' C++ course and you\'re looking for the next step.  We\'ll start with a look at C++ file handling and move through STL, template classes, operator overloading, lambda expressions, move constructors and much more besides.  At the end of the course I\'ll show you how to create a program that generates fractal images, using a a few of the language features we\'ve seen in the course and giving you a great work out with smart pointers and arrays.  I\'ll give you exercises throughout the course, ranging from easy near the start, to quite tricky (but optional!) near the end of the course.', 'INS_5bf59a9b237236.61314317', './src/courses/Learn Advanced C++ Programming', 'c++_image.jpg'),
(10, 'CRS5c21e7b6ecb710.15500033', 'Statistics for Data Science and Business Analysis', 10, '2019-01-01', 14, '      Absolutely no experience is required. We will start from the basics and gradually build up your knowledge. Everything is in the course.     A willingness to learn and practice', '    Understand the fundamentals of statistics     Learn how to work with different types of data     How to plot different types of data     Calculate the measures of central tendency, asymmetry, and variability     Calculate correlation and covariance   ', 'Is statistics a driving force in the industry you want to enter? Do you want to work as a Marketing Analyst, a Business Intelligence Analyst, a Data Analyst, or a Data Scientist?  Well then, you’ve come to the right place!    Statistics for Data Science and Business Analysis is here for you with TEMPLATES in Excel included!    This is where you start. And it is the perfect beginning!    In no time, you will acquire the fundamental skills that will enable you to understand complicated statistical analysis directly applicable to real-life situations. We have created a course that is:         Easy to understand        Comprehensive        Practical        To the point        Packed with plenty of exercises and resources          Data-driven        Introduces you to the statistical scientific lingo        Teaches you about data visualization        Shows you the main pillars of quant research     It is no secret that a lot of these topics have been explained online. Thousands of times. However, it is next to impossible to find a structured program that gives you an understanding of why certain statistical tests are being used so often. Modern software packages and programming languages are automating most of these activities, but this course gives you something more valuable – critical thinking abilities. Computers and programming languages are like ships at sea. They are fine vessels that will carry you to the desired destination, but it is up to you, the aspiring data scientist or BI analyst, to navigate and point them in the right direction.     Teaching is our passion    We worked hard for over four months to create the best possible Statistics course which would deliver the most value to you. We want you to succeed, which is why the course aims to be as engaging as possible. High-quality animations, superb course materials, quiz questions, handouts and course notes, as well as a glossary with all new terms you will learn, are just some of the perks you will get by subscribing.     What makes this course different from the rest of the Statistics courses out there?        High-quality production – HD video and animations (This isn’t a collection of boring lectures!)        Knowledgeable instructor (An adept mathematician and statistician who has competed at an international level)           Complete training – we will cover all major statistical topics and skills you need to become a marketing analyst, a business intelligence analyst, a data analyst, or a data scientist        Extensive Case Studies that will help you reinforce everything you’ve learned        Excellent support - if you don’t understand a concept or you simply want to drop us a line, you’ll receive an answer within 1 business day        Dynamic - we don’t want to waste your time! The instructor sets a very good pace throughout the whole course  Why do you need these skills?        Salary/Income – careers in the field of data science are some of the most popular in the corporate world today. And, given that most businesses are starting to realize the advantages of working with the data at their disposal, this trend will only continue to grow        Promotions – If you understand Statistics well, you will be able to back up your business ideas with quantitative evidence, which is an easy path to career growth        Secure Future – as we said, the demand for people who understand numbers and data, and can interpret it, is growing exponentially; you’ve probably heard of the number of jobs that will be automated soon, right? Well, data science careers are the ones doing the automating, not getting automated        Growth - this isn’t a boring job. Every day, you will face different challenges that will test your existing skills and require you to learn something new      Please bear in mind that the course comes with Udemy’s 30-day unconditional money-back guarantee. And why not give such a guarantee? We are certain this course will provide a ton of value for you.    Let\'s start learning together now!   Who this course is for:      People who want a career in Data Science     People who want a career in Business Intelligence     Business analysts     Business executives     Individuals who are passionate about numbers and quant analysis     Anyone who wants to learn the subtleties of Statistics and how it is used in the business world     People who want to start learning statistics     People who want to learn the fundamentals of statistics', 'INS_5bdbe6b61428f9.96761451', './src/courses/Statistics for Data Science and Business Analysis', 'statistics.png'),
(11, 'CRS5c233bf2c55cd2.54458570', 'Java Programming Masterclass for Software Developers', 10, '2019-01-01', 12, 'A computer with either Windows, Mac or Linux to install all the free software and tools needed to build your new apps (I provide specific videos on installations for each platform). A strong work ethic, willingness to learn, and plenty of excitement about', 'Learn the core Java skills needed to apply for Java developer positions in just 14 hours. Be able to sit for and pass the Oracle Java Certificate exam if you choose. Be able to demonstrate your understanding of Java to future employers. Learn industry \"be', 'You’ve just stumbled upon the most complete, in-depth Java programming course online. With over 260,000 students enrolled and tens of thousands of 5 star reviews to date, these comprehensive java tutorials cover everything you’ll ever need.  Whether you want to:  - build the skills you need to get your first Java programming job  - move to a more senior software developer position  - pass the oracle java certification exam  - or just learn java to be able to create your own java apps quickly.  ...this complete Java Masterclass is the course you need to do all of this, and more.   Are you aiming to get your first Java Programming job but struggling to find out what skills employers want and which course will give you those skills?  This course is designed to give you the Java skills you need to get a job as a Java developer.  By the end of the course you will understand Java extremely well and be able to build your own Java apps and be productive as a software developer.  Lots of students have been success with getting their first job or a promotion after going through the course.  Here is just one example of a student who lost her job and despite having never coded in her life previously, got a full time software developer position in just a few months after starting this course.  She didn\'t even complete the course!   \"Three months ago I lost my job, came to a turning point in my life, and finally made the drastic decision to completely change course.   I decided to switch career path and go into coding. My husband found and gave me your Complete Java Masterclass at Udemy as a gift, and I wholeheartedly dove into it as a life line. Following your course has been absolutely enjoyable (still working on it, not yet finished), and has been a great way of keeping on course, dedicated and motivated.  Yesterday, three months after starting the course and honestly to my surprise, I received (and accepted!) a job offer as a full-time developer. I wanted to just drop you a line to say thank you for doing this work, for being such a dedicated teacher, and for putting all this knowledge available out there in such an approachable way. It has, literally, been life changing. With gratitude,  Laura\"   The course is a whopping 76 hours long.  Perhaps you have looked at the size of the course and are feeling a little overwhelmed at the prospect of finding time to complete it.   Maybe you are wondering if you need to go through it all?  Firstly, Laura\'s story above shows that you do not have to complete the entire course - she was yet to complete the course when she accepted her developer job offer.  Secondly, the course is designed as a one stop shop for Java.  The core java material you need to learn java development is covered in the first seven sections (around 14 hours in total).  The Java Basics are covered in those sections. The rest of the course covers intermediate, advanced and optional material you do not technically need to go through.  For example section 13 is a whopping 10 hours just by itself and is aimed at those students who want to build desktop applications with graphical user interfaces.  JavaFX (which is the technology used in this section) is something that most java developers will rarely or never need to work on.  So you could skip that section entirely.  But if you are one of the few that need to build user interfaces, then the content is there and ready for you.   And there are other sections you can completely avoid if you wish.  If you want to know absolutely everything about Java, then you can go through the entire course if you wish, but it\'s not necessary to do so if you are just looking to learn the essential information to get a java developer position.  Why would you choose to learn Java?  The reality is that there is a lot of computer languages out there.  It\'s in the hundreds.  Why would you choose the Java language?  The number one reason is its popularity.  According to many official websites that track popularity of languages, Java is either #1 or in the top 3.  Popularity means more companies and their staff are using it, so there are more career opportunities available for you if you are skilled in the language.  The last thing you want to do is pick a language that is not in mainstream use.  Java came out in the 1990\'s and is still very popular today.  What version of Java should you learn?  Generally speaking you would want to learn the very latest version of a computer programming language, but thats not necessarily the case with Java.  Until recently Java releases were infrequent (one major release in 3 years was common).  Companies standardised on specific versions of Java.  Right now most companies are still focused on Java 8, which is a relatively old version, dating back to 2015.  Oracle (the owners of Java) are now releasing new versions of Java every six months, and when the new version comes out the old version is no longer supported.  But to cater for most companies who tend to stick to specific versions of Java for a long time, they have marked the current version of Java - Java 11 as LTS - or Long Term support. That means that they guarantee to support this version for the long term - for a number of years at least.  Companies will stick to versions of Java that are supported in the long term. For career purposes you should learn the appropriate versions of Java that your future employer will likely be using.  Right now thats Java 8 and Java 11 (Java 9 and Java 10 have been released and already been marked obsolete and are no longer supported).  The good news is that this course is focused on Java 8, and has recently been updated for Java 11.   Will this course give me core java skills?  Yes it will.  Core Java is the fundamental parts of the java jdk (the java development kit) that programmers need to learn to move onto other more advanced technologies.  Why should you take this course?  It\'s been a best seller since it\'s release on Udemy, you would be joining over 260,000 students who are already enrolled in the course.  There are close to 60,000 reviews left by students.  It\'s rated as the best course to learn Java for beginners.  What makes this course a bestseller?  Like you, thousands of others were frustrated and fed up with fragmented Youtube tutorials or incomplete or outdated courses which assume you already know a bunch of stuff, as well as thick, college-like textbooks able to send even the most caffeine-fuelled coder to sleep.  Like you, they were tired of low-quality lessons, poorly explained topics and all-round confusing info presented in the wrong way. That’s why so many find success in this complete Java developer course. It’s designed with simplicity and seamless progression in mind through its content.  This course assumes no previous coding experience and takes you from absolute beginner core concepts, like showing you the free tools you need to download and install, to writing your very first Java program.  You will learn the core java skills you need to become employable in around 14 hours, and if you choose to, can take advantage of all the additional content in the course. It\'s a one stop shop to learn java. If you want to go beyond the core content you can do so at any time.  Here’s just some of what you’ll learn  (It’s okay if you don’t understand all this yet, you will in the course)      All the essential Java keywords, operators, statements, and expressions needed to fully understand exactly what you’re coding and why - making programming easy to grasp and less frustrating      You will learn the answers to questions like What is a Java class, What is polymorphism and inheritance and to apply them to your java apps.      How to safely download and install all necessary coding tools with less time and no frustrating installations or setups      Complete chapters on object-oriented programming and many aspects of the Java API (the protocols and tools for building applications) so you can code for all platforms and derestrict your program’s user base (and potential sales)      How to develop powerful Java applications using one of the most powerful Integrated Development Environments on the market, IntelliJ IDEA! - Meaning you can code functional programs easier.  IntelliJ has both a FREE and PAID version, and you can use either in this course.  (Don’t worry if you’re used to using Eclipse, NetBeans or some other IDE. You’re free to use any IDE and still get the most out of this course)      Learn Java to a sufficient level to be a be to transition to core Java technologies like Android development, the Spring framework, Java EE (Enterprise edition) in general as well as and other technologies. In order to progress to these technologies you need to first learn core Java - the fundamental building blocks.  That\'s what this course will help you to achieve.  “AP-what?”  Don\'t worry if none of that made sense. I go into great detail explaining each and every core concept, programming term, and buzzwords you need to create your own Java programs.  This truly is Java for complete beginners.  By the end of this comprehensive course, you’ll master Java programming no matter what level of experience you’re at right now. You’ll understand what you are doing, and why you are doing it. This isn’t a recipe book, you’ll use your own creativity to make unique, intuitive programs.  Not only do these HD videos show you how to become a programmer in great detail, but this course includes a unique challenge feature. Each time a core concept is taught, a video presents a challenge for you to help you understand what you have just learned in a real world scenario.  You’ll go and complete the challenge on your own, then come back and see the answers which I then explain in detail in a video, allowing you to check your results and identify any areas you need to go back and work on.  This is a proven way to help you understand Java faster and ensure you reach your goal of becoming a Java Developer in record time. Remember doing those old past exam papers in high school or college? It’s the same concept, and it works.  As your instructor, I have over 35 years experience as a software developer and teacher and have been using Java since the year 2000. Yes, over 18 years (I’ve taught students younger than that). Meaning not only can I teach this content with great simplicity, but I can make it fun too!  It’s no surprise my previous students have amazing results...  See what your fellow students have to say:  \"This course was a guiding light in my \"Becoming a developer\" path from the first step. It helped me become a much more educated developer comparing to my friend who learned to code from trial/error. It\'s still a guide for me. every now and then I will come back to this course to learn something new or to improve what I\'ve learned somewhere else. A BIG Thanks to \"Tim Buchalka\" my Master.\" - Sina Jz  \"I was an absolute beginner when I started this course, and now I can write some good small advanced clean codes. I wrote a code and showed it to a programmer, and he was shocked, he told me that I\'m more than ready to start a programming career.\" - Amirreza Moeini  \"I am taking this class in conjunction with a Java 101 college class. I have learned more in one afternoon of videos from this class than I have in 4 weeks of college class. Tim actually explains what things are and why they do what they do, as opposed to my college instructor that mainly said \"go make a program that does *whatever*\" and then I had to figure out a program that would meet those requirements but not actually learning why it worked.\" - Stacy Harris  It’s safe to say my students are thrilled with this course, and more importantly, their results, and you can be too…  This complete Java course will teach you everything you need to know in order to code awesome, profitable projects,  Is the course updated?  It’s no secret how technology is advancing at a rapid rate. New, more powerful hardware and software are being released every day, meaning it’s crucial to stay on top with the latest knowledge.  A lot of other courses on Udemy get released once, and never get updated.  Learning an older version of Java can be counter productive - you could will be learning the \"old way\" of doing things, rather than using current technology.  Make sure you check the last updated date on the page of any course you plan to buy - you will be shocked to see some have not been updated for years.   That’s why I’m always adding new, up-to-date content to this course at no extra charge. Buy this course once, and you’ll have lifetime access to it and any future updates (which are on the way as we speak).  I\'ve continued to do this since the original version of the course came out, and recently have been updating it to Java 11.  With this complete Java Masterclass, you will always have updated, relevant content.  What if I have questions?  As if this course wasn’t complete enough, I offer full support, answering any questions you have 7 days a week (whereas many instructors answer just once per week, or not at all).  This means you’ll never find yourself stuck on one lesson for days on end. With my hand-holding guidance, you’ll progress smoothly through this course without any major roadblocks.  That’s just one reason why I was voted top 10 in the  Udemy instructor awards (out of a whopping 18,000 instructors), and quickly became a top-rated, bestselling instructor on the Udemy site.    Student Quote: “This course is a great place to ask questions if you have them or find help if you become stuck in areas.” - Blake S.  There’s no risk either!  This course comes with a full 30 day money-back guarantee. Meaning if you are not completely satisfied with the course or your progress, simply let me know and I’ll refund you 100%, every last penny no questions asked.  You either end up with Java skills, go on to develop great programs and potentially make an awesome career for yourself, or you try the course and simply get all your money back if you don’t like it…  You literally can’t lose.  Ready to get started, developer?  Enrol now using the “Add to Cart” button on the right, and get started on your way to creative, advanced Java brilliance. Or, take this course for a free spin using the preview feature, so you know you’re 100% certain this course is for you.  See you on the inside (hurry, Java class is waiting!) Who this course is for:      This course is perfect for absolute beginners with no previous coding experience, to intermediates looking to sharpen their skills to the expert level.     Those looking to build creative and advanced Java apps for either personal use or for high-paying clients as a self-employed contractor.     Those who love letting their own creative genius shine, whilst getting paid handsome amounts to do so.', 'INS_5bdbe6b61428f9.96761451', './src/courses/Java Programming Masterclass for Software Developers', 'java.jpg'),
(12, 'CRS5c329be62eb699.50944317', ' fcnbln kv nkv nnvknm;nnb nktemlnzn ngvni', 1, '2190-04-09', 3, 'fncbn dgmhnbnmgnr onm i4h krmcgvw hkmdsfhvnbothfub 4 vrhfucnkaifbvencbc hbtgbfcngbbhas ;uf;vhdvbf bhdgbcvhbuhgbvhadndfbhhfda', 'vbmsblbnvb bfnbadnvugebdg sokehfabvd ejcbnkvsofhvbsnlksphkzbvga', 'vgbgjhuvndbhgvhd bahfsiohfufgdhv h gusb kiv f', 'INS_5bdbe6b61428f9.96761451', './src/courses/ fcnbln kv nkv nnvknm;nnb nktemlnzn ngvni', 'instagram.png'),
(13, 'CRS5c3bdfaf4b4cd8.86009674', 'fc bnmlgvmla', 1, '2019-02-03', 10, 'nsdbbvknkvds', 'bfc vn knwvsj', 'dvnkbndx', 'INS_5c3bdd8aa1c4d4.93420482', './src/courses/fc bnmlgvmla', '224tech1.png'),
(14, 'CRS5c4eb123cbbbe9.91086078', 'Model View Controler (MVC) with PHP', 10, '2019-02-01', 10, 'None', 'Able to use MVC with php', 'Model View Controler (MVC) with PHP ', 'INS_5bdbe6b61428f9.96761451', './src/courses/Model View Controler (MVC) with PHP', 'mvcphp.png');

-- --------------------------------------------------------

--
-- Table structure for table `course_cirriculum`
--

CREATE TABLE `course_cirriculum` (
  `id` int(11) NOT NULL,
  `week_number` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `course_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_cirriculum`
--

INSERT INTO `course_cirriculum` (`id`, `week_number`, `title`, `file_name`, `type`, `path`, `course_id`) VALUES
(1, 1, 'Model View Controler (MVC) with PHP part 1', 'New Social Network - Part 1 - Getting Started.mp4', 'Video', './src/courses/Model View Controler (MVC) with PHP/courseContent/New Social Network - Part 1 - Getting Started.mp4', 'CRS5c4eb123cbbbe9.91086078'),
(2, 1, 'Intro to MVC', 'Anttonen_Jevgeni.pdf', 'Article', './src/courses/Model View Controler (MVC) with PHP/courseContent/Anttonen_Jevgeni.pdf', 'CRS5c4eb123cbbbe9.91086078'),
(3, 2, 'Model View Controler (MVC) with PHP part 2 and 3', 'New Social Network - Part 2 - Creating Accounts.mp4', 'Video', './src/courses/Model View Controler (MVC) with PHP/courseContent/New Social Network - Part 2 - Creating Accounts.mp4', 'CRS5c4eb123cbbbe9.91086078'),
(4, 3, 'Model View Controler (MVC) with PHP part 4', 'New Social Network - Part 4 - Logging in Users.mp4', 'Video', './src/courses/Model View Controler (MVC) with PHP/courseContent/New Social Network - Part 4 - Logging in Users.mp4', 'CRS5c4eb123cbbbe9.91086078'),
(5, 4, 'Model View Controler (MVC) with PHP part 5', 'New Social Network - Part 5 - Login Tokens.mp4', 'Video', './src/courses/Model View Controler (MVC) with PHP/courseContent/New Social Network - Part 5 - Login Tokens.mp4', 'CRS5c4eb123cbbbe9.91086078'),
(6, 5, 'Model View Controler (MVC) with PHP part 6', 'New Social Network - Part 6 - Token Swap & Email Check.mp4', 'Video', './src/courses/Model View Controler (MVC) with PHP/courseContent/New Social Network - Part 6 - Token Swap & Email Check.mp4', 'CRS5c4eb123cbbbe9.91086078'),
(7, 6, 'Model View Controler (MVC) with PHP part 7', 'New Social Network - Part 7 - Logging out.mp4', 'Video', './src/courses/Model View Controler (MVC) with PHP/courseContent/New Social Network - Part 7 - Logging out.mp4', 'CRS5c4eb123cbbbe9.91086078'),
(8, 7, 'Model View Controler (MVC) with PHP part 8', 'New Social Network - Part 8 - Changing Passwords.mp4', 'Video', './src/courses/Model View Controler (MVC) with PHP/courseContent/New Social Network - Part 8 - Changing Passwords.mp4', 'CRS5c4eb123cbbbe9.91086078'),
(9, 8, 'Model View Controler (MVC) with PHP part 9', 'New Social Network - Part 9 - Forgot Passwords.mp4', 'Video', './src/courses/Model View Controler (MVC) with PHP/courseContent/New Social Network - Part 9 - Forgot Passwords.mp4', 'CRS5c4eb123cbbbe9.91086078'),
(10, 9, 'Model View Controler (MVC) with PHP part 10', 'New Social Network - Part 10 - Following Users.mp4', 'Video', './src/courses/Model View Controler (MVC) with PHP/courseContent/New Social Network - Part 10 - Following Users.mp4', 'CRS5c4eb123cbbbe9.91086078'),
(11, 10, 'Model View Controler (MVC) with PHP pdf', 'Pro PHP MVC.pdf', 'Article', './src/courses/Model View Controler (MVC) with PHP/courseContent/Pro PHP MVC.pdf', 'CRS5c4eb123cbbbe9.91086078');

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
(5, 'CRS5bf3b262b8e250.64245568', 'STD_5bf58233577018.44407051', '2018-11-22 00:00:00'),
(6, 'CRS5bf3b262b8e250.64245568', 'INS_5c3bdcba6cbac2.89353987', '2019-01-14 00:00:00'),
(7, 'CRS5bf3b262b8e250.64245568', 'INS_5c3bdd8aa1c4d4.93420482', '2019-01-18 00:00:00'),
(8, 'CRS5bf3b262b8e250.64245568', 'STD_0000001', '2019-01-28 00:00:00'),
(9, 'CRS5bf3b262b8e250.64245568', 'INS_5bdbe6b61428f9.96761451', '2019-01-28 00:00:00'),
(10, 'CRS5bf3b262b8e250.64245568', 'STD_5c4e937529d734.97040917', '2019-01-28 00:00:00'),
(11, 'CRS5c4eb123cbbbe9.91086078', 'STD_5c4e937529d734.97040917', '2019-01-28 00:00:00'),
(12, 'CRS5c4eb123cbbbe9.91086078', 'STD_0000001', '2019-01-28 00:00:00');

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
(4, 'INS_5bf59a9b237236.61314317', 'Rahimi', 'r@rr.com', '$2y$10$1vdnLeTUlWYND3J8Qs8AzO/Rg3kdZisH6Yk0nD7fvptVstgHI79lm'),
(5, 'INS_5c3bdcba6cbac2.89353987', 'IBrahim', 'shath.ibrahim@gmail.com', '$2y$10$4PiCdYrUr61l6C77KJktoeKiO77XoTbiGqeM8b6RdKWLDC0JTmHtu'),
(7, 'INS_5c3bdd8aa1c4d4.93420482', 'Alpha', 'alpha@mooc.com', '$2y$10$UqgHpTzcWztEZUsN8Bpky.Fq5YhY77DKpCMXrNhitalnED0rVAuP6'),
(8, 'INS_5c3bdda3b393e9.34459591', 'a', 'a@mail.com', '$2y$10$O0n.oDGak2NqQfnhQhQVVelGS.wKiut4aCLTM.A0l6pKXc4bX/KBu'),
(10, 'INS_5c3bddf074fb68.42042877', 'AQ', 'aq@mooc.com', '$2y$10$KhN3I4eXn0.pb64VHNaisu74XFtTmtKwziNtIp55CSA63fr54byvm'),
(11, 'INS_5c3bde20686107.01911912', 'das', '123@321.com', '$2y$10$v7FHveDYbViXhzK03uAjfu6UA4IxQ.SV05uVoqeoU7AAcz.8qYXme'),
(12, 'INS_5c3bde3784feb2.83102961', 'b@mail.com', '123@3211.com', '$2y$10$xn9/cXOBGNweYIG1i/3vK.RbnoVC1vFYyIbVwK1bZCxzKE5H34xI2'),
(14, 'INS_5c3bde6aba5c36.83759183', 'c@mail.com', 'c@mail.com', '$2y$10$juDpLuBbH7hKqwElKTq1mem1vlwDvK645s72ui4X0r0GSyrq2jxIy'),
(15, 'INS_5c3bde859c3281.50412975', '123', '123@123.com', '$2y$10$HYvJ3S5AOcBbOC3jxBBAH.Rh11Dbhrybdle3v6ZGVRjBuWIRgN4vy'),
(16, 'INS_5c3bdeab5771e0.00910066', 'b@mail.com', 'b@mail.com', '$2y$10$46lC/xCKswhf8VPSYO2Dh./LHDVxvtgX3WLwUMcqxGeDfzd.Vv4Re');

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
(24, 'fc0349e3466839201fc4bc5b911d1ec428c6d75a', 'INS_5bf59a9b237236.61314317'),
(28, '0beb5070fc144c5afa30dff6cdf8f6e607d8cc19', 'INS_5bdbe6b61428f9.96761451'),
(35, '17a283d74da81c8c3819a07955bcb7f90ff87a9f', 'INS_5c3bdd8aa1c4d4.93420482'),
(38, '1ca11c89cc8f99c68a8895b7cea4568e35c5dbd2', 'STD_5c4e937529d734.97040917'),
(50, '0c12d963e126db0fcf069881fd8f5572f47097af', 'STD_0000001');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `rating_ID` varchar(100) NOT NULL,
  `rating_value` varchar(12) NOT NULL,
  `rating_Content` text NOT NULL,
  `student_ID` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `course_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `rating_ID`, `rating_value`, `rating_Content`, `student_ID`, `date`, `course_ID`) VALUES
(1, 'RTG_5c60fb186d7bb5.42096488', '5', 'Both approaches therefore may become unreliable - in particular when switching between development setups and/or production servers. Which is why output buffering is widely considered just a crutch / strictly a workaround.', 'STD_0000001', '2019-02-11 12:33:28', 'CRS5c4eb123cbbbe9.91086078'),
(2, 'RTG_5c60fc89a94b88.81821020', '5', 'Angela is one of the best dev teachers anywhere — clear, simple explanations, gorgeously made fun slides, enthusiastic presentation style, and a wonderfully easy-to-listen-to voice. This class is awesome! Buddha with you, Cloud Monk', 'STD_0000001', '2019-02-11 12:39:37', 'CRS5c4eb123cbbbe9.91086078'),
(3, 'RTG_5c60fce5d387c8.48400962', '4.5', 'I\'ve been a programmer for over 30 years (we\'re always learning) and this is one of the best programming courses I\'ve taken. Angela is well organized and has obviously put a lot of effort into structuring the course material so that you a learn and build confidence with each new chapter. She\'s smart, fun and witty and her personality really shines through as well. If you want to learn Swift and iOS development, look no further. This is your starting point.', 'STD_0000001', '2019-02-11 12:41:09', 'CRS5c4eb123cbbbe9.91086078');

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
(12, 'STD_5bf59a439d0ac3.43736015', 'Alpha', 'alpha@hlp.com', '$2y$10$Pn7WO0HX.D4MAkF7UD.LAudWqZTTpeHDiQ/KSkvBckFYW5sQf0RZe'),
(13, 'STD_5c4e937529d734.97040917', 'Thierno Abdoul Rahimi Diallo', 'tard@helpMooc.com', '$2y$10$j6RMr9bj29aEfqFS/OOC..I6d2FusOwIYV1q86.wDEHr5/VXH3eby');

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
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rating_ID` (`rating_ID`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `course_cirriculum`
--
ALTER TABLE `course_cirriculum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `login_tokens`
--
ALTER TABLE `login_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
