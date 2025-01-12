DROP TABLE IF EXISTS DConditions, Transactions, Donations, Hospitals, Conditions, Employees, Recipients, Donors;

CREATE TABLE Donors(
    DonorID int NOT NULL AUTO_INCREMENT,
    FirstNameD varchar(50),
    MInitial varchar(2),
    LastNameD varchar(50),
    Address varchar(100),
    PhoneNum varchar(20),
    Email varchar(80),
    Blood varchar(3),
    DOB date,
    Gender varchar(2),
    Hemoglobin decimal(5,3),
    PRIMARY KEY(DonorID)
) AUTO_INCREMENT=300000;

INSERT INTO Donors(FirstNameD, MInitial, LastNameD, Address, PhoneNum, Email, Blood, DOB, Gender, Hemoglobin)
VALUES('Peter','','Parker','101 Creekmore Blvd, APT 1011, Oxford, MS 38655','555-555-5555','peterparker@gmail.com','B+','1998-01-25','M','13.6');

INSERT INTO Donors(FirstNameD, MInitial, LastNameD, Address, PhoneNum, Email, Blood, DOB, Gender, Hemoglobin)
VALUES('David','D','Jones','101 Creekmore Blvd, APT 2012, Oxford, MS 38655','555-555-5555','davidjones@gmail.com','AB-','1995-11-02','M','18.1');

INSERT INTO Donors(FirstNameD, MInitial, LastNameD, Address, PhoneNum, Email, Blood, DOB, Gender, Hemoglobin)
VALUES('Patty','F','Flemmings','101 Creekmore Blvd, APT 5262, Oxford, MS 38655','555-555-5555','fff@gmail.com','O+','2000-12-09','F','14.9');

INSERT INTO Donors(FirstNameD, MInitial, LastNameD, Address, PhoneNum, Email, Blood, DOB, Gender, Hemoglobin)
VALUES('Carl','','Xavior','101 Creekmore Blvd, APT 1220, Oxford, MS 38655','555-555-5555','cxavior@gmail.com','O-','1987-07-21','M','15.2');

INSERT INTO Donors(FirstNameD, MInitial, LastNameD, Address, PhoneNum, Email, Blood, DOB, Gender, Hemoglobin)
VALUES('Astha','M','Peterson','101 Creekmore Blvd, APT 1111, Oxford, MS 38655','555-555-5555','asthapeterson@gmail.com','A-','1995-04-25','F','12.8');

INSERT INTO Donors(FirstNameD, MInitial, LastNameD, Address, PhoneNum, Email, Blood, DOB, Gender, Hemoglobin)
VALUES('Sophia','','Salinas','23 Creek, Oxford, MS 38655','555-555-5555','ssalinas@gmail.com','B+','2002-01-10','F','13.6');

INSERT INTO Donors(FirstNameD, MInitial, LastNameD, Address, PhoneNum, Email, Blood, DOB, Gender, Hemoglobin)
VALUES('Jimmy','D','Jones','17 Johnson Boulevard, Oxford, MS 38655','555-555-5555','jdjones@gmail.com','AB-','1987-02-12','M','16.1');

INSERT INTO Donors(FirstNameD, MInitial, LastNameD, Address, PhoneNum, Email, Blood, DOB, Gender, Hemoglobin)
VALUES('Alec','F','Patt','234 Franklin Drive, Oxford, MS 38655','555-555-5555','alecpatt@gmail.com','O+','1995-12-14','M','16.9');

INSERT INTO Donors(FirstNameD, MInitial, LastNameD, Address, PhoneNum, Email, Blood, DOB, Gender, Hemoglobin)
VALUES('Vicky','','Smith','115 Franklin Drive, Oxford, MS 38655','555-555-5555','vsmith@gmail.com','O-','1969-04-16','F','13.2');

INSERT INTO Donors(FirstNameD, MInitial, LastNameD, Address, PhoneNum, Email, Blood, DOB, Gender, Hemoglobin)
VALUES('Joe','J','Johnson','19 Jackson Avenue, Oxford, MS 38655','555-555-5555','jjjohnson@gmail.com','A-','1971-05-18','M','15.8');

