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