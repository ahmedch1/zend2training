# zend2training
###In this step 
###2-create-module-folders
###I have created structure of the module


**module/BookList/config**
**module/BookList/src/BookList/Controller**
**module/BookList/src/BookList/Form**
**module/BookList/src/BookList/Model**

##Lecture 2
###6- Installing-zftool
##Downloading composer.phar (depending on your php version)
php composer.phar require zendframework/zftool:dev-master
###7 ZFTool and Module Creation
php vendor/bin/zf.php create module test


##Lecture 4
##Create database named book_list_training from phpmyadmin

CREATE TABLE book (
id INT NOT NULL AUTO_INCREMENT,
title VARCHAR(255) NOT NULL,
author VARCHAR(255) NOT NULL,
PRIMARY KEY (id)
);


INSERT INTO book (title, author) VALUES
('The Great Gatsby', 'F. Scott Fitzgerald'),
('To Kill a Mockingbird', 'Harper Lee'),
('1984', 'George Orwell'),
('Pride and Prejudice', 'Jane Austen');
