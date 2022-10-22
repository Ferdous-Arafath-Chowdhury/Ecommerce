-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2022 at 04:46 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '123456'),
('admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `cust_id`, `product_id`, `qty`) VALUES
(0, 0, 0, 0),
(2, 5, 4, 9),
(3, 2, 2, 15),
(4, 2, 3, 1),
(5, 2, 7, 2),
(6, 5, 4, 1),
(7, 2, 2, 1),
(8, 5, 4, 1),
(9, 2, 2, 1),
(10, 2, 4, 1),
(11, 2, 2, 1),
(12, 2, 7, 1),
(13, 2, 2, 1),
(14, 2, 8, 1),
(15, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `msg` longtext NOT NULL,
  `commented_on` date NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `msg`, `commented_on`, `created_at`) VALUES
(10, 1, 'Will this product last long? \n', '2022-06-13', '2022-06-12 18:31:53'),
(12, 1, 'Is there any side effect of using this product? ', '2022-06-13', '2022-06-12 18:34:00'),
(13, 3, 'Which country manufactured it? ', '2022-06-13', '2022-06-12 18:34:33'),
(14, 1, 'Product expiry date? ', '2022-06-13', '2022-06-13 13:27:34');

-- --------------------------------------------------------

--
-- Table structure for table `comment_replies`
--

CREATE TABLE `comment_replies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `reply_msg` longtext NOT NULL,
  `commented_on` date NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_replies`
--

INSERT INTO `comment_replies` (`id`, `user_id`, `comment_id`, `reply_msg`, `commented_on`, `created_at`) VALUES
(7, 2, 10, 'Yes.', '2022-06-13', '2022-06-12 18:34:53'),
(8, 2, 12, 'No there is side effect', '2022-06-13', '2022-06-12 18:35:15'),
(9, 2, 13, 'United Kingdom', '2022-06-13', '2022-06-12 18:35:37'),
(10, 2, 14, '12-12-2024', '2022-06-13', '2022-06-13 13:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `contactform`
--

CREATE TABLE `contactform` (
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(12) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactform`
--

INSERT INTO `contactform` (`fname`, `lname`, `email`, `phone`, `message`) VALUES
('Shahriar ', 'Nayeem', 'shahriarnayeem@gmail.com', 1890111231, 'I want to know more about it \r\n'),
(' Nayeem', 'Ahmed ', 'nym@gmail.com', 1715643456, 'Good Website'),
(' Nayeem', 'Ahmed', 'shahriarnayeem149@gmail.com', 1715643476, 'dsfdsfds'),
(' Nayeem', 'Ahmed', 'nayeem@gmail.com', 1791567398, 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `custom`
--

CREATE TABLE `custom` (
  `id` int(11) NOT NULL,
  `code` int(50) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(12) NOT NULL,
  `color` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `trns` varchar(13) NOT NULL,
  `bphone` int(12) NOT NULL,
  `_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custom`
--

INSERT INTO `custom` (`id`, `code`, `name`, `email`, `phone`, `color`, `size`, `description`, `trns`, `bphone`, `_status`) VALUES
(4, 12, 'Shahriar Ahmed', 'shahriarahmed149@gmail.com', 1791567398, 'Red', 'large', 'Size and color change', 'Trx456767', 1791567398, '');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `birthday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `name`, `username`, `password`, `email`, `mobile`, `gender`, `address`, `image`, `birthday`) VALUES
(1, 'FERDOUS', 'FERDOUS', 'FERDOUS', 'nasim99_4@hotmail.com', '01791903235', '', 'shahporan,shahporan, sylhet', 's', NULL),
(2, 'NASIM', 'NASIM', 'NASIM', 'nasim99_4@hotmail.com', '01791903235', 'male', 'shahporan', 's', '1999-02-06'),
(4, 'name', 'username', 'password', 'email', '0', '', '', '', NULL),
(5, 'jkh', 'jhj', 'hjk', 'nasim99_4@hotmail.com', '98', '', '', '', NULL),
(6, 'fkjhgjfsdkh', 'ifhgkjsfdhg', 'asnasim', 'nasim9_4@hotmail.com', '989', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `dis_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_and_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(30) NOT NULL,
  `delivery` date DEFAULT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `product_id`, `vendor_id`, `quantity`, `user_id`, `time_and_date`, `status`, `delivery`, `address`) VALUES
(1, 2, 1232, 2, 2, '2022-06-13 14:49:03', 'delivered', '2022-06-15', ''),
(2, 2, 1232, 2, 2, '2022-06-13 14:49:03', 'paid', NULL, ''),
(3, 2, 1232, 3, 2, '2022-06-16 01:23:51', 'pending', NULL, ''),
(4, 2, 1232, 3, 2, '2022-06-16 01:24:01', 'pending', NULL, ''),
(5, 2, 1232, 3, 3, '2022-06-16 01:24:21', 'pending', '2022-07-19', ''),
(6, 2, 1232, 3, 2, '2022-06-16 01:24:26', 'pending', NULL, ''),
(7, 2, 1232, 3, 2, '2022-06-16 01:24:29', 'pending', NULL, ''),
(8, 2, 1232, 3, 2, '2022-06-16 01:24:37', 'pending', NULL, ''),
(9, 2, 1232, 3, 2, '2022-06-16 01:24:37', 'pending', NULL, ''),
(10, 2, 1232, 3, 2, '2022-06-16 01:24:37', 'pending', NULL, ''),
(11, 2, 1232, 3, 2, '2022-06-16 01:24:37', 'pending', NULL, ''),
(12, 2, 1232, 3, 2, '2022-06-16 01:24:37', 'pending', '2022-07-06', ''),
(13, 2, 1232, 3, 3, '2022-06-16 01:24:37', 'pending', NULL, ''),
(104, 7, 1232, 1, 2, '2022-09-07 22:28:55', 'pending', NULL, 'shahporan,shahporan, sylhet'),
(105, 7, 1232, 1, 2, '2022-09-07 22:30:17', 'pending', NULL, 'shahporan,shahporan, sylhet'),
(106, 2, 1232, 15, 2, '2022-09-08 00:42:57', 'pending', NULL, 'shahporan,shahporan, sylhet'),
(107, 3, 1232, 1, 2, '2022-09-08 00:42:57', 'pending', NULL, 'shahporan,shahporan, sylhet'),
(108, 7, 1232, 2, 2, '2022-09-08 00:42:57', 'pending', NULL, 'shahporan,shahporan, sylhet'),
(109, 2, 1232, 15, 2, '2022-09-08 00:42:59', 'pending', NULL, 'shahporan,shahporan, sylhet'),
(110, 3, 1232, 1, 2, '2022-09-08 00:42:59', 'pending', NULL, 'shahporan,shahporan, sylhet'),
(111, 7, 1232, 2, 2, '2022-09-08 00:42:59', 'pending', NULL, 'shahporan,shahporan, sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `product_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`product_id`)),
  `vendor_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `transaction_id` varchar(30) NOT NULL,
  `status` varchar(100) NOT NULL,
  `time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `cust_id`, `product_id`, `vendor_id`, `amount`, `transaction_id`, `status`, `time`) VALUES