INSERT INTO Donors(FirstNameD, MInitial, LastNameD, Address, PhoneNum, Email, Blood, DOB, Gender, Hemoglobin)
VALUES('Chase','','Ezell','101 Creekmore Blvd APT 3313, Oxford, MS 38655','555-555-5555','cezell@gmail.com','B+','2001-06-25','M','15.6');

INSERT INTO Donors(FirstNameD, MInitial, LastNameD, Address, PhoneNum, Email, Blood, DOB, Gender, Hemoglobin)
VALUES('Diana','C','Salinas','101 Creekmore Blvd APT 3313, Oxford, MS 38655','555-555-5555','dcsalinas@gmail.com','O+','2000-11-12','F','14.1');

INSERT INTO Donors(FirstNameD, MInitial, LastNameD, Address, PhoneNum, Email, Blood, DOB, Gender, Hemoglobin)
VALUES('John','F','Williams','234 Sheppard Franklin Drive, Oxford, MS 38655','555-555-5555','jwilliams@gmail.com','A-','1995-12-14','M','18.1');

INSERT INTO Donors(FirstNameD, MInitial, LastNameD, Address, PhoneNum, Email, Blood, DOB, Gender, Hemoglobin)
VALUES('Sally','','Greene','115 Sheppard Franklin Drive, Oxford, MS 38655','555-555-5555','sgreene@gmail.com','AB-','1969-04-16','F','13.2');

INSERT INTO Donors(FirstNameD, MInitial, LastNameD, Address, PhoneNum, Email, Blood, DOB, Gender, Hemoglobin)
VALUES('Haley','J','Ryans','19 North Jackson Avenue, Oxford, MS 38655','555-555-5555','hryans@gmail.com','AB+','1999-02-18','F','14.8');

CREATE TABLE Recipients(
    RecipientID int NOT NULL AUTO_INCREMENT,
    FirstNameR varchar(50),
    MInitial varchar(2),
    LastNameR varchar(50),
    Address varchar(100),
    PhoneNum varchar(20),
    Email varchar(80),
    Blood varchar(3),
    DOB date,
    Gender varchar(2),
    PRIMARY KEY(RecipientID)
) AUTO_INCREMENT = 400000;

INSERT INTO Recipients(FirstNameR, MInitial, LastNameR, Address, PhoneNum, Email, Blood, DOB, Gender)
VALUES('Mark','','Zuke','2002 Oxford Way, APT 1142 Oxford, MS 38655','555-555-5555','markzuke@gmail.com','A-','1978-07-09','M');

INSERT INTO Recipients(FirstNameR, MInitial, LastNameR, Address, PhoneNum, Email, Blood, DOB, Gender)
VALUES('Jeff','D','Bees','1 Joy Drive, Egypt, MS 3886','555-555-5555','jeffbees@gmail.com','A-','1997-10-13','M');

INSERT INTO Recipients(FirstNameR, MInitial, LastNameR, Address, PhoneNum, Email, Blood, DOB, Gender)
VALUES('Ian','','Shark','101 Creekmore Blvd, APT 2879, Oxford, MS 38655','555-555-5555','ishark@gmail.com','O-','2000-12-09','M');

INSERT INTO Recipients(FirstNameR, MInitial, LastNameR, Address, PhoneNum, Email, Blood, DOB, Gender)
VALUES('Jay','','Xu','1 Joy Drive, Clinton, MS 39209','555-555-5555','jayxu@gmail.com','AB-','1998-11-21','M');

INSERT INTO Recipients(FirstNameR, MInitial, LastNameR, Address, PhoneNum, Email, Blood, DOB, Gender)
VALUES('Camilla','M','Gonzalez','22 N. Newcastle Drive, Biloxi, MS 39530','555-555-5555','cgonzalez@gmail.com','O+','2001-09-15','F');

