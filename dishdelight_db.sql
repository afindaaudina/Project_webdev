-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2024 at 12:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dishdelight_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `editors`
--

CREATE TABLE `editors` (
  `editorId` varchar(20) NOT NULL,
  `editorName` varchar(50) NOT NULL,
  `editorPic` varchar(100) NOT NULL,
  `editorDesc` varchar(200) NOT NULL,
  `editorPw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `editors`
--

INSERT INTO `editors` (`editorId`, `editorName`, `editorPic`, `editorDesc`, `editorPw`) VALUES
('Editor1', 'Ahmad Lim', 'editor2-removebg-preview.png', 'A culinary chef that graduated from Le Cordon Bleu', '$2y$10$gmb9CWAgo/t4JLOlRordY.VFj3WAyLo8teTaR3cZ3tCoWInkt4QIu'),
('Editor2', 'Don Lee', 'editor1-removebg-preview.png', 'A great chef, skilled in culinary.', '$2y$10$lDXjXt8./Uad13093AKjveZSuQj/MHhIoiDIC3d/F3c2zUP0EiQse');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `recipeId` varchar(20) NOT NULL,
  `editorId` varchar(20) NOT NULL,
  `recipeName` varchar(50) NOT NULL,
  `recipeDesc` text NOT NULL,
  `recipePic` varchar(100) NOT NULL,
  `ingredients` text NOT NULL,
  `instructions` text NOT NULL,
  `recipeDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`recipeId`, `editorId`, `recipeName`, `recipeDesc`, `recipePic`, `ingredients`, `instructions`, `recipeDate`) VALUES
