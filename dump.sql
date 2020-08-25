SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



--
-- tables
--

-- --------------------------------------------------------

--
-- table `guestorders`
--

CREATE TABLE `guestorders` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `secondname` varchar(128) NOT NULL,
  `pizzaid` varchar(1280) NOT NULL,
  `quantity` varchar(1280) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `userid` int(11) NOT NULL,
  `pizzaid` varchar(1280) NOT NULL,
  `quantity` varchar(1280) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `pizzas`
--

CREATE TABLE `pizzas` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(512) NOT NULL,
  `price` int(2) NOT NULL,
  `imgurl` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- table `pizzas`
--

INSERT INTO `pizzas` (`id`, `name`, `description`, `price`, `imgurl`) VALUES
(1, 'Carbonara', 'Egg, hard cheese, cured pork and black pepper', 10, '/img/pizza/carbonara.jpg'),
(2, 'Four Cheese', 'Holland / cream / mozzarella / parmesan cheese, oregano, sauc', 12, '/img/pizza/fourcheese.jpg'),
(3, 'Greek', 'Mozzarella, feta, cucumbers, cherry tomatoes, olives', 11, '/img/pizza/greekpizza.jpg'),
(4, 'Hawaiian', 'Tomato sauce, cheese, pineapple and ham', 12, '/img/pizza/hawaiian.jpg'),
(5, 'Mambo Italiano', 'Cherry tomatoes, mozzarella, egg, mushrooms, bell pepper, ketchup', 9, '/img/pizza/mamboitaliano.jpg'),
(6, 'Margherita', 'Tomatoes in own sauce, basil, oregano, cheese', 8, '/img/pizza/margherita.jpg'),
(7, 'Meet..so meat!', 'Bacon, ham, mozapella, tomato, onion, olives', 12, '/img/pizza/meatpizza.jpg'),
(8, 'Pepperoni', 'Mozzarella, olive oil, salami, chilli, tomatoes, oregano', 10, '/img/pizza/pepperoni.jpg'),
(9, 'Salami', 'Salami, hard cheese, olives, tomato sauce, basil, onion', 11, '/img/pizza/salami.jpg');

-- --------------------------------------------------------

--
-- table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nickname` varchar(128) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `secondname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` int(2) NOT NULL,
  `pass` varchar(128) NOT NULL,
  `salt` varchar(8) NOT NULL,
  `cookie` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- index
--

--
-- index `guestorders`
--
ALTER TABLE `guestorders`
  ADD PRIMARY KEY (`id`);

--
-- index `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- index `pizzas`
--
ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`id`);

--
-- index `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


