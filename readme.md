# sen1: 
in this senario we making the first senario of sending message : 
the algorthim :

- try to save the message in the server side with out refreshing the page 
- set pusher channels and data 

## commit1 : create the datebase strucher :

#### create the datebase strucher :
for this commit we will create the following tables inide the database in the first step :
1. **secret chanells** table content | secrect chanells | description
2. **users** table content | username | password | secret chanell 
3. **secret chanell messages table** content | messagebody | from | date | seen to
will make the secret chanell messages table later dynamic with php after founded the secret chanell and going to chat page if not founded the table then creat a one for this specific chanell .

# sen1.1:
in this section we will make the action to going to chat page after founding the secret chanell ... like : 
- secret chanell founded
- going to the login or what named right now set name and then insert username and password 
- check if the user authencated 
- going to the chat page after checking if the secret chanell messages table already created in the database 

## commit1: set up the configration file (db.php) :
**db.php** will allow us to configuer the connection between php and mySQL when we need it 
[Udemy helper video to connect database in the right secure way](https://www.udemy.com/php-for-complete-beginners-includes-msql-object-oriented/learn/lecture/2507948#overview)

## commit2: verify the chanell
take the secret chanell from the user as an input and validate if founded in the database to redirct the user to login to chanell page if the chanell not exist then the user will be redirect to index.php 
[Udemy helper video to validate from database in php](https://www.udemy.com/php-for-complete-beginners-includes-msql-object-oriented/learn/lecture/2559712#overview)

## commit3: send verfied secret chanell to login page:
to make the login specific to this secret chanell and more opration.. inside the login page we used right here sesson to send the secret chanell with. and reject the empty value that come from user ...

## commit4: design login page:
inside the loginToChanell.php  with previues verifed the secert chanell 


# sen1.2:
in this section we will trying to save the sended message to the database with out refreshing the hole page and try to retrive it in the messages table 

## commit description : 
- validate if the message empty or not inside js
- add the message node to the messages table after pass it inside db.php file

## commit description :
add check chanell messages table function to db.php to:
- check if the messages table for this chanell is alread exist 
- create messages table for chanell if not exist 
- return the result as int where : 1-> table already exist 2-> new table created 0-> failed to found and create the table

and fixed the js error when retrive the secret chanell value and username


## commit description : 
save the message to the database 

## commit description :
to make the database support other languages which content other english alphabet we need to change the collations in the database to utf-general-ci and add the charset to the database connection.

# sen1.3:
in this section we will trying to: 
- get the sent messages from user A to the user B messages table with out refreshing the page 

## Trigger pusher Event:
trigger pusher chanell with event send message when the user send the message after sotred it in the database

## handel the Event:

## add message to messages table after checking the current user
- check if the current user how created the trigger if not handel trigger
- and create the message body in the messages table
