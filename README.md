# Test task for the company "Digex"
The task is as follows:

to build a Laravel app (simple design)

The Structure:
users can add a post (it should have a text body and a title)

users can make a comment to the posts/photos

also, they can reply to comments (replies also can be replied)

The Functional:

user registration

user login

show the list of all users

show the list of all posts

add post

edit/delete your own post

show the list of posts of a user

add a comment to the post

reply to the comment

-----------------------------------------------------
# Developer comments
If you want not only check my code, but also run application you should pay attentions 
about some additional settings to make app to work properly. Namely:

- run command "php artisan storage:link" so uploaded images can be accessible
- run database migrations

If you need test data then you can use database seeder. The seeder creates several users 
and create posts for some of them. Some posts will have logo image, and some of them haven't.
Also, seeder creates several comments and replies for random posts.
