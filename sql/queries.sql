--Jag vill lista namnen och belopp för alla sponsorer som sponsrar 10000kr eller mer.
SELECT SPONSOR_NAME, AMOUNT FROM SPONSOR WHERE AMOUNT > 9999;

--Lista förnamn, efternamn och email för alla medlemmar vars efternamn börjar på P. 
SELECT FIRST_NAME, LAST_NAME, EMAIL FROM MEMBER WHERE LAST_NAME LIKE 'P%';

--Visa en lista med klubbnamn och telefonnummer för alla klubbar som ligger i Sundsvall eller Härnösand.
SELECT CLUB_NAME, TELEPHONENR FROM DISCGOLF_CLUB WHERE CITY  IN ( 'Sundsvall','Härnösand'); 

--Lista Rating, förnamn och efternamn för alla spelare som har kommit 1, 2 eller 3 i någon tävling.
SELECT RATING, FIRST_NAME, LAST_NAME FROM MEMBER WHERE EXISTS (SELECT MEMBER_ID FROM PLAYING WHERE PLAYING.MEMBER_ID = MEMBER.MEMBER_ID AND PLAYING.PLACEMENT <= 3); 

--Visa hur många täxlande som var med i varje tävling.
SELECT COMPETITION_ID, COUNT(MEMBER_ID) FROM PLAYING GROUP BY COMPETITION_ID; 

--Lista alla clubbar och deras medelrating om de har en spelare med över 1015 i rating.
SELECT CLUB_ID, AVG(RATING) FROM MEMBER GROUP BY CLUB_ID HAVING MAX(MEMBER.RATING) > 1015;

--Lista alla sponsorer i ordning största sponsor först.
SELECT SPONSOR_NAME, AMOUNT FROM SPONSOR ORDER BY AMOUNT DESC;

--Visa förnamn, efternamn och rating för alla spelare i alla klubbar och vilken klubb de spelar i sorterat efter ranking.  
SELECT CLUB_NAME, FIRST_NAME, LAST_NAME, RATING FROM MEMBER LEFT OUTER JOIN DISCGOLF_CLUB ON MEMBER.CLUB_ID = DISCGOLF_CLUB.CLUB_ID ORDER BY RATING DESC;

--Spelare med medlemsnummer 24 blev diskad i tävlingen med id 13201 och togs därför bort från tabellen.
DELETE FROM PLAYING WHERE MEMBER_ID = 24 AND COMPETITION_ID = 13201;

--Klubmedlem 23 (Frans Fransson) byter klubb från klubb id 4 till klubb id 2 (Från Husum till Timrå).
UPDATE MEMBER SET CLUB_ID = 2 WHERE MEMBER_ID = 23;  