INSERT INTO Recipients(FirstNameR, MInitial, LastNameR, Address, PhoneNum, Email, Blood, DOB, Gender)
VALUES('Sarah','','Kandal','23 Jackson Ave, Oxford, MS 38655','555-555-5555','skandal@gmail.com','A-','1965-01-09','F');

INSERT INTO Recipients(FirstNameR, MInitial, LastNameR, Address, PhoneNum, Email, Blood, DOB, Gender)
VALUES('Lily','D','Lee','102 Smith Ave, Oxford, MS 38655','555-555-5555','llee@gmail.com','AB-','1982-11-09','F');

INSERT INTO Recipients(FirstNameR, MInitial, LastNameR, Address, PhoneNum, Email, Blood, DOB, Gender)
VALUES('Iris','','Smith','102 Lamar Boulevard, Oxford, MS 38655','555-555-5555','ismith@gmail.com','B+','1977-06-09','F');

INSERT INTO Recipients(FirstNameR, MInitial, LastNameR, Address, PhoneNum, Email, Blood, DOB, Gender)
VALUES('Daya','','Jackson','134 Lamar Boulevard, Oxford, MS 38655','555-555-5555','djackson@gmail.com','O+','1987-11-21','F');

INSERT INTO Recipients(FirstNameR, MInitial, LastNameR, Address, PhoneNum, Email, Blood, DOB, Gender)
VALUES('Josh','G','Williams','189 N Lamar Drive, Oxford, MS 38655','555-555-5555','jwilliams@gmail.com','B+','1967-03-15','M');

INSERT INTO Recipients(FirstNameR, MInitial, LastNameR, Address, PhoneNum, Email, Blood, DOB, Gender)
VALUES('Dylan','','House','231 West Burton Ave, Oxford, MS 38655','555-555-5555','skandal@gmail.com','A+','1965-12-19','M');

INSERT INTO Recipients(FirstNameR, MInitial, LastNameR, Address, PhoneNum, Email, Blood, DOB, Gender)
VALUES('Andrea','D','Smith','102 West Smith Ave, Oxford, MS 38655','555-555-5555','ad@gmail.com','A-','178-06-12','F');

INSERT INTO Recipients(FirstNameR, MInitial, LastNameR, Address, PhoneNum, Email, Blood, DOB, Gender)
VALUES('Dmitri','','Romero','102 West Lamar Boulevard, Oxford, MS 38655','555-555-5555','dr@gmail.com','AB+','1989-03-15','M');

INSERT INTO Recipients(FirstNameR, MInitial, LastNameR, Address, PhoneNum, Email, Blood, DOB, Gender)
VALUES('Samual','','Rodriguez','134 West Taylor Boulevard, Oxford, MS 38655','555-555-5555','sr@gmail.com','AB-','1975-10-21','M');

INSERT INTO Recipients(FirstNameR, MInitial, LastNameR, Address, PhoneNum, Email, Blood, DOB, Gender)
VALUES('Robert','G','Crandal','189 N Taylor Drive, Oxford, MS 38655','555-555-5555','rgc@gmail.com','O+','1999-08-19','M');



CREATE TABLE Employees(
    EmployeeID int NOT NULL AUTO_INCREMENT,
    FirstNameE varchar(50),
    MInitial varchar(2),
    LastNameE varchar(50),
    Address varchar(100),
    PhoneNum varchar(20),
    Email varchar(80),
    DOB date,
    Gender varchar(2),
    PRIMARY KEY(EmployeeID)
)AUTO_INCREMENT = 100000;

INSERT INTO Employees(FirstNameE, MInitial, LastNameE, Address, PhoneNum, Email, DOB, Gender)
VALUES('Taylor','J','Lautner','2002 Oxford Way, APT 6231 Oxford, MS 38655','555-555-5555','tlau@gmail.com','1994-03-19','M');

INSERT INTO Employees(FirstNameE, MInitial, LastNameE, Address, PhoneNum, Email, DOB, Gender)
VALUES('Taylor','M','Lautner','101 Creekmore Blvd, APT 3312, Oxford, MS 38655','555-555-5555','tmlautner@gmail.com','1978-04-09','F');

