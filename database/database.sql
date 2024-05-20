/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     09/05/2024 9:21:43 CH                        */
/*==============================================================*/

create database WEB;
use WEB;
/*drop database web;
/*==============================================================*/
/* Table: CTDKPHONG                                             */
/*==============================================================*/
create table CTDKPHONG
(
   MANV                 char(4) not null  ,
   MAP                  char(4) not null   ,
   NOIDUNG              char(200)   ,
   primary key (MANV, MAP)
);

/*==============================================================*/
/* Table: NHANVIEN                                              */
/*==============================================================*/
create table NHANVIEN
(
   MANV                 char(4) not null   ,
   TENNV                char(150)   ,
   GIOITINH             char(10)   ,
   SDT                  char(20)   ,
   NGSINH               date   ,
   NGVL                 date   ,
   CHUCVU               char(30)   ,
   MANQL                char(4)   ,
   MAPB                 char(4) not null   ,
   primary key (MANV)
);

/*==============================================================*/
/* Table: PHONG                                                 */
/*==============================================================*/
create table PHONG
(
   MAP                  char(4) not null   ,
   TENP                 char(30)   ,
   TGMUON               char(50)   ,
   NGAY                 date   ,
   TINHTRANG            char(10)   ,
   primary key (MAP)
);

/*==============================================================*/
/* Table: PHONGBAN                                              */
/*==============================================================*/
create table PHONGBAN
(
   MAPB                 char(4) not null   ,
   TENPB                char(30)   ,
   primary key (MAPB)
);

/*==============================================================*/
/* Table: QUYDINH                                               */
/*==============================================================*/
create table QUYDINH
(
   MAQD                 char(4) not null   ,
   MANV                 char(4) not null   ,
   TENQD                char(50)   ,
   NOIDUNG              char(200)   ,
   DINHKEM              char(50)   ,
   NGAYDANG             date   ,
   primary key (MAQD)
);

/*==============================================================*/
/* Table: TAIKHOAN                                              */
/*==============================================================*/
create table TAIKHOAN
(
   MATK                 char(4) not null   ,
   MANV                 char(4) not null   ,
   TENDN                char(10)   ,
   MATKHAU              char(10)   ,
   primary key (MATK)
);

/*==============================================================*/
/* Table: THONGBAO                                              */
/*==============================================================*/
create table THONGBAO
(
   MATB                 char(4) not null   ,
   TENTB                char(200)   ,
   NOIDUNG              char(200)   ,
   DINHKEM              char(50)   ,
   NGDANG               date   ,
   MANV                 char(4) not null   ,
   primary key (MATB)
);

/*==============================================================*/
/* Table: YEUCAU                                                */
/*==============================================================*/
create table YEUCAU
(
   MAYC                 char(4) not null   ,
   LOAIYC               char(50)   ,
   NOIDUNG              char(200)   ,
   NGTAO                date   ,
   TRANGTHAI            char(40)   ,
   MANV                 char(4) not null   ,
   primary key (MAYC)
);

alter table CTDKPHONG add constraint FK_CTDKPHON_DANGKY_NHANVIEN foreign key (MANV)
      references NHANVIEN (MANV) on delete restrict on update restrict;

alter table CTDKPHONG add constraint FK_CTDKPHON_DANGKY2_PHONG foreign key (MAP)
      references PHONG (MAP) on delete restrict on update restrict;

alter table NHANVIEN add constraint FK_NHANVIEN_LAMVIEC_PHONGBAN foreign key (MAPB)
      references PHONGBAN (MAPB) on delete restrict on update restrict;

alter table NHANVIEN add constraint FK_NHANVIEN_LANGUOIQU_NHANVIEN foreign key (MANQL)
      references NHANVIEN (MANV) on delete restrict on update restrict;

alter table QUYDINH add constraint FK_QUYDINH_GUI_NHANVIEN foreign key (MANV)
      references NHANVIEN (MANV) on delete restrict on update restrict;

alter table TAIKHOAN add constraint FK_TAIKHOAN_CO2_NHANVIEN foreign key (MANV)
      references NHANVIEN (MANV) on delete restrict on update restrict;

alter table THONGBAO add constraint FK_THONGBAO_DANG_NHANVIEN foreign key (MANV)
      references NHANVIEN (MANV) on delete restrict on update restrict;

alter table YEUCAU add constraint FK_YEUCAU_TAO_NHANVIEN foreign key (MANV)
      references NHANVIEN (MANV) on delete restrict on update restrict;


/*==============================================================*/
/* Insert dữ liệu                                               */
/*==============================================================*/

