DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`
(
    `id` INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `username` VARCHAR(40) NOT NULL,
    `password` VARCHAR(128) NOT NULL,
    `email` VARCHAR(128)
);

DELETE FROM `users`;
INSERT INTO `users` (`username`, `password`) VALUES
    ('root', '$2y$10$74c4eBUV7gEVJBxVMJLy/.E48NuD7AL7dkg6df1Q2G34MQMu9R1aC')
;
