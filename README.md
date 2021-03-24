# Love-Sushi
Final project for SDEV328

Love Sushi is an innovative new way to order your favorite varieties of sushi in a meal for a low rate. You simply order your choice of two sushi varieties and drink. 

1.Separates all database/business logic using the MVC pattern.
Our model folder holds all files dealing with validation, data layers, and database manipulation. The views folder contains files of how each page will be seen and the controllers file renders the various pages for the sushi website and responds to the user input and performs interactions on the data model objects. 

2.Routes all URLs and leverages a templating language using the Fat-Free framework.
All routes are established through the controller/index files.

3.Has a clearly defined database layer using PDO and prepared statements. You should have at least two related tables.
We used PDO and prepared statements to insert orders into a meal order table and customers into a customer table from the form and show the data in the admin page. The customer table contains a foreign key referencing the meal order table.

4.Data can be viewed and added.
In the admin page, the client can view the data from the database. Sushi customers’ data will be added to the database when an order is confirmed.

5.Has a history of commits from both team members to a Git repository. Commits are clearly commented.
We have over 70 commits that explain every step we did.

6.Uses OOP, and defines multiple classes, including at least one inheritance relationship.
There are four classes defined in the program. There is a Customer class, which contains all data of a customer. There is also an Adult Customer class, which is a subclass of the Customer class. There is also an Order class that is the parent class of the Adult Order class.

7.Contains full Docblocks for all PHP files and follows PEAR standards.
All PHP files are commented and documented. PEAR standards followed.

8.Has full validation on the client side through JavaScript and server side through PHP.
Has full validation on the client side through JavaScript(scripts folder) and server side through PHP(model/validate.PHP). Full documentation in PHP files.

9.All code is clean, clear, and well-commented. DRY (Don't Repeat Yourself) is practiced.
Any code that was repeated was turned into a function and called upon instead of repeating code.

10.Your submission shows adequate effort for a final project in a full-stack web development course.
We worked on this project multiple times a week from the start of this project. Contains database manipulation as well as a clean design.


![20210311_135809](https://user-images.githubusercontent.com/72149509/110860943-462a6c00-8272-11eb-8970-336641914808.jpg)
![20210311_135829](https://user-images.githubusercontent.com/72149509/110861024-61957700-8272-11eb-97f7-34967ff3d4ea.jpg)
