Library Management System (DigiBook) 

1.1	Introduction

DigiBook is a website which is designed to manage books, authors, publishers, borrowers and reviews for a library. There are features for three types of users: guest, user and admin user with access to different functionality. The website is developed using Laravel and bootstrap for front-end.

1.2	Installation Process:

Step 1: Install Laravel.
![Install Laravel](screenshot/installLaravel.png)

Step 2: Installing Laravel Breeze:
![Install Laravel Breeze](screenshot/installBreeze.png)

Step 3: Creating a laravel application called library-management-system.
![Create Laravel Application](screenshot/createApplication.png)

Step 4: Install npm dependencies

Step 5: Finalise the database name and run the migration.
![Step 4 and 5](screenshot/migrate.png)
 
Step 6: Run the Laravel Server.
![Run Laravel Server](screenshot/serve.png)

1.3	Features

1.3.1	Admin Features:

Author Management	

•	Admin can view exiting authors info.

•	Admin can add new author.

•	Admin can edit already existing author.

•	Admin can delete the existing author.

Publisher Management

•	Admin can view exiting publishers’ info.

•	Admin can add new publisher.

•	Admin can edit already existing publisher.

•	Admin can delete the existing publisher.

Genre Management	

•	Admin can view exiting genres info.

•	Admin can add new genre.

•	Admin can edit already existing genre.

•	Admin can delete the existing genre.

Book Management	

•	Admin can view exiting books info.

•	Admin can add new book.

•	Admin can edit already existing book.

•	Admin can delete the existing book.

Borrower info	

•	Admin can view borrowing history i.e. the borrowing info.

•	Admin can also view user info by clicking in the borrower name.

1.3.2	User Features:

Filter	

•	User can filter book through genre and availability.

Search	

•	User can search through publisher name, author name, ISBN number and book name.

Reviews	

•	User can review book.

•	User can review publisher.

•	User can review author.

Borrowing 	

•	User can borrow available books and return it (there is no need for admin approval).

1.3.3	Guest Features:

Filter	

•	User can filter book through genre and availability.

Search	

•	User can search through publisher name, author name, ISBN number and book name.

1.4 Seeder:

The seeder for user has 2 accounts 1 for admin and another for client so logging in is easier to login.

![User Info](screenshot/info.png)

To run the seeder 'php artisan db:seed' is used: 

![Seeder](screenshot/seeder.png)

1.4.1 Project UI:

During the development and testing seeder is used so the photo is already existing in the storage folder that is the image in following images.

(1) Admin Books Pages:

Manage Books Page:

![Book](screenshot/manageBook.png)

![Book](screenshot/manageBook1.png)

Add Book Page:

![Book](screenshot/addBook.png)

![Book](screenshot/addBook1.png)

Edit Book Page:

![Book](screenshot/editBook.png)

![Book](screenshot/editBook1.png)

Delete Book Page:

![Book](screenshot/deleteBook.png)

(2) Admin Authors Pages:

Manage Authors Page:
![Authors](screenshot/manageAuthor.png)

![Authors](screenshot/manageAuthor1.png)

Add Author Page:
![Authors](screenshot/addAuthor.png)

Edit Author Page:
![Authors](screenshot/editAuthor.png)

Delete Author Page:
![Authors](screenshot/deleteAuthor.png)

(3) Admin Publishers Pages:

Manage Publishers Page:

![Publishers](screenshot/managePublisher.png)

![Publishers](screenshot/managePublisher1.png)

Add Publisher Page:

![Publishers](screenshot/addPublisher.png)

Edit Publisher Page:

![Publishers](screenshot/editPub.png)

Delete Publisher Page:

![Publishers](screenshot/deletePublisher.png)

(4) Admin Genres Pages:

Manage Genres Page:

![Genres](screenshot/manageGenre.png)

![Genres](screenshot/manageGenre1.png)

Add Genre Page:

![Genres](screenshot/addGenre.png)

Edit Genre Page:

![Genres](screenshot/editGenre.png)

Delete Genre Page:

![Genres](screenshot/deleteGenre.png)

(5) Admin Borrowers History Page:

![Borrowers](screenshot/borrowers.png)

![Borrowers](screenshot/borrowers1.png)

(6) Profile Page:

![Profile](screenshot/profile1.png)

![Profile](screenshot/profile2.png)

![Profile](screenshot/profile3.png)

(7) Home Page:(same for guest and logged user)

![Home](screenshot/guestHome.png)

![Home](screenshot/guestHome1.png)

![Home](screenshot/guestHome2.png)

(8) Filter by Availability Page:

![Filter](screenshot/Filter.png)

![Filter](screenshot/filterNotAvailable.png)

(9) Filter by Genre Page:

![Genre](screenshot/genre.png)

![Genre](screenshot/filterGenre.png)

(10) Book History:

