CREATE TABLE DISCGOLF_CLUB (
CLUB_ID             INTEGER NOT NULL,
CLUB_NAME           VARCHAR(25),
TELEPHONENR         INTEGER,
STREET              VARCHAR(25),
CITY                VARCHAR(20),
HOUSE_NR            INTEGER,
POSTALCODE          INTEGER);

CREATE TABLE HAVE (
SPONSOR_ID          INTEGER NOT NULL,
CLUB_ID             INTEGER NOT NULL);

CREATE TABLE SPONSOR (
SPONSOR_ID          INTEGER NOT NULL,
SPONSOR_NAME        VARCHAR(20),
TELEPHONE_NR        INTEGER,
AMOUNT              INTEGER);

CREATE TABLE CONSISTS_OF (
BOARD_MEMBER_ID     INTEGER NOT NULL,
CLUB_ID             INTEGER NOT NULL);

CREATE TABLE BOARD_MEMBER (
BOARD_MEMBER_ID     INTEGER NOT NULL,
FIRST_NAME          VARCHAR(12),
LAST_NAME           VARCHAR(15),
TELEPHONE_NR        INTEGER);

CREATE TABLE MEMBER (
MEMBER_ID           INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
CLUB_ID             INTEGER NOT NULL,
RATING              INTEGER,
FIRST_NAME          VARCHAR(12),
LAST_NAME           VARCHAR(15),
EMAIL               VARCHAR(25));

CREATE TABLE PLAYING (
MEMBER_ID           INTEGER NOT NULL,
COMPETITION_ID      INTEGER NOT NULL,
PLACEMENT           INTEGER);

CREATE TABLE COMPETITION (
COMPETITION_ID      INTEGER NOT NULL,
COURSE_ID           INTEGER NOT NULL,
REGISTER_DATE       DATE,
COMPETITION_DATE    DATE);

CREATE TABLE COURSE (
COURSE_ID           INTEGER NOT NULL,
COURSE_NAME         VARCHAR(25),
STREET              VARCHAR(25),
CITY                VARCHAR(20),
HOUSE_NR            INTEGER,
POSTALCODE          INTEGER);