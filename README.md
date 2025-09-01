Для работы проекта нужно создать базу данных и таблицы.
Сделайте это одним запросом в phpMyAdmin:

-- 0) База (создаст, если нет)
CREATE DATABASE IF NOT EXISTS `hyvvxcrm_m3`
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

-- 1) Пользователь и права (совместимо со старыми версиями)
GRANT ALL PRIVILEGES ON `hyvvxcrm_m3`.*
TO 'hyvvxcrm'@'localhost' IDENTIFIED BY 'pCh3ru';
FLUSH PRIVILEGES;

-- 2) Таблица users (полное имя схемы — без USE)
CREATE TABLE IF NOT EXISTS `hyvvxcrm_m3`.`users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`     VARCHAR(256)  NOT NULL,
  `phone`    VARCHAR(20)   NOT NULL,
  `email`    VARCHAR(191)  NOT NULL,
  `password` VARCHAR(255)  NOT NULL,
  `number`   VARCHAR(10)   NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3) Таблица task
CREATE TABLE IF NOT EXISTS `hyvvxcrm_m3`.`task` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `car`    ENUM('bmw','tesla') NOT NULL,
  `date`   CHAR(5) NOT NULL,
  `status` ENUM('new','accept','cancle') NOT NULL DEFAULT 'new',
  `email`  VARCHAR(191) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_status` (`status`),
  KEY `idx_date`   (`date`),
  CONSTRAINT `fk_task_user_email`
    FOREIGN KEY (`email`) REFERENCES `hyvvxcrm_m3`.`users`(`email`)
    ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


Задание выполнялось строго по В3_КОД 09.02.07-3-2024-ПУ.docx с ограничением времени в 3 часа
