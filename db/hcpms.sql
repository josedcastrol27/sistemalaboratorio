-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2018 a las 17:26:14
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `hcpms`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `firstname`, `middlename`, `lastname`) VALUES
(2, 'admin', 'admin', 'Administrator', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `birthing`
--

CREATE TABLE IF NOT EXISTS `birthing` (
  `birth_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` varchar(10) NOT NULL,
  `chief_complaint` varchar(100) NOT NULL,
  `history` varchar(100) NOT NULL,
  `lmp` varchar(15) NOT NULL,
  `edc` varchar(15) NOT NULL,
  `aog` varchar(15) NOT NULL,
  `G` varchar(15) NOT NULL,
  `P` varchar(15) NOT NULL,
  `1` varchar(15) NOT NULL,
  `2` varchar(15) NOT NULL,
  `3` varchar(15) NOT NULL,
  `4` varchar(15) NOT NULL,
  `bp1` varchar(15) NOT NULL,
  `bp2` varchar(15) NOT NULL,
  `pr` varchar(15) NOT NULL,
  `rr` varchar(15) NOT NULL,
  `T` varchar(15) NOT NULL,
  `head_neck` varchar(15) NOT NULL,
  `chest` varchar(15) NOT NULL,
  `heart` varchar(15) NOT NULL,
  `abdomen` varchar(15) NOT NULL,
  `fhb` varchar(15) NOT NULL,
  `loc` varchar(15) NOT NULL,
  `extremities` varchar(15) NOT NULL,
  `vulva` varchar(15) NOT NULL,
  `vagina` varchar(15) NOT NULL,
  `cervix` varchar(15) NOT NULL,
  `uterus` varchar(15) NOT NULL,
  `bow` varchar(15) NOT NULL,
  `presentation` varchar(15) NOT NULL,
  `vaginal_discharge` varchar(15) NOT NULL,
  `staff` varchar(30) NOT NULL,
  `itr_no` varchar(4) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  PRIMARY KEY (`birth_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `complaints`
--

CREATE TABLE IF NOT EXISTS `complaints` (
  `com_id` int(50) NOT NULL AUTO_INCREMENT,
  `date` varchar(20) NOT NULL,
  `complaints` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `itr_no` varchar(50) NOT NULL,
  `section` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `complaints`
--

INSERT INTO `complaints` (`com_id`, `date`, `complaints`, `remark`, `itr_no`, `section`, `status`) VALUES
(1, '09/08/2018', 'Dolor Muela', 'caries', '1111', 'Dental', 'Done');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dental`
--

CREATE TABLE IF NOT EXISTS `dental` (
  `dental_no` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `dentist` varchar(30) NOT NULL,
  `tooth` int(3) NOT NULL,
  `itr_no` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  PRIMARY KEY (`dental_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `dental`
--

INSERT INTO `dental` (`dental_no`, `date`, `dentist`, `tooth`, `itr_no`, `user_id`, `month`, `year`) VALUES
(1, '2018-09-08', 'Dr. Machete Lazada', 10, '1111', 1, 'Sep', '2018');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecalisys`
--

CREATE TABLE IF NOT EXISTS `fecalisys` (
  `fecalisys_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_of_request` date NOT NULL,
  `requested_by` varchar(30) NOT NULL,
  `color` varchar(15) NOT NULL,
  `consistency` varchar(15) NOT NULL,
  `pus_cells` varchar(15) NOT NULL,
  `RBC` varchar(15) NOT NULL,
  `fat_globules` varchar(15) NOT NULL,
  `occult_blood` varchar(15) NOT NULL,
  `others_chem` varchar(15) NOT NULL,
  `ova` varchar(15) NOT NULL,
  `larva` varchar(15) NOT NULL,
  `adult_forms` varchar(15) NOT NULL,
  `cyst` varchar(15) NOT NULL,
  `trophozoites` varchar(15) NOT NULL,
  `others_pro` varchar(15) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `date_reported` date NOT NULL,
  `pathologist` varchar(30) NOT NULL,
  `medical_technologist` varchar(30) NOT NULL,
  `itr_no` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  PRIMARY KEY (`fecalisys_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hematology`
--

CREATE TABLE IF NOT EXISTS `hematology` (
  `hem_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_requested` date NOT NULL,
  `requested_by` varchar(30) NOT NULL,
  `hemoglobin` varchar(15) NOT NULL,
  `hematocrit` varchar(15) NOT NULL,
  `RBC_count` varchar(15) NOT NULL,
  `WBC_count` varchar(15) NOT NULL,
  `platelet` varchar(15) NOT NULL,
  `bleeding_time` varchar(15) NOT NULL,
  `clotting_time` varchar(15) NOT NULL,
  `neutrophil` varchar(15) NOT NULL,
  `segmenters` varchar(15) NOT NULL,
  `stabs` varchar(15) NOT NULL,
  `lymphocytes` varchar(15) NOT NULL,
  `monocyte` varchar(15) NOT NULL,
  `eosinophil` varchar(15) NOT NULL,
  `basophil` varchar(15) NOT NULL,
  `total` varchar(15) NOT NULL,
  `ABO_group` varchar(15) NOT NULL,
  `Rh_group` varchar(15) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `pathologist` varchar(30) NOT NULL,
  `medical_technologist` varchar(30) NOT NULL,
  `itr_no` varchar(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  PRIMARY KEY (`hem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itr`
--

CREATE TABLE IF NOT EXISTS `itr` (
  `itr_no` varchar(4) NOT NULL,
  `family_no` varchar(6) NOT NULL,
  `phil_health_no` varchar(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `birthdate` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `address` varchar(30) NOT NULL,
  `civil_status` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `BP` varchar(10) NOT NULL,
  `TEMP` varchar(10) NOT NULL,
  `PR` varchar(10) NOT NULL,
  `RR` varchar(10) NOT NULL,
  `WT` varchar(10) NOT NULL,
  `HT` varchar(10) NOT NULL,
  PRIMARY KEY (`itr_no`),
  UNIQUE KEY `itr_no` (`itr_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `itr`
--

INSERT INTO `itr` (`itr_no`, `family_no`, `phil_health_no`, `firstname`, `middlename`, `lastname`, `birthdate`, `age`, `address`, `civil_status`, `gender`, `BP`, `TEMP`, `PR`, `RR`, `WT`, `HT`) VALUES
('1111', '', 'platea', 'gorchor', 'pl', 'chavez', '06/15/1975', 27, 'tacna', 'Single', 'Male', '23', '2Â°C', '80/90', '45', '23kg', '1.69');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maternity_patient`
--

CREATE TABLE IF NOT EXISTS `maternity_patient` (
  `patient_id` int(50) NOT NULL AUTO_INCREMENT,
  `case_no` varchar(20) NOT NULL,
  `nhts` varchar(30) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `philhealth` varchar(30) NOT NULL,
  `pat_firstname` varchar(30) NOT NULL,
  `pat_middlename` varchar(30) NOT NULL,
  `pat_lastname` varchar(30) NOT NULL,
  `age` int(10) NOT NULL,
  `religion` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `date_of_birth` varchar(20) NOT NULL,
  `date_of_admission` varchar(20) NOT NULL,
  `time_of_admission` varchar(20) NOT NULL,
  `spouse_firstname` varchar(30) NOT NULL,
  `spouse_middlename` varchar(30) NOT NULL,
  `spouse_lastname` varchar(30) NOT NULL,
  `spouse_age` int(10) NOT NULL,
  `spouse_religion` varchar(30) NOT NULL,
  `spouse_occupation` varchar(30) NOT NULL,
  `G` varchar(20) NOT NULL,
  `T` varchar(20) NOT NULL,
  `A` varchar(20) NOT NULL,
  `L` varchar(20) NOT NULL,
  `lmp` varchar(20) NOT NULL,
  `edc` varchar(20) NOT NULL,
  `aog` varchar(20) NOT NULL,
  `fetal_position` varchar(20) NOT NULL,
  `fh` varchar(20) NOT NULL,
  `fhb` varchar(20) NOT NULL,
  `loc` varchar(20) NOT NULL,
  `admitting_diagnose` varchar(100) NOT NULL,
  `midwife` varchar(50) NOT NULL,
  `date_of_delivery` varchar(20) NOT NULL,
  `time` varchar(10) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `wt` varchar(10) NOT NULL,
  `baby_firstname` varchar(30) NOT NULL,
  `baby_middlename` varchar(30) NOT NULL,
  `baby_lastname` varchar(30) NOT NULL,
  `hepa` varchar(30) NOT NULL,
  `bcg` varchar(30) NOT NULL,
  `nbs` varchar(30) NOT NULL,
  `date_of_discharge` varchar(30) NOT NULL,
  `time_of_discharge` varchar(30) NOT NULL,
  `final_diagnosis` varchar(100) NOT NULL,
  `disposition_on_charge` varchar(50) NOT NULL,
  `itr_no` varchar(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` int(5) NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prenatal`
--

CREATE TABLE IF NOT EXISTS `prenatal` (
  `prenatal_no` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `chief_complaint` varchar(100) NOT NULL,
  `attending_physician` varchar(30) NOT NULL,
  `lmp` varchar(20) NOT NULL,
  `ga_by_lmp` varchar(20) NOT NULL,
  `edc_by_lmp` varchar(20) NOT NULL,
  `fhr` varchar(20) NOT NULL,
  `ga_by_sonar` varchar(20) NOT NULL,
  `edc_by_utz` varchar(20) NOT NULL,
  `pregnancy_age` varchar(20) NOT NULL,
  `biparietal_diameter` varchar(20) NOT NULL,
  `biparietal_eq` varchar(20) NOT NULL,
  `head_circumference` varchar(20) NOT NULL,
  `head_circumference_eq` varchar(20) NOT NULL,
  `abdominal_circumference` varchar(20) NOT NULL,
  `abdominal_circumference_eq` varchar(20) NOT NULL,
  `femoral_length` varchar(20) NOT NULL,
  `femoral_length_eq` varchar(20) NOT NULL,
  `crown_rump_length` varchar(20) NOT NULL,
  `crown_rump_length_eq` varchar(20) NOT NULL,
  `mean_gest_sac_diameter` varchar(20) NOT NULL,
  `mean_gest_sac_diameter_eq` varchar(20) NOT NULL,
  `average_fetal_weight` varchar(20) NOT NULL,
  `gestation` varchar(20) NOT NULL,
  `presentation_lie` varchar(20) NOT NULL,
  `amniotic_fluid` varchar(20) NOT NULL,
  `placenta_location` varchar(20) NOT NULL,
  `previa` varchar(20) NOT NULL,
  `placenta_grade` varchar(20) NOT NULL,
  `fetal_activity` varchar(20) NOT NULL,
  `comments` varchar(100) NOT NULL,
  `radiologist` varchar(30) NOT NULL,
  `itr_no` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  PRIMARY KEY (`prenatal_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `radiological`
--

CREATE TABLE IF NOT EXISTS `radiological` (
  `rad_id` int(11) NOT NULL AUTO_INCREMENT,
  `case_no` varchar(12) NOT NULL,
  `referred_by` varchar(30) NOT NULL,
  `clinical_impression` varchar(100) NOT NULL,
  `room_bed_no` varchar(11) NOT NULL,
  `type_of_examination` varchar(30) NOT NULL,
  `date_taken` date NOT NULL,
  `radiologist` varchar(30) NOT NULL,
  `itr_no` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  PRIMARY KEY (`rad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rehabilitation`
--

CREATE TABLE IF NOT EXISTS `rehabilitation` (
  `rehab_id` int(11) NOT NULL AUTO_INCREMENT,
  `diagnosis` varchar(50) NOT NULL,
  `type_of_disability` varchar(50) NOT NULL,
  `subjective` varchar(100) NOT NULL,
  `objective` varchar(100) NOT NULL,
  `assessment` varchar(100) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `date` varchar(10) NOT NULL,
  `itr_no` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  PRIMARY KEY (`rehab_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sputum`
--

CREATE TABLE IF NOT EXISTS `sputum` (
  `sputum_id` int(11) NOT NULL AUTO_INCREMENT,
  `name_of_collection_unit` varchar(30) NOT NULL,
  `date_of_submission` date NOT NULL,
  `disease_classification` varchar(30) NOT NULL,
  `site` varchar(30) NOT NULL,
  `reason_for_examination` varchar(30) NOT NULL,
  `case_no` varchar(30) NOT NULL,
  `specimen1` varchar(30) NOT NULL,
  `specimen2` varchar(30) NOT NULL,
  `specimen3` varchar(30) NOT NULL,
  `date_of_collection1` date NOT NULL,
  `date_of_collection2` date NOT NULL,
  `date_of_collection3` date NOT NULL,
  `specimen_collector` varchar(30) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `lab_serial_no1` varchar(20) NOT NULL,
  `lab_serial_no2` varchar(20) NOT NULL,
  `lab_serial_no3` varchar(20) NOT NULL,
  `specimen_1` varchar(20) NOT NULL,
  `specimen_2` varchar(20) NOT NULL,
  `specimen_3` varchar(20) NOT NULL,
  `visual_appearance1` varchar(20) NOT NULL,
  `visual_appearance2` varchar(20) NOT NULL,
  `visual_appearance3` varchar(20) NOT NULL,
  `reading` varchar(20) NOT NULL,
  `date_of_examination` date NOT NULL,
  `examined_by` varchar(30) NOT NULL,
  `itr_no` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  PRIMARY KEY (`sputum_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `urinalysis`
--

CREATE TABLE IF NOT EXISTS `urinalysis` (
  `urinalysis_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_of_request` varchar(20) NOT NULL,
  `color` varchar(15) NOT NULL,
  `transparency` varchar(15) NOT NULL,
  `specific_gravity` varchar(15) NOT NULL,
  `ph` varchar(15) NOT NULL,
  `sugar` varchar(15) NOT NULL,
  `protein` varchar(15) NOT NULL,
  `pregnancy_test` varchar(15) NOT NULL,
  `pus_cells` varchar(15) NOT NULL,
  `rbc` varchar(15) NOT NULL,
  `cast` varchar(15) NOT NULL,
  `urates` varchar(15) NOT NULL,
  `uric_acid` varchar(15) NOT NULL,
  `cal_ox` varchar(15) NOT NULL,
  `epith_cells` varchar(15) NOT NULL,
  `mucus_threads` varchar(15) NOT NULL,
  `others` varchar(15) NOT NULL,
  `pathologist` varchar(30) NOT NULL,
  `medical_technologist` varchar(30) NOT NULL,
  `itr_no` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  PRIMARY KEY (`urinalysis_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `section` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `firstname`, `middlename`, `lastname`, `section`) VALUES
(1, 'platea21', 'platea21', 'platea21', 'gorchor', 'platea', 'Dental');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
