# Lara-Twitter

A simple twitter-like app built using laravel and vue, focused on the frameworks itself minimum work was done on the look of the website.
Largly based on this [tutorial](https://appdividend.com/amp/2018/06/11/laravel-and-vue-example-tutorial/), with a few tweeks and features added on it. 

## Features

- Simple Registration and Login functionalities.
- Registration is completed by a verification email.
- Login Limitation to activated users only, enable log in by username or email.
- Follow/Unfollow functionalities for users.
- Show posts from other followed users on your timeline.
- Paging of posts + Scrolling down will lead to paging more tweets (Similar to Facebook)
- Resetting Password of users who forgot their password.

## Clarifications

- To be able to follow user, you have to go to his profile located at \<your-server-url\>/users/\<username-of-user\>

## To-do Ideas(May be done in future)

- Implement chatting by using sockets.
- Enhance profile pages of users.
- Implement searching to find users faster.

## How To Run

- Clone the repo and go into the folder.
- Type the following command(assuming you have already composer and installed laravel): 
```composer install ```
- Install npm dependencies:
```npm install ```
- Start the watch(If you need to change any javascript files, it will recompile them automatically and publish them):
```npm run watch ```
- Create a database and configure inside the .env file.
- Migrate the database: 
```php artisan migrate```
- Configure a mail service to send emails to users inside the .env file. I used mailtrap to simulate this.
Example : 
```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=Your_username
MAIL_PASSWORD=Your_password
MAIL_ENCRYPTION=tls
ADMIN_MAIL=example@google.com

```
- Register the two users.
- Create some tweets using the signed in user.
- Logout that user and sign in with the second user.
- Go to the first user’s profile and follow it.
- Go to the home route and now you can see that followed user’s post.
- Now, create the tweets using second user and you can also see that tweets.

