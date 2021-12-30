# MID
Medical Imaging System


Download xamp 
https://www.apachefriends.org/index.html

Once downloaded run xamp control panel and start Apache and MySQL
Press Admin on the MySQL row which should take you to the database workbench
Click New and name the database medical_imaging then create
Then click on SQL and run this code in order to get the medical_imaging database with tables

/*Simply copy paste this code into the SQL tab on phpMyAdmin to generate new table (make sure that you delete your old tables or run this in a different database)*/
CREATE TABLE users(email VARCHAR(45), first_name VARCHAR(45), last_name VARCHAR(45), type VARCHAR(45), password VARCHAR(45), verified INT(1));
CREATE TABLE patient(patient_email VARCHAR(45) PRIMARY KEY, first_name VARCHAR(45), last_name VARCHAR(45), phone_number VARCHAR(45), gender VARCHAR(45), date_of_birth VARCHAR(45));
CREATE TABLE radiologist(radiologist_email VARCHAR(45) PRIMARY KEY, first_name VARCHAR(45), last_name VARCHAR(45), phone_number VARCHAR(45), bio LONGTEXT, provider_id INT(11), hospital VARCHAR(45));
CREATE TABLE primarydoctor(primarydoctor_email VARCHAR(45) PRIMARY KEY, first_name VARCHAR(45), last_name VARCHAR(45), hospital VARCHAR(45), pdpatient_email VARCHAR(45), provider_id INT(11));
CREATE TABLE image(imageid INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, doc_email VARCHAR(45), imgdata VARCHAR(100), feedback LONGTEXT, pat_email VARCHAR(45), rad_email VARCHAR(45), uploaddate DATETIME);
CREATE TABLE payment(payment_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, pat_email VARCHAR(45), card_number INT, cvv INT, expiration_date date);
CREATE TABLE appointment(appointment_id INT(200), patient_email VARCHAR(200), radiologist_email VARCHAR(200), comfirm_time DATETIME, imageid INT(200));

After the tables and database are created click on medical_imaging and then SQL, then run this code

INSERT INTO users (email, first_name, last_name, type, password, verified) VALUES ('patient@gmail.com', 'Patient', 'One', 'patient', 'password', 1);
INSERT INTO users (email, first_name, last_name, type, password, verified) VALUES ('doctor@gmail.com', 'Doctor', 'One', 'doctor', 'password', 1);
INSERT INTO users (email, first_name, last_name, type, password, verified) VALUES ('radiologist@gmail.com', 'Radiologist', 'One', 'radiologist', 'password', 1);
INSERT INTO patient (patient_email, first_name, last_name) VALUES ('patient@gmail.com', 'Patient', 'One');
INSERT INTO primarydoctor (primarydoctor_email, first_name, last_name) VALUES ('doctor@gmail.com', 'Doctor', 'One');
INSERT INTO radiologist (radiologist_email, first_name, last_name) VALUES ('radiologist@gmail.com', 'Radiologist', 'One');

Now just simple add the folder medicalImaging into the directory xampp/htdocs should be where ever you installed xampp.
Finally just open up chrome and in the url section type in localhost/medicalImaging and select login2.html

Also in order to view images you will need to upload some as a doctor to any patient account that has been created. 
For example log in as a doctor and upload some test images to patient@gmail.com 

Also for every new account registered it will need to be confirmed first before the account can log into the system.
Accounts are confirmed or denied through our administrative email: 
medicalimagingsolutions21@gmail.com
Password: Medical21!
