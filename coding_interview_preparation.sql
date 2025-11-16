-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2025 at 07:20 PM
-- Server version: 10.4.28-MariaDB-log
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coding_interview_preparation`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `short_description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Brand 1', 'This is a short description for Brand 1', 1, '2025-11-01 12:24:07', '2025-11-01 12:24:07', NULL),
(2, 'Brand 2', 'This is a short description for Brand 2', 1, '2025-11-01 12:24:08', '2025-11-01 12:24:08', NULL),
(3, 'Brand 3', 'This is a short description for Brand 3', 1, '2025-11-01 12:24:08', '2025-11-01 12:24:08', NULL),
(4, 'Brand 4', 'This is a short description for Brand 4', 1, '2025-11-01 12:24:09', '2025-11-01 12:24:09', NULL),
(5, 'Brand 5', 'This is a short description for Brand 5', 1, '2025-11-01 12:24:10', '2025-11-01 12:24:10', NULL),
(6, 'Brand 6', 'This is a short description for Brand 6', 1, '2025-11-01 12:24:10', '2025-11-01 12:24:10', NULL),
(7, 'Brand 7', 'This is a short description for Brand 7', 1, '2025-11-01 12:24:11', '2025-11-01 12:24:11', NULL),
(8, 'Brand 8', 'This is a short description for Brand 8', 1, '2025-11-01 12:24:11', '2025-11-01 12:24:11', NULL),
(9, 'Brand 9', 'This is a short description for Brand 9', 1, '2025-11-01 12:24:11', '2025-11-01 12:24:11', NULL),
(10, 'Brand 10', 'This is a short description for Brand 10', 1, '2025-11-01 12:24:11', '2025-11-01 12:24:11', NULL),
(19, 'Brand 10000', 'This is a short description for Brand 10', 1, '2025-11-01 12:24:11', '2025-11-01 12:24:11', '2025-11-15 15:47:49'),
(20, 'Lactogen', '', 1, '2025-11-16 16:04:06', '2025-11-16 16:04:06', NULL),
(21, 'TT', 'tt', 1, '2025-11-16 16:07:24', '2025-11-16 16:07:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `short_description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Category 1', NULL, 'This is a short description for Category 1', 1, '2025-11-01 12:24:11', '2025-11-01 12:24:11', NULL),
(2, 'Category 2', NULL, 'This is a short description for Category 2', 1, '2025-11-01 12:24:11', '2025-11-01 12:24:11', NULL),
(3, 'Category 3', NULL, 'This is a short description for Category 3', 1, '2025-11-01 12:24:11', '2025-11-01 12:24:11', NULL),
(4, 'Category 4', NULL, 'This is a short description for Category 4', 1, '2025-11-01 12:24:11', '2025-11-01 12:24:11', NULL),
(5, 'Category 5', NULL, 'This is a short description for Category 5', 1, '2025-11-01 12:24:11', '2025-11-01 12:24:11', NULL),
(6, 'Category 6', NULL, 'This is a short description for Category 6', 1, '2025-11-01 12:24:11', '2025-11-01 12:24:11', NULL),
(7, 'Category 7', NULL, 'This is a short description for Category 7', 1, '2025-11-01 12:24:11', '2025-11-01 12:24:11', NULL),
(8, 'Category 8', NULL, 'This is a short description for Category 8', 1, '2025-11-01 12:24:11', '2025-11-01 12:24:11', NULL),
(9, 'Category 9', NULL, 'This is a short description for Category 9', 1, '2025-11-01 12:24:11', '2025-11-01 12:24:11', NULL),
(10, 'Category 10', NULL, 'This is a short description for Category 10', 1, '2025-11-01 12:24:11', '2025-11-01 12:24:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `short_description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Red', NULL, 1, NULL, NULL, NULL),
(2, 'Green', NULL, 1, NULL, NULL, NULL),
(3, 'Blue', NULL, 1, NULL, NULL, NULL),
(4, 'Cyan', NULL, 1, NULL, NULL, NULL),
(5, 'Magenta', NULL, 1, NULL, NULL, NULL),
(6, 'Yellow', NULL, 1, NULL, NULL, NULL),
(7, 'KeyBlack', NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_id` varchar(255) NOT NULL,
  `type` enum('customer','supplier','both') NOT NULL DEFAULT 'customer',
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `opening_balance` decimal(8,2) NOT NULL DEFAULT 0.00,
  `remarks` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=>inactive, 1=>active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `contact_id`, `type`, `name`, `phone`, `email`, `address`, `opening_balance`, `remarks`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CO0001', 'customer', 'Test Customer 0001', '01710000000', 'example@example.com', NULL, 0.00, NULL, 1, '2025-11-16 16:43:31', '2025-11-16 16:43:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mediable_type` varchar(255) NOT NULL,
  `mediable_id` bigint(20) UNSIGNED NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `is_primary` tinyint(4) NOT NULL DEFAULT 0,
  `file_type` enum('image','audio','video','pdf','excel','csv') NOT NULL DEFAULT 'image',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_10_31_131351_create_brands_table', 1),
(5, '2025_10_31_131359_create_units_table', 1),
(6, '2025_10_31_131455_create_warranties_table', 1),
(7, '2025_10_31_131542_create_sizes_table', 1),
(8, '2025_10_31_131550_create_colors_table', 1),
(9, '2025_10_31_131558_create_storages_table', 1),
(10, '2025_10_31_131722_create_media_table', 1),
(11, '2025_10_31_131732_create_slugs_table', 1),
(12, '2025_10_31_131742_create_categories_table', 1),
(13, '2025_10_31_131743_create_products_table', 1),
(14, '2025_10_31_131744_create_product_stocks_table', 1),
(15, '2025_10_31_131745_create_category_product_table', 1),
(16, '2025_11_01_091911_create_personal_access_tokens_table', 1),
(17, '2025_11_01_163635_create_contacts_table', 1),
(18, '2025_11_01_163651_create_transactions_table', 1),
(19, '2025_11_01_163659_create_transaction_lines_table', 1),
(20, '2025_11_01_165849_create_payment_methods_table', 1),
(21, '2025_11_01_165850_create_transaction_payments_table', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `orderdetails`
-- (See below for the actual view)
--
CREATE TABLE `orderdetails` (
`id` bigint(20) unsigned
,`transaction_date` date
,`invoice_no` varchar(255)
,`total` decimal(15,2)
,`payment_method` varchar(255)
,`paid_amount` decimal(15,2)
,`payment_status` enum('due','partial','paid')
,`customer` varchar(255)
,`product` varchar(255)
,`size` varchar(255)
,`color` varchar(255)
,`storage_name` varchar(255)
,`quantity` decimal(15,2)
,`unit_price` decimal(15,2)
,`sub_total` decimal(15,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `short_description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cash', NULL, 1, '2025-11-16 16:46:39', '2025-11-16 16:46:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `warranty_id` bigint(20) UNSIGNED DEFAULT NULL,
  `alert_quantity` decimal(8,2) NOT NULL DEFAULT 0.00,
  `type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=single, 2=variable',
  `short_description` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `seo_meta_title` varchar(255) DEFAULT NULL,
  `seo_meta_description` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `brand_id`, `unit_id`, `warranty_id`, `alert_quantity`, `type`, `short_description`, `description`, `seo_meta_title`, `seo_meta_description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Test Product', 1, 1, 1, 5.00, 1, 'This is test product short description.', 'This is test product description.', NULL, NULL, 1, '2025-11-16 16:09:35', '2025-11-16 16:09:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_stocks`
--

CREATE TABLE `product_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED DEFAULT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `storage_id` bigint(20) UNSIGNED DEFAULT NULL,
  `purchase_price` decimal(15,2) NOT NULL DEFAULT 0.00,
  `selling_price` decimal(15,2) NOT NULL DEFAULT 0.00,
  `stock` decimal(15,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_stocks`
--

INSERT INTO `product_stocks` (`id`, `product_id`, `size_id`, `color_id`, `storage_id`, `purchase_price`, `selling_price`, `stock`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 10.00, 15.00, 41.00, 1, '2025-11-16 16:10:59', '2025-11-16 16:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `short_description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'XXL', NULL, 1, NULL, NULL, NULL),
(2, 'XL', NULL, 1, NULL, NULL, NULL),
(3, 'L', NULL, 1, NULL, NULL, NULL),
(4, 'M', NULL, 1, NULL, NULL, NULL),
(5, 'S', NULL, 1, NULL, NULL, NULL),
(6, 'XS', NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slugs`
--

CREATE TABLE `slugs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sluggable_type` varchar(255) NOT NULL,
  `sluggable_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slugs`
--

INSERT INTO `slugs` (`id`, `sluggable_type`, `sluggable_id`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'App\\Modules\\Product\\Models\\Brand', 1, 'brand-1', '2025-11-01 12:24:08', '2025-11-01 12:24:08'),
(2, 'App\\Modules\\Product\\Models\\Brand', 2, 'brand-2', '2025-11-01 12:24:08', '2025-11-01 12:24:08'),
(3, 'App\\Modules\\Product\\Models\\Brand', 3, 'brand-3', '2025-11-01 12:24:09', '2025-11-01 12:24:09'),
(4, 'App\\Modules\\Product\\Models\\Brand', 4, 'brand-4', '2025-11-01 12:24:10', '2025-11-01 12:24:10'),
(5, 'App\\Modules\\Product\\Models\\Brand', 5, 'brand-5', '2025-11-01 12:24:10', '2025-11-01 12:24:10'),
(6, 'App\\Modules\\Product\\Models\\Brand', 6, 'brand-6', '2025-11-01 12:24:11', '2025-11-01 12:24:11'),
(7, 'App\\Modules\\Product\\Models\\Brand', 7, 'brand-7', '2025-11-01 12:24:11', '2025-11-01 12:24:11'),
(8, 'App\\Modules\\Product\\Models\\Brand', 8, 'brand-8', '2025-11-01 12:24:11', '2025-11-01 12:24:11'),
(9, 'App\\Modules\\Product\\Models\\Brand', 9, 'brand-9', '2025-11-01 12:24:11', '2025-11-01 12:24:11'),
(10, 'App\\Modules\\Product\\Models\\Brand', 10, 'brand-10', '2025-11-01 12:24:11', '2025-11-01 12:24:11'),
(11, 'App\\Modules\\Product\\Models\\Category', 1, 'category-1', '2025-11-01 12:24:11', '2025-11-01 12:24:11'),
(12, 'App\\Modules\\Product\\Models\\Category', 2, 'category-2', '2025-11-01 12:24:11', '2025-11-01 12:24:11'),
(13, 'App\\Modules\\Product\\Models\\Category', 3, 'category-3', '2025-11-01 12:24:11', '2025-11-01 12:24:11'),
(14, 'App\\Modules\\Product\\Models\\Category', 4, 'category-4', '2025-11-01 12:24:11', '2025-11-01 12:24:11'),
(15, 'App\\Modules\\Product\\Models\\Category', 5, 'category-5', '2025-11-01 12:24:11', '2025-11-01 12:24:11'),
(16, 'App\\Modules\\Product\\Models\\Category', 6, 'category-6', '2025-11-01 12:24:11', '2025-11-01 12:24:11'),
(17, 'App\\Modules\\Product\\Models\\Category', 7, 'category-7', '2025-11-01 12:24:11', '2025-11-01 12:24:11'),
(18, 'App\\Modules\\Product\\Models\\Category', 8, 'category-8', '2025-11-01 12:24:11', '2025-11-01 12:24:11'),
(19, 'App\\Modules\\Product\\Models\\Category', 9, 'category-9', '2025-11-01 12:24:11', '2025-11-01 12:24:11'),
(20, 'App\\Modules\\Product\\Models\\Category', 10, 'category-10', '2025-11-01 12:24:11', '2025-11-01 12:24:11');

-- --------------------------------------------------------

--
-- Table structure for table `storages`
--

CREATE TABLE `storages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storages`
--

INSERT INTO `storages` (`id`, `name`, `short_description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '4GB/64GB', NULL, 1, NULL, NULL, NULL),
(2, '6GB/128GB', NULL, 1, NULL, NULL, NULL),
(3, '8GB/128GB', NULL, 1, NULL, NULL, NULL),
(4, '12GB/256GB', NULL, 1, NULL, NULL, NULL),
(5, '16GB/512GB', NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `type` enum('sell','sell_return','purchase','purchase_return') NOT NULL DEFAULT 'sell',
  `invoice_no` varchar(255) NOT NULL,
  `total` decimal(15,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `other_cost` decimal(15,2) NOT NULL DEFAULT 0.00,
  `final_total` decimal(15,2) NOT NULL DEFAULT 0.00,
  `payment_status` enum('due','partial','paid') NOT NULL DEFAULT 'due',
  `note` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=>inactive, 1=>active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `contact_id`, `date`, `type`, `invoice_no`, `total`, `discount`, `other_cost`, `final_total`, `payment_status`, `note`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 1, '2025-11-17', 'sell', 'TT2', 0.00, 0.00, 0.00, 0.00, 'due', NULL, 1, NULL, NULL, NULL),
(9, 1, '2025-11-17', 'sell', 'TT3', 0.00, 0.00, 0.00, 0.00, 'due', NULL, 1, NULL, NULL, NULL),
(11, 1, '2025-11-17', 'sell', 'TT5', 0.00, 0.00, 0.00, 0.00, 'due', NULL, 1, NULL, NULL, NULL),
(12, 1, '2025-11-17', 'sell', 'TT6', 0.00, 0.00, 0.00, 0.00, 'due', NULL, 1, NULL, NULL, NULL);

--
-- Triggers `transactions`
--
DELIMITER $$
CREATE TRIGGER `after_update_transactions` AFTER UPDATE ON `transactions` FOR EACH ROW BEGIN
    -- Update transaction_payments.amount
    UPDATE transaction_payments
    SET amount = (
        SELECT final_total
        FROM transactions
        WHERE id = NEW.id
    )
    WHERE transaction_id = NEW.id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_delete_transactions` BEFORE DELETE ON `transactions` FOR EACH ROW BEGIN
    -- Rollback stock for all lines of this transaction
    UPDATE product_stocks ps
    JOIN transaction_lines tl 
      ON tl.variation_id = ps.id
    SET ps.stock = ps.stock + tl.quantity
    WHERE tl.transaction_id = OLD.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_lines`
--

CREATE TABLE `transaction_lines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `variation_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` decimal(15,2) NOT NULL DEFAULT 0.00,
  `unit_price` decimal(15,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `other_cost` decimal(15,2) NOT NULL DEFAULT 0.00,
  `total` decimal(15,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=>inactive, 1=>active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Triggers `transaction_lines`
--
DELIMITER $$
CREATE TRIGGER `after_delete_transaction_lines` AFTER DELETE ON `transaction_lines` FOR EACH ROW BEGIN
    UPDATE product_stocks
    SET stock = stock + OLD.quantity
    WHERE id = OLD.variation_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_transaction_lines` AFTER UPDATE ON `transaction_lines` FOR EACH ROW BEGIN
    -- Update parent transactions total
    UPDATE transactions
    SET total = (
        SELECT COALESCE(SUM(quantity * unit_price), 0)
        FROM transaction_lines
        WHERE transaction_id = NEW.transaction_id
    ),
    discount = (
        SELECT COALESCE(SUM(discount), 0)
        FROM transaction_lines
        WHERE transaction_id = NEW.transaction_id
    ),
    other_cost = (
        SELECT COALESCE(SUM(other_cost), 0)
        FROM transaction_lines
        WHERE transaction_id = NEW.transaction_id
    ),
    final_total = (
        SELECT COALESCE(SUM(quantity * unit_price + other_cost - discount), 0)
        FROM transaction_lines
        WHERE transaction_id = NEW.transaction_id
    )
    WHERE id = NEW.transaction_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_update_transaction_lines` BEFORE UPDATE ON `transaction_lines` FOR EACH ROW BEGIN
    SET NEW.total =
        (NEW.quantity * NEW.unit_price)
        + NEW.other_cost
        - NEW.discount;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_payments`
--

CREATE TABLE `transaction_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `payment_date` date NOT NULL,
  `amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `payment_method_id` bigint(20) UNSIGNED NOT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=>inactive, 1=>active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `short_name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pieces', 'pcs', 1, '2025-11-01 12:24:11', '2025-11-01 12:24:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `warranties`
--

CREATE TABLE `warranties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=days, 2=months',
  `count` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=days, 2=months',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warranties`
--

INSERT INTO `warranties` (`id`, `name`, `short_description`, `type`, `count`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '7 Days Brand Warranty', NULL, 1, 7, 1, '2025-11-01 12:24:11', '2025-11-01 12:24:11', NULL);

-- --------------------------------------------------------

--
-- Structure for view `orderdetails`
--
DROP TABLE IF EXISTS `orderdetails`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `orderdetails`  AS SELECT `t`.`id` AS `id`, `t`.`date` AS `transaction_date`, `t`.`invoice_no` AS `invoice_no`, `t`.`total` AS `total`, `pm`.`name` AS `payment_method`, `tp`.`amount` AS `paid_amount`, `t`.`payment_status` AS `payment_status`, `c`.`name` AS `customer`, `p`.`name` AS `product`, `s`.`name` AS `size`, `cl`.`name` AS `color`, `st`.`name` AS `storage_name`, `tl`.`quantity` AS `quantity`, `tl`.`unit_price` AS `unit_price`, `tl`.`total` AS `sub_total` FROM (((((((((`transactions` `t` left join `contacts` `c` on(`c`.`id` = `t`.`contact_id`)) left join `transaction_payments` `tp` on(`t`.`id` = `tp`.`transaction_id`)) left join `transaction_lines` `tl` on(`t`.`id` = `tl`.`transaction_id`)) left join `product_stocks` `ps` on(`ps`.`id` = `tl`.`variation_id`)) left join `products` `p` on(`p`.`id` = `ps`.`product_id`)) left join `sizes` `s` on(`s`.`id` = `ps`.`size_id`)) left join `colors` `cl` on(`cl`.`id` = `ps`.`color_id`)) left join `storages` `st` on(`st`.`id` = `ps`.`storage_id`)) left join `payment_methods` `pm` on(`pm`.`id` = `tp`.`payment_method_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_product_category_id_foreign` (`category_id`),
  ADD KEY `category_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `colors_name_unique` (`name`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contacts_contact_id_unique` (`contact_id`),
  ADD UNIQUE KEY `contacts_phone_unique` (`phone`),
  ADD UNIQUE KEY `contacts_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_mediable_type_mediable_id_index` (`mediable_type`,`mediable_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_methods_name_unique` (`name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_unit_id_foreign` (`unit_id`),
  ADD KEY `products_warranty_id_foreign` (`warranty_id`);

--
-- Indexes for table `product_stocks`
--
ALTER TABLE `product_stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_stocks_product_id_foreign` (`product_id`),
  ADD KEY `product_stocks_size_id_foreign` (`size_id`),
  ADD KEY `product_stocks_color_id_foreign` (`color_id`),
  ADD KEY `product_stocks_storage_id_foreign` (`storage_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sizes_name_unique` (`name`);

--
-- Indexes for table `slugs`
--
ALTER TABLE `slugs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slugs_slug_unique` (`slug`),
  ADD KEY `slugs_sluggable_type_sluggable_id_index` (`sluggable_type`,`sluggable_id`);

--
-- Indexes for table `storages`
--
ALTER TABLE `storages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `storages_name_unique` (`name`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_invoice_no_unique` (`invoice_no`),
  ADD KEY `transactions_contact_id_foreign` (`contact_id`);

--
-- Indexes for table `transaction_lines`
--
ALTER TABLE `transaction_lines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_lines_transaction_id_foreign` (`transaction_id`),
  ADD KEY `transaction_lines_variation_id_foreign` (`variation_id`);

--
-- Indexes for table `transaction_payments`
--
ALTER TABLE `transaction_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_payments_transaction_id_foreign` (`transaction_id`),
  ADD KEY `transaction_payments_payment_method_id_foreign` (`payment_method_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `units_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warranties`
--
ALTER TABLE `warranties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `warranties_name_unique` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_stocks`
--
ALTER TABLE `product_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slugs`
--
ALTER TABLE `slugs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `storages`
--
ALTER TABLE `storages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaction_lines`
--
ALTER TABLE `transaction_lines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaction_payments`
--
ALTER TABLE `transaction_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `warranties`
--
ALTER TABLE `warranties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_warranty_id_foreign` FOREIGN KEY (`warranty_id`) REFERENCES `warranties` (`id`);

--
-- Constraints for table `product_stocks`
--
ALTER TABLE `product_stocks`
  ADD CONSTRAINT `product_stocks_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `product_stocks_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_stocks_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`),
  ADD CONSTRAINT `product_stocks_storage_id_foreign` FOREIGN KEY (`storage_id`) REFERENCES `storages` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaction_lines`
--
ALTER TABLE `transaction_lines`
  ADD CONSTRAINT `transaction_lines_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_lines_variation_id_foreign` FOREIGN KEY (`variation_id`) REFERENCES `product_stocks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaction_payments`
--
ALTER TABLE `transaction_payments`
  ADD CONSTRAINT `transaction_payments_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_payments_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
