
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `male` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `group_univer` varchar(100) NOT NULL,
  `faculty` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


ALTER TABLE `student`  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`),  ADD KEY `id_2` (`id`);

ALTER TABLE `student`  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