/*PHONG BAN*/
INSERT INTO PHONGBAN VALUES ('PB01','Nhân sự');
INSERT INTO PHONGBAN VALUES ('PB02','Tài chính');
INSERT INTO PHONGBAN VALUES ('PB03','Marketing');
INSERT INTO PHONGBAN VALUES ('PB04','Kế toán');
INSERT INTO PHONGBAN VALUES ('PB05','Kinh doanh');
INSERT INTO PHONGBAN VALUES ('PB06','Ban giám đốc');

select*from nhanvien;
/*NHAN VIEN*/
INSERT INTO NHANVIEN VALUES ('NV11','Trần Kim Hùng','Nam','0876560423','1993-07-16','2018-03-26','Giám Đốc',NULL,'PB06');
INSERT INTO NHANVIEN VALUES ('NV01','Năng Tiến Thành','Nam','0882345134','1990-07-20','2016-04-23','Trưởng phòng','NV11','PB01');
INSERT INTO NHANVIEN VALUES ('NV02','Trần Thị Kiều Oanh','Nữ','0908256478','1990-06-10','2018-10-12','Trưởng phòng','NV11','PB02');
INSERT INTO NHANVIEN VALUES ('NV03','Lê Nguyễn Diễm Quyên','Nữ','0938776266','1991-08-27','2017-01-24','Trưởng phòng','NV11','PB03');
INSERT INTO NHANVIEN VALUES ('NV04','Hoàng Trịnh Anh Khoa','Nam','0917325476','1990-07-23','2016-09-21','Trưởng phòng','NV11','PB04');
INSERT INTO NHANVIEN VALUES ('NV05','Lê Ngọc Hương','Nữ','0824610845','1994-01-05','2017-09-20','Nhân viên','NV01','PB01');
INSERT INTO NHANVIEN VALUES ('NV06','Hoàng Lê Anh','Nữ','0863173845','1991-12-02','2016-10-18','Nhân viên','NV02','PB02');
INSERT INTO NHANVIEN VALUES ('NV07','Trần Văn Tú','Nam','0916783565','1994-10-27','2016-06-09','Nhân viên','NV03','PB03');
INSERT INTO NHANVIEN VALUES ('NV08','Nguyễn Trúc Lâm','Nam','0938435756','1992-05-17','2017-10-03','Trưởng phòng','NV11','PB04');
INSERT INTO NHANVIEN VALUES ('NV09','Huỳnh Đăng Khoa','Nam','0865476312','1994-08-19','2016-04-21','Phó trưởng phòng','NV01','PB01');
INSERT INTO NHANVIEN VALUES ('NV10','Trần Thị Nhu','Nữ','0876890423','1990-09-24','2018-08-20','Thư ký','NV02','PB02');

/*PHONG*/
INSERT INTO PHONG VALUES ('P001','A1.1','8h00 - 11h30','2024-05-16','Empty');
INSERT INTO PHONG VALUES ('P002','A1.2','14h00 - 16h30','2024-05-18','Full');
INSERT INTO PHONG VALUES ('P003','A1.3','8h00 - 11h30','2024-05-23','Empty');
INSERT INTO PHONG VALUES ('P004','A1.4','14h00 - 16h30','2024-07-19','Full');
INSERT INTO PHONG VALUES ('P005','A1.5','8h00 - 11h30','2024-05-18','Empty');
INSERT INTO PHONG VALUES ('P006','A1.6','14h00 - 16h30','2024-07-27','Full');
INSERT INTO PHONG VALUES ('P007','A1.7','8h00 - 11h30','2024-05-26','Empty');
INSERT INTO PHONG VALUES ('P008','A1.8','14h00 - 16h30','2024-07-28','Full');
INSERT INTO PHONG VALUES ('P009','A1.9','8h00 - 11h30','2024-05-20','Empty');
INSERT INTO PHONG VALUES ('P010','A1.10','14h00 - 16h30','2024-07-25','Full');

/*THONG BAO*/
INSERT INTO THONGBAO VALUES ('TB01','Thông báo nghỉ lễ 30/4 và 1/5','Nghỉ lễ 30/4 và 1/5 từ ngày 29/4 đến 2/5.',NULL,'2024-05-03','NV01');
INSERT INTO THONGBAO VALUES ('TB02','Thông báo tổ chức hoạt động thể dục thể thao chào mừng ngày giỗ tổ Hùng Vương 10/3 âm lịch','Tổ chức hoạt động thể dục thể thao chào mừng ngày giỗ tổ Hùng Vương 10/3 âm lịch.',NULL,'2024-03-14','NV02');
INSERT INTO THONGBAO VALUES ('TB03','Thông báo nhắc nhở tăng cường an ninh trong công ty ','tăng cường an ninh trong công ty, đề cao cảnh giác.',NULL,'2024-06-04','NV03');
INSERT INTO THONGBAO VALUES ('TB04','Thông báo tăng lương đợt 2','Tăng lượng đợt 2.',NULL,'2023-06-28','NV04');
INSERT INTO THONGBAO VALUES ('TB05','Danh sách nhân viên được tăng lương đợt 1','Tăng lượng đợt 1.',NULL,'2023-04-19','NV05');
INSERT INTO THONGBAO VALUES ('TB06','Thông báo bổ nhiệm trưởng phòng mới của phòng Nhân sự','Trưởng phòng mới.',NULL,'2023-01-12','NV06');

