
The application for exchange Hi-Fi equipment, created in Laravel framework with composer packages.

Packages included in Application:
- laravelcollective/html => creating form in blade templates
- cviebrock/eloquent-sluggable => rewrite url


- Also use Node.js for compile SASS file

The Application uses blade template for views, and CKeditor when inserting text in the database.

After register application gives a user option to insert new product in the database, and connect new and existing product with personal equipment.
Admin user has the option to approve\un-approve product after product is created, and only after the product is approved from administrator product is available to users.
If a user has some product wich is letter un-approved this product is the only visible user in personal equipment list, but not for rest of user.
Each user and product have an option to have an image, and all images are set with polymorphic relation with table images.
The user has the option to change a picture, and if it does, old images are removed from database and storage, and is replaced with new one.
The user also has the option to change personal data, and if change password, it will be automatic encrypted.

The database is optimized and uses a polymorphic connection for access image, and for image, table is created accessor to simplify access to image path.
In database is inserted some basic value (roles, admin user, products...),
and for testing purpose only is a need to pull repository and migrate tables to a database.

For the application I created Controllers with native method (index, create...) , and use native Authorisation system.
Form validation I solved through created Requests, and application security I solved through a creation of middleware.
Middleware is included through route.

![alt tag](http://www.consilium-europa.com/github/hi-fi_exchange/hi_fi_admin.png)

![alt tag](http://www.consilium-europa.com/github/hi-fi_exchange/hi_fi_personal.png)