![History](screenshot/userBook.png)

![History](screenshot/userBook1.png)

(11) Book Page:

![Book](screenshot/book1.png)

![Book](screenshot/book2.png)

(12)Reviews:

Publishers Review:

![Review](screenshot/publisherReview.png)

Author Review:

![Review](screenshot/authorReview.png)

1.5 User Guide:

1.5.1 Admin: 

1.5.1.1 Genre:

(1) Add New Genre:

Click on the Add New Genre button in genre page:

![Genres](screenshot/clickAddGenre.png)

Add the genre using the Add Button:

![Genres](screenshot/thriller.png)

Incase there is no error genre is added.

![Genres](screenshot/thrillerAdded.png)

(2) Edit Genre:

Click on the Edit button:

![Genres](screenshot/clickAddGenre.png)

Edit any info if needed then, click on the Edit button to edit the genre:

![Genres](screenshot/science.png)

(3) Delete genre:

Click on the delete button:

![Genres](screenshot/clickAddGenre.png)

This alert will be shown, if the delete button is clicked then the 
genre is deleted and if cancel is clicked the genre isn't deleted.

![Genres](screenshot/deleteGenre.png)

1.5.1.2 Publishers:

(1) Add New Publisher:

Click on the Add New Publisher button in publisher page:

![Publisher](screenshot/publisher.png)

Add the pubisher using the Add Button:

![Publisher](screenshot/crownpublishers.png)

If there is no error new publisher is added:

![Publisher](screenshot/addedCrown.png)

(2) Edit Publisher:

Click on the Edit button of publisher to edit:

![Publisher](screenshot/publisher.png)

Edit the pubisher info if needed then, click on edit button to edit the publisher:

![Publisher](screenshot/littleBrownEdit.png)

(3) Delete Publisher:

Click on the delete button:

![Publisher](screenshot/publisher.png)

This alert will be shown, if the delete button is clicked then the 
publisher is deleted and if cancel is clicked the publisher isn't deleted.

![Publisher](screenshot/deletePublisher.png)

1.5.1.3 Authors:

(1) Add New Author:

Click on the Add New Author button in author page:

![Authors](screenshot/authors.png)

Add the author using the Add Button:

![Authors](screenshot/gillian.png)

If there is no error new author is added:

![Authors](screenshot/addedGillian.png)

(2) Edit Author:

Click on the Edit button of author to edit:

![Authors](screenshot/authors.png)

Edit the author info if needed then, click on edit button to edit the author:

![Authors](screenshot/editJD.png)

(3) Delete Author:

Click on the delete button:

![Authors](screenshot/authors.png)

This alert will be shown, if the delete button is clicked then the 
author is deleted and if cancel is clicked the author isn't deleted.

![Authors](screenshot/deleteAuthor.png)

1.5.1.4 Books:

(1) Add New Book:

Click on the Add New Book button in book page:

![Book](screenshot/books.png)

Add the book using the Add Button:

![Book](screenshot/gone1.png)

![Book](screenshot/gone2.png)

If there is no error new book is added:

![Book](screenshot/goneAdded.png)

(2) Edit Book:

Click on the Edit button of book to edit:

![Book](screenshot/books.png)

Edit the book info if needed then, click on edit button to edit the book:

![Book](screenshot/bookEdit.png)

(3) Delete Book:

Click on the delete button:

![Book](screenshot/books.png)

This alert will be shown, if the delete button is clicked then the 
book is deleted and if cancel is clicked the author isn't deleted.

![Book](screenshot/deleteBook.png)

1.5.1 Normal User: 

1.5.1.1 Borrow:

Inorder to borrow the user must be logged in.

The user can easily borrow the available books using the borrow button.

![Borrow](screenshot/borrow.png)

![Borrow](screenshot/borrow1.png)

The user can see all the borrow history from book history.

![Borrow](screenshot/borrowHistory.png)

1.5.1.2 Publisher Review:

In the book page, there the publication that the book was released by. By clicking on the publication name
the reviews of the publication can be seen.

![Borrow](screenshot/publicationReview.png)

![Borrow](screenshot/publicationReview1.png)

1.5.1.3 Author Review:

In the book page, there the authors that wrote the book. By clicking on the authors name
the reviews of the author can be seen.

![Borrow](screenshot/publicationReview.png)

![Borrow](screenshot/authorReview1.png)

1.5.1.4 Search Feature:

The books can be searched based on book name, isbn number, publisher name and author name.
If the search mataches it shows the list of book with the match.

![Book Name](screenshot/bookName.png)

![Book Name](screenshot/bookName1.png)

1.5.1.4 Filter by Genre:

The books can be filtered by genre.

![Book Name](screenshot/genreFilter.png)

![Book Name](screenshot/scienceFIlter.png)

1.6 Version:

Php version -> 8.0.2

laravel version -> 9.19 
