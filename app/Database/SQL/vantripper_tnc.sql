-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2025 at 07:20 AM
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
-- Database: `vantripper_tnc`
--

-- --------------------------------------------------------

--
-- Table structure for table `companions`
--

CREATE TABLE `companions` (
  `id` int(11) NOT NULL,
  `submission_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companions`
--

INSERT INTO `companions` (`id`, `submission_id`, `full_name`, `created_at`) VALUES
(3, 24, 'Shan Lee', '2025-05-16 08:21:49'),
(4, 24, 'Test Lee', '2025-05-16 08:21:49');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`) VALUES
(1, 'Domestic'),
(2, 'Exclusive'),
(3, 'Joiners');

-- --------------------------------------------------------

--
-- Table structure for table `payment_receipts`
--

CREATE TABLE `payment_receipts` (
  `id` int(11) NOT NULL,
  `submission_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_receipts`
--

INSERT INTO `payment_receipts` (`id`, `submission_id`, `file_name`, `file_path`, `upload_date`) VALUES
(2, 24, 'meme.gif', '../uploads/receipts/2025/05/receipt_24_6826f59d57dea.gif', '2025-05-16 08:21:49'),
(3, 25, 'meme.gif', '../uploads/receipts/2025/05/receipt_25_6826f610deeef.gif', '2025-05-16 08:23:44'),
(4, 26, 'meme.gif', '../uploads/receipts/2025/05/receipt_26_6826f6a368bf3.gif', '2025-05-16 08:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` int(11) NOT NULL,
  `package_type` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `lead_guest` varchar(255) NOT NULL,
  `fb_name` varchar(255) DEFAULT NULL,
  `contact_number` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `archived` tinyint(1) NOT NULL DEFAULT 0,
  `payment_date` date DEFAULT NULL,
  `payment_amount` decimal(10,2) DEFAULT NULL,
  `has_payment_receipt` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `package_type`, `email`, `lead_guest`, `fb_name`, `contact_number`, `created_at`, `archived`, `payment_date`, `payment_amount`, `has_payment_receipt`) VALUES
