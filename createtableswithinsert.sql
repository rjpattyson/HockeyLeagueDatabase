DROP TABLE TeamInfo;
DROP TABLE GamePlayed;
DROP TABLE ScoreTable;
DROP TABLE PlaysFor;
DROP TABLE PlayerStats;
DROP TABLE PlayerContract;
DROP TABLE MainCoach;
DROP TABLE SecondaryCoach;
DROP TABLE CoachesFor;
DROP TABLE CoachContract;
DROP TABLE TeamStats;
DROP TABLE PlaysAtStadium;
DROP TABLE Stadium;
DROP TABLE PlayedinSeason;
DROP TABLE Season;
DROP TABLE Player;
DROP TABLE Coach;
DROP TABLE Team;

CREATE TABLE Team (
TeamID INT, 
Name CHAR(30),
PRIMARY KEY (TeamID));

CREATE TABLE  TeamInfo(
City CHAR(30), 
Name CHAR(30),
DateCreated CHAR(30),
PRIMARY KEY(Name));

CREATE TABLE Player(
JerseyNo INTEGER, 
Name CHAR(20), 
Age INTEGER, 
Position CHAR(4),
 isCaptain CHAR(1),
PRIMARY KEY (JerseyNo, Name));

CREATE TABLE GamePlayed(
DatePlayed CHAR(30),
TeamID INTEGER,
OpponentID INTEGER,
Score CHAR(10),
PRIMARY KEY(DatePlayed, TeamID, OpponentID),
FOREIGN KEY(TeamID) REFERENCES Team (TeamID) ON DELETE CASCADE,
FOREIGN KEY (OpponentID) REFERENCES Team (TeamID) ON DELETE CASCADE);

CREATE TABLE ScoreTable(
Score CHAR(10),
MatchResult CHAR(4),
PRIMARY KEY(Score));

CREATE TABLE PlaysFor(
JerseyNo INTEGER,
Name CHAR(20),
TeamID INTEGER,
PRIMARY KEY(JerseyNo, Name, TeamID),
FOREIGN KEY(JerseyNo, Name) REFERENCES Player(JerseyNo, Name) ON DELETE CASCADE,
FOREIGN KEY(TeamID) REFERENCES Team(TeamID) ON DELETE CASCADE);

CREATE TABLE PlayerStats(
Year INTEGER,
JerseyNo INTEGER,
Name CHAR(20),
GamesPlayed INTEGER,
Assists INTEGER,
Goals INTEGER,
PRIMARY KEY(Year, JerseyNo, Name),
FOREIGN KEY(JerseyNo, Name) REFERENCES Player(JerseyNo, Name) ON DELETE CASCADE);

CREATE TABLE PlayerContract(
ContractNumber INTEGER, 
JerseyNo INTEGER,
 Name CHAR(20),
 StartDate CHAR(20),
 ExpiryDate Char(20), 
Salary INTEGER,
PRIMARY KEY (ContractNumber, JerseyNo, Name),
FOREIGN KEY(JerseyNo, Name) REFERENCES Player(JerseyNo, Name) ON DELETE CASCADE);

CREATE TABLE Coach(
StaffID INTEGER,
Name CHAR(20),
Age INTEGER,
PRIMARY KEY(StaffID));

CREATE TABLE MainCoach(
StaffID INTEGER, 
 HeadCoach CHAR(1),
PRIMARY KEY (StaffID),
FOREIGN KEY (StaffID) REFERENCES Coach(StaffID) ON DELETE CASCADE);

CREATE TABLE SecondaryCoach(
StaffID INTEGER,
Specialization CHAR(20),
PRIMARY KEY (StaffID),
FOREIGN KEY (StaffID) REFERENCES Coach(StaffID) ON DELETE CASCADE);

CREATE TABLE CoachesFor(
StaffID INTEGER, 
TeamID INTEGER,
PRIMARY KEY (StaffID, TeamID),
FOREIGN KEY (StaffID) REFERENCES Coach(StaffID) ON DELETE CASCADE,
FOREIGN KEY(TeamID) REFERENCES Team(TeamID) ON DELETE CASCADE);

CREATE TABLE CoachContract(
ContractNumber INTEGER, 
StaffID INTEGER,
 StartDate CHAR(20), 
PRIMARY KEY (StaffID, ContractNumber),
FOREIGN KEY(StaffID) REFERENCES Coach(StaffID) ON DELETE CASCADE);

CREATE TABLE TeamStats(
Year INTEGER, 
TeamID INTEGER, 
GoalsAgainst INTEGER, 
GoalsScored INTEGER,
 GamesPlayed INTEGER,
 WinRatio float,
PRIMARY KEY(Year, TeamID),
FOREIGN KEY(TeamID) REFERENCES Team(TeamID) ON DELETE CASCADE);

CREATE TABLE Stadium(
Name CHAR(20),
DateOpened CHAR(20),
PRIMARY KEY (Name));

