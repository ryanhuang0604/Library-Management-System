drop database library;
create database library;
use library;

CREATE TABLE USER_BORROWER (
ID int(10) unsigned NOT NULL auto_increment,
NAME varchar(32) NOT NULL, 
EMAIL varchar(255) NOT NULL, 
PASSWORD varchar(255) NOT NULL, 
PRIMARY KEY (ID) 
); 

CREATE TABLE USER_EMPLOYEE (
ID int(10) unsigned NOT NULL auto_increment,
NAME varchar(32) NOT NULL, 
EMAIL varchar(255) NOT NULL, 
PASSWORD varchar(255) NOT NULL, 
PRIMARY KEY (ID) 
); 

CREATE TABLE STUDENT (
STU_ID VARCHAR(10) NOT NULL UNIQUE,
STU_FNAME VARCHAR(10) NOT NULL, 
STU_LNAME VARCHAR(10) NOT NULL, 
UNIV_NAME VARCHAR(10) NOT NULL,
STU_DEPT VARCHAR(10) NOT NULL,
STU_EMAIL VARCHAR(10) NOT NULL,
PRIMARY KEY (STU_ID));
INSERT INTO STUDENT VALUES ('0510001', '小衫', '黃', '交大', '工工', 'a1@gmail.com');

CREATE TABLE FACULTY (
FAC_ID VARCHAR(10) NOT NULL UNIQUE,
FAC_FNAME VARCHAR(10) NOT NULL,
FAC_LNAME VARCHAR(10) NOT NULL,
UNIV_NAME VARCHAR(10) NOT NULL,
FAC_DEPT VARCHAR(10) NOT NULL,
FAC_EMAIL VARCHAR(10) NOT NULL,
FAC_IsLIBEMP CHAR(1) NOT NULL,
PRIMARY KEY (FAC_ID));
INSERT INTO FACULTY VALUES ('0510002', '大雄', '陳', '交大', '工工', 'b2@gmail.com', 'Y');
INSERT INTO FACULTY VALUES ('0510003', '小夫', '黃', '交大', '工工', 'c3@gmail.com', 'N');

CREATE TABLE LIBRARY_BRANCH (
BNH_ID VARCHAR(10) NOT NULL UNIQUE,
BNH_NAME VARCHAR(10) NOT NULL,
BNH_ADDRESS VARCHAR(10) NOT NULL,
UNIV_NAME VARCHAR(10) NOT NULL,
PRIMARY KEY (BNH_ID));
INSERT INTO LIBRARY_BRANCH VALUES ('1', '交大分館', '大學路', '交大');
INSERT INTO LIBRARY_BRANCH VALUES ('2', '清大分館', '光復路', '清大');

CREATE TABLE LIB_EMPLOYEE (
FAC_ID VARCHAR(10) NOT NULL UNIQUE,
BNH_ID VARCHAR(10) NOT NULL,
PRIMARY KEY (FAC_ID),
FOREIGN KEY (FAC_ID) REFERENCES FACULTY(FAC_ID),
FOREIGN KEY (BNH_ID) REFERENCES LIBRARY_BRANCH(BNH_ID));
INSERT INTO LIB_EMPLOYEE VALUES ('0510001', '1');

CREATE TABLE BOOK_COPY (
BOOK_ISBN VARCHAR(10) NOT NULL,
BNH_ID VARCHAR(10) NOT NULL,
COPY_NUM VARCHAR(10) NOT NULL,
PRIMARY KEY (BOOK_ISBN,BNH_ID),
FOREIGN KEY (BNH_ID) REFERENCES LIBRARY_BRANCH(BNH_ID));
INSERT INTO BOOK_COPY VALUES ('1230000', '1', '1');
INSERT INTO BOOK_COPY VALUES ('4560000', '2', '2');
INSERT INTO BOOK_COPY VALUES ('7890000', '1', '3');

CREATE TABLE BOOK (
BOOK_ID VARCHAR(10) NOT NULL UNIQUE,
BOOK_NAME VARCHAR(10) NOT NULL,
BOOK_AUTHOR VARCHAR(10) NOT NULL,
BOOK_PUBLISHER VARCHAR(10) NOT NULL,
BOOK_ISBN VARCHAR(10) NOT NULL,
BOOK_CALL_NUM VARCHAR(10) NOT NULL,
BNH_ID VARCHAR(10) NOT NULL,
IS_APPOINTMENT VARCHAR(1) NOT NULL,
PRIMARY KEY (BOOK_ID),
FOREIGN KEY (BOOK_ISBN) REFERENCES BOOK_COPY(BOOK_ISBN),
FOREIGN KEY (BNH_ID) REFERENCES LIBRARY_BRANCH(BNH_ID));
INSERT INTO BOOK VALUES ('01001', '資料庫', '劉', '交大出版社', '1230000', '469.5 2712', '1', 'N');
INSERT INTO BOOK VALUES ('01002', '程式設計', '陳', '交大出版社', '4560000', '469.5 2732', '2', 'N');
INSERT INTO BOOK VALUES ('01003', '經濟學', '王', '交大出版社', '7890000', '469.5 2722', '1', 'N');

CREATE TABLE BORROWER (
BORROWER_ID VARCHAR(10) NOT NULL UNIQUE,
STU_ID VARCHAR(10),
#FAC_ID VARCHAR(10),
#BORROW_DATE DATE NOT NULL,
BORROW_NUM VARCHAR(10) NOT NULL,
PRIMARY KEY (BORROWER_ID),
FOREIGN KEY (STU_ID) REFERENCES STUDENT(STU_ID));
#FOREIGN KEY (FAC_ID) REFERENCES FACULTY(FAC_ID));
INSERT INTO BORROWER VALUES ('100', '0510002', '1');

CREATE TABLE BORROW_RECORD (
BORROWER_ID VARCHAR(10) NOT NULL,
BOOK_ID VARCHAR(10) NOT NULL,
LEND_DATE DATE NOT NULL,
RETURN_DATE DATE NOT NULL,
IS_FINED VARCHAR(1) NOT NULL,
PRIMARY KEY (BORROWER_ID,BOOK_ID),
FOREIGN KEY (BORROWER_ID) REFERENCES BORROWER(BORROWER_ID),
FOREIGN KEY (BOOK_ID) REFERENCES BOOK(BOOK_ID));
INSERT INTO BORROW_RECORD VALUES ('100', '01001', '2019-06-18', '2019-06-19', 'N');
INSERT INTO BORROW_RECORD VALUES ('100', '01002', '2019-06-18', '2019-06-30', 'N');

CREATE TABLE FINE (
BORROWER_ID VARCHAR(10) NOT NULL UNIQUE,
BOOK_ID VARCHAR(10) NOT NULL UNIQUE,
DUE_DATE DATE NOT NULL,
RETURN_DATE DATE NOT NULL,
DELAY_DAYS VARCHAR(10) NOT NULL,
FINE_TOTAL VARCHAR(10) NOT NULL,
PRIMARY KEY (BORROWER_ID,BOOK_ID),
FOREIGN KEY (BORROWER_ID) REFERENCES BORROWER(BORROWER_ID),
FOREIGN KEY (BOOK_ID) REFERENCES BOOK(BOOK_ID));