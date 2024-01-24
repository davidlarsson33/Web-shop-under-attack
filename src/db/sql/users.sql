SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `users` (
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `users` (`name`, `email`, `password`, `created_at`) VALUES
('Attacker', 'attacker@malicious.com', '$2y$10$vIryiTb7VE1j0ae0LOxHVe0TeG.UGoLmx.b2nelkyF2wCUWeeJMd2', '2024-01-24 16:54:07'),
('David', 'david@gmail.com', '$2y$10$z4DABS9k1/DhQsyrOBMN3eqYlF1VhogMG1JNNLMXT6GrAiC0qctzu', '2024-01-24 16:46:35'),
('Kenneth', 'kenneth@gmail.com', '$2y$10$F0WcjoH5dNsiaY6HLLlGC.Z41rhYvxReUCdts8W8kmYOAjMdJbbqK', '2024-01-24 16:47:07');

ALTER TABLE `users`
  ADD UNIQUE KEY `email` (`email`);
COMMIT;