CREATE TABLE PlaysAtStadium(
Name CHAR(20),
 TeamID INTEGER,
PRIMARY KEY (Name, TeamID),
FOREIGN KEY(Name) REFERENCES Stadium(Name) ON DELETE CASCADE,
FOREIGN KEY(TeamID) REFERENCES Team(TeamID) ON DELETE CASCADE);

CREATE TABLE Season(
Year INTEGER,
PRIMARY KEY (Year));

CREATE TABLE PlayedinSeason(
Year INTEGER, 
TeamID INTEGER,
PRIMARY KEY (Year, TeamID),
FOREIGN KEY(Year) REFERENCES Season(Year) ON DELETE CASCADE,
FOREIGN KEY(TeamID) REFERENCES Team(TeamID) ON DELETE CASCADE);


INSERT INTO Team VALUES ('100','Toronto Maple Leafs');
INSERT INTO Team VALUES ('101','Vancouver Canucks');
INSERT INTO Team VALUES ('102','Montreal Canadiens');
INSERT INTO Team VALUES ('104','Boston Bruins');
INSERT INTO Team VALUES ('105', 'Edmonton Oilers');

INSERT INTO TeamInfo VALUES ('Toronto','Toronto Maple Leafs','11-06-1980');
INSERT INTO TeamInfo VALUES ('Vancouver', 'Vancouver Canucks','12-07-1981');
INSERT INTO TeamInfo VALUES ('Montreal', 'Montreal Canadiens','21-09-1983');
INSERT INTO TeamInfo VALUES ('Boston', 'Boston Bruins','17-04-1987');
INSERT INTO TeamInfo VALUES ('Edmonton', 'Edmonton Oilers','22-02-1990');

INSERT INTO Player VALUES ('15','Alexander Kerfoot','26','C','F');
INSERT INTO Player VALUES ('53','Bo Horvat','25','C','T');
INSERT INTO Player VALUES ('58','Noah Juulsen','23','D','F');
INSERT INTO Player VALUES ('10','Anders Bjork','24','LW','F');
INSERT INTO Player VALUES ('15','Josh Archibald','28','RW','F');
INSERT INTO Player VALUES ('83','Jay Beagle','35','C','F');
INSERT INTO Player VALUES ('40','Elias Pettersson','22','C','F');

INSERT INTO PlaysFor VALUES ('15','Alexander Kerfoot','100');
INSERT INTO PlaysFor VALUES ('83','Jay Beagle','101');
INSERT INTO PlaysFor VALUES ('58','Noah Juulsen','102');
INSERT INTO PlaysFor VALUES ('10','Anders Bjork','104');
INSERT INTO PlaysFor VALUES ('15','Josh Archibald','105');
INSERT INTO PlaysFor VALUES ('40','Elias Pettersson','101');
INSERT INTO PlaysFor VALUES ('53','Bo Horvat','101');

INSERT INTO GamePlayed VALUES ('01-01-2020','100','101','3-1');
INSERT INTO GamePlayed VALUES ('02-01-2020','102','105','1-2');
INSERT INTO GamePlayed VALUES ('04-01-2020','104','105','4-2');
INSERT INTO GamePlayed VALUES ('05-01-2020','101','105','3-3');
INSERT INTO GamePlayed VALUES ('06-01-2020','101','100','5-1');
INSERT INTO GamePlayed VALUES ('11-01-2020','104','102','4-2');
INSERT INTO GamePlayed VALUES ('22-01-2020','101','100','3-1');
INSERT INTO GamePlayed VALUES ('25-01-2020','102','105','5-3');

INSERT INTO ScoreTable VALUES ('3-1','Win');
INSERT INTO ScoreTable VALUES ('1-2','Loss');
INSERT INTO ScoreTable VALUES ('4-2','Win');
INSERT INTO ScoreTable VALUES ('3-3','Draw');
INSERT INTO ScoreTable VALUES ('1-5','Loss');
INSERT INTO ScoreTable VALUES ('5-1','Win');
INSERT INTO ScoreTable VALUES ('5-3','Win');


INSERT INTO PlayerStats VALUES ('2020','15','Alexander Kerfoot','65', '19', '9');
INSERT INTO PlayerStats VALUES ('2020','53','Bo Horvat','69','31','22');
INSERT INTO PlayerStats VALUES ('2019','58','Noah Juulsen','21','4','1');
INSERT INTO PlayerStats VALUES ('2020','10','Anders Bjork','58','10','9');
INSERT INTO PlayerStats VALUES ('2020','15','Josh Archibald','62','9','12');

