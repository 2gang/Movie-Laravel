-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- 생성 시간: 23-01-31 23:26
-- 서버 버전: 10.5.16-MariaDB
-- PHP 버전: 8.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `team15`
--
CREATE DATABASE IF NOT EXISTS `team15` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `team15`;

-- --------------------------------------------------------

--
-- 테이블 구조 `actors`
--

CREATE TABLE `actors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `actor_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actor_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `actors`
--

INSERT INTO `actors` (`id`, `actor_name`, `actor_image`, `created_at`, `updated_at`) VALUES
(1, '송중기', 'download.jpg', '2022-12-04 07:30:35', '2022-12-17 13:11:03'),
(2, '전지현', 'images.jpg', '2022-12-04 08:00:29', '2022-12-17 13:11:48'),
(3, '마동석', '다운로드 (1).jpg', '2022-12-04 09:06:13', '2022-12-17 13:12:16'),
(4, '로버트 다우니 주니어', '73fae354d7b3d51c663642e4f55918c1ebc7d37b66776f446744bfa89e44220c0e9b65c99e6d20042af37498aa18d294a6370ab3e64a3f9af8cd751c0a62854e4c953430606f7e6e2eb7b05ecc4d7375a1fe6bb890c9b512de41186abe03bd59d8ccb03122bf02fd8814c4.jpg', '2022-12-17 13:10:20', '2022-12-17 13:10:47'),
(5, '공유', '다운로드.jpg', '2022-12-17 13:10:22', '2022-12-17 13:11:21');

-- --------------------------------------------------------

--
-- 테이블 구조 `directors`
--

CREATE TABLE `directors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `director_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `director_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `directors`
--

INSERT INTO `directors` (`id`, `director_name`, `director_image`, `created_at`, `updated_at`) VALUES
(6, '마이클 베이', '123.jpg', '2022-12-04 07:17:21', '2022-12-17 13:51:08'),
(7, '제임스 카메론', '21`2`.jpg', '2022-12-04 07:56:16', '2022-12-17 13:51:38'),
(13, '감독3', 'dog.jpg', '2022-12-04 09:04:34', '2022-12-04 09:04:34'),
(14, '감독4', NULL, '2022-12-17 09:09:29', '2022-12-17 09:09:29'),
(15, '루소 형제', '11.jpg', '2022-12-17 09:17:00', '2022-12-17 13:52:55'),
(16, 'ㅗ', '33333.jpg', '2022-12-20 20:12:33', '2022-12-20 20:12:33');

-- --------------------------------------------------------

--
-- 테이블 구조 `ex_movies`
--

CREATE TABLE `ex_movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genre_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `director_id` int(11) DEFAULT NULL,
  `actor_id` int(11) DEFAULT NULL,
  `info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `movie_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `movie_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `ex_movies`
--

INSERT INTO `ex_movies` (`id`, `movie_name`, `genre_name`, `director_id`, `actor_id`, `info`, `movie_image`, `movie_url`, `created_at`, `updated_at`) VALUES
(1, 'name', 'name', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '123', '123', 6, 3, '123', '대충이미지.jpg', '12', '2022-12-08 06:48:03', '2022-12-08 06:48:03'),
(5, '123', '123', 7, 3, '23', NULL, NULL, '2022-12-08 07:41:29', '2022-12-08 07:41:29');

-- --------------------------------------------------------

--
-- 테이블 구조 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `members`
--

INSERT INTO `members` (`id`, `uid`, `pwd`, `name`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'rud0503', '1234', 'lgh', NULL, '2022-12-01 07:30:45', '2022-12-01 07:30:45'),
(17, 'test', 'test1234', '1234', '22222222222', '2022-12-15 07:16:52', '2022-12-17 12:45:46'),
(18, '1234', '12345', '김유상', '12312341234', '2022-12-17 08:36:49', '2022-12-17 12:44:37'),
(24, 'youngjoo', 'youngjoo', '권영주', '01000000000', '2022-12-20 05:01:02', '2022-12-20 05:01:02'),
(25, 'test', '1234', '변경', '12312341234', '2022-12-20 14:15:45', '2022-12-21 01:38:32'),
(26, 'test', '1234', '테스트', '01011111111', '2022-12-21 01:38:00', '2022-12-21 01:38:00');

-- --------------------------------------------------------

--
-- 테이블 구조 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_01_160617_create_members_table', 1),
(6, '2022_12_01_162416_create_rooms_table', 2),
(7, '2022_12_02_221020_create_movies_table', 3),
(8, '2022_12_04_152544_create_movies_table', 4),
(9, '2022_12_04_153525_create_directors_table', 5),
(10, '2022_12_04_154004_create_actors_table', 6),
(11, '2022_12_04_165438_create_movies_table', 7),
(12, '2022_12_05_232947_create_ticketings_table', 8),
(13, '2022_12_05_233144_create_seats_table', 9),
(14, '2022_12_08_150310_create_ex_movies_table', 10),
(15, '2022_12_15_144123_create_times_table', 11),
(16, '2022_12_15_153711_create_runtimes_table', 12),
(17, '2022_12_15_161316_create_schedules_table', 13),
(18, '2022_12_21_033425_create_stores_table', 14);

-- --------------------------------------------------------

--
-- 테이블 구조 `movies`
--

CREATE TABLE `movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genre_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `director_id` int(11) DEFAULT NULL,
  `actor_id` int(11) DEFAULT NULL,
  `info` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `movie_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `movie_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `movies`
