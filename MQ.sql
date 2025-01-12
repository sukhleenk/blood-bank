--Diana's Query
SELECT CONCAT_WS(' ', Donors.FirstNameD, Donors.LastNameD),
  GROUP_CONCAT(
    CONCAT_WS(' ', Recipients.FirstNameR, Recipients.LastNameR))
FROM Donors left join Donations on Donors.DonorID = Donations.DonorID
left join Transactions on Donations.DonationID = Transactions.DonationID
left join Recipients on Transactions.RecipientID = Recipients.RecipientID
group by Donors.FirstNameD;

--Sukhleen's Query
SELECT Hospitals.HName,
  GROUP_CONCAT(
    CONCAT_WS(' ', Recipients.FirstNameR, Recipients.LastNameR) SEPARATOR ', ')
from Hospitals left join Transactions on Hospitals.HospitalID = Transactions.HospitalID
left join Recipients on Transactions.RecipientID = Recipients.RecipientID group by Hospitals.HName;


--2 nested query selects DonorID and Donor name who have listed the codition diabetes- feeling well and healthy
select DConditions.DonorID, CONCAT_WS(' ', Donors.FirstNameD, Donors.LastNameD)
from Donors left join DConditions on Donors.DonorID = DConditions.DonorID
where DConditions.CondtitionID = (select Conditions.CondtitionID from Conditions
where ConditionName = 'Diabetes - feeling well and healthy');

--1
select Donors.Gender, Donors.Hemoglobin, CONCAT_WS(' ', Donors.FirstNameD, Donors.LastNameD), SUM(WholeBlood) as
 "Total_Blood_Donated", SUM(Plasma) as "Total_Plasma_Donated", SUM(Platelets) as "Total_Platelets_Donated" from
 Donations natural join Donors GROUP BY DonorID Order by DonorID;
--SELECT DConditions.DonorID, Donors.FirstName, Donors.LastName, Donors.Address, Donors.PhoneNum, Donors.Email, Donors.Blood, Donors.DOB, Donors.Gender, Donors.Hemoglobin, Conditions.ConditionName from Donors left join DConditions on Donors.DonorID = DConditions.DonorID natural join Conditions GROUP BY ConditionName;