INSERT INTO Employees(FirstNameE, MInitial, LastNameE, Address, PhoneNum, Email, DOB, Gender)
VALUES('Kim','','Possible','2002 Oxford Way, APT 6111 Oxford, MS 38655','555-555-5555','kpossible@gmail.com','1988-07-21','F');

INSERT INTO Employees(FirstNameE, MInitial, LastNameE, Address, PhoneNum, Email, DOB, Gender)
VALUES('Terresa','','Martin','2002 Oxford Way, APT 1111, Oxford, MS 38655','555-555-5555','tmartin@gmail.com','1977-09-19','F');

INSERT INTO Employees(FirstNameE, MInitial, LastNameE, Address, PhoneNum, Email, DOB, Gender)
VALUES('Jaydan','J','Ray','2002 Oxford Way, APT 5423 Oxford, MS 38655','555-555-5555','jray@gmail.com','2000-09-30','F');

INSERT INTO Employees(FirstNameE, MInitial, LastNameE, Address, PhoneNum, Email, DOB, Gender)
VALUES('Armani','','Hicks','171 Lamar Drive, Oxford, MS 38655','555-555-5555','amicks@gmail.com','1994-03-19','M');

INSERT INTO Employees(FirstNameE, MInitial, LastNameE, Address, PhoneNum, Email, DOB, Gender)
VALUES('Gary','','Reynolds','13 Jacksons Drive, Oxford, MS 38655','555-555-5555','greynolds@gmail.com','1997-12-19','M');

INSERT INTO Employees(FirstNameE, MInitial, LastNameE, Address, PhoneNum, Email, DOB, Gender)
VALUES('Scarlet','','Blackwell','12 N Lamar Drive, Oxford, MS 38655','555-555-5555','sblackwell@gmail.com','1989-02-21','F');

INSERT INTO Employees(FirstNameE, MInitial, LastNameE, Address, PhoneNum, Email, DOB, Gender)
VALUES('Evelyn','','Russo','187 Hatherford Drive, Oxford, MS 38655','555-555-5555','erusso@gmail.com','1978-07-11','F');

INSERT INTO Employees(FirstNameE, MInitial, LastNameE, Address, PhoneNum, Email, DOB, Gender)
VALUES('Annie','J','Bird','123 Lamar Drive, Oxford, MS 38655','555-555-5555','abird@gmail.com','1974-10-31','F');

INSERT INTO Employees(FirstNameE, MInitial, LastNameE, Address, PhoneNum, Email, DOB, Gender)
VALUES('Emma','','Atkinson','171 Lamar Drive, Oxford, MS 38655','555-555-5555','ea@gmail.com','1989-05-12','F');

INSERT INTO Employees(FirstNameE, MInitial, LastNameE, Address, PhoneNum, Email, DOB, Gender)
VALUES('Faith','','Reynolds','13 Jacksons Drive, Oxford, MS 38655','555-555-5555','freynolds@gmail.com','1990-04-11','F');

INSERT INTO Employees(FirstNameE, MInitial, LastNameE, Address, PhoneNum, Email, DOB, Gender)
VALUES('Gregory','','House','12 N Lamar Drive, Oxford, MS 38655','555-555-5555','ghouse@gmail.com','1991-03-22','M');

INSERT INTO Employees(FirstNameE, MInitial, LastNameE, Address, PhoneNum, Email, DOB, Gender)
VALUES('Eric','','Foreman','187 Hatherford Drive, Oxford, MS 38655','555-555-5555','eforemna@gmail.com','1992-02-12','M');

INSERT INTO Employees(FirstNameE, MInitial, LastNameE, Address, PhoneNum, Email, DOB, Gender)
VALUES('James','J','Wilson','123 Lamar Drive, Oxford, MS 38655','555-555-5555','jwilson@gmail.com','1993-01-02','M');

