DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`
(
    `id` INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `username` VARCHAR(40) NOT NULL,
    `password` VARCHAR(128) NOT NULL,
    `email` VARCHAR(128) NOT NULL,
    `rights` VARCHAR(25) DEFAULT 'regular'
);

DELETE FROM `users`;
INSERT INTO `users` (`username`, `password`, `email`, `rights`) VALUES
    ('admin', '$2y$10$O1MZ/.sdqBYi7/b2FhX2leCnsJ6bT78Qufm9Uf5NRjBA2F0fRd102', 'admin@admin.com', 'admin'),
    ('doe', '$2y$10$756bSqC89FxaNE4qH6wWJe95zkTlkQ8F9SUr5ySPUHI/W5SRHDKne', 'john.doe@supermail.com', 'regular'),
    ('somedude', '$2y$10$7wBnNhitRNDN0mfQ15mtc.7Diwm1TkJKO1oVfsYhanOZ8F.DlYRIy', 'spandex@bail.com', 'regular'),
    ('xxxsniperxxx', '$2y$10$.xQCU3Xjx.FK67zSakMi2O3SeW0f/.XL/55CZhalV.TrhbjmR7xfG', 'badboy@supermail.com', 'regular'),
    ('salsa', '$2y$10$w49Lloj2RpaisVnBeGlFAuPo3TtJa4LQSM5GZhAzKwh0SWUKmls5a', 'salsalover12@legitmail.com', 'regular')
;