INSERT INTO PlayerContract VALUES ('10234','15','Alexander Kerfoot','2019-07-04', '2022-07-04','14000000');
INSERT INTO PlayerContract VALUES ('10555','53','Bo Horvat','2017-09-08', '2023-09-08','33000000');
INSERT INTO PlayerContract VALUES ('10996','58','Noah Juulsen','2020-10-08','2021-10-08','700000');
INSERT INTO PlayerContract VALUES ('10952','10','Anders Bjork','2020-07-29','2023-07-29','4800000');
INSERT INTO PlayerContract VALUES ('10828','15','Josh Archibald','2020-03-06','2022-03-06','3000000');

INSERT INTO Coach VALUES ('1050','Travis Green','49');
INSERT INTO Coach VALUES ('1432','Newell Brown','58');
INSERT INTO Coach VALUES ('2246','Sheldon Keefe','40');
INSERT INTO Coach VALUES ('8942','Dave Hakstol','52');
INSERT INTO Coach VALUES ('3321','Bruce Cassidy','55');
INSERT INTO Coach VALUES ('1234','Ian Clark','54');
INSERT INTO Coach VALUES ('2678','Will Sibley','30');
INSERT INTO Coach VALUES ('3322','Mike Dunham','48');
INSERT INTO Coach VALUES ('8884','Chris Kelly','39');
INSERT INTO Coach VALUES ('6799','David Pelletier','45');

INSERT INTO MainCoach VALUES ('1050','T');
INSERT INTO MainCoach VALUES ('1432','F');
INSERT INTO MainCoach VALUES ('2246','T');
INSERT INTO MainCoach VALUES ('8942','F');
INSERT INTO MainCoach VALUES ('3321','T');

INSERT INTO SecondaryCoach VALUES ('1234','Goaltending');
INSERT INTO SecondaryCoach VALUES ('2678','Analyst');
INSERT INTO SecondaryCoach VALUES ('3322','Goaltending');
INSERT INTO SecondaryCoach VALUES ('8884','Player Development');
INSERT INTO SecondaryCoach VALUES ('6799','Skating');

INSERT INTO CoachesFor VALUES ('1050','101');
INSERT INTO CoachesFor VALUES ('1432','101');
INSERT INTO CoachesFor VALUES ('8942','100');
INSERT INTO CoachesFor VALUES ('2678','100');
INSERT INTO CoachesFor VALUES ('6799','105');

INSERT INTO CoachContract VALUES ('11200','1050','2017-4-26');
INSERT INTO CoachContract VALUES ('11576','1234','2011-6-6');
INSERT INTO CoachContract VALUES ('11987','2246','2019-11-20');
INSERT INTO CoachContract VALUES ('11543','1432','2017-6-7');
INSERT INTO CoachContract VALUES ('11233','8884','2018-9-4');

INSERT INTO TeamStats VALUES ('2019','100','140','285','82','0.63');
INSERT INTO TeamStats VALUES ('2020','100','160','203','45','0.55');
INSERT INTO TeamStats VALUES ('2019','104','225','145','82','0.40');
INSERT INTO TeamStats VALUES ('2018','105','220','205','82','0.48');
INSERT INTO TeamStats VALUES ('2019','102','205','233','66','0.52');

INSERT INTO Stadium VALUES ('Rogers Arena','21-09-1995');
INSERT INTO Stadium VALUES ('TD Garden','30-09-1995');
INSERT INTO Stadium VALUES ('Scotiabank Arena','19-02-1999');
INSERT INTO Stadium VALUES ('Rogers Place','08-09-2016');
INSERT INTO Stadium VALUES ('Center Bell','16-03-1996');

INSERT INTO PlaysAtStadium VALUES ('Rogers Arena','101');
INSERT INTO PlaysAtStadium VALUES ('TD Garden','104');
INSERT INTO PlaysAtStadium VALUES ('Scotiabank Arena','100');
INSERT INTO PlaysAtStadium VALUES ('Rogers Place','105');
INSERT INTO PlaysAtStadium VALUES ('Center Bell','102');

INSERT INTO Season VALUES ('2020');
INSERT INTO Season VALUES ('2019');
INSERT INTO Season VALUES ('2018');
INSERT INTO Season VALUES ('2017');
INSERT INTO Season VALUES ('2013');

INSERT INTO PlayedinSeason VALUES ('2020','100');
INSERT INTO PlayedinSeason VALUES ('2020','101');
INSERT INTO PlayedinSeason VALUES ('2020','102');
INSERT INTO PlayedinSeason VALUES ('2018','105');
INSERT INTO PlayedinSeason VALUES ('2019','100');
INSERT INTO PlayedinSeason VALUES ('2017','100');
INSERT INTO PlayedinSeason VALUES ('2013','100');
INSERT INTO PlayedinSeason VALUES ('2018','100');
INSERT INTO PlayedinSeason VALUES ('2019','101');
INSERT INTO PlayedinSeason VALUES ('2017','101');
INSERT INTO PlayedinSeason VALUES ('2013','101');
INSERT INTO PlayedinSeason VALUES ('2018','101');