CREATE TABLE Hospitals(
    HospitalID int NOT NULL AUTO_INCREMENT,
    HName varchar(200),
    Address varchar(100),
    PhoneNum varchar(20),
    Email varchar(30),
    PRIMARY KEY(HospitalID)
) AUTO_INCREMENT = 200000;

INSERT INTO Hospitals(HName, Address,PhoneNum,Email)
VALUES ('Baptist Memorial Hospital-North Mississippi', '1100 Belk Blvd, Oxford, MS 38655','555-555-5555','bmhnm@.org');

INSERT INTO Hospitals(HName, Address,PhoneNum,Email)
VALUES ('Cardiology Associates Of North Mississippi', '2892 S Lamar Blvd, Oxford, MS 38655','555-555-5555','caofnm@.org');

INSERT INTO Hospitals(HName, Address,PhoneNum,Email)
VALUES ('The University of Mississippi Medical Center - Grenada', '960 J K Avent Dr, Grenada, MS 38901','555-555-5555','tummc@.org');

INSERT INTO Hospitals(HName, Address,PhoneNum,Email)
VALUES ('North Mississippi Specialty Hospital', '303 Medical Center Dr Suite B, Batesville, MS 38606','555-555-5555','nmsh@.org');

INSERT INTO Hospitals(HName, Address,PhoneNum,Email)
VALUES ('Tallahatchie General Hospital', '141 Dr T T Lewis Cir, Charleston, MS 38921','555-555-5555','tgah@.org');

CREATE TABLE Donations(
    DonationID int NOT NULL AUTO_INCREMENT,
    DonorID int REFERENCES Donors,
    DateDonated date,
    Plasma int,
    Platelets int,
    WholeBlood int,
    CONSTRAINT PRIMARY KEY(DonationID, DonorID),

    CONSTRAINT Donations_DonorID FOREIGN KEY(DonorID) REFERENCES Donors(DonorID)
)AUTO_INCREMENT=600000;

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300001,'2022-04-01', 250 , NULL, NULL);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300000,'2022-03-30', NULL, 2, NULL);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300002,'2022-03-30', NULL, 1, NULL);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300003,'2022-03-30', NULL, NULL, 2);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300004,'2022-03-30', NULL, NULL, 2);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300005,'2022-04-01', 250 , NULL, NULL);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300006,'2022-03-30', NULL, 2, NULL);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300007,'2022-03-30', NULL, 1, NULL);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300008,'2022-03-30', NULL, NULL, 2);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300009,'2022-03-30', NULL, NULL, 2);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300010,'2022-04-01', 250 , NULL, NULL);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300011,'2022-03-30', NULL, 2, NULL);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300012,'2022-03-30', NULL, 1, NULL);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300013,'2022-03-30', NULL, NULL, 2);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300014,'2022-03-30', NULL, NULL, 2);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300001,'2022-04-02', 250 , NULL, NULL);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300000,'2022-04-02', NULL, 2, NULL);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300002,'2022-04-03', NULL, 1, NULL);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300003,'2022-04-04', NULL, NULL, 2);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300004,'2022-04-04', NULL, NULL, 2);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300005,'2022-04-04', 250 , NULL, NULL);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300006,'2022-04-05', NULL, 2, NULL);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300007,'2022-04-05', NULL, 1, NULL);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300008,'2022-04-05', NULL, NULL, 2);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300009,'2022-04-05', NULL, NULL, 2);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300010,'2022-04-05', NULL , 1, NULL);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300011,'2022-04-05', NULL, 2, NULL);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300012,'2022-04-07', 250, NULL, NULL);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300013,'2022-04-10', NULL, NULL, 2);

INSERT INTO Donations(DonorID, DateDonated, Plasma, Platelets, WholeBlood)
VALUES(300014,'2022-04-11', NULL, NULL, 2);



--Plasma is measured in militers (200-400 mL)
--Platelets is measured in units (1-3 units)
--Whole Blood is meausured in pints (roughly 1 but you can go up to three pints)

CREATE TABLE Conditions(
    CondtitionID int NOT NULL,
    ConditionName varchar(80),
    PRIMARY KEY(CondtitionID)
);

INSERT INTO Conditions(CondtitionID, ConditionName) VALUES (1, 'None');
INSERT INTO Conditions(CondtitionID, ConditionName) VALUES (2, 'Diabetes - feeling well and healthy');
INSERT INTO Conditions(CondtitionID, ConditionName) VALUES (3, 'Diabetes - Symptomatic');
INSERT INTO Conditions(CondtitionID, ConditionName) VALUES (4, 'Eczema - no infected lesions');
INSERT INTO Conditions(CondtitionID, ConditionName) VALUES (5, 'Headache - Severe Migraine');
INSERT INTO Conditions(CondtitionID, ConditionName) VALUES (6, 'Psoriasis');
INSERT INTO Conditions(CondtitionID, ConditionName) VALUES (7, 'Poison Ivy (no lesions in venipuncture area)');
INSERT INTO Conditions(CondtitionID, ConditionName) VALUES (8, 'Ringworm (not in venipuncture area)');
INSERT INTO Conditions(CondtitionID, ConditionName) VALUES (9, 'Thyroid - Hypo/Hyper - controlled with medication');
INSERT INTO Conditions(CondtitionID, ConditionName) VALUES (10, 'Ulcerative Colitis - no medication taken');
INSERT INTO Conditions(CondtitionID, ConditionName) VALUES (11, 'Ulcerative Colitis - taking Asacol');
INSERT INTO Conditions(CondtitionID, ConditionName) VALUES (12, 'Epilepsy');
INSERT INTO Conditions(CondtitionID, ConditionName) VALUES (13, 'Diabetes and Eczema');
INSERT INTO Conditions(CondtitionID, ConditionName) VALUES (14, 'Diabetes, Eczema, and Headache');
INSERT INTO Conditions(CondtitionID, ConditionName) VALUES (15, 'Diabetes, Eczema, and Ringworm');
INSERT INTO Conditions(CondtitionID, ConditionName) VALUES (16, 'Diabetes and Epilepsy');
INSERT INTO Conditions(CondtitionID, ConditionName) VALUES (17, 'Headache - Severe Migraine and Eczema');
INSERT INTO Conditions(CondtitionID, ConditionName) VALUES (18, 'Poison Ivy and Eczema');

CREATE TABLE DConditions(
    DonorID int REFERENCES Donors,
    CondtitionID int REFERENCES Conditions,
    CONSTRAINT PRIMARY KEY (DonorID, CondtitionID),

    CONSTRAINT DConditions_DonorID FOREIGN KEY(DonorID) REFERENCES Donors(DonorID),
    CONSTRAINT DConditions_ConditionID FOREIGN KEY(CondtitionID) REFERENCES Conditions(CondtitionID)
);

INSERT INTO DConditions(CondtitionID, DonorID) VALUES (6, 300000);
INSERT INTO DConditions(CondtitionID, DonorID) VALUES (2, 300001);
INSERT INTO DConditions(CondtitionID, DonorID) VALUES (1, 300002);
INSERT INTO DConditions(CondtitionID, DonorID) VALUES (2, 300003);
INSERT INTO DConditions(CondtitionID, DonorID) VALUES (6, 300004);
INSERT INTO DConditions(CondtitionID, DonorID) VALUES (1, 300005);
INSERT INTO DConditions(CondtitionID, DonorID) VALUES (1, 300006);
INSERT INTO DConditions(CondtitionID, DonorID) VALUES (1, 300007);
INSERT INTO DConditions(CondtitionID, DonorID) VALUES (1, 300008);
INSERT INTO DConditions(CondtitionID, DonorID) VALUES (2, 300009);
INSERT INTO DConditions(CondtitionID, DonorID) VALUES (4, 300010);
INSERT INTO DConditions(CondtitionID, DonorID) VALUES (1, 300011);
INSERT INTO DConditions(CondtitionID, DonorID) VALUES (1, 300012);
INSERT INTO DConditions(CondtitionID, DonorID) VALUES (17, 300013);
INSERT INTO DConditions(CondtitionID, DonorID) VALUES (1, 300014);


CREATE TABLE Transactions(
    TransactionID int NOT NULL AUTO_INCREMENT,
    TransactionDate date,
    RecipientID int REFERENCES Recipients,
    HospitalID int REFERENCES Hospitals,
    EmployeeID int REFERENCES Employees,
    DonationID int REFERENCES Donations,
    CONSTRAINT PRIMARY KEY (TransactionID),

    CONSTRAINT Transaction_RecipientID FOREIGN KEY (RecipientID) REFERENCES Recipients(RecipientID),
    CONSTRAINT Transaction_HospitalID FOREIGN KEY (HospitalID) REFERENCES Hospitals(HospitalID),
    CONSTRAINT Transaction_EmployeeID FOREIGN KEY (EmployeeID) REFERENCES Employees(EmployeeID),
    CONSTRAINT Transaction_DonationID FOREIGN KEY (DonationID) REFERENCES Donations(DonationID)
) AUTO_INCREMENT = 700000;

INSERT INTO Transactions(TransactionDate, RecipientID, HospitalID, EmployeeID, DonationID)
VALUES ('2022-04-02', 400003, 200000, 100004, 600000);

INSERT INTO Transactions(TransactionDate, RecipientID, HospitalID, EmployeeID, DonationID)
VALUES ('2022-04-02', 400008, 200000, 100004, 600002);

INSERT INTO Transactions(TransactionDate, RecipientID, HospitalID, EmployeeID, DonationID)
VALUES ('2022-04-02', 400009, 200000, 100004, 600001);

INSERT INTO Transactions(TransactionDate, RecipientID, HospitalID, EmployeeID, DonationID)
VALUES ('2022-04-02', 400002, 200004, 100002, 600003);

INSERT INTO Transactions(TransactionDate, RecipientID, HospitalID, EmployeeID, DonationID)
VALUES ('2022-04-02', 400000, 200004, 100000, 600004);

INSERT INTO Transactions(TransactionDate, RecipientID, HospitalID, EmployeeID, DonationID)
VALUES ('2022-04-02', 400006, 200002, 100005, 600000);

INSERT INTO Transactions(TransactionDate, RecipientID, HospitalID, EmployeeID, DonationID)
VALUES ('2022-04-02', 400004, 200002, 100007, 600002);

INSERT INTO Transactions(TransactionDate, RecipientID, HospitalID, EmployeeID, DonationID)
VALUES ('2022-04-02', 400001, 200003, 100007, 600004);

INSERT INTO Transactions(TransactionDate, RecipientID, HospitalID, EmployeeID, DonationID)
VALUES ('2022-04-02', 400005, 200003, 100006, 600004);

INSERT INTO Transactions(TransactionDate, RecipientID, HospitalID, EmployeeID, DonationID)
VALUES ('2022-04-02', 400007, 200003, 100001, 600001);

INSERT INTO Transactions(TransactionDate, RecipientID, HospitalID, EmployeeID, DonationID)
VALUES ('2022-04-03', 400010, 200000, 100010, 600004);

INSERT INTO Transactions(TransactionDate, RecipientID, HospitalID, EmployeeID, DonationID)
VALUES ('2022-04-03', 400014, 200000, 100011, 600003);

INSERT INTO Transactions(TransactionDate, RecipientID, HospitalID, EmployeeID, DonationID)
VALUES ('2022-04-03', 400011, 200000, 100012, 600010);

INSERT INTO Transactions(TransactionDate, RecipientID, HospitalID, EmployeeID, DonationID)
VALUES ('2022-04-03', 400012, 200001, 100013, 600004);

INSERT INTO Transactions(TransactionDate, RecipientID, HospitalID, EmployeeID, DonationID)
VALUES ('2022-04-03', 400013, 200003, 100014, 600004);
