-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2025 at 06:34 AM
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
-- Database: `time_tracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(50) NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `record_id` int(11) NOT NULL,
  `details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`details`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `user_id`, `action`, `table_name`, `record_id`, `details`, `created_at`) VALUES
(1, 1, 'UPDATE_OVERTIME', 'time_logs', 5, '{\"extra_hours\":0,\"double_hours\":5,\"updated_by\":\"System Administrator\"}', '2025-05-30 08:17:56'),
(2, 1, 'UPDATE_OVERTIME', 'time_logs', 5, '{\"extra_hours\":4,\"double_hours\":5,\"updated_by\":\"System Administrator\"}', '2025-05-30 08:18:25'),
(3, 1, 'UPDATE_OVERTIME', 'time_logs', 7, '{\"extra_hours\":0,\"double_hours\":1,\"updated_by\":\"System Administrator\"}', '2025-05-30 08:22:20'),
(4, 1, 'UPDATE_OVERTIME', 'time_logs', 4, '{\"extra_hours\":0,\"double_hours\":1,\"updated_by\":\"System Administrator\"}', '2025-05-30 08:34:22'),
(5, 1, 'UPDATE_OVERTIME', 'time_logs', 4, '{\"extra_hours\":2,\"double_hours\":1,\"updated_by\":\"System Administrator\"}', '2025-05-30 08:34:31'),
(6, 1, 'UPDATE_OVERTIME', 'time_logs', 4, '{\"extra_hours\":2.5,\"extra_hours_components\":{\"hours\":2,\"minutes\":30},\"double_hours\":1,\"double_hours_components\":{\"hours\":1,\"minutes\":0},\"updated_by\":\"System Administrator\"}', '2025-05-30 09:34:29'),
(7, 1, 'UPDATE_OVERTIME', 'time_logs', 7, '{\"extra_hours\":2.216666666666667,\"extra_hours_components\":{\"hours\":2,\"minutes\":13},\"double_hours\":1,\"double_hours_components\":{\"hours\":1,\"minutes\":0},\"updated_by\":\"System Administrator\"}', '2025-05-30 09:37:49'),
(8, 1, 'UPDATE_OVERTIME', 'time_logs', 7, '{\"extra_hours\":2.25,\"extra_hours_components\":{\"hours\":2,\"minutes\":15},\"double_hours\":2.3333333333333335,\"double_hours_components\":{\"hours\":2,\"minutes\":20},\"updated_by\":\"System Administrator\"}', '2025-05-30 09:38:00'),
(9, 1, 'UPDATE_OVERTIME', 'time_logs', 86, '{\"extra_hours\":3,\"extra_hours_components\":{\"hours\":3,\"minutes\":0},\"double_hours\":0,\"double_hours_components\":{\"hours\":0,\"minutes\":0},\"updated_by\":\"System Administrator\"}', '2025-05-30 09:41:18'),
(10, 1, 'UPDATE_OVERTIME', 'time_logs', 86, '{\"extra_hours\":4,\"extra_hours_components\":{\"hours\":4,\"minutes\":0},\"double_hours\":0,\"double_hours_components\":{\"hours\":0,\"minutes\":0},\"updated_by\":\"System Administrator\"}', '2025-05-30 09:41:35'),
(11, 1, 'UPDATE_OVERTIME', 'time_logs', 89, '{\"extra_hours\":0,\"extra_hours_components\":{\"hours\":0,\"minutes\":0},\"double_hours\":2,\"double_hours_components\":{\"hours\":2,\"minutes\":0},\"updated_by\":\"System Administrator\"}', '2025-05-30 09:42:18'),
(12, 1, 'UPDATE_OVERTIME', 'time_logs', 92, '{\"extra_hours\":4.5,\"extra_hours_components\":{\"hours\":4,\"minutes\":30},\"double_hours\":0,\"double_hours_components\":{\"hours\":0,\"minutes\":0},\"updated_by\":\"System Administrator\"}', '2025-05-30 09:43:39'),
(13, 1, 'UPDATE_OVERTIME', 'time_logs', 65, '{\"extra_hours\":0,\"extra_hours_components\":{\"hours\":0,\"minutes\":0},\"double_hours\":2,\"double_hours_components\":{\"hours\":2,\"minutes\":0},\"updated_by\":\"System Administrator\"}', '2025-05-30 09:44:01'),
(14, 1, 'UPDATE_OVERTIME', 'time_logs', 68, '{\"extra_hours\":9,\"extra_hours_components\":{\"hours\":9,\"minutes\":0},\"double_hours\":0,\"double_hours_components\":{\"hours\":0,\"minutes\":0},\"updated_by\":\"System Administrator\"}', '2025-05-30 09:44:38'),
(15, 1, 'UPDATE_OVERTIME', 'time_logs', 69, '{\"extra_hours\":4,\"extra_hours_components\":{\"hours\":4,\"minutes\":0},\"double_hours\":0,\"double_hours_components\":{\"hours\":0,\"minutes\":0},\"updated_by\":\"System Administrator\"}', '2025-05-30 09:45:02'),
(16, 1, 'UPDATE_OVERTIME', 'time_logs', 69, '{\"extra_hours\":5,\"extra_hours_components\":{\"hours\":5,\"minutes\":0},\"double_hours\":0,\"double_hours_components\":{\"hours\":0,\"minutes\":0},\"updated_by\":\"System Administrator\"}', '2025-05-30 09:45:29'),
(17, 1, 'UPDATE_OVERTIME', 'time_logs', 73, '{\"extra_hours\":9,\"extra_hours_components\":{\"hours\":9,\"minutes\":0},\"double_hours\":0,\"double_hours_components\":{\"hours\":0,\"minutes\":0},\"updated_by\":\"System Administrator\"}', '2025-05-30 09:45:48'),
(18, 1, 'UPDATE_OVERTIME', 'time_logs', 82, '{\"extra_hours\":5.5,\"extra_hours_components\":{\"hours\":5,\"minutes\":30},\"double_hours\":0,\"double_hours_components\":{\"hours\":0,\"minutes\":0},\"updated_by\":\"System Administrator\"}', '2025-05-30 09:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`) VALUES
(1, 'IT', '2025-05-28 16:47:51'),
(2, 'Tourism', '2025-05-28 17:14:04'),
(3, 'Marketing', '2025-06-02 09:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` enum('Staff','OJT') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `name`, `type`, `created_at`, `department_id`) VALUES
(1, 'EMP001', 'CJ Medina', 'Staff', '2025-05-23 07:36:06', NULL),
(2, 'EMP002', 'Janine Gayas', 'Staff', '2025-05-23 07:36:06', NULL),
(50, '40', 'Rossmy', 'OJT', '2025-05-30 03:51:27', NULL),
(55, '27', 'ivan', 'OJT', '2025-05-30 06:05:47', NULL),
(56, '29', 'kholeen', 'OJT', '2025-05-30 06:08:04', NULL),
(57, '28', 'alex', 'OJT', '2025-05-30 06:32:28', NULL),
(58, '26', 'marielle', 'OJT', '2025-05-30 10:09:35', NULL),
(62, 'OJT-IT-001', 'Edishan Lee Tenorio', 'OJT', '2025-06-02 05:56:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `setting_key` varchar(50) NOT NULL,
  `setting_value` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting_key`, `setting_value`, `created_at`, `updated_at`) VALUES
(1, 'work_start_time', '09:00', '2025-05-28 17:11:59', '2025-06-02 09:17:35'),
(2, 'work_end_time', '18:00', '2025-05-28 17:11:59', '2025-05-28 17:11:59'),
(3, 'break_duration', '60', '2025-05-28 17:11:59', '2025-05-28 17:11:59');

-- --------------------------------------------------------

--
-- Table structure for table `time_logs`
--

CREATE TABLE `time_logs` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `log_date` date NOT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  `break_start` time DEFAULT NULL,
  `break_end` time DEFAULT NULL,
  `total_hours` decimal(4,2) DEFAULT 0.00,
  `status` enum('Active','On Break','Completed') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `extra_hours` decimal(4,2) DEFAULT 0.00 COMMENT 'Extra hours at regular overtime rate',
  `double_hours` decimal(4,2) DEFAULT 0.00 COMMENT 'Double time hours at 2x rate',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Last update timestamp',
  `updated_by` int(11) DEFAULT NULL COMMENT 'User ID who last updated the record'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time_logs`
--

INSERT INTO `time_logs` (`id`, `employee_id`, `log_date`, `time_in`, `time_out`, `break_start`, `break_end`, `total_hours`, `status`, `created_at`, `extra_hours`, `double_hours`, `updated_at`, `updated_by`) VALUES
(18, '40', '2025-05-20', '08:03:15', '19:05:21', '12:04:56', '12:53:45', 10.22, 'Completed', '2025-05-30 03:51:27', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(19, '40', '2025-05-21', '08:02:44', '19:03:38', '12:04:17', '12:54:12', 10.18, 'Completed', '2025-05-30 03:51:27', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(20, '40', '2025-05-22', '08:00:02', '19:03:07', '12:09:15', '13:01:31', 10.18, 'Completed', '2025-05-30 03:51:27', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(21, '40', '2025-05-23', '08:21:11', '19:06:53', '12:00:32', '12:45:04', 10.02, 'Completed', '2025-05-30 03:51:27', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(22, '40', '2025-05-24', '08:00:08', '16:00:19', NULL, NULL, 8.00, 'Completed', '2025-05-30 03:51:27', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(23, '40', '2025-05-26', '08:00:34', NULL, '12:04:20', '12:40:08', 0.00, 'Active', '2025-05-30 03:51:27', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(44, '27', '1970-01-01', '01:00:00', '01:00:00', '01:00:00', '01:00:00', 0.00, 'Completed', '2025-05-30 06:05:47', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(45, '29', '2025-05-01', '08:39:34', '19:12:12', '12:34:04', '13:35:19', 9.52, 'Completed', '2025-05-30 06:08:04', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(46, '29', '2025-05-02', '08:44:24', NULL, '12:54:09', '13:49:51', 0.00, 'Active', '2025-05-30 06:08:04', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(47, '29', '2025-05-03', '08:58:49', '17:11:38', '12:45:01', '13:10:56', 7.78, 'Completed', '2025-05-30 06:08:04', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(48, '29', '2025-05-05', '09:06:29', '21:55:50', '12:29:29', '13:04:33', 12.24, 'Completed', '2025-05-30 06:08:04', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(49, '29', '2025-05-06', '13:36:12', '22:17:11', NULL, NULL, 8.68, 'Completed', '2025-05-30 06:08:04', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(50, '29', '2025-05-07', '08:05:12', '19:04:21', '12:15:22', '12:57:04', 10.29, 'Completed', '2025-05-30 06:08:04', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(51, '29', '2025-05-08', '08:48:21', '19:18:11', '12:52:01', '13:44:48', 9.62, 'Completed', '2025-05-30 06:08:04', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(52, '29', '2025-05-09', '09:12:21', '19:37:18', '12:57:34', '13:58:39', 9.40, 'Completed', '2025-05-30 06:08:04', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(53, '29', '2025-05-10', '10:40:20', '19:05:55', '13:05:02', '13:31:50', 7.98, 'Completed', '2025-05-30 06:08:04', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(54, '29', '2025-05-13', '09:17:16', '19:29:25', '12:17:56', '13:33:38', 8.94, 'Completed', '2025-05-30 06:08:04', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(55, '29', '2025-05-14', '16:31:40', '20:18:13', NULL, NULL, 3.78, 'Completed', '2025-05-30 06:08:04', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(56, '29', '2025-05-15', '11:07:30', '20:05:49', NULL, NULL, 8.97, 'Completed', '2025-05-30 06:08:04', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(57, '29', '2025-05-16', '10:43:11', '21:04:49', '13:03:25', '13:30:16', 9.91, 'Completed', '2025-05-30 06:08:04', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(59, '29', '2025-05-21', '08:31:34', '20:04:20', '12:40:00', '12:45:53', 11.45, 'Completed', '2025-05-30 06:08:04', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(60, '29', '2025-05-22', '08:40:12', '20:00:06', '12:25:12', '12:41:09', 11.07, 'Completed', '2025-05-30 06:08:04', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(61, '29', '2025-05-24', '10:15:47', '17:50:32', NULL, NULL, 7.58, 'Completed', '2025-05-30 06:08:04', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(62, '29', '2025-05-26', '10:42:23', '20:05:22', '12:40:02', '13:01:16', 9.03, 'Completed', '2025-05-30 06:08:04', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(63, '29', '2025-05-29', '13:12:06', '19:10:04', NULL, NULL, 5.97, 'Completed', '2025-05-30 06:08:04', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(65, '28', '2025-05-01', '08:52:54', '18:10:24', '12:46:11', '13:46:12', 8.29, 'Completed', '2025-05-30 06:32:28', 0.00, 2.00, '2025-05-30 09:44:01', 1),
(67, '28', '2025-05-03', '08:53:02', '17:08:53', '12:45:14', '13:44:36', 7.27, 'Completed', '2025-05-30 06:32:28', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(68, '28', '2025-05-05', '13:55:42', '19:04:10', NULL, NULL, 5.14, 'Completed', '2025-05-30 06:32:28', 9.00, 0.00, '2025-05-30 09:44:38', 1),
(69, '28', '2025-05-06', '13:05:34', '19:00:33', NULL, NULL, 5.92, 'Completed', '2025-05-30 06:32:28', 5.00, 0.00, '2025-05-30 09:45:29', 1),
(70, '28', '2025-05-07', '08:47:19', '19:03:51', '12:15:25', '13:12:11', 9.33, 'Completed', '2025-05-30 06:32:28', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(71, '28', '2025-05-08', '08:43:29', '19:13:30', '12:50:26', '13:46:16', 9.57, 'Completed', '2025-05-30 06:32:28', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(72, '28', '2025-05-09', '09:12:11', '19:37:03', '12:55:44', '13:54:23', 9.44, 'Completed', '2025-05-30 06:32:28', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(73, '28', '2025-05-10', '10:02:38', '19:05:49', '13:04:27', '13:31:41', 8.60, 'Completed', '2025-05-30 06:32:28', 9.00, 0.00, '2025-05-30 09:45:48', 1),
(74, '28', '2025-05-13', '09:01:27', '19:22:00', '12:09:43', '13:30:07', 9.00, 'Completed', '2025-05-30 06:32:28', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(75, '28', '2025-05-15', '11:15:57', '17:19:04', NULL, NULL, 6.05, 'Completed', '2025-05-30 06:32:28', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(76, '28', '2025-05-16', '09:21:40', '20:23:17', '13:00:23', '13:30:20', 10.53, 'Completed', '2025-05-30 06:32:28', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(77, '28', '2025-05-19', '08:37:51', '19:38:15', '12:02:49', '12:28:11', 10.58, 'Completed', '2025-05-30 06:32:28', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(78, '28', '2025-05-20', '09:00:09', '19:29:37', NULL, NULL, 10.49, 'Completed', '2025-05-30 06:32:28', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(79, '28', '2025-05-21', '09:47:53', '20:04:01', '12:25:33', '12:41:02', 10.01, 'Completed', '2025-05-30 06:32:28', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(80, '28', '2025-05-22', '09:20:29', '19:27:53', '12:22:27', '13:03:20', 9.44, 'Completed', '2025-05-30 06:32:28', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(81, '28', '2025-05-23', '10:07:56', '19:10:33', '11:52:06', '12:09:12', 8.76, 'Completed', '2025-05-30 06:32:28', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(82, '28', '2025-05-24', '10:45:01', '17:50:27', NULL, NULL, 7.09, 'Completed', '2025-05-30 06:32:28', 5.50, 0.00, '2025-05-30 09:46:13', 1),
(83, '28', '2025-05-27', '09:46:50', '19:16:17', '12:32:02', '13:09:02', 8.87, 'Completed', '2025-05-30 06:32:28', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(84, '28', '2025-05-29', '08:02:54', '19:10:13', '12:02:46', '12:32:21', 10.63, 'Completed', '2025-05-30 06:32:28', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(86, '28', '2025-04-14', '14:01:00', '19:37:10', NULL, NULL, 5.60, 'Completed', '2025-05-30 06:53:42', 4.00, 0.00, '2025-05-30 09:41:35', 1),
(87, '28', '2025-04-15', '08:17:12', '19:02:46', '12:52:10', '13:34:12', 10.06, 'Completed', '2025-05-30 06:53:42', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(88, '28', '2025-04-16', '08:18:46', '19:05:14', '12:45:41', '13:19:43', 10.21, 'Completed', '2025-05-30 06:53:42', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(89, '28', '2025-04-17', '10:47:46', '19:04:25', '13:24:25', '13:45:33', 7.93, 'Completed', '2025-05-30 06:53:42', 0.00, 2.00, '2025-05-30 09:42:18', 1),
(90, '28', '2025-04-21', '08:46:48', '19:33:03', '12:58:15', '13:36:43', 10.13, 'Completed', '2025-05-30 06:53:42', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(91, '28', '2025-04-22', '13:47:43', '18:33:56', NULL, NULL, 4.77, 'Completed', '2025-05-30 06:53:42', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(92, '28', '2025-04-23', '13:41:34', '19:22:31', NULL, NULL, 5.68, 'Completed', '2025-05-30 06:53:42', 4.50, 0.00, '2025-05-30 09:43:39', 1),
(93, '28', '2025-04-24', '08:37:00', '19:19:40', '12:10:32', '12:43:18', 10.17, 'Completed', '2025-05-30 06:53:42', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(95, '28', '2025-04-26', '10:08:01', '19:14:01', '12:15:55', '13:07:07', 8.25, 'Completed', '2025-05-30 06:53:42', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(96, '28', '2025-04-28', '08:39:11', '19:04:30', '12:14:41', '12:52:44', 9.79, 'Completed', '2025-05-30 06:53:42', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(97, '28', '2025-04-29', '08:35:42', '19:45:05', '13:22:52', '14:00:37', 10.53, 'Completed', '2025-05-30 06:53:42', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(98, '28', '2025-04-30', '08:40:02', '19:22:40', '12:11:27', '13:08:16', 9.76, 'Completed', '2025-05-30 06:53:42', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(99, '29', '2025-04-26', '10:18:44', '19:18:33', '12:15:42', '13:11:30', 8.07, 'Completed', '2025-05-30 07:33:07', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(100, '29', '2025-04-28', '08:39:06', '19:04:22', '12:14:47', '12:59:59', 9.67, 'Completed', '2025-05-30 07:33:07', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(102, '29', '2025-04-30', '08:14:00', '19:21:34', '12:24:34', '13:04:45', 10.46, 'Completed', '2025-05-30 07:33:07', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(103, '27', '2025-04-14', '09:32:06', '19:12:23', '12:06:49', '12:47:37', 8.99, 'Completed', '2025-05-30 07:33:25', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(104, '27', '2025-04-15', '10:16:50', '17:34:28', '12:52:14', '13:21:35', 6.80, 'Completed', '2025-05-30 07:33:25', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(105, '27', '2025-04-16', '10:33:10', NULL, '13:01:47', '13:58:36', 0.00, 'Active', '2025-05-30 07:33:25', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(106, '27', '2025-04-17', '10:07:55', '19:07:19', '12:38:09', '13:12:18', 8.42, 'Completed', '2025-05-30 07:33:25', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(107, '27', '2025-04-21', '10:42:00', '19:38:10', '12:22:56', '13:26:18', 7.88, 'Completed', '2025-05-30 07:33:25', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(108, '27', '2025-04-22', '10:30:06', '19:14:08', '13:17:43', '14:18:14', 7.73, 'Completed', '2025-05-30 07:33:25', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(109, '27', '2025-04-23', '13:50:17', '19:48:06', NULL, NULL, 5.96, 'Completed', '2025-05-30 07:33:25', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(110, '27', '2025-04-24', '10:30:39', '19:11:57', '12:15:04', '13:03:41', 7.88, 'Completed', '2025-05-30 07:33:25', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(111, '27', '2025-04-25', '10:17:58', '20:10:00', '12:33:55', '13:09:15', 9.28, 'Completed', '2025-05-30 07:33:25', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(112, '27', '2025-04-26', '09:46:43', NULL, '12:15:36', '19:18:17', 0.00, 'Active', '2025-05-30 07:33:25', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(113, '27', '2025-04-28', '10:00:11', '19:03:02', '12:21:45', '12:49:46', 8.58, 'Completed', '2025-05-30 07:33:25', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(114, '27', '2025-04-29', '10:11:57', '18:40:42', '13:00:34', '14:01:47', 7.46, 'Completed', '2025-05-30 07:33:25', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(115, '27', '2025-04-30', '10:07:41', '19:22:49', '12:12:07', '13:07:00', 8.34, 'Completed', '2025-05-30 07:33:25', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(116, '27', '2025-05-01', '10:14:03', '19:12:19', '12:33:31', '13:29:33', 8.04, 'Completed', '2025-05-30 07:50:19', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(117, '27', '2025-05-02', '10:48:02', NULL, '12:57:04', '13:24:25', 0.00, 'Active', '2025-05-30 07:50:19', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(118, '27', '2025-05-03', '11:03:04', '17:11:28', '12:20:35', '13:06:28', 5.38, 'Completed', '2025-05-30 07:50:19', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(119, '27', '2025-05-05', '09:41:02', '19:04:02', '12:05:51', '13:12:34', 8.27, 'Completed', '2025-05-30 07:50:19', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(120, '27', '2025-05-06', '14:00:12', '20:41:53', NULL, NULL, 6.69, 'Completed', '2025-05-30 07:50:19', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(121, '27', '2025-05-07', '11:12:32', '19:05:54', '12:19:19', '12:45:19', 7.46, 'Completed', '2025-05-30 07:50:19', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(122, '27', '2025-05-08', '10:11:58', '19:20:20', '12:55:34', '13:30:55', 8.55, 'Completed', '2025-05-30 07:50:19', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(123, '27', '2025-05-09', '10:52:09', '20:07:01', '12:54:53', '13:33:19', 8.61, 'Completed', '2025-05-30 07:50:19', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(124, '27', '2025-05-10', '10:43:49', '19:49:20', '12:58:40', '13:42:19', 8.36, 'Completed', '2025-05-30 07:50:19', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(125, '27', '2025-05-12', '13:51:10', '20:03:12', NULL, NULL, 6.20, 'Completed', '2025-05-30 07:50:19', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(126, '27', '2025-05-13', '13:01:16', '19:29:22', NULL, NULL, 6.47, 'Completed', '2025-05-30 07:50:19', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(127, '27', '2025-05-14', '12:02:38', '20:16:56', NULL, NULL, 8.24, 'Completed', '2025-05-30 07:50:19', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(128, '27', '2025-05-15', '11:27:56', '20:04:48', '13:43:26', '14:08:10', 8.20, 'Completed', '2025-05-30 07:50:19', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(129, '27', '2025-05-21', '11:19:32', '20:03:50', '12:27:55', '12:45:56', 8.44, 'Completed', '2025-05-30 07:50:19', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(130, '27', '2025-05-22', '10:52:20', '20:23:24', NULL, NULL, 9.52, 'Completed', '2025-05-30 07:50:19', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(131, '27', '2025-05-26', '17:38:10', '20:05:39', NULL, NULL, 2.46, 'Completed', '2025-05-30 07:50:19', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(132, '27', '2025-05-29', '14:03:43', '19:09:53', NULL, NULL, 5.10, 'Completed', '2025-05-30 07:50:19', 0.00, 0.00, '2025-05-30 08:15:46', NULL),
(134, '26', '2025-04-10', '12:10:10', '19:03:09', NULL, NULL, 6.88, 'Completed', '2025-05-30 10:09:35', 0.00, 0.00, '2025-05-30 10:09:35', NULL),
(135, '26', '2025-04-14', '09:51:29', '19:06:14', '12:06:03', '12:34:33', 8.77, 'Completed', '2025-05-30 10:09:35', 0.00, 0.00, '2025-05-30 10:09:35', NULL),
(136, '26', '2025-04-16', '09:53:36', '19:11:04', '13:00:53', '13:58:43', 8.33, 'Completed', '2025-05-30 10:09:35', 0.00, 0.00, '2025-05-30 10:09:35', NULL),
(137, '26', '2025-04-17', '10:07:35', '19:04:07', '12:59:36', '13:53:52', 8.04, 'Completed', '2025-05-30 10:09:35', 0.00, 0.00, '2025-05-30 10:09:35', NULL),
(138, '26', '2025-04-21', '10:08:35', '14:47:56', '12:57:51', '13:31:22', 4.10, 'Completed', '2025-05-30 10:09:35', 0.00, 0.00, '2025-05-30 10:09:35', NULL),
(139, '26', '2025-04-22', '09:53:23', '19:14:21', '13:17:12', '14:10:57', 8.45, 'Completed', '2025-05-30 10:09:35', 0.00, 0.00, '2025-05-30 10:09:35', NULL),
(140, '26', '2025-04-23', '13:48:10', '19:48:00', NULL, NULL, 6.00, 'Completed', '2025-05-30 10:09:35', 0.00, 0.00, '2025-05-30 10:09:35', NULL),
(141, '26', '2025-04-24', '10:04:24', '19:10:28', '12:09:52', '13:03:32', 8.21, 'Completed', '2025-05-30 10:09:35', 0.00, 0.00, '2025-05-30 10:09:35', NULL),
(142, '26', '2025-04-25', '10:31:27', '20:08:30', '12:32:47', '13:11:51', 8.97, 'Completed', '2025-05-30 10:09:35', 0.00, 0.00, '2025-05-30 10:09:35', NULL),
(143, '26', '2025-04-29', '10:09:07', '18:40:30', '12:53:55', '14:00:32', 7.41, 'Completed', '2025-05-30 10:09:35', 0.00, 0.00, '2025-05-30 10:09:35', NULL),
(144, '26', '2025-04-30', '10:53:36', '19:23:18', '12:11:57', '13:06:43', 7.58, 'Completed', '2025-05-30 10:09:35', 0.00, 0.00, '2025-05-30 10:09:35', NULL),
(145, '26', '2025-05-01', '10:07:16', '19:12:31', '12:45:44', '13:43:12', 8.13, 'Completed', '2025-05-30 10:10:21', 0.00, 0.00, '2025-05-30 10:10:21', NULL),
(146, '26', '2025-05-02', '10:36:30', '18:25:47', '12:53:55', '13:50:00', 6.89, 'Completed', '2025-05-30 10:10:21', 0.00, 0.00, '2025-05-30 10:10:21', NULL),
(147, '26', '2025-05-03', '10:22:25', '17:07:46', '12:18:49', '12:58:10', 6.10, 'Completed', '2025-05-30 10:10:21', 0.00, 0.00, '2025-05-30 10:10:21', NULL),
(148, '26', '2025-05-05', '10:03:06', '19:03:59', '12:06:05', '13:00:20', 8.11, 'Completed', '2025-05-30 10:10:21', 0.00, 0.00, '2025-05-30 10:10:21', NULL),
(149, '26', '2025-05-06', '14:29:36', '22:04:27', NULL, NULL, 7.58, 'Completed', '2025-05-30 10:10:21', 0.00, 0.00, '2025-05-30 10:10:21', NULL),
(150, '26', '2025-05-08', '10:03:46', '19:18:00', '12:49:51', '13:35:43', 8.47, 'Completed', '2025-05-30 10:10:21', 0.00, 0.00, '2025-05-30 10:10:21', NULL),
(151, '26', '2025-05-09', '10:01:14', '19:37:13', '12:55:52', '13:55:20', 8.61, 'Completed', '2025-05-30 10:10:21', 0.00, 0.00, '2025-05-30 10:10:21', NULL),
(152, '26', '2025-05-14', '12:53:16', '20:15:07', NULL, NULL, 7.36, 'Completed', '2025-05-30 10:10:21', 0.00, 0.00, '2025-05-30 10:10:21', NULL),
(153, '26', '2025-05-15', '10:53:12', '20:05:02', NULL, NULL, 9.20, 'Completed', '2025-05-30 10:10:21', 0.00, 0.00, '2025-05-30 10:10:21', NULL),
(154, '26', '2025-05-16', '10:13:44', '21:04:03', '12:58:30', '13:30:28', 10.31, 'Completed', '2025-05-30 10:10:21', 0.00, 0.00, '2025-05-30 10:10:21', NULL),
(155, '26', '2025-05-19', '12:28:09', '19:38:08', NULL, NULL, 7.17, 'Completed', '2025-05-30 10:10:21', 0.00, 0.00, '2025-05-30 10:10:21', NULL),
(156, '26', '2025-05-20', '10:29:08', '19:29:46', NULL, NULL, 9.01, 'Completed', '2025-05-30 10:10:21', 0.00, 0.00, '2025-05-30 10:10:21', NULL),
(157, '26', '2025-05-21', '09:25:28', '20:03:41', '12:23:38', '12:40:52', 10.35, 'Completed', '2025-05-30 10:10:21', 0.00, 0.00, '2025-05-30 10:10:21', NULL),
(158, '26', '2025-05-22', '09:57:58', '19:58:48', '12:16:14', '12:38:08', 9.65, 'Completed', '2025-05-30 10:10:21', 0.00, 0.00, '2025-05-30 10:10:21', NULL),
(159, '26', '2025-05-23', '10:10:37', '15:18:13', '11:51:34', '12:13:59', 4.75, 'Completed', '2025-05-30 10:10:21', 0.00, 0.00, '2025-05-30 10:10:21', NULL),
(160, '26', '2025-05-26', '10:32:04', '20:10:29', '12:37:43', '12:51:20', 9.41, 'Completed', '2025-05-30 10:10:21', 0.00, 0.00, '2025-05-30 10:10:21', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `time_logs_with_calculated_hours`
-- (See below for the actual view)
--
CREATE TABLE `time_logs_with_calculated_hours` (
`id` int(11)
,`employee_id` varchar(50)
,`log_date` date
,`time_in` time
,`time_out` time
,`break_start` time
,`break_end` time
,`total_hours` decimal(4,2)
,`status` enum('Active','On Break','Completed')
,`created_at` timestamp
,`extra_hours` decimal(4,2)
,`double_hours` decimal(4,2)
,`updated_at` timestamp
,`updated_by` int(11)
,`name` varchar(100)
,`type` enum('Staff','OJT')
,`calculated_total_hours` decimal(6,2)
,`total_overtime_value` decimal(6,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','ojt') NOT NULL,
  `employee_id` varchar(50) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `must_change_password` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `employee_id`, `name`, `email`, `created_at`, `must_change_password`) VALUES
(1, 'admin', '$2y$10$N4SrRoHsdrZq8ftn.fUkKe/KYNkDR4HH7rBEGGT/Gqnpl2qoaiyEW', 'admin', NULL, 'System Administrator', 'admin@timetracker.com', '2025-05-24 03:34:21', 0),
(17, 'janine', '$2y$10$nHFHGSB7bltRPIRBPVcLLe9Xsxy9aWqA6HQQ4I75fiO/NaQvVY3IS', 'ojt', 'EMP002', 'Janine Gayas', 'janinegayas@gmail.com', '2025-05-30 09:52:14', 0),
(18, 'ojt001', '$2y$10$JgdXSwgOEQl5fIrJzMk3/.QrKDiMlDJIomCYTfLk/zivtKLpSAD8a', 'ojt', 'OJT001', 'Edishan Lee Tenorio', 'john@example.com', '2025-05-31 06:16:59', 1),
(19, 'ojt002', '$2y$10$DPVNvaVfW/0BrsTuTx54m.4X0NeiFuQ/d4gGzV91s6ma5Qo2ARDPi', 'ojt', 'OJT002', 'Chris Wendil Flaviano', 'jane@example.com', '2025-05-31 06:16:59', 1),
(20, 'ojt003', '$2y$10$4C1EmAiC/A7TErAeLs1mQ.usgYiGoZWQpFloIw/4RDsdjfFJVt0XG', 'ojt', 'OJT003', 'Paulo Ramas', 'mike@example.com', '2025-05-31 06:16:59', 1),
(21, 'shan', '$2y$10$HF2uUyD9YByHFbKS9OyZBeui2RquAd/NaLl63rbiWoz57RLXDxrVa', 'ojt', 'OJT-IT-001', 'Edishan Lee Tenorio', 'edishanleetenorio03@gmail.com', '2025-06-02 05:56:04', 0),
(22, 'shen', '$2y$10$fNc/8V3gNsXDGnzS/spb5u36lbpI6xqT2A8FJDIETdB/5w4OFnVvq', 'ojt', 'OJT-IT-002', 'Edishan Lee Tenorio', 'allenhairless@gmail.com', '2025-06-02 09:23:08', 0),
(23, 'OJT-MAR-001', '$2y$10$Cqiwo2ayVzq/IzWimZ78L.I/Dc5nL4bka/dEvwn0.GJpDauiNW1F2', 'ojt', 'OJT-MAR-001', 'John Paulo Ramos', 'allenhairless@gmail.com', '2025-06-02 09:35:32', 1);

-- --------------------------------------------------------

--
-- Structure for view `time_logs_with_calculated_hours`
--
DROP TABLE IF EXISTS `time_logs_with_calculated_hours`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `time_logs_with_calculated_hours`  AS SELECT `tl`.`id` AS `id`, `tl`.`employee_id` AS `employee_id`, `tl`.`log_date` AS `log_date`, `tl`.`time_in` AS `time_in`, `tl`.`time_out` AS `time_out`, `tl`.`break_start` AS `break_start`, `tl`.`break_end` AS `break_end`, `tl`.`total_hours` AS `total_hours`, `tl`.`status` AS `status`, `tl`.`created_at` AS `created_at`, `tl`.`extra_hours` AS `extra_hours`, `tl`.`double_hours` AS `double_hours`, `tl`.`updated_at` AS `updated_at`, `tl`.`updated_by` AS `updated_by`, `e`.`name` AS `name`, `e`.`type` AS `type`, coalesce(`tl`.`total_hours`,0) + coalesce(`tl`.`extra_hours`,0) + coalesce(`tl`.`double_hours`,0) * 2 AS `calculated_total_hours`, coalesce(`tl`.`extra_hours`,0) + coalesce(`tl`.`double_hours`,0) * 2 AS `total_overtime_value` FROM (`time_logs` `tl` join `employees` `e` on(`tl`.`employee_id` = `e`.`employee_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_audit_user` (`user_id`),
  ADD KEY `idx_audit_table_record` (`table_name`,`record_id`),
  ADD KEY `idx_audit_created` (`created_at`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`),
  ADD KEY `fk_employees_department` (`department_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_key` (`setting_key`);

--
-- Indexes for table `time_logs`
--
ALTER TABLE `time_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `idx_time_logs_overtime` (`extra_hours`,`double_hours`),
  ADD KEY `idx_time_logs_updated` (`updated_at`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `employee_id` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `time_logs`
--
ALTER TABLE `time_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `fk_employees_department` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `time_logs`
--
ALTER TABLE `time_logs`
  ADD CONSTRAINT `time_logs_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