--

INSERT INTO `movies` (`id`, `movie_name`, `genre_name`, `director_id`, `actor_id`, `info`, `movie_image`, `movie_url`, `state`, `created_at`, `updated_at`) VALUES
(6, '뽀로로', '애니메이션', 6, 3, '맙소사! 뽀로로와 친구들이 네모가 되어버렸다!?  게임왕국을 초토화 시킨 네모 바이러스를 없애기 위해 ‘에디박사’의 도움을 구하러 차원을 넘어온 게임왕국의 집사 ‘차차 아저씨’. 그를 쫓아온 바이러스 괴물로 인해 뽀롱뽀롱 마을은 위험에 빠지고, ‘크롱’과 ‘포비’는 네모가 되어버리고 만다.  뽀로로와 친구들은 게임왕국과 뽀롱뽀롱 마을을 구하기 위해, 팀 뽀로로 & 팀 에디로 나뉘어 ‘에디박사’가 발명한 컴퓨터 백신을 가지고 바이러스 소탕 대작전을 시작하는데… 과연 뽀로로와 친구들은 게임왕국과 뽀롱뽀롱 마을을 지킬 수 있을까?', '뽀로로.jpg', 'https://www.youtube.com/embed/z2a2IkYvCqo', 1, '2022-12-08 05:14:31', '2022-12-15 07:21:03'),
(7, '올빼미', '스릴러', 6, 1, '그날 밤, 세자가 죽었다. 맹인이지만 뛰어난 침술 실력을 지닌 ‘경수’는 어의 ‘이형익’에게 그 재주를 인정받아 궁으로 들어간다. 그 무렵, 청에 인질로 끌려갔던 ‘소현세자’가 8년 만에 귀국하고, ‘인조’는 아들을 향한 반가움도 잠시 정체 모를 불안감에 휩싸인다.  그러던 어느 밤, 어둠 속에서는 희미하게 볼 수 있는 ‘경수’가 ‘소현세자’의 죽음을 목격하게 되고 진실을 알리려는 찰나 더 큰 비밀과 음모가 드러나며 목숨마저 위태로운 상황에 빠진다.  아들의 죽음 후 ‘인조’의 불안감은 광기로 변하여 폭주하기 시작하고 세자의 죽음을 목격한 ‘경수’로 인해 관련된 인물들의 민낯이 서서히 드러나게 되는데...', '올빼미.jpg', 'https://www.youtube.com/embed/eRX5_KUyx7c', 0, '2022-12-08 05:14:35', '2022-12-15 07:24:36'),
(8, '압꾸정', '코미디', 13, 2, '가진 건 오지랖뿐인 압구정 토박이 ‘대국’(마동석), 믿을 건 실력뿐인 까칠한 성형외과 의사 \'지우\'(정경호)가 강남 일대 성형 비즈니스의 전성기를 여는 이야기.', '압꾸정.jpg', 'https://www.youtube.com/embed/I03P8Ec6lfg', 1, '2022-12-08 05:14:45', '2022-12-15 07:22:35'),
(9, '블랙 팬서: 와칸다 포에버', '액션', 6, 1, '“와칸다를 지켜라!” 거대한 두 세계의 충돌, 운명을 건 최후의 전투가 시작된다!  국왕이자 ‘블랙 팬서’인 \'티찰라\'의 죽음 이후 수많은 강대국으로부터 위협을 받게 된 \'와칸다\'. 라몬다, 슈리 그리고 나키아, 오코예, 음바쿠는 각자 사명감을 갖고 와칸다를 지키기 위해 외로운 싸움을 이어간다.  한편, 비브라늄의 패권을 둘러싼 미스터리한 음모와 함께 깊은 해저에서 모습을 드러낸 최강의 적 \'네이머\'와 \'탈로칸\'의 전사들은 와칸다를 향해 무차별 공격을 퍼붓기 시작하는데', '블랙팬서.jpg', 'https://www.youtube.com/embed/ku9l1fHo5XE', 0, '2022-12-08 05:16:55', '2022-12-15 07:20:25'),
(11, '데시벨', '액션', 6, 1, '소음이 커지는 순간 폭발하는 특수 폭탄의 위협은 계속되고, 사상 최대의 도심 폭탄 테러를 막기 위해 모든 비밀을 손에 쥔 폭탄 설계자를 찾아야만 하는데. “도심 한복판에서 벌어지는 사운드 테러 액션', '데시벨.jpg', 'https://www.youtube.com/embed/75b6Uua0pYc', 1, '2022-12-08 06:14:23', '2022-12-08 07:50:05'),
(15, '오늘 밤, 세계에서 이 사랑이 사라진다 해도', '로맨스', 6, 1, '“카미야 토오루에 대해 잊지 말 것”  자고 일어나면 전날의 기억을 잃는 \'선행성 기억상실증\'에 걸린 소녀 `마오리`.  “내일의 마오리도 내가 즐겁게 해줄 거야”  누구에게도 기억되지 않는 무색무취의 평범한 소년 `토오루`.  매일 밤 사랑이 사라지는 세계, 그럼에도 불구하고, 다음 날 서로를 향한 애틋한 고백을 반복하는 두 소년, 소녀의 가장 슬픈 청춘담', '오늘밤.jpg', 'https://www.youtube.com/embed/dKWbgcKkn20', 1, '2022-12-08 06:24:19', '2022-12-15 07:23:57'),
(16, '원피스 필름 레드', '애니메이션', 6, 1, '오직 목소리 하나로 전 세계를 사로잡은 디바 ‘우타’. 그녀가 모습을 드러내는 첫 라이브 콘서트가 음악의 섬 ‘엘레지아’에서 열리고 ‘루피’가 이끄는 밀짚모자 해적단과 함께 수많은 ‘우타’ 팬들로 공연장은 가득 찬다. 그리고 이 콘서트를 둘러싼 해적들과 해군들의 수상한 움직임이 시작되는데… 드디어 전세계가 애타게 기다리던 ‘우타’의 등장과 함께 노래가 울려 퍼지고, 그녀가 ‘샹크스의 딸’이라는 충격적인 사실이 드러난다. ‘루피’, ‘우타’, ‘샹크스’, 세 사람의 과거가 그녀의 노랫소리와 함께 밝혀진다!', '필름레드.jpg', 'https://www.youtube.com/embed/tgPuhRNoROs', 0, '2022-12-08 06:27:13', '2022-12-15 07:25:25'),
(26, '아바타: 물의 길', 'SF', 6, 2, '<아바타: 물의 길>은 판도라 행성에서   \'제이크 설리\'와 \'네이티리\'가 이룬 가족이 겪게 되는 무자비한 위협과  살아남기 위해 떠나야 하는 긴 여정과 전투,  그리고 견뎌내야 할 상처에 대한 이야기를 그렸다.  월드와이드 역대 흥행 순위 1위를 기록한 전편 <아바타>에 이어 제임스 카메론 감독이 13년만에 선보이는 영화로, 샘 워싱턴, 조 샐다나, 시고니 위버, 스티븐 랭, 케이트 윈슬렛이 출연하고 존 랜도가 프로듀싱을 맡았다.', '아바타.jpg', 'https://www.youtube.com/embed/kihrFxwdMb4', 0, '2022-12-15 06:35:49', '2022-12-17 07:57:58'),
(27, '어벤져스: 엔드게임', 'SF', 15, 4, '인피니티 워 이후 절반만 살아남은 지구, 마지막 희망이 된 어벤져스. 먼저 떠난 그들을 위해 모든 것을 걸었다! 위대한 어벤져스, 운명을 바꿀 최후의 전쟁이 펼쳐진다!', '어벤져스.png', 'https://www.youtube.com/embed/Ko2NWhXI9e8', 0, '2022-12-15 06:38:19', '2022-12-20 16:46:43'),
(28, '탄생', '사극', 6, 1, '1845년, 조선 근대의 문을 열다! 새로운 세상을 꿈꾼 청년 김대건의 위대한 모험  호기심 많고 말보다 행동이 앞서는 청년 김대건. 조선 최초의 신부가 되라는 운명을 기꺼이 받아들이고, 신학생 동기 최양업, 최방제와 함께 마카오 유학길에 나선다. 나라 안팎으로 외세의 침략이 계속되고 아편전쟁이 끝나지 않은 시기, 김대건은 바다와 육지를 종횡무진 누비며 마침내 조선 근대의 길을 열어젖힌다!', '탄생.jpg', 'https://www.youtube.com/embed/Rw-Vyft-56w', 0, '2022-12-15 06:39:25', '2022-12-17 07:59:47'),
(32, '영웅', '뮤지컬', 7, 3, '어머니 ‘조마리아’(나문희)와 가족들을 남겨둔 채  고향을 떠나온 대한제국 의병대장 ‘안중근’(정성화).    동지들과 함께 네 번째 손가락을 자르는 단지동맹으로  조국 독립의 결의를 다진 안중근은  조선 침략의 원흉인 ‘이토 히로부미’를  3년 내에 처단하지 못하면 자결하기로 피로 맹세한다.    그 약속을 지키기 위해 블라디보스토크를 찾은 안중근.  오랜 동지 ‘우덕순’(조재윤), 명사수 ‘조도선’(배정남), 독립군 막내 ‘유동하’(이현우),  독립군을 보살피는 동지 ‘마진주’(박진주)와 함께 거사를 준비한다.    한편 자신의 정체를 감춘 채 이토 히로부미에게 접근해  적진 한복판에서 목숨을 걸고 정보를 수집하던 독립군의 정보원 ‘설희’(김고은)는  이토 히로부미가 곧 러시아와의 회담을 위해  하얼빈을 찾는다는 일급 기밀을 다급히 전한다.    드디어 1909년 10월 26일,  이날만을 기다리던 안중근은  하얼빈역에 도착한 이토 히로부미를 향해  주저 없이 방아쇠를 당긴다.  현장에서 체포된 그는 전쟁 포로가 아닌 살인의 죄목으로,  조선이 아닌 일본 법정에 서게 되는데…    누가 죄인인가, 누가 영웅인가!', '영웅.jpg', 'https://www.youtube.com/embed/K4KR4J-yBMw', 1, '2022-12-17 09:10:57', '2022-12-17 09:12:08');

-- --------------------------------------------------------

--
-- 테이블 구조 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`, `created_at`, `updated_at`) VALUES
(1, '인관', '2022-12-15 06:15:16', '2022-12-20 16:45:10'),
(2, '덕관', '2022-12-20 16:45:15', '2022-12-20 16:45:15'),
(3, '은봉관', '2022-12-20 16:45:21', '2022-12-20 16:45:21');

-- --------------------------------------------------------

--
-- 테이블 구조 `runtimes`
--

CREATE TABLE `runtimes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `runtime` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `runtimes`
--

INSERT INTO `runtimes` (`id`, `runtime`, `created_at`, `updated_at`) VALUES
(8, '20:20', '2022-12-17 07:24:38', '2022-12-17 09:54:38'),
(9, '06:00', '2022-12-20 17:16:02', '2022-12-20 17:16:02'),
(10, '08:30', '2022-12-20 17:16:18', '2022-12-20 17:16:18'),
(11, '10:50', '2022-12-20 17:16:26', '2022-12-20 17:16:26'),
(12, '13:10', '2022-12-20 17:16:35', '2022-12-20 17:16:42'),
(13, '15:30', '2022-12-20 17:22:07', '2022-12-20 17:22:07'),
(14, '17:50', '2022-12-20 17:22:22', '2022-12-20 17:22:22'),
(15, '22:30', '2022-12-20 17:22:32', '2022-12-20 17:22:32');

-- --------------------------------------------------------

--
-- 테이블 구조 `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `run_date` date DEFAULT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `runtime_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `schedules`
--

INSERT INTO `schedules` (`id`, `run_date`, `movie_id`, `room_id`, `runtime_id`, `created_at`, `updated_at`) VALUES
(14, '2022-12-06', 26, 1, 9, '2022-12-21 00:01:33', '2022-12-21 00:01:33'),
(15, '2022-12-06', 26, 1, 9, '2022-12-21 00:02:20', '2022-12-21 00:02:20'),
(16, '2022-12-31', 27, 3, 15, '2022-12-21 00:03:19', '2022-12-21 00:03:19'),
(17, '2022-12-15', 9, 3, 10, '2022-12-21 00:05:23', '2022-12-21 00:05:23'),
(18, '2022-11-30', 26, 1, 9, '2022-12-21 00:05:46', '2022-12-21 00:05:46'),
(30, '2022-12-21', 26, 3, 11, '2022-12-21 00:46:53', '2022-12-21 00:46:53'),
(31, '2022-12-07', 27, 1, 9, '2022-12-21 01:11:49', '2022-12-21 01:11:49'),
(32, '2022-12-27', 9, 3, 12, '2022-12-21 01:30:32', '2022-12-21 01:30:32'),
(35, NULL, 9, 1, 14, '2022-12-21 01:40:41', '2022-12-21 01:40:41'),
(36, NULL, 28, 3, 14, '2022-12-21 02:00:56', '2022-12-21 02:00:56'),
(37, '2022-12-20', 16, 3, 10, '2022-12-21 02:02:52', '2022-12-21 02:02:52'),
(38, '2023-02-08', 7, 2, 14, '2023-01-05 20:04:03', '2023-01-05 20:04:03');