/*QUY DINH*/
INSERT INTO QUYDINH VALUES ('QD01','NV11','Quy định về đồng phục đi làm','Đồng phục.',NULL,'2017-02-06');
INSERT INTO QUYDINH VALUES ('QD02','NV11','Quy định định cho trưởng phòng','Trưởng phòng.',NULL,'2017-02-01');
INSERT INTO QUYDINH VALUES ('QD03','NV11','Quy định cho nhân viên','Nhân viên.',NULL,'2017-04-03');
INSERT INTO QUYDINH VALUES ('QD04','NV11','Quy định về nội quy công ty','Nội quy công ty.',NULL,'2017-05-17');
INSERT INTO QUYDINH VALUES ('QD05','NV11','Quy định về chấm công','Chấm công.',NULL,'2017-02-14');


/*YEU CAU*/
INSERT INTO YEUCAU VALUES ('YC01','Xin nghỉ','Xin nghỉ phép ngày 3/12/2023.','2023-06-26','Đang xử lý','NV05');
INSERT INTO YEUCAU VALUES ('YC02','Chuyển phòng ban','Xin chuyển sang làm ở phòng marketing.','2023-03-27','Chấp nhận','NV06');
INSERT INTO YEUCAU VALUES ('YC03','Xét tăng lương','Xin tăng lương cho đợt xét sắp tới.','2023-02-15','Không chấp nhận','NV07');
INSERT INTO YEUCAU VALUES ('YC04','Hỗ trợ kỹ thuật','Sửa máy tính tại văn phòng kế toán.','2023-06-05','Đang xử lý','NV08');
INSERT INTO YEUCAU VALUES ('YC05','Mua sắm thiết bị','Mua thêm máy in cho phòng nhân sự.','2023-05-26','Chấp nhận','NV09');
INSERT INTO YEUCAU VALUES ('YC06','Khác','Xin hỗ trợ ngân sách.','2023-05-26','Không chấp nhận','NV10');

/*CTDKPHONG*/
INSERT INTO CTDKPHONG VALUES ('NV01','P001','Họp phòng Nhân sự');
INSERT INTO CTDKPHONG VALUES ('NV02','P002','Họp phòng Tài chính');
INSERT INTO CTDKPHONG VALUES ('NV03','P003','Họp phòng Marketing');
INSERT INTO CTDKPHONG VALUES ('NV04','P004','Họp phòng kế toán');
INSERT INTO CTDKPHONG VALUES ('NV02','P005','Họp đối tác');
INSERT INTO CTDKPHONG VALUES ('NV03','P006','Họp đối tác');
INSERT INTO CTDKPHONG VALUES ('NV04','P007','Họp phòng kế toán');
INSERT INTO CTDKPHONG VALUES ('NV01','P008','Họp phòng nhân sự');
INSERT INTO CTDKPHONG VALUES ('NV05','P009','Họp bàn giao công việc');
INSERT INTO CTDKPHONG VALUES ('NV06','P010','Họp bàn giao công việc');

/*TAIKHOAN*/
INSERT INTO TAIKHOAN VALUES ('TK01','NV01','nhanvien01','42044');
INSERT INTO TAIKHOAN VALUES ('TK02','NV02','nhanvien02','60557');
INSERT INTO TAIKHOAN VALUES ('TK03','NV03','nhanvien03','14715');
INSERT INTO TAIKHOAN VALUES ('TK04','NV04','nhanvien04','91806');
INSERT INTO TAIKHOAN VALUES ('TK05','NV05','nhanvien05','43125');
INSERT INTO TAIKHOAN VALUES ('TK06','NV06','nhanvien06','42250');
INSERT INTO TAIKHOAN VALUES ('TK07','NV07','nhanvien07','72661');
INSERT INTO TAIKHOAN VALUES ('TK08','NV08','nhanvien08','94591');
INSERT INTO TAIKHOAN VALUES ('TK09','NV09','nhanvien09','36057');
INSERT INTO TAIKHOAN VALUES ('TK10','NV10','nhanvien10','33274');
INSERT INTO TAIKHOAN VALUES ('TK11','NV11','nhanvien11','47017');


/*---------------------------------------------
select*from phongban;
select*from nhanvien;
select*from yeucau;
select*from thongbao;
select*from quydinh;
select*from phong;
select*from taikhoan;
---------------------------------------------*/