('001', 'Editor1', 'Asam Pedas Fish', 'Asam Pedas Fish is a spicy and tangy Malaysian fish stew, simmered in a rich broth of tamarind, chili, and aromatic herbs, delivering bold and vibrant flavors.', 'asampedas.bg.JPG', '1 pomfret (200 g-400 g)\r\n10 small okras\r\n1 tomato (cut into wedges)\r\n1 teaspoon fish curry powder\r\n2 sprigs of daun kesum (Vietnamese mint/Vietnamese coriander)\r\n5 tablespoons cooking oil\r\n1 tablespoon palm sugar/sugar\r\nSalt to taste\r\nSPICE PASTE:\r\n1 clove garlic\r\n1 stalk of lemongrass (white part only)\r\n4 shallots\r\n8-10 dried chillies (depends how spicy you like)\r\n1/2 tablespoon belacan (prawn paste)\r\nTAMARIND JUICE:\r\n1 1/4 cup water\r\nTamarind pulp (size of a small ping pong ball)', 'Pound the spice paste with mortar and pestle or grind them in a food processor. Set aside.\r\nSoak the tamarind pulp in warm water for 15 minutes. Squeeze the tamarind pulp constantly to extract the flavor into the water. Drain the pulp and save the tamarind juice.\r\nHeat oil and fry the spice paste for 2 minutes or until fragrant.\r\nAdd the tamarind juice, fish curry powder and bring to boil.\r\nAdd the tomato wedges, okras and daun kesom and bring to boil.\r\nAdd the fish, salt, and palm sugar/sugar.\r\nSimmer on low heat for 5 minutes or until the fish is cooked and serve.', '2024-06-18'),
('002', 'Editor2', 'Nasi Lemak', 'A classic Malaysian dish of coconut rice served with flavorful sambal, anchovies, peanuts, and egg, offering a delicious blend of tastes.', 'nasi-lemak.jpg', 'RICE:\r\n2 cups coconut milk\r\n2 cups water\r\n2 cups rice (rinsed and drained)\r\n1 (1/2 inch) piece fresh ginger (peeled and thinly sliced)\r\n1/4 teaspoon ground ginger\r\n1 whole bay leaf\r\nsalt to taste\r\nGARNISH:\r\n1 cup oil for frying\r\n1 (4 ounce) package white anchovies (washed)\r\n4 large hard-boiled eggs (peeled and halved)\r\n1 medium cucumber (sliced)\r\nSAMBAL SAUCE:\r\n2 tablespoons vegetable oil\r\n1 medium onion (sliced)\r\n3 medium shallots (thinly sliced)\r\n3 cloves garlic (thinly sliced)\r\n2 teaspoons chile paste\r\n1 tablespoon water (or more as needed)\r\n1 (4 ounce) package white anchovies (washed)\r\n1/4cup tamarind juice\r\n3 tablespoons white sugar\r\nsalt to taste', 'Make the rice: Stir coconut milk, water, rice, fresh ginger, ground ginger, bay leaf, and salt together in a medium saucepan. Cover and bring to a boil over medium heat. Reduce the heat and simmer until tender, 20 to 30 minutes. Discard bay leaf and keep rice warm until garnish and sauce are ready.\r\nWhile the rice is cooking, make the garnish: Heat 1 cup vegetable oil in a large skillet over medium-high heat. Stir in peanuts and cook briefly, until lightly browned. Remove peanuts with a slotted spoon and place onto paper towels to soak up excess grease.\r\nReturn the skillet to the stove. Stir in anchovies and cook, turning occasionally, until crisp, 2 to 3 minutes. Remove with a slotted spoon and place on paper towels. Discard oil and wipe out the skillet.\r\nMake the sauce: Heat oil in the clean skillet. Stir in onion, shallots, and garlic; cook until fragrant, 1 to 2 minutes. Mix in chilli paste and cook for 10 minutes, stirring occasionally; if mixture is too dry, add water as needed. Stir in anchovies and cook for 5 minutes. Stir in tamarind juice, sugar, and salt; simmer until sauce is thick, about 5 minutes.\r\nLadle warm rice into bowls. Top with warm sauce, then top with peanuts, fried anchovies, hard-boiled eggs, and cucumber.', '2024-06-18'),
('003', 'Editor1', 'Pancake', 'Fluffy, golden pancakes served with maple syrup and butter, offering a delightful.', 'pancake-bg.jpg', '1 1/2 cups all-purpose flour\r\n3 1/2 teaspoons baking powder\r\n1 tablespoon white sugar\r\n1/4 teaspoon salt\r\n1 1/4 cups milk\r\n3 tablespoons butter (melted)\r\n1 egg', 'Sift flour, baking powder, sugar, and salt together in a large bowl.\r\nMake a well in the center and add milk, melted butter, and egg; mix until smooth.\r\nHeat a lightly oiled griddle or pan over medium-high heat.\r\nPour or scoop the batter onto the griddle, using approximately 1/4 cup for each pancake\r\nCook until bubbles form and the edges are dry, about 2 to 3 minutes.\r\nFlip and cook until browned on the other side.\r\nRepeat with remaining batter.', '2024-06-18'),
('004', 'Editor2', 'Mee Goreng', 'A popular Malaysian stir-fried noodle dish, Mee Goreng features a perfect balance of spicy, sweet, and tangy tastes.\r\n\r\n', 'meegoreng-bg.jpg', 'Onion\r\nGarlic\r\nSmall cabbage\r\nYellow noodles/noodle of choice\r\nSalt (optional)\r\nGreen onions (for garnishing)\r\nSAUCE:\r\nSweet soy sauce\r\nSriracha\r\nDark soy sauce', 'Boil noodles per package instruction and rinse under cold water to stop the cooking process.\r\nIn a bowl, make the sauce by mixing the the ingredients until well combined.\r\nIn a medium sized wok/pan, heat up oil over medium heat and sauté onions and garlic for a minute.\r\nAdd cabbage and continue sautéing for another minute before adding noodles.\r\nPour in the sauce and stir until well combined for 2-3 minutes.\r\nTaste for seasoning, add salt if needed. Garnish with green onions and serve. Enjoy!', '2024-06-18'),
('005', 'Editor1', 'Buttermilk Chicken', 'Crispy on the outside, tender on the inside. Our Buttermilk Chicken recipe combines juicy chicken marinated in creamy buttermilk and a secret blend of spices. Perfect for any occasion, it\'s a delicious twist on a classic favorite.', 'buttermilk.bg.jpg', '800g Chicken (cut into small pieces)\r\n1/2tsp msg seasoning\r\n4tbsp corn flour\r\n1ltr cooking oil\r\nGRAVY:\r\n50g butter\r\n2 cloves garlic (chopped)\r\n2 strings curry leaves\r\n5 nos bird’s eye chili (thinly sliced)\r\n200ml evaporated milk\r\n200ml water\r\n1/2tsp msg seasoning\r\n1/2 tsp salt\r\n1/2 tsp sugar\r\n2 tbsp corn flour (mix with water)', 'Marinate the chicken with msg seasoning. Add in corn flour and mix well.\r\nHeat the cooking oil. Deep-fry the chicken until golden.\r\nIn a pan, melt the butter.\r\nFry the garlic, bird’s eye chilli and curry leaves until fragrant.\r\nPour in evaporated milk and water.\r\nSeason with msg seasoning, salt and sugar. Mix well.\r\nAdd in corn flour mixture and stir until thickened.\r\nAdd in fried chicken. Mix well.\r\nReady to serve.', '2024-06-18'),
('006', 'Editor2', 'Sambal Udang', 'A fiery Malaysian prawn dish cooked in a spicy chili paste, delivering bold flavors and irresistible heat.', 'sambaludang-bg.jpg', '25g dried chillies\r\n30 prawns about 1 kg\r\n35g tamarind paste\r\n40g red chillies\r\n160g shallots\r\n20g buah keras (candlenuts)\r\n80ml corn oil\r\n⅔ tsp belachan powder (toast and grind 3 g belachan into powder)\r\n1 tbsp sugar\r\n2 tsp salt\r\n1 cup cucumber or winged bean slices', 'Trim dried chillies. Soak in warm water till soft, about 30 minutes. Squeeze dry.\r\nTrim prawn legs and feelers. Devein. Rinse and drain. Dry with paper towels.\r\nSoak tamarind paste in 1 cup (240 ml) water. Knead and discard seeds and pulp. Set tamarind water aside.\r\nTrim red chillies and wash. Peel shallots and wash.\r\nCut dried chillies, red chillies, shallots and buah keras into small pieces. Grind till smooth. Fry in corn oil over medium-low to low heat till medium brown.\r\nAdd belachan powder. Stir through. Add tamarind water made earlier, sugar, and salt. Simmer till thick and oil separates.\r\nAdd prawns to chilli paste. Heat till just cooked, stirring and turning as necessary to cook evenly.\r\nTaste and if necessary adjust seasoning. Serve at room temperature with cucumber or winged beans on the side.', '2024-06-18'),
('007', 'Editor1', 'Nasi Goreng Kampung', 'Traditional village-style fried rice, Nasi Goreng Kampung is a hearty Malaysian dish infused with sambal belacan, anchovies, and vegetables.', 'nasigoreng-bg.jpg', '500 g cooked rice\r\n60 g dried anchovies (small to medium size)\r\n3 cups water spinach\r\n150 g leftover cooked chicken meat (cut into bite-size pieces)\r\n3 Tbsp oil\r\nAROMATICS:\r\n1/2 tsp shrimp paste\r\n5 cloves garlic (minced or sliced)\r\n4 shallots (thinly sliced)\r\n5 serrano peppers (sliced, more or less to your preference)\r\n1 Tbsp sambal oelek (or any chili sauce of your choice)\r\nSEASONINGS:\r\n1 tsp chicken powder\r\n3/4 tsp salt\r\n1/2 tsp sugar\r\n1/4 tsp ground white pepper', 'Preheat 3 Tbsp of oil in a large pan over medium heat. Add the dried anchovies and pan fry until they are golden brown and crisp. Remove from the oil to an absorbent paper towel\r\nTo the same oil, add shrimp paste and stir fry until fragrant, about a minute or so. Add garlic, shallots, pepper slices, and sambal oelek (if using). Stir fry for another 3 minutes. Add the water spinach and stir fry for about 30 seconds. Add the rice and seasonings. Stir to combine\r\nAdd the cooked chicken meat and stir to combine everything. Make sure the rice is coated evenly with seasonings and mixed well with other ingredients.\r\nHave a taste and adjust by adding more salt, pepper, salt, etc.', '2024-06-18'),
('008', 'Editor2', 'Char Kuey Teow', 'A classic Malaysian noodle stir-fry with prawns, bean sprouts, and flavorful spices.', 'ckt-bg', '500g fresh wide rice noodle\r\n2 tbsp lard (can subtitue with vegetable oil)\r\n2 tbsp vegetable oil\r\n10 small prawns/shrimp\r\n2 garlic cloves (finely chopped)\r\n2 garlic cloves (finely chopped)\r\n5 cm piece of fried fish cake (sliced thinly)\r\n5 cm piece of fried fish cake (sliced thinly)\r\n2 1/2 cups bean sprouts\r\n2 eggs (whisked)\r\nSauce:\r\n\r\n5 tsp dark soy sauce\r\n2 tsp oyster sauce\r\n4 tsp light soy\r\n4 tsp sweet soy sauce', 'Mix Sauce together.\r\nHeat 1 tbsp oil in a large non stick skillet over high heat.\r\nWhen heated, add shrimp and cook for 1 1/2 minutes until just cooked through, then remove into bowl\r\nAdd Chinese sausage and fish cake, and cook for 1 minute until sausage is caramelised, then add to bowl.\r\nAdd 1 tbsp oil then add egg and cook, pushing in the edges to make a thick omelette. Once set, chop it up roughly using a wooden spoon , then add to bowl.\r\nAdd bean sprouts and cook for about 1 minute until just starting to wilt, then add to bowl.\r\nAdd lard. Once melted and starting to smoke, add garlic then immediately add noodles. Fold gently 4 times using a spatula + wooden spoon just to disperse oil through noodles.\r\nTip all the other ingredients back in plus the chives. Fold gently twice, then pour all the Sauce over.\r\nGently toss 4 to 6 times to disperse the sauce, pausing in between to allow the noodles to have a chance to caramelise on the edges a bit.\r\nRemove from stove and serve immediately.\r\n', '2024-06-18'),
('009', 'Editor1', 'Spaghetti and Meat Sauce', 'Classic spaghetti topped with a rich, savory meat sauce made with tomatoes, garlic, and herbs, offering a comforting and timeless flavor.', 'speghetti-bg.jpeg', '450g dried spaghetti\r\n450g lean ground meat like ground beef or ground turkey\r\n3 tablespoons olive oil\r\n130g chopped onion\r\n3 garlic cloves (minced)\r\n2 tablespoons tomato paste\r\n1/2 teaspoon dried oregano\r\nPinch crushed red pepper flakes\r\n1 cup water, broth, or dry red wine\r\n1 can crushed tomatoes\r\nSalt and fresh ground black pepper\r\nHandful of fresh basil leaves, plus more for serving\r\nParmesan cheese, for serving', 'Heat the oil in a large pot over medium-high heat.\r\nAdd the meat and cook until browned, about 8 minutes. Use a wooden spoon to break the meat into smaller crumbles as the meat cooks.\r\nAdd the onions and cook, stirring every once in a while, until softened, about 5 minutes.\r\nStir in the garlic, tomato paste, oregano, and red pepper flakes and cook, stirring continuously for about 1 minute.\r\nPour in the water and use a wooden spoon to scrape up any bits of meat or onion stuck to the bottom of the pot.\r\nStir in the tomatoes, 3/4 teaspoon of salt, and a generous pinch of black pepper.\r\nBring the sauce to a low simmer. Cook uncovered for 25 minutes. As it cooks, stir and taste the sauce a few times so you can adjust the seasoning accordingly.\r\nAbout 15 minutes before the spaghetti sauce finishes cooking, bring a large pot of salted water to a boil. Then, cook the pasta according to the package directions, but check for doneness a minute or two before the suggested cooking time.\r\n9Remove the sauce from the heat and stir in the basil. Toss in the cooked pasta and leave for a minute so that it absorbs some of the sauce. Toss again, and then serve with grated parmesan cheese on top.', '2024-06-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `editors`
--
ALTER TABLE `editors`
  ADD PRIMARY KEY (`editorId`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`recipeId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
