CREATE TABLE `form` (
  `form_id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_name` varchar(100) DEFAULT NULL,
  `org_address` varchar(100) DEFAULT NULL,
  `org_phone` varchar(20) DEFAULT NULL,
  `director_name` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nj_county` varchar(20) DEFAULT NULL,
  `gnjk_tas_name` varchar(45) DEFAULT NULL,
  `gnjk_tas_phone` varchar(45) DEFAULT NULL,
  `gnjk_tas_email` varchar(45) DEFAULT NULL,
  `date_of_gnjk_to_tac` varchar(15) DEFAULT NULL,
  `gnjk_region` varchar(45) DEFAULT NULL,
  `training_type` varchar(45) DEFAULT NULL,
  `day_duration` varchar(20) DEFAULT NULL,
  `time_of_day` varchar(20) DEFAULT NULL,
  `day_of_week` varchar(10) DEFAULT NULL,
  `class_level` varchar(20) DEFAULT NULL,
  `class_size` int(10) unsigned DEFAULT NULL,
  `gnjk_tas_recom_supports` varchar(45) DEFAULT NULL,
  `director_recom_supports` varchar(45) DEFAULT NULL,
  `sitestaff-comments-filepath` varchar(150) DEFAULT NULL,
  `sitestaff-directions-filepath` varchar(150) DEFAULT NULL,
  `tas-general-comments-filepath` varchar(150) DEFAULT NULL,
  `tas-specific-comments-filepath` varchar(150) DEFAULT NULL,
  `director-general-comments-filepath` varchar(150) DEFAULT NULL,
  `director-specific-comments-filepath` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`form_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;