-- --------------------------------------------------------

--
-- 테이블 구조 `seats`
--

CREATE TABLE `seats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticketing_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat_info` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `stores`
--

INSERT INTO `stores` (`id`, `product`, `product_image`, `price`, `created_at`, `updated_at`) VALUES
(10, '아이스 아메리카노', 'ia.jpg', 4000, '2022-12-20 20:32:47', '2022-12-20 20:32:47'),
(11, '더블콤보', '32323.jpg', 13000, '2022-12-20 20:33:02', '2022-12-20 20:33:02'),
(12, '라지콤보', '33333.jpg', 15000, '2022-12-20 20:33:12', '2022-12-20 20:33:12'),
(13, '칠리치즈 핫도그', 'ch.jpg', 6500, '2022-12-20 20:33:30', '2022-12-20 20:33:30'),
(14, '플레인 핫도그', 'ph.jpg', 4000, '2022-12-20 20:33:56', '2022-12-20 20:33:56'),
(15, '콜라', 'cc.jpg', 3000, '2022-12-20 20:34:17', '2022-12-20 20:34:17');

-- --------------------------------------------------------

--
-- 테이블 구조 `ticketings`
--

CREATE TABLE `ticketings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `runtime_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `times`
--

CREATE TABLE `times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `runtime` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `trash`
--

CREATE TABLE `trash` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Genre_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Director_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actor_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Movie_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `trash1`
--

CREATE TABLE `trash1` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `director_id` int(11) DEFAULT NULL,
  `actor_id` int(11) DEFAULT NULL,
  `info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `movie_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `movie_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `ex_movies`
--
ALTER TABLE `ex_movies`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- 테이블의 인덱스 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- 테이블의 인덱스 `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- 테이블의 인덱스 `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `runtimes`
--
ALTER TABLE `runtimes`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `ticketings`
--
ALTER TABLE `ticketings`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `trash`
--
ALTER TABLE `trash`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `trash1`
--
ALTER TABLE `trash1`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `actors`
--
ALTER TABLE `actors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 테이블의 AUTO_INCREMENT `directors`
--
ALTER TABLE `directors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 테이블의 AUTO_INCREMENT `ex_movies`
--
ALTER TABLE `ex_movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 테이블의 AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- 테이블의 AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 테이블의 AUTO_INCREMENT `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- 테이블의 AUTO_INCREMENT `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 테이블의 AUTO_INCREMENT `runtimes`
--
ALTER TABLE `runtimes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 테이블의 AUTO_INCREMENT `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- 테이블의 AUTO_INCREMENT `seats`
--
ALTER TABLE `seats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 테이블의 AUTO_INCREMENT `ticketings`
--
ALTER TABLE `ticketings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `times`
--
ALTER TABLE `times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `trash`
--
ALTER TABLE `trash`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `trash1`
--
ALTER TABLE `trash1`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
