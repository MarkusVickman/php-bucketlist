
--TESTDATAN I FORM AV FRÅGOR
--TEST SOM FÖRVÄNTAS ATT MISSLYCKAS

--Testar att uppdatera medlem med ett nytt ID. Det går inte eftersom att foreign key inte har "ON UPDATE CASCADE".
UPDATE MEMBER SET MEMBER_ID = 32 WHERE MEMBER_ID = 2;

--Testar att tabort en ledamot. Det går ej eftersom ledamoten kopplad till en klubb och inte han "ON DELETE CASCADE".
DELETE FROM BOARD_MEMBER WHERE BOARD_MEMBER_ID = 18;

--Testar att lägga in en stäng istället för ett heltal.
UPDATE BOARD_MEMBER SET TELEPHONE_NR = 'EN STRÄNG' WHERE BOARD_MEMBER_ID = 17;

--Testar att skriva in en för lång emailadress.
UPDATE MEMBER SET EMAIL = 'DetHärÄrEnFörLångEmailAdress@TooLong.com' WHERE FIRST_NAME = 'Clerk' AND LAST_NAME = 'Miller';

--Testar att skriva in AMOUNT som sträng istället för heltal.
UPDATE SPONSOR SET AMOUNT = '500KR' WHERE SPONSOR_ID = 1340;


--TEST LIKT ÖNSKEMÅLEN OVAN MEN ÄR TÄNKTA ATT LYCKAS
--PLAYING HAR "ON DELETE CASCADE" OCH DET GÅR DÄRFÖR ATT TABORT EN MEDLEM FRÅN MEMBER ÄVEN FAST DEN ÄR MED I TABELLEN PLAYING OCKSÅ.
DELETE FROM MEMBER WHERE MEMBER_ID = 2;

--Testar att lägga in ett heltat där ett heltal är förväntat.
UPDATE BOARD_MEMBER SET TELEPHONE_NR = 0707563432 WHERE BOARD_MEMBER_ID = 17;

--Testar att skriva in en emailadress inom 25 tecken.
UPDATE MEMBER SET EMAIL = 'lagomlång@NotTooLong.com' WHERE FIRST_NAME = 'Clerk' AND LAST_NAME = 'Miller';

--Testar att skriva in AMOUNT som heltal vilket är tänk.
UPDATE SPONSOR SET AMOUNT = 50000 WHERE SPONSOR_ID = 1340;

--BYTER ID PÅ FOREIGN KEY FÖR ATT BYRA KLUBB ÅT MEDLEMMEN.
UPDATE MEMBER SET CLUB_ID = 3 WHERE MEMBER_ID = 4;


--TESTDATA SOM FÖRVÄNTAS ATT MISSLYCKAS I FORM AV INSERTS
--Testar insert BOARD_MEMBER där telefonnumret är en stäng istället för ett heltal.
INSERT INTO BOARD_MEMBER VALUES (23,'Charlie','sake','EN STRÄNG');

--Testar insert MEMBER där emailadressen är för lång.
INSERT INTO MEMBER (CLUB_ID, RATING, FIRST_NAME, LAST_NAME, EMAIL) VALUES (4,1016,'Ebba','Brost','DetHärÄrEnFörLångEmailAdress@TooLong.com');

--Testar att skriva in AMOUNT som sträng istället för heltal.
INSERT INTO SPONSOR VALUES (1347,'Pizzeria Husum',0660234723,'500KR');

--Går inte eftersom Primärnyckelattributet inte får vara NULL
INSERT INTO PLAYING VALUES (18,NULL,30);


--FLER TESTER SOM ÄR TÄNKTA ATT LYCKAS MED I FORM AV INSERTS FINNS REDAN MED LYCKADE INSERTS I inserts.sql
--Går eftersom Icke-Primärnyckelattributet får vara NULL
INSERT INTO PLAYING VALUES (18,12201,NULL);