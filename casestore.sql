-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th1 01, 2024 lúc 11:37 AM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `casestore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

DROP TABLE IF EXISTS `chitietdonhang`;
CREATE TABLE IF NOT EXISTS `chitietdonhang` (
  `product_id` int NOT NULL,
  `dh_id` int NOT NULL,
  `soluong` int NOT NULL,
  `tongtien` int NOT NULL,
  PRIMARY KEY (`product_id`,`dh_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

DROP TABLE IF EXISTS `danhmuc`;
CREATE TABLE IF NOT EXISTS `danhmuc` (
  `id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `NSP_id` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `NSP_id` (`NSP_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`, `NSP_id`) VALUES
('ip6', 'iphone 6', 'ip'),
('ip11pro', 'iphone 11 pro', 'ip'),
('ssZF5', 'Samsung Galaxy Z Fold 5 G', 'ss'),
('ssA54', 'Samsung Galaxy A54', 'ss'),
('ip15promax', 'iphone15 Promax', 'ip'),
('ipXsmax', 'iphoneXs Max', 'ip'),
('ssS23', 'Samssung Galaxy S23 FE ', 'ss'),
('opFN3', 'OPPO Find N3', 'op'),
('opFX5pro', 'OPPO Find X5 Pro', 'op'),
('opR105G', 'OPPO Reno 10 5G', 'op'),
('opR7Z5G', 'OPPO Reno 7Z 5G', 'op'),
('xiMiA', 'Xiaomi Mi A', 'xi'),
('xiN', 'Xiaomi Note', 'xi'),
('xiR', 'Xiaomi Readmi', 'xi'),
('viV25P', 'Vivo V25 pro', 'vi'),
('viY35', 'Vivo Y35', 'vi'),
('viXN', 'Vivo X Note', 'vi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE IF NOT EXISTS `donhang` (
  `dh_id` int NOT NULL AUTO_INCREMENT,
  `ngaydathang` date NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `ngaygiaohang` date NOT NULL,
  `tinhtranggiaohang` tinyint(1) NOT NULL,
  `tinhtrangthanhtoan` tinyint(1) NOT NULL,
  `email_KH` varchar(50) NOT NULL,
  PRIMARY KEY (`dh_id`),
  KEY `email_KH` (`email_KH`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE IF NOT EXISTS `khachhang` (
  `tendangnhap` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `email_KH` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tenkh` varchar(50) NOT NULL,
  `namsinh` int NOT NULL,
  `gioitinh` tinyint(1) NOT NULL,
  `sdt` int NOT NULL,
  `diachi` varchar(50) NOT NULL,
  PRIMARY KEY (`email_KH`),
  UNIQUE KEY `tendangnhap` (`tendangnhap`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`tendangnhap`, `matkhau`, `email_KH`, `tenkh`, `namsinh`, `gioitinh`, `sdt`, `diachi`) VALUES
('nguyenlinh', '123', 'tramphamtl3@gmail.com', 'Nguyễn Kiều Linh', 0, 1, 908936507, 'TP. Hồ Chí Minh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomsanpham`
--

DROP TABLE IF EXISTS `nhomsanpham`;
CREATE TABLE IF NOT EXISTS `nhomsanpham` (
  `id` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `nhomsanpham`
--

INSERT INTO `nhomsanpham` (`id`, `name`) VALUES
('ip', 'Iphone'),
('ss', 'Samsung'),
('op', 'OPPO'),
('xi', 'Xiaomi'),
('vi', 'Vivo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hinhAnh` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Gia` int NOT NULL,
  `xuatXu` varchar(50) NOT NULL,
  `moTa` text NOT NULL,
  `tonkho` int NOT NULL,
  `danhmuc_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dm_id` (`danhmuc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `hinhAnh`, `Gia`, `xuatXu`, `moTa`, `tonkho`, `danhmuc_id`) VALUES
(2, 'Ốp lưng One Piece', 'h2.jpg', 35000, 'Việt Nam', 'Ốp lưng dành cho điện thoại, di động mềm hoạt hình thời trangCamera ốp là camera thế hệ mới với camera chia từng lỗ nhỏ đảm bảo bảo vệ máy hoàn hảo không cần dán thêm cường lực camera nếu dùng này ạỐp có lỗ móc dây đeo cổBảo vệ hoàn hảo di động/điện thoại của bạn', 55, 'ip11pro'),
(7, 'Ốp lưng Jujutsu Kaisen Anime', 'ssa54.jpg', 45000, 'Việt Nam', 'This case provides a protective yet stylish shield to your Samsung Galaxy A54 5G from accidental drops and scratches. Available in 2D TPU Rubber case (black color), Clear Soft Case.\r\n\r\n2D TPU Rubber case (black color) case provides good protection from impacts and drops. It has high flexibility and also fully cover to all buttons.\r\nClear soft case provides protection with good feels in hand touch. With slim and lightweight profile, make sure you will get good experience in your hand.\r\nImage printouts guaranteed good quality and sharp colors.\r\nEasy access to all buttons, functions, and ports.', 7, 'ssA54'),
(3, 'Ốp lưng trong hình hoa dễ thương', 'sss20.jpg', 50000, 'Trung Quốc', 'Hoàn toàn phù hợp với điện thoại của bạn - ốp bảo vệ máy của bạn\r\nSự khác biệt giữa nhiều màn hình, hình ảnh có thể không thể phản ánh màu sắc thực tế của sản phẩm.', 11, 'ssS23'),
(4, 'Ốp lưng vịt vàng dễ thương', 'vit_vang_de_thuong.jpg', 55000, 'Trung Quốc', '', 19, 'ip15promax'),
(5, 'Ốp lưng đơn giản sang trọng', 'jfold5.jpg', 30000, 'Việt Nam', '[Được xây dựng trong chân Chống từ tính] phong cách khó khăn Galaxy Z gấp 5 chân đế trường hợp có ngang và điều chỉnh góc nhìn, giúp tay-miễn phí cho xem, cuộc họp, học tập, vv\r\n[Slim & phong cách hồ sơ] làm bằng vật liệu mạ PC cao cấp và da PU vân sần sang trọng với sơn thân thiện với da cho một liên lạc tinh tế. Thiết kế mỏng và nhẹ, cảm giác tuyệt vời, cảm cảm ứng hoàn hảo thoải mái, chống trơn trượt và thân thiện với da', 2, 'ssZF5'),
(6, 'Ốp lưng hình kem đáng iu\r\n\r\n', 'reno7z.jpg', 45000, 'Việt Nam', 'Ốp lưng dành cho điện thoại, di động mềm hoạt hình thời trang\r\nCamera ốp là camera thế hệ mới với camera chia từng lỗ nhỏ đảm bảo bảo vệ máy hoàn hảo không cần dán thêm cường lực camera nếu dùng này ạ\r\nỐp có lỗ móc dây đeo cổ\r\nBảo vệ hoàn hảo di động/điện thoại của bạn', 874, 'ipXsmax'),
(8, 'Ốp Điện Thoại Pc Cứng Siêu Mỏng ', 'opfn3.jpg', 40000, 'Trung Quốc', '100% thương hiệu mới và chất lượng cao.\r\nỐp lưng siêu mỏng siêu nhẹ siêu mỏng.\r\nDễ dàng cài đặt và gỡ cài đặt.\r\nBảo vệ điện thoại của bạn khỏi trầy xước, va đập, vô tình làm rơi và va chạm.\r\nĐược thiết kế chính xác bao gồm các đường cắt tùy chỉnh để vừa vặn với Điện thoại của bạn một cách hoàn hảo.\r\nDễ dàng truy cập vào tất cả các nút, điều khiển và cổng mà không cần phải tháo vỏ.\r\nChất liệu: Nhựa cứng.\r\nNó rất dễ sử dụng, trọng lượng nhẹ, kết cấu và đường khâu trang nhã.\r\nChỉ Phụ kiện, điện thoại di động không được bao gồm.\r\nNhiều mẫu mã và phụ kiện khác, vui lòng tìm kiếm trong cửa hàng của chúng tôi.', 2893, 'opFN3'),
(22, 'Ốp lưng hình vịt ngáo ngơ', 'vitngaongo.jpg', 45000, 'Việt Nam', 'Chất liệu TPU đúc nguyên khối mềm mịn siêu bền. Viền ốp được thiết kế vuông mới lạ và cho cảm giác cầm chắc chắn. Mặt trước được làm nhô cao hơn một chút so với màn hình giúp bảo vệ màn hình tốt hơn khi rơi hoặc va đập. Mặt sau có gờ bảo vệ chống trày xước cho camera', 10, 'opFX5pro'),
(23, 'Ốp lưng mặt kính ngộ nghĩnh', 'reno.jpg', 50000, 'Việt Nam', 'Chất liệu : Silicon mềm bảo vệ toàn bộ các góc máy, Mặt lưng kính cường lực cao cấp sáng bóng .Ốp lưng ôm vừa khít điện thoại của bạn. Bảo vệ môi trường , thiết kế thời trang. Được sản xuất dựa trên khuôn điện thoại thực tế, thiết kế truy cập hoàn hảo cho các tính năng điện thoại như loa, nút bấm, máy ảnh và cổng dữ liệu, vv. Cho phép điện thoại vận hành một cách tiện lợi nhất. Bảo vệ điện thoại khỏi những vết trầy, bụi và tác động', 100, 'opR105G'),
(24, 'Ốp lưng vịt vô tri', 'sam_sung_a12.jpg', 75000, 'Trung Quốc', 'Vật liệu TPU được sử dụng trong trường hợp này cung cấp tính năng chống sốc giúp bảo vệ điện thoại của bạn khỏi những hư hỏng do tai nạn do rơi và va đập . Nó cũng có khả năng chống bụi. giữ cho điện thoại của bạn không tì vết và sạch sẽ . Thêm vào đó , chất liệu silicon mềm mại khi chạm vào , giúp bạn dễ dàng cầm nắm và cầm nắm .Thêm vào đó , với các đường cắt chính xác và nắp nút , bạn không bao giờ phải lo lắng về việc chặn bất kỳ cổng nào hoặc cản trở bất kỳ chức năng nào .', 10, 'opR7Z5G'),
(25, 'Ốp lưng mùa hè', 'xiaomimi.jpg', 30000, 'Việt Nam', 'Dễ thương, Có hoa văn, Hoạt hình, Hoa, Động vật, TPU mềm chất lượng cao, Vỏ silicon siêu mỏng 100% thương hiệu mới & chất lượng cao. Chất liệu: Silicone cao cấp TPU mềm. Thời trang dễ thương 20 mẫu. Thiết kế linh hoạt, thêm họa tiết, tạo cảm giác thoải mái, bảo vệ điện thoại. Hoàn toàn phù hợp với điện thoại của bạn và dễ dàng đeo vào và dễ dàng tháo ra. Ultra Slim + Bảo vệ Camera + Bảo vệ chống trầy xước. Bảo vệ điện thoại của bạn khỏi bụi bẩn, trầy xước và rơi rớt.', 50, 'xiMiA'),
(26, 'Ốp lưng hình năng động', 'xiaominote.jpg', 45000, 'Việt Nam', 'Thân ốp bằng silicon dẻo cực kì bền bỉ. Mặt sau được in bằng công nghệ 3D chống bay. Ốp bo sát máy tạo cảm giác cầm nắm cực kì chắc chắn. Mặt sau bóng tạo cảm giác sang trọng cho người sử dụng', 30, 'xiN'),
(27, 'Ốp lưng kính cường lực cao cấp', 'hanhtinhden.jpg', 65000, 'Việt Nam', 'Chất liệu : Silicon mềm bảo vệ toàn bộ các góc máy, Mặt lưng kính cường lực cao cấp sáng bóng .Ốp lưng ôm vừa khít điện thoại của bạn. Bảo vệ môi trường , thiết kế thời trang. Được sản xuất dựa trên khuôn điện thoại thực tế, thiết kế truy cập hoàn hảo cho các tính năng điện thoại như loa, nút bấm, máy ảnh và cổng dữ liệu, vv. Cho phép điện thoại vận hành một cách tiện lợi nhất. Bảo vệ điện thoại khỏi những vết trầy, bụi và tác động', 500, 'viV25P'),
(28, 'Ốp lưng hình gấu vũ trụ', 'gauvutru.jpg', 45000, 'Việt Nam', 'Vật liệu TPU được sử dụng trong trường hợp này cung cấp tính năng chống sốc giúp bảo vệ điện thoại của bạn khỏi những hư hỏng do tai nạn do rơi và va đập . Nó cũng có khả năng chống bụi. giữ cho điện thoại của bạn không tì vết và sạch sẽ . Thêm vào đó , chất liệu silicon mềm mại khi chạm vào , giúp bạn dễ dàng cầm nắm và cầm nắm .Thêm vào đó , với các đường cắt chính xác và nắp nút , bạn không bao giờ phải lo lắng về việc chặn bất kỳ cổng nào hoặc cản trở bất kỳ chức năng nào .', 100, '	\r\nxiR'),
(29, 'Ốp lưng kiểu máy ảnh', 'mayanh.jpg', 70000, 'Việt Nam', 'Dây buộc có thể tháo rời / lắp vào được. 1 vỏ điện thoại + 1 * Dây đeo chéo. Đã nâng cấp mới, được bao phủ hoàn toàn, 360°Chống va đập, chống bụi bẩn. Chức năng: Vỏ điện thoại đa chức năng (Khe cắm thẻ + dây chéo + Giá đỡ vòng ngón tay). Đặc trưng: Bảo vệ lưng Chống va đập + Chống xước + Chống trượt + Chống rơi', 100, 'viY35'),
(30, 'Ốp lưng chống sốc', 'chongsoc.jpg', 80000, 'Trung Quốc', 'Chất lượng tốt không vỡ, không hỏng bền bỉ với thời gian. Ốp mầu nhám, không bị ố vàng, rất sạch sẽ trong quá trình sử dụng. Lưng ốp bọc vải Jean vừa thời trang, sành điệu lại cực bám tay, ko trơn trượt và rất bền màu. Bảo vệ điện thoại tốt nhất, bao toàn bộ 4 cạnh điện thoại, phần viền ốp cao hơn màn hình, bảo vệ màn hình khi rơi. Bảo vệ máy lâu dài như 1 năm khi bỏ ốp silicon ra máy vẫn hoàn toàn như mới không xước xát … thậm chí không bong tróc cạnh viền kể cả bạn có làm rơi hay va đập trong quá trình sử dụng. Ốp mềm đặc biệt phù hợp với các bạn có thói quen dùng máy thoải mái, quăng quật hoặc có con, cháu nhỏ. Với thiết kế và chất liệu mới nhằm khắc phục các nhược điểm các loại ốp trước đây.', 100, 'viXN');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

DROP TABLE IF EXISTS `taikhoan`;
CREATE TABLE IF NOT EXISTS `taikhoan` (
  `taikhoan_id` int NOT NULL AUTO_INCREMENT,
  `tendangnhap` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `namsinh` int NOT NULL,
  `gioitinh` tinyint(1) NOT NULL,
  `sdt` int NOT NULL,
  `quyen` varchar(20) NOT NULL,
  PRIMARY KEY (`taikhoan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`taikhoan_id`, `tendangnhap`, `matkhau`, `email`, `hoten`, `namsinh`, `gioitinh`, `sdt`, `quyen`) VALUES
(1, 'admin', '123', 'tramphamtl#@gmail.com', 'Phạm Ngọc Quế Trâm', 2002, 1, 829939519, '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhtoan`
--

DROP TABLE IF EXISTS `thanhtoan`;
CREATE TABLE IF NOT EXISTS `thanhtoan` (
  `thanhtoan_id` int NOT NULL AUTO_INCREMENT,
  `dh_id` int NOT NULL,
  `email_KH` varchar(50) NOT NULL,
  `ngaythanhtoan` date NOT NULL,
  `sotien` int NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  PRIMARY KEY (`thanhtoan_id`),
  KEY `dh_id` (`dh_id`),
  KEY `email_KH` (`email_KH`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
