<p align="center"><a href="https://drive.google.com/file/d/12ckZEt-wieTANn6SJatvrkPC1e9n5OwL/view" target="_blank"><img src="https://raw.githubusercontent.com/Rayhan133/CRUD/master/public/dist/img/CRUD%20(README%20Imge).png" width="400"></a></p>



Task Name: Create Read Update Delete Operation

Requirement:
CRUD - means  "Create Read Update Delete"
In this task, you have to Create, Read, Update and Delete certain module's data. normally Read should be a tabular format data with pagination.

Tasklist
1. Admin login
    a. User CRUD
    b. give Block/Unblock option User Read table
    note: Password should be encrypted. if a User is blocked user can't log in.
2. User Login
    a. Dashboard
        note: Find an Admin template free from google and see the dashboard.
        you will see some boxes and show some counts. We need 3 boxes with the count. Total Files, Total Groups, Total Contacts. you have to show the count from the database.
    b. Contact Upload
        I. User will upload a comma-delimited CSV/txt file with a fixed format
           (number, first name, last name, email, state, zip)
        II. There are some fields with file upload
             -- Name
             -- Split point
         Note: In the file, there could be some columns missing on the right side. it will be assumed empty/'' if not found. number column is required. you have to validate the number and if not validated you have to reject that row. validation format is if the number should contain only digits. it can have max 12 characters. the valid formats are (+1xxxxxxxxxx, 1xxxxxxxxxx, xxxxxxxxxx) where 'x' means digit. after validation of the whole file, you have to chunk the data with the size of Split Point. 
Suppose you have 1000 data in file. Split Point is 100. 80 data are rejected during validation. so now you have 920 data. you have to Split those on every 100th point. so 100,100,100,100,100,100,100,100,100,80. you will have this kind of chunk. so if your File Name in form is 'Sample', you need a 'group' table and you have to create 10 groups in database related to uploaded file. the group name will be Sample_1, Sample_2 and so on. You will insert the above chunks data to the 'contact' table related with the groups
so in short you have to upload a file, split into groups, groups will have contacts separately. there will be a db table where you will store the uploaded file. I need the two field, 1. Total uploaded contact, 2. total processed contact. as per above example the total uploaded contact is 1000 and the processed contact is 980.


👍 Note: Click on the image and see this project in a short video.