(1, 2, '2', 1232, 3545, '2244', 'paid', '2022-07-17'),
(2, 2, '2', 1232, 2, '3434', 'paid', '0000-00-00'),
(3, 2, '2', 1232, 6546, '464', 'paid', '2022-06-16'),
(4, 3, '3', 1232, 5435, '654', 'paid', '2022-06-16'),
(9, 2, '2', 1232, 6546, '464', 'paid', '2022-06-16'),
(10, 3, '3', 1232, 5435, '654', 'paid', '2022-06-16'),
(11, 2, '[\"7\"]', 1232, 700, 'sdt6', 'request', '2022-09-08'),
(12, 2, '[\"3\",\"7\",\"4\",\"7\",\"2\"]', 1232, 31600, 'sdr6', 'request', '2022-09-08'),
(106, 2, '[\"3\",\"7\",\"4\",\"7\",\"2\"]', 1232, 31600, 'sdr6', 'request', '2022-09-08'),
(109, 2, '[\"2\",\"3\",\"7\"]', 1232, 30600, 'dft67', 'request', '2022-09-08');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `time_and_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `category`, `price`, `category_id`, `quantity`, `image`, `vendor_id`, `brand`, `time_and_date`) VALUES
(2, 'Black Jacket ', 'Black Winter Jacket   fdghgfhfgdhdgdhgfh', 'Cloth   ', 1900, 1, 3, 'products/jacket.jpg', 1232, 'POLO   ', '2022-05-26 01:04:01'),
(3, 'Casual Shirt', 'Pure cotton casual shirt.Very suitable for summer season.  ', 'cloth', 1200, 1, 10, 'products/shirt.jpeg', 1232, 'Easy', '2022-06-03 14:19:38'),
(4, 'Torch Light', 'Made of superior aluminum alloy, strong and long time daily use.. Featured with variable focus and waterproof skid-proof performance, safe and stable, reliable..', 'Electronics', 900, 2, 5, 'products/torch.jpg', 1232, 'Walton', '2022-06-03 14:30:18'),
(5, 'RGB Mouse', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore error vero voluptates dolorem non odit, enim eos id minus possimus. A incidunt minima tempore provident amet voluptatem nemo nesciunt doloribus! Quidem reprehenderit, voluptatem dolor     Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas dolorem veniam a ipsa quam accusantium libero! Corporis obcaecati doloremque qui dolorum hic animi voluptates asperiores, tempore repellat adipisci minus cupiditate voluptatibus placeat eligendi illo expedita quidem facilis ipsam provident quia sapiente nam? Suscipit deleniti veniam adipisci cum velit esse, nobis reprehenderit vitae odio quibusdam corrupti vero minus quos autem, laboriosam labore maiores ea accusamus quam maxime cumque enim saepe! Ut praesentium ad, quisquam ea ullam molestias repellendus similique. Deserunt, enim porro maxime quaerat recusandae doloremque, suscipit quas cumque eveniet autem odio cum soluta officiis incidunt iste? Velit consequuntur facilis pariatur quisquam rerum minus? Unde consectetur dolorem exercitationem. Dolorem minima architecto suscipit! Esse deserunt dolorum velit ad tenetur recusandae explicabo nostrum fugiat earum placeat distinctio obcaecati perferendis, libero, laudantium assumenda ab? Voluptates fugiat, possimus inventore in eius quas dolores. Aliquam repudiandae molestiae, eaque quo dolores facilis, quis fugiat sint veniam vitae optio impedit quia, laudantium minus sequi repellat natus tempora maxime rerum sunt reiciendis non aut pariatur! Ipsum eum facere distinctio molestiae dolore beatae atque nostrum quo! Placeat quibusdam eveniet tempore, repellendus odit quia suscipit? Molestiae, mollitia porro quas dolor aliquam, inventore iure vitae sed facere sapiente dolorum laborum maiores! Perspiciatis.emque fuga ipsam harum repudiandae alias fugit quos cumque debitis, odio dolore? Quia at accusamus eveniet iure necessitatibus minima animi. Voluptate cum cupiditate praesentium repudiandae vero. Earum iusto velit nulla culpa quo error minus atque necessitatibus dolore praesentium, commodi, voluptatem eos, modi voluptates assumenda laudantium. Placeat harum perferendis maiores alias exercitationem aliquam? Aspernatur, dolores veniam exercitationem iure eum rerum facere vitae consequuntur repudiandae odit, laboriosam animi id.', 'Electronics', 700, 2, 8, 'products/mouse.jpg', 13, '1232', '2022-06-03 19:11:05'),
(6, 'Smooth wireless Keyboard', '    Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae eaque, ratione obcaecati aspernatur unde sint explicabo, dolores doloremque dolor illum ad laborum. Dicta, voluptatum nemo necessitatibus cumque iusto rerum omnis incidunt excepturi maxime, dolorum ipsam deleniti delectus vitae vel similique, illo laudantium? Nam veniam sed est iusto aliquam? Voluptates ipsa exercitationem dignissimos illo voluptas aut ad vero accusamus rerum. Iure dolor error non a excepturi aliquam! Et, eaque rem laboriosam dolores possimus neque cum temporibus, quia incidunt ab numquam magnam omnis exercitationem sint dicta beatae nobis aut molestiae tempore. Excepturi deleniti laborum autem possimus provident et in, cumque mollitia assumenda nulla soluta ex adipisci. Expedita excepturi pariatur commodi libero adipisci maiores suscipit fuga officiis reprehenderit dicta inventore, animi perspiciatis ea amet magnam odio doloribus qui, est facere veritatis ab autem debitis molestiae quas! Doloribus aspernatur veniam enim voluptate minima nemo vitae accusantium dolore cum velit, fugit ex, odit nostrum architecto, laudantium placeat facere ipsum. Reprehenderit dignissimos voluptatem magni et, nobis placeat facilis deserunt eos eius repellat ab aliquam repudiandae soluta veniam cupiditate, fuga sunt, dolores vero odio? Neque quo maxime et fuga eum soluta, sunt delectus temporibus consequatur hic beatae, nemo veniam excepturi nisi distinctio ea incidunt dolor voluptatem sapiente autem tempore nihil mollitia nobis. Dicta numquam libero unde, cupiditate harum incidunt veritatis nam eligendi labore animi tenetur ullam minima necessitatibus tempore, omnis qui sapiente ad nemo soluta voluptas possimus a. Porro veritatis cum, ullam esse beatae earum exercitationem quaerat animi adipisci unde facilis fugiat itaque. Dolores, animi harum ipsum esse voluptas pariatur alias vel corporis laboriosam consequuntur error maiores optio sunt. Quae quas harum laudantium quod eos magnam amet sequi tenetur quo possimus modi repellendus animi voluptas iste reprehenderit, atque similique optio blanditiis aliquam? At iure velit fugit deserunt illo doloremque numquam, voluptate, quae ipsum assumenda laudantium suscipit neque?', 'Electronics', 600, 1, 10, 'products/keyboard.jpg', 1232, 'A4tech', '2022-06-03 19:12:56'),
(7, 'T shirt', ' Lorem, ipsum dolor sit amet consectetur adipisicing elit. Assumenda quod qui vitae quas a in, aut est quos. Natus, voluptas animi accusamus porro officiis quae nulla provident omnis ea neque tenetur cum veniam vel asperiores similique nemo rem labore commodi? Nulla veritatis adipisci ut exercitationem praesentium voluptatibus dolorum tempore, dolore optio pariatur, asperiores modi obcaecati! Nam quia alias laborum repudiandae voluptatem quod quaerat soluta necessitatibus sapiente eius, odit itaque facere fugiat saepe repellat veritatis maxime quibusdam et incidunt ut labore ducimus distinctio maiores. Sequi animi, magni illum in excepturi voluptas ipsa. Quidem, numquam laboriosam magni mollitia cumque fugit nulla dolorum voluptatum illo qui esse dolor error praesentium amet totam! Quas eligendi eos magnam asperiores placeat nobis ipsam illo iste non dignissimos! Animi eveniet ea provident tenetur quae placeat et obcaecati odit quibusdam, sit dignissimos rem maiores assumenda magni mollitia accusantium fugiat, aliquid delectus consequatur natus praesentium minima possimus! Facere molestiae quos iure voluptatum, ut, ad mollitia explicabo impedit at consectetur ea iusto laborum? Suscipit est ipsa, id ducimus maxime minima, asperiores non, repellendus magnam voluptates quas. Id veniam odio labore cumque facilis dignissimos impedit, eaque tempora repellat quis eveniet qui porro corporis atque quae. Mollitia ducimus eveniet tenetur quas reprehenderit!', 'Cloth', 300, 1, 12, 'products/tshirt.png', 1232, 'Easy', '2022-06-06 00:44:49'),
(8, 'Laser Light', ' Lorem, ipsum dolor sit amet consectetur adipisicing elit. Assumenda quod qui vitae quas a in, aut est quos. Natus, voluptas animi accusamus porro officiis quae nulla provident omnis ea neque tenetur cum veniam vel asperiores similique nemo rem labore commodi? Nulla veritatis adipisci ut exercitationem praesentium voluptatibus dolorum tempore, dolore optio pariatur, asperiores modi obcaecati! Nam quia alias laborum repudiandae voluptatem quod quaerat soluta necessitatibus sapiente eius, odit itaque facere fugiat saepe repellat veritatis maxime quibusdam et incidunt ut labore ducimus distinctio maiores. Sequi animi, magni illum in excepturi voluptas ipsa. Quidem, numquam laboriosam magni mollitia cumque fugit nulla dolorum voluptatum illo qui esse dolor error praesentium amet totam! Quas eligendi eos magnam asperiores placeat nobis ipsam illo iste non dignissimos! Animi eveniet ea provident tenetur quae placeat et obcaecati odit quibusdam, sit dignissimos rem maiores assumenda magni mollitia accusantium fugiat, aliquid delectus consequatur natus praesentium minima possimus! Facere molestiae quos iure voluptatum, ut, ad mollitia explicabo impedit at consectetur ea iusto laborum? Suscipit est ipsa, id ducimus maxime minima, asperiores non, repellendus magnam voluptates quas. Id veniam odio labore cumque facilis dignissimos impedit, eaque tempora repellat quis eveniet qui porro corporis atque quae. Mollitia ducimus eveniet tenetur quas reprehenderit!', 'Electronics', 1000, 1, 10, 'products/laser.jpg', 1232, 'fdy', '2022-06-06 00:46:02'),
(9, 'Arduino With Cable', ' Lorem, ipsum dolor sit amet consectetur adipisicing elit. Assumenda quod qui vitae quas a in, aut est quos. Natus, voluptas animi accusamus porro officiis quae nulla provident omnis ea neque tenetur cum veniam vel asperiores similique nemo rem labore commodi? Nulla veritatis adipisci ut exercitationem praesentium voluptatibus dolorum tempore, dolore optio pariatur, asperiores modi obcaecati! Nam quia alias laborum repudiandae voluptatem quod quaerat soluta necessitatibus sapiente eius, odit itaque facere fugiat saepe repellat veritatis maxime quibusdam et incidunt ut labore ducimus distinctio maiores. Sequi animi, magni illum in excepturi voluptas ipsa. Quidem, numquam laboriosam magni mollitia cumque fugit nulla dolorum voluptatum illo qui esse dolor error praesentium amet totam! Quas eligendi eos magnam asperiores placeat nobis ipsam illo iste non dignissimos! Animi eveniet ea provident tenetur quae placeat et obcaecati odit quibusdam, sit dignissimos rem maiores assumenda magni mollitia accusantium fugiat, aliquid delectus consequatur natus praesentium minima possimus! Facere molestiae quos iure voluptatum, ut, ad mollitia explicabo impedit at consectetur ea iusto laborum? Suscipit est ipsa, id ducimus maxime minima, asperiores non, repellendus magnam voluptates quas. Id veniam odio labore cumque facilis dignissimos impedit, eaque tempora repellat quis eveniet qui porro corporis atque quae. Mollitia ducimus eveniet tenetur quas reprehenderit!', 'Electronics', 700, 1, 12, 'products/Arduino.jpg', 1232, 'HH', '2022-06-06 00:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `review_rating`
--

CREATE TABLE `review_rating` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `Review` text NOT NULL,
  `Rating` text NOT NULL,
  `rev_by` text NOT NULL,
  `time_and_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review_rating`
--

INSERT INTO `review_rating` (`review_id`, `product_id`, `Review`, `Rating`, `rev_by`, `time_and_date`) VALUES
(1, 9, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione ex dolorem libero eligendi dolores facere! Quas, earum ab delectus nam saepe suscipit voluptates totam accusantium veniam ratione amet tempora deserunt id explicabo aut voluptatibus ullam aliquid nobis ex temporibus error! Fugiat natus saepe corrupti commodi. Eaque asperiores, adipisci saepe iste, voluptatem nulla laudantium possimus quibusdam corrupti quod veniam atque praesentium nobis facere dolorem ex repellat, sed reprehenderit voluptatibus fuga? Voluptatem unde totam consectetur quas? Praesentium ipsam veniam autem laborum reprehenderit ex maxime rerum alias fugiat hic esse laudantium sapiente animi, facilis fuga repudiandae dicta dolore enim dolores debitis! Incidunt, aliquam!', '3', 'demo@gmail.com', '2022-06-20 17:54:38'),
(3, 9, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione ex dolorem libero eligendi dolores facere! Quas, earum ab delectus nam saepe suscipit voluptates totam accusantium veniam ratione amet tempora deserunt id explicabo aut voluptatibus ullam aliquid nobis ex temporibus error! Fugiat natus saepe corrupti commodi. Eaque asperiores, adipisci saepe iste, voluptatem nulla laudantium possimus quibusdam corrupti quod veniam atque praesentium nobis facere dolorem ex repellat, sed reprehenderit voluptatibus fuga? Voluptatem unde totam consectetur quas? Praesentium ipsam veniam autem laborum reprehenderit ex maxime rerum alias fugiat hic esse laudantium sapiente animi, facilis fuga repudiandae dicta dolore enim dolores debitis! Incidunt, aliquam!', '4', 'ff@gmail.com', '2022-06-19 17:54:49'),
(7, 8, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione ex dolorem libero eligendi dolores facere! Quas, earum ab delectus nam saepe suscipit voluptates totam accusantium veniam ratione amet tempora deserunt id explicabo aut voluptatibus ullam aliquid nobis ex temporibus error! Fugiat natus saepe corrupti commodi. Eaque asperiores, adipisci saepe iste, voluptatem nulla laudantium possimus quibusdam corrupti quod veniam atque praesentium nobis facere dolorem ex repellat, sed reprehenderit voluptatibus fuga? Voluptatem unde totam consectetur quas? Praesentium ipsam veniam autem laborum reprehenderit ex maxime rerum alias fugiat hic esse laudantium sapiente animi, facilis fuga repudiandae dicta dolore enim dolores debitis! Incidunt, aliquam!', '4', 'dd@gmail.com', '2022-06-11 17:55:53'),
(8, 7, 'abc', '4', 'rahmanfarzana340@gmail.com', '2022-06-12 20:39:56'),
(9, 7, 'demo review', '5', 'rahmanfarzana340@gmail.com', '2022-06-12 20:44:19'),
(10, 9, 'yhbuyhyuhy yhuyhgyg ygy uihiuy', '1', '', '2022-06-13 12:49:51'),
(11, 9, 'gggggggg', '1', '', '2022-06-13 12:51:49'),
(12, 9, 'ggg', '1', 'nasim', '2022-06-13 12:52:25'),
(13, 9, 'ggggggggf', '1', 'nasim', '2022-06-13 12:53:43'),
(14, 9, 'fffffff', '1', 'Ferdous', '2022-06-13 13:17:44'),
(15, 9, '', '1', 'ferdous', '2022-06-13 13:46:09'),
(16, 9, '', '1', 'ferdous', '2022-06-13 13:46:14'),
(17, 9, '', '1', 'ferdous', '2022-06-13 13:46:35'),
(18, 9, '', '1', 'ferdous', '2022-06-13 13:46:46'),
(19, 9, '', '1', 'ferdous', '2022-06-13 13:46:53'),
(20, 9, '', '1', 'ferdous', '2022-06-13 13:47:47'),
(21, 9, '\r\nArduino With Cable\r\n\r\nPrice: 700\r\nIn Stock\r\nAvalable Items: 12\r\nBrand Name : HH\r\n\r\nProduct Description\r\n\r\nLorem, ipsum dolor sit amet consectetur adipisicing elit. Assumenda quod qui vitae quas a in, aut est quos. Natus, voluptas animi accusamus porro officiis quae nulla provident omnis ea neque tenetur cum veniam vel asperiores similique nemo rem labore commodi? Nulla veritatis adipisci ut exercitationem praesentium voluptatibus dolorum tempore, dolore optio pariatur, asperiores modi obcaecati! Nam quia alias laborum repudiandae voluptatem quod quaerat soluta necessitatibus sapiente eius, odit itaque facere fugiat saepe repellat veritatis maxime quibusdam et incidunt ut labore ducimus distinctio maiores. Sequi animi, magni illum in excepturi voluptas ipsa. Quidem, numquam laboriosam magni mollitia cumque fugit nulla dolorum voluptatum illo qui esse dolor error praesentium amet totam! Quas eligendi eos magnam asperiores placeat nobis ipsam illo iste non dignissimos! Animi eveniet ea provident tenetur quae placeat et obcaecati odit quibusdam, sit dignissimos rem maiores assumenda magni mollitia accusantium fugiat, aliquid delectus consequatur natus praesentium minima possimus! Facere molestiae quos iure voluptatum, ut, ad molliti', '1', 'ferdous', '2022-06-13 14:38:16'),
(22, 9, 'magnam asperiores placeat nobis ipsam illo iste non dignissimos! Animi eveniet ea provident tenetur quae placeat et obcaecati odit quibusdam, sit dignissimos rem maiores assumenda magni mollitia accusantium fugiat, aliquid delectus consequatur natus praesentium minima possimus! Facere molestiae quos iure voluptatum, ut, ad mollitia explicabo impedit at consectetur ea iusto laborum? Suscipit est ipsa, id ducimus maxime minima, asperiores non, repellendus magnam voluptates quas. Id veniam odio labore cumque facilis dignissimos impedit, eaque tempora repellat quis eveniet qui porro corporis atque quae. Mollitia ducimus eveniet tenetur quas reprehenderit! ', '3', 'FERDOUS', '2022-06-13 15:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `name`, `email`) VALUES
(1, 'farzana', 'rahmanfarzana340@gmail.com'),
(2, 'nayem', 'abcd@gmail.com'),
(3, 'ferdous', 'abc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `created_at`) VALUES
(1, 'Shahriar Ahmed Nayeem', 'shahriar@gmail.com ', '123456', '2022-06-07 08:52:37'),
(2, 'Nayeem Ahmed ', 'nym@gmail.com', '123456', '2022-06-07 09:06:01'),
(3, 'Ferdous Ahmed ', 'ferdous@gmail.com', '123456', '2022-06-12 18:33:48');

-- --------------------------------------------------------

--
-- Table structure for table `valid_v`
--

CREATE TABLE `valid_v` (
  `serial_no` int(11) NOT NULL,
  `company_name` text NOT NULL,
  `email` text NOT NULL,
  `image` text NOT NULL,
  `password/vendor_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `valid_v`