(24, 'Joiners', 'edishanleetenorio03@gmail.com', 'Edishan Lees', 'Shan Lee Tenorio', '09299503384', '2025-05-16 08:21:49', 0, '2025-05-16', 200.00, 1),
(25, 'Domestic', 'edishanleetenorio@gmail.com', 'Edishan', 'Shan Lee Tenorio', '0929945883', '2025-05-16 08:23:44', 0, '2025-05-16', 200.00, 1),
(26, 'Exclusive', 'dishantenorio03@gmail.com', 'Edishan Lees', 'Dishan Leer', '0929958445', '2025-05-16 08:26:11', 0, '2025-05-16', 200.00, 1),
(27, 'Exclusive', 'allenhairless@gmail.com', ' Edishan Lee Tenorio', 'Edishan Lee Tenorio', '09299503384', '2025-05-30 03:09:37', 0, '2025-05-30', 20000.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `submission_answers`
--

CREATE TABLE `submission_answers` (
  `id` int(11) NOT NULL,
  `submission_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submission_answers`
--

INSERT INTO `submission_answers` (`id`, `submission_id`, `question_id`, `answer`) VALUES
(349, 24, 37, 'yes'),
(350, 24, 38, 'yes'),
(351, 24, 39, 'yes'),
(352, 24, 40, 'yes'),
(353, 24, 41, 'yes'),
(354, 24, 42, 'yes'),
(355, 24, 43, 'yes'),
(356, 24, 44, 'yes'),
(357, 24, 45, 'yes'),
(358, 24, 46, 'yes'),
(359, 24, 47, 'yes'),
(360, 24, 48, 'yes'),
(361, 24, 49, 'yes'),
(362, 24, 50, 'yes'),
(363, 25, 1, 'yes'),
(364, 25, 2, 'yes'),
(365, 25, 3, 'yes'),
(366, 25, 4, 'yes'),
(367, 25, 5, 'yes'),
(368, 25, 6, 'yes'),
(369, 25, 7, 'yes'),
(370, 25, 8, 'yes'),
(371, 25, 9, 'yes'),
(372, 25, 10, 'yes'),
(373, 25, 51, 'yes'),
(374, 25, 12, 'yes'),
(375, 25, 13, 'yes'),
(376, 25, 14, 'yes'),
(377, 25, 16, 'yes'),
(378, 25, 17, 'yes'),
(379, 25, 18, 'yes'),
(380, 25, 19, 'yes'),
(381, 25, 20, 'yes'),
(382, 25, 21, 'yes'),
(383, 25, 52, 'yes'),
(384, 25, 53, 'yes'),
(385, 26, 24, 'yes'),
(386, 26, 25, 'yes'),
(387, 26, 26, 'yes'),
(388, 26, 27, 'yes'),
(389, 26, 28, 'yes'),
(390, 26, 29, 'yes'),
(391, 26, 30, 'yes'),
(392, 26, 31, 'yes'),
(393, 26, 32, 'yes'),
(394, 26, 34, 'yes'),
(395, 26, 35, 'yes'),
(396, 26, 36, 'yes'),
(397, 27, 24, 'yes'),
(398, 27, 25, 'yes'),
(399, 27, 26, 'yes'),
(400, 27, 27, 'yes'),
(401, 27, 28, 'yes'),
(402, 27, 29, 'yes'),
(403, 27, 30, 'yes'),
(404, 27, 31, 'yes'),
(405, 27, 32, 'yes'),
(406, 27, 34, 'no'),
(407, 27, 35, 'yes'),
(408, 27, 36, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `terms_questions`
--

CREATE TABLE `terms_questions` (
  `id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `yes_option` varchar(255) NOT NULL DEFAULT 'Yes! I Agree',
  `no_option` varchar(255) NOT NULL DEFAULT 'No, I don''t Agree',
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `terms_questions`
--

INSERT INTO `terms_questions` (`id`, `package_id`, `question_text`, `yes_option`, `no_option`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'I understand that before availing any tour with Vantrippers I need to read and review the travel terms and condition of Vantrippers.', 'Yes! I Agree', '', 0, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(2, 1, 'All bookings require the completion of applicable forms with accurate and complete information.', 'Yes! I understand this process', 'No, I don\'t Agree', 1, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(3, 1, 'Any incorrect or misspelled details provided during the booking process may incur penalties and charges that will impose to client if proven misspelled  by the client.', 'Yes! I understand this process', '', 2, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(4, 1, 'Prices and availability quoted are subject to change until the deposit is fully paid', 'Yes! I Agree', 'No, I don\'t', 3, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(5, 1, 'Vantrippers Travel and Tours is not responsible for errors or omissions in quotes, advertisements, or third-party information that may result in discrepancies in inventory, content, or pricing. Suppliers reserve the right to correct pricing errors and may decline to honor erroneous prices.', 'Yes! I Agree', 'No, I don\'t Agree', 4, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(6, 1, 'For packages including airfare, a 70% deposit is required at booking, with the full payment schedule detailed in the booking contract. Failure to meet payment deadlines may result in tour cancellation.', 'Yes! I Agree', 'No, I don\'t Agree', 5, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(7, 1, 'Credit Card and PayPal Fees:\n5% fee for credit card payments made at our office or thru payment link.8% fee for PayPal transactions (Mastercard, Visa, American Express).Bank deposit fees are the responsibility of the client.', 'Yes! I Agree', 'No, I don\'t Agree', 6, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(8, 1, 'For Packages With Airfare\nAirline tickets and packages are non-refundable and non-transferable.\nExcursion and Promotional Fares\nDiscount fares may have restrictions, and changes to flights or carriers could result in additional costs.', 'Yes! I Agree', 'No, I don\'t Agree', 7, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(9, 1, 'Group Cancellation Charges\r\nApplicable to regular package without airfare\r\n\r\n30 days prior: 10% of the total amount.\r\n15 days prior: 25% of the total amount.\r\n7 days prior: 50% of the total amount.\r\nNo-show: 100% cancellation fee', 'Yes! I Agree', 'No, I don\'t Agree', 8, '2025-05-14 05:44:36', '2025-05-14 07:55:42'),
(10, 1, 'Travel Insurance\r\nTravel insurance is strongly recommended. Policies may not cover insolvency or certain claims such as pandemics or pre-existing conditions. Consult the insurance provider for details. Vantrippers Travel and Tours is not liable for denied claims or the decision not to purchase insurance.', 'Yes! I Agree', 'NO, I DONT AGREE', 9, '2025-05-14 05:44:36', '2025-05-14 07:35:15'),
(12, 1, 'Our Liability\nVantrippers Travel and Tours accepts liability only for arrangements within its control. We are not responsible for:\nExternal events like natural disasters, strikes, or acts of terrorism. Actions or omissions by third-party providers such as airlines, hotels, or transportation services.\nThe Tour Provider is not liable for any accidents, losses, or damages that occur during the tour.\nThe Client is strongly advised to obtain travel insurance to cover such incidents.', 'Yes! I Agree', 'No, I don\'t Agree', 11, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(13, 1, 'Conduct and Behavior\nGuests must behave in an orderly manner. Disruptive behavior may result in the termination of services without refund or compensation. Guests may also be held liable for damages caused.', 'Yes! I Agree', 'No, I don\'t Agree', 12, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(14, 1, 'ISLAND HOPPING: (Applicable to tours with Island Hopping)\nVanTrippers Travel and Tours does not guaranteed that all mentioned islands on Island Hopping will be visited. It depends on weather, current & waves condition. Unused service/s, certain visits/island/s that is missed will not result and not valid reason for reimbursement, discount or refund due to no fault of the Tour Operator or the Company VanTrippers Travel & Tours. Vantrippers cannot predict Mother Nature. (Pls Disregard if the tour availed does not includes Island Hopping)', 'Yes! I understand', 'No, I don\'t Agree', 13, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(16, 1, 'Children aged 0 to 3 years old:\r\n\r\nFree of charge for the tour (without an allotted seat in the transportation). The child must sit on the lap of their parents during the tour and travel (if the transportation capacity has been reach.\r\n\r\nProof of Age: Parents must provide the child’s a recent photo as proof of age.\r\n\r\nAccommodation: All beds provided are double beds, not king or queen size, unless specifically quoted by the travel agency prior to booking. Children will share the existing bed, and parents are responsible for any additional costs, such as extra mattresses or charges for additional persons if the child exceeds the bed capacity.\r\n\r\nEntrance Fees and Activities: Any additional fees for activities or entrance during the tour must be shouldered by the parents.\r\nChildren aged 5 years old and above:\r\nConsidered as adults and charged the adult rate.\r\nLimitations: A maximum of 2 child (aged 0–3 years old) is eligible for free-of-charge tour inclusion per booking.', 'Yes! I understand', 'No', 15, '2025-05-14 05:44:36', '2025-05-14 08:07:07'),
(17, 1, 'KID WITH BIG BODY BUILT:\nAssessment by Driver: Upon pick-up of your group, the driver will assess the child’s physical appearance. If the child does not appear to be 3 years old or younger, as stated during booking, Vantrippers Travel and Tours reserves the right to collect the child’s fare at the adult rate. The additional payment will be added to your group’s total amount and must be settled on the departure date.', 'Yes! I understand', 'No', 16, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(18, 1, 'ITINERARY:\nWe aim to follow the itinerary describe, however unforeseen events like close tourist spot due to pandemic spread prevention acts, lockdown of specific town, area, hiway, or any external circumstances beyond our control may necessitate changes in the sequences of the schedule of activities, Island Hopping or missing of certain tourist spot visit will not be valid reason for refund, discounts or future discounts.', 'Yes! I understand', 'No', 17, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(19, 1, 'ROOM PROVIDED\nWe will provide a room the same as what is committed on your prior to you booking and this room must have a full occupancy. However, if any member of your group requests a room upgrade to a couple\'s room, a triple room, or an additional room for any division, there will be an additional charge. The minimum fee is P1,000 per person per night depending on hotel rates and should be included in the total amount to be paid on the departure date.', 'Yes! I understand', 'No', 18, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(20, 1, '2PAX IN A BED POLICY (IF DOUBLE BED)\nPlease note that all beds are designed for double occupancy. If someone prefers to have a solo bed, an extra fee per person per night will be applicable. Availability of additional rooms or single bed occupancy, including the provision of extra mattresses, is subject to availability on your chosen travel dates.', 'Yes! I understand', 'No', 19, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(21, 1, 'BAGGAGE POLICY\n• Please be aware that we have a strict policy against bringing luggage, including trolleys and large suitcases, during our tours. Our transportation do not have storage compartments like airplanes, so any luggage you bring must be carried with you throughout the trip. We enforce this policy to ensure a comfortable and hassle-free travel experience for all passengers. Please refrain from bringing trolleys, as you won\'t always be able to roll them around at tourist spots.\n• All duffel bag should fit under the car seat all guests should occupy the seat allotted.\n• Tour participants should be responsible for their own belongings.\n• Vantrippers will not assume responsibility for any misplacement, losses, or damage to their belongings', 'Yes! I understand', 'No', 20, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(24, 2, 'ISLAND HOPPING:\nVanTrippers Travel and Tours does not guaranteed that all mentioned islands on Island Hopping will be visited. It depends on weather, current & waves condition. Unused service/s, certain visits/island/s that is missed will not result and not valid reason for reimbursement, discount or refund due to no fault of the Tour Operator or the Company VanTrippers Travel & Tours. Vantrippers cannot predict Mother Nature. (Pls Disregard if the tour availed does not includes Island Hopping)', 'Yes! I understand', 'No, I don\'t', 1, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(25, 2, 'CHILD RATE & POLICY:\nKid/s ages from 0 to 3 years old is free of charge in terms of tour WITHOUT allotted seat on the van, He/She will sit on the lap of their parents during the tour and travel. -As on SOP we will ask for the Birth together with the recent picture of the kid for the proof of age. -In terms on accommodation parent shall paid the extra mattress (and or extra person)  if he/she exceed on bed provided. -Entrance Fee/s and Activities, parent/s shall shoulder the Fees during the tour (If Any). -Kid/s ages 4 years old and above considered as Adult, he/she will be rated as Adult. -Maximum of 1 kid ONLY can be FREE of CHARGE in terms of Tour with ages from 0-3 years old.', 'Yes! I understand', 'No', 2, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(26, 2, 'KID WITH BIG BODY BUILT:\nUpon pick up of your group, the driver or coordinator will access the kid\'s body built, if she/he doesn\'t look like 3 years old unlike you mentioned before booking then the company Vantrippers Travel and Tours has the right to collect the payment of kid that is same rate as adult. The additional payment must be included on your group\'s total amount to be collected on the departure date.', 'Yes! I understand', 'No', 3, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(27, 2, 'ITINERARY:\nWe aim to follow the itinerary describe, however unforeseen events like close tourist spot due to pandemic spread prevention acts, lockdown of specific town, area, hiway, or any external circumstances beyond our control may necessitate changes in the sequences of the schedule of activities, Island Hopping or missing of certain tourist spot visit will not be valid reason for refund, discounts or future discounts.', 'Yes! I understand', 'No', 4, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(28, 2, 'PICK UP LOCATION / PICK UP POINT POLICY\nFree pick up point limits to areas within our list of LOCATIONS in “MANILA” and nearby locations like, MOA, Pasay, Las Pinas, Makati, Cubao, Mandaluyong, some areas in Cavite, NAIA TERMINALS & CLARK INTERNATIONAL AIRPORT. Additional fee/s may apply on your prefer pick up location which are not listed in our Free pick up area. (Fee/s depends on pick up location', 'Yes! I understand', 'No', 5, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(29, 2, 'ROOM PROVIDED\nWe will provide a room the same as what is commited on your prior to you booking and this room must have a full occupancy. However, if any member of your group requests a room upgrade to a couple\'s room, a triple room, or an additional room for any division, there will be an additional charge. The minimum fee is P1,000 per person per night and should be included in the total amount to be paid on the departure date.', 'Yes! I understand', 'No', 6, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(30, 2, '2PAX IN A BED POLICY\nPlease note that all beds are designed for double occupancy. If someone prefers to have a solo bed, an extra fee per person per night will be applicable. Availability of additional rooms or single bed occupancy, including the provision of extra mattresses, is subject to availability on your chosen travel dates.', 'Yes! I understand', 'No', 7, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(31, 2, 'BAGGAGE POLICY\n• Please be aware that we have a strict policy against bringing luggage, including trolleys and large suitcases, during our tours. Our vans do not have storage compartments like airplanes, so any luggage you bring must be carried with you throughout the trip. We enforce this policy to ensure a comfortable and hassle-free travel experience for all passengers. Please refrain from bringing trolleys, as you won\'t always be able to roll them around at tourist spots.\n• All duffel bag should fit under the car seat all guests should occupy the seat allotted.\n• Tour participants should be responsible for their own belongings.\n• Vantrippers will not assume responsibility for any misplacement, losses, or damage to their belongings', 'Yes! I understand', 'No', 8, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(32, 2, 'NUMBER OF PICK UP POITTS ALLOWED:\nEither Free of PAID  pick up VanTrippers only allow Two (2) pick up points but the 2nd pick up point must be ALONG THE WAY. If you exceeded to 2 pick up points or the 2nd pick up point its not along the way or you even requested a 3rd pick up point on the actual pick up date, VanTRippers will charge an additional fee', 'Yes! I understand', 'No', 9, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(34, 2, 'CANCELLATION POLICY\r\n\r\n15+ Days Before Travel:\r\nFull deposit can be used for remaining participants.\r\nRates per head revised based on total headcount.\r\n\r\n14 Days Before Travel:\r\nRefund reservation fee minus P1,000.\r\nPer-person rate unchanged.\r\nPre-booked rooms and arrangements remain the same.\r\n\r\nLast-Minute (1 Day or Same Day):\r\nTransferable to a third party with the same number of participants.\r\nGroup/person pays the canceled participant’s remaining balance if the number isn’t met.\r\nAmount collected remains the same as the tour voucher.', 'Yes! I Agree', 'Non-refundable.', 11, '2025-05-14 05:44:36', '2025-05-15 02:16:24'),
(35, 2, 'RE-SCEDULING:\r\n\r\nYou may re-schedule your booking by notifying the Vantrippers Travel and Tours thru messenger. Re-scheduling fees, if any, will be determined with reference to the date on which notice of re-scheduling is received by the management\r\n\r\n14 days before the date of travel, you may re-schedule your trip, with a change in travel destination allowed - subject to availability.\r\n\r\n5 days before the date of travel, you are not allowed to cancel or reschedule your tour or divert it to another destination if you will, in which case we will forfeit 50% of your \r\nreservation.\r\n\r\n2 days before the date of travel up to same date, guests cannot reschedule their tour within 2 days up to same of the scheduled travel date. At this point, our arrangements for your tour are finalized, and we cannot accommodate changes without incurring significant expenses. The down payment made at the time of booking is non-refundable. This payment secures your accommodation and for the van and is used towards preliminary arrangements for your tour. Guests who reschedule their tour within 2 days up to same of the travel date are required to pay the remaining balance of the tour cost. This balance must be paid in full.', 'Yes! I understand', 'No', 12, '2025-05-14 05:44:36', '2025-05-15 02:17:05'),
(36, 2, 'BOOKING PROCEDURE\r\n\r\nThank you for considering booking your travel with us. Before you book any tour with us, pls review our Booking and Reservation policy.\r\n\r\n• All confirmed bookings are non-refundable but transferable to another person for the same travel dates.\r\n\r\n•  To confirm your booking, we require a DP/Reservation of P1,000 per person as a down payment and deduction from the full amount. The collectibles will be paid on departure day.\r\n\r\n• We will only require your personal information and your companion\'s person info once your booking is confirmed. The form will be send to you following the reservation.\r\n\r\n•  Please inquire if your preferred pick-up is within our free pick-up point before making any reservation. Additional fees may apply if your preferred pick-up location is not included in our free pick-up areas. Please note that we have a maximum of two pickup points allowed, and the second pick-up must be along the way and pre-approved by our management. If the second pick-up location is not along the way and requires additional travel time and effort, we will charge an additional fee. (Fees depend on the tour and pickup location.)\r\nWe also do not do \"pa balik balik na pick up.\" All pickups must be prearranged and done at one point only to avoid an additional charge.', 'Yes! I understand', 'No', 13, '2025-05-14 05:44:36', '2025-05-15 02:19:00'),
(37, 3, 'I understand that before availing any tour package with Vantrippers Travel and Tours I need to carefully read and review the travel terms and condition of Vantrippers.', 'Yes! I understand this process', 'No', 0, '2025-05-14 05:44:36', '2025-05-14 08:58:28'),
(38, 3, 'I understand that my companions and I are joining a \"Joiners Tour.\" We will share the same van with other groups of joiners who have the same itinerary provided by Vantrippers Travel and Tours, but we will not be sharing a room with other tour participants', 'Yes! I understand this process', 'No, I don\'t', 1, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(39, 3, 'I understand and review what is included and what is not included on the tour package and the itinerary before availing the Tour Package of Vantrippers Travel and Tours.', 'Yes! I understand this process', 'No, I don\'t', 2, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(40, 3, 'TOUR WITH ISLAND HOPPING:\nVanTrippers Travel and Tours does not guaranteed that all mentioned islands on Island Hopping will be visited. It depends on weather, current & waves condition. Unused service/s, certain visits/island/s that is missed will not result and not valid reason for reimbursement, discount or refund due to no fault of the Tour Operator or the Company VanTrippers Travel & Tours. Vantrippers cannot predict Mother Nature.', 'Yes! I understand', 'No, I don\'t', 3, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(41, 3, 'ITINERARY (WITH ISLAND HOPPING) :\nItinerary is subject to change depending on the High tide/Low tide and weather condition. Please take note that the schedule of high tide/lowtide varies everyday. You may check it on the tide chart calendar/app. Itinerary may change due to unavoidable circumstances.', 'Yes! I understand', 'No', 4, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(42, 3, 'LAND TOUR ITINERARY:\nWe aim to follow the itinerary describe, however unforeseen events like close tourist spot due to pandemic spread prevention acts, lockdown of specific town, area, hiway, or any external circumstances beyond our control may necessitate changes in the sequences of the schedule of activities, Island Hopping or missing of certain tourist spot visit will not be valid reason for refund, discounts or future discounts.', 'Yes! I understand', 'No', 5, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(43, 3, 'RESERVATION:\n• Reservations are non-refundable but can be changed to other destinations and travel dates, subject to approval.\n• Up to 14 days before travel, reservations can be rescheduled.', 'Yes! I understand', 'No', 6, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(44, 3, 'CANCELLATIONS & RE-SCHEDULING:\n• Cancellations of slots Last-minute cancellations (on the same day) and up to 2-7 days before travel result in a forfeiture of a Php 1,000 deposit of the cancelled person, and rates for remaining participants are adjusted accordingly. Or will rates will still the same and same amount will be collected and same room allocation will be provided but still the down payment of the cancelled person will still be forfeited.\n• Within 5 days of travel, whole group cancellations & re-scheduling are not allowed. Attempted cancellations will result in a forfeiture of 50% of the reservation fee.', 'Yes! I understand', 'No', 7, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(45, 3, 'CANCELLATION OF SLOT/S ONE DAY BEFORE THE DEPARTURE DATE:\nConfirmed reservations are strictly nonrefundable but is considered transferable to the third party designated by the client with the same number of person/s otherwise if guest doesn’t met the same number of participant ONE DAY before the departure date, the group/person will be responsible for the payment of cancelled person/s remaining balance or the amount to be collected on the departure date will be the same amount stated on the tour voucher.', 'Yes! I understand', 'No', 8, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(46, 3, 'TOUR DOEST MET THE REQUIRED NUMBER OF PARTICIPANTS:\nIf a tour doesn\'t meet the required minimum number of participants (at least 9 per van), the Vantippers Travel & Tours may transfer you to a partnered agency with the same travel dates and at with the same inclusions, exclusions and itinerary and we will provide the same accommodation as seen on photo we’ve sent & committed with private CR inside the room.', 'Yes! I understand', 'No', 9, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(47, 3, 'PICK UP TIME AND LOCATION:\nPick-up times and locations are subject to change with prior notice', 'Yes! I understand', 'No', 10, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(48, 3, 'TRANSFERING AND COMBINING TO OTHER TRAVELERS:\nIf you prefer not to be transferred or combined with other travelers in case we don\'t meet the minimum joiners required for the tour, please refrain from booking with us. However, please understand that this is a common practice in the travel industry. Rest assured, if we cannot meet the minimum 9-person joiners requirement, we will ensure that you still receive the same room type, a well-coordinated transfer, and we will only collaborate with our tried, trusted & tested affiliate travel agencies.', 'Yes! I understand', 'No', 11, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(49, 3, 'HAND-CARRY ITEMS:\nWe do not permit joiners participants to bring luggage, even if it\'s within the size limits for hand-carry items. This policy is due to our van\'s capacity, which is calculated based on the number of passengers and available seating. Unfortunately, our vans do not have compartments to accommodate luggage. We kindly request that you bring only duffel bags or backpacks that can fit under the van\'s seats.', 'Yes! I understand', 'No', 12, '2025-05-14 05:44:36', '2025-05-14 05:44:36'),
(50, 3, 'BOOKING PROCEDURE\r\nTo confirm your booking, we require a DP/Reservation of P1,000 per person as a down payment and deduction from the full amount. The collectibles will be paid on departure day.\r\nWe will only require your personal information and your companion\'s person info once your booking is confirmed. The form will be send to you following the reservation.', 'Yes! I Agree', 'No', 13, '2025-05-14 05:44:36', '2025-05-14 09:24:12'),
(51, 1, 'Early Check-In / Late Check-Out\r\n\r\nStandard check-in and check-out times apply. Requests for early check in and variations depend on hotel policies and subject to availability.\r\nAmendments to Itineraries\r\n\r\nItineraries are subject to change due to unforeseen circumstances for the safety and well-being of passengers.\r\nSurcharges\r\n\r\nSudden changes in fuel prices, airfare, or taxes may incur surcharges exceeding 3%.', 'Yes! I Agree', 'No, I don\'t Agree', 10, '2025-05-14 07:56:52', '2025-05-14 07:56:52'),
(52, 1, 'Re-Scheduling Terms\r\nRe-Scheduling Requests:\r\n\r\nAll re-scheduling requests must be submitted thru chat to Vantrippers Travel and Tours at least 7 days prior to the original departure or service date with maybe fees assosciated. Re-scheduling requests submitted less than 7 days before the scheduled date will be subject to approval and additional charges.\r\nCharges and Penalties:\r\n\r\nA re-scheduling fee of 10% of the total booking amount will apply to approved changes made within the specified time frame. If re-scheduling requires re-booking accommodations, transportation, or other services, any price differences and penalties imposed by suppliers will be shouldered by the client.\r\nAvailability:\r\n\r\nRe-scheduling is subject to availability of services on the new requested date. If the requested date is unavailable, the client must choose from the options provided by Vantrippers Travel and Tours.\r\nNon-Refundable Bookings:\r\n\r\nBookings labeled as \"non-refundable\" (including packages with airfare or promotional fares) are not eligible for re-scheduling.\r\nForce Majeure:\r\n\r\nIn cases of unforeseen circumstances beyond the client’s control (e.g., illness, travel restrictions, or natural disasters), re-scheduling fees may be waived upon submission of valid documentation and approval by Vantrippers Travel and Tours.\r\nFinal Re-Scheduling:\r\n\r\nRe-scheduling can only be done once per booking. Additional changes will be treated as cancellations and subject to the Cancellation and Refund Policy.', 'Yes! I Agree', 'No, I don\'t Agree', 22, '2025-05-14 08:25:53', '2025-05-14 08:25:53'),
(53, 1, 'BOOKING PROCEDURE\r\nThank you for considering booking your travel with us. Before you book any tour with us, pls review our Booking and Reservation policy above. \r\n\r\nBooking Procedure\r\n\r\nAll bookings require the completion of applicable forms with accurate and complete information.\r\nAny incorrect or misspelled details provided during the booking process may incur penalties and charges.\r\nThe first named person on the booking (\"Lead Name\") acts on behalf of all passengers included in the booking, taking responsibility for payment, changes, cancellations, and obtaining consent from all passengers for the services booked.\r\nThe Lead Name must be at least 18 years of age and provide all necessary information to our Travel Agents.\r\nDown Payment/Reservation: To confirm your booking, we require a down payment (DP) or reservation fee as mentioned in prior chat discussions. This down payment will be deducted from the full amount.\r\nBy making a reservation, you acknowledge that you have read, understood, and agree to abide by these terms and conditions in their entirety.  ', 'Yes! I Agree', 'No, I don\'t Agree', 23, '2025-05-14 08:26:50', '2025-05-14 08:26:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companions`
--
ALTER TABLE `companions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submission_id` (`submission_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `payment_receipts`
--
ALTER TABLE `payment_receipts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submission_id` (`submission_id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submission_answers`
--
ALTER TABLE `submission_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submission_id` (`submission_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `terms_questions`
--
ALTER TABLE `terms_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_id` (`package_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companions`
--
ALTER TABLE `companions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_receipts`
--
ALTER TABLE `payment_receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `submission_answers`
--
ALTER TABLE `submission_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=409;

--
-- AUTO_INCREMENT for table `terms_questions`
--
ALTER TABLE `terms_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companions`
--
ALTER TABLE `companions`
  ADD CONSTRAINT `companions_ibfk_1` FOREIGN KEY (`submission_id`) REFERENCES `submissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_receipts`
--
ALTER TABLE `payment_receipts`
  ADD CONSTRAINT `payment_receipts_ibfk_1` FOREIGN KEY (`submission_id`) REFERENCES `submissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `submission_answers`
--
ALTER TABLE `submission_answers`
  ADD CONSTRAINT `submission_answers_ibfk_1` FOREIGN KEY (`submission_id`) REFERENCES `submissions` (`id`),
  ADD CONSTRAINT `submission_answers_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `terms_questions` (`id`);

--
-- Constraints for table `terms_questions`
--
ALTER TABLE `terms_questions`
  ADD CONSTRAINT `terms_questions_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
