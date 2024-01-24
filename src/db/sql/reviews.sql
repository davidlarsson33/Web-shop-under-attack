SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `reviews` (
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `stars` int NOT NULL,
  `review` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `reviews` (`name`, `stars`, `review`, `created_at`) VALUES
('David', 5, 'Awezome lessons!', '2024-01-24 16:48:01'),
('Kenneth', 4, 'I have learnt a lot from this man. I recommend everyone to take his lessons!', '2024-01-24 16:53:07'),
('Attacker', 1, 'You should not be at this place xD', '2024-01-24 16:59:13');
COMMIT;