--

INSERT INTO `valid_v` (`serial_no`, `company_name`, `email`, `image`, `password/vendor_id`) VALUES
(1, 'Infinity', 'chynadiya2@gmail.com', 'venreq/inf.png', '1232'),
(2, 'Bata', 'ferdousarafathchowdhury@gmail.com', 'venreq/bata.png', 'v9CILh'),
(3, 'Apex', 'a@gmail.com', '', 'apex');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vid` int(11) NOT NULL,
  `Company_name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `phone` int(13) NOT NULL,
  `NID` varchar(100) NOT NULL,
  `seller_type` varchar(100) NOT NULL,
  `_Status` varchar(100) NOT NULL,
  `time_and_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vid`, `Company_name`, `Email`, `phone`, `NID`, `seller_type`, `_Status`, `time_and_date`) VALUES
(1, 'e', 'e', 0, 'ww', '0', 'Accepted', '2022-05-24 17:43:19'),
(2, 'a', 'b', 0, 'd', '3', '0', '2022-05-24 17:44:22'),
(3, 'ee', 'r', 454, '34', '0', 'Accepted', '2022-05-24 17:45:28'),
(4, 'rt', 'ewt', 45, '443', 'ggf', 'Pending', '2022-05-24 17:46:31'),
(5, 'Bata', 'chynadiya2@gmail.com', 19283, '131414', 'Groceries', 'Accepted', '2022-05-25 23:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `vouchars`
--

CREATE TABLE `vouchars` (
  `id` int(11) NOT NULL,
  `code` varchar(30) NOT NULL,
  `type` varchar(10) NOT NULL,
  `amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vouchars`
--

INSERT INTO `vouchars` (`id`, `code`, `type`, `amount`) VALUES
(1, '123', 'tk', 50),
(2, '234', 'percent', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom`
--
ALTER TABLE `custom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `review_rating`
--
ALTER TABLE `review_rating`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `valid_v`
--
ALTER TABLE `valid_v`
  ADD PRIMARY KEY (`serial_no`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vid`);

--
-- Indexes for table `vouchars`
--
ALTER TABLE `vouchars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comment_replies`
--
ALTER TABLE `comment_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `custom`
--
ALTER TABLE `custom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `review_rating`
--
ALTER TABLE `review_rating`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `valid_v`
--
ALTER TABLE `valid_v`
  MODIFY `serial_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vouchars`
--
ALTER TABLE `vouchars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
