CREATE TABLE IF NOT EXISTS `#__akce` (
  `id` int(11) NOT NULL,
  `nazev` varchar(64) DEFAULT NULL,
  `datum` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `typ_zavodu` tinyint(4) UNSIGNED NOT NULL DEFAULT '0',
  `akce_odkaz` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `#__akce` (`id`, `nazev`, `datum`, `typ_zavodu`, `akce_odkaz`) VALUES
(1, 'Májový pohár', '2020-05-07 22:00:00', 1, '<a href=\"https://gymnastikadoksy.cz/\">Odkaz na akce</a>'),
(2, 'Dokská kladina', '2019-05-07 22:00:00', 2, '<a href=\"https://gymnastikadoksy.cz/\">Odkaz na akce</a>');
ALTER TABLE `#__akce`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `#__akce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
  CREATE TABLE IF NOT EXISTS `#__akce_typ` (
  `typ_zavodu` tinyint(4) UNSIGNED NOT NULL,
  `nazev_typu` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `#__akce_typ` (`typ_zavodu`, `nazev_typu`) VALUES
(1, 'SGM'),
(2, 'SGŽ');
ALTER TABLE `#__akce_typ`
  ADD PRIMARY KEY (`typ_zavodu`);
ALTER TABLE `#__akce_typ`
  MODIFY `typ_zavodu` tinyint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;