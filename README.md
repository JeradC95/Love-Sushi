# Love-Sushi
Final project for SDEV328

Love Sushi is an innovative new way to order your favorite varieties of sushi in a meal for a low rate. You simply order your choice of two sushi varieties and drink. 

Our model folder holds all files dealing with validation, data layers, and database manipulation. The views folder contains files of how each page will be seen and the controllers file renders the various pages for the sushi website.

All routes are established through the controller/index files.

We used PDO and prepared statements to insert orders(into a meal order table) and (customers into a customer table) from the form and show the data in the admin page. The customer table contains a foreign key referencing the meal order table.

Has full validation on the client side through JavaScript(scripts folder) and server side through PHP(model/validate.PHP). Full documentation in PHP files.

There are four classes defined in the program. There is a Customer class, which contains all data of a customer. There is also an Adult Customer class, which is a subclass of the Customer class. There is also an Order class that is the parent class of the Adult Order class.

![20210311_135809](https://user-images.githubusercontent.com/72149509/110860943-462a6c00-8272-11eb-8970-336641914808.jpg)
![20210311_135829](https://user-images.githubusercontent.com/72149509/110861024-61957700-8272-11eb-97f7-34967ff3d4ea.jpg)
