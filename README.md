This branch contains a more secure version of the website where preventive measures have been taken into account. 

## Clickjacking
Clickjacking has been mitigated with the use of a framekiller and by setting the Content-Security-Policy header with a value of "frame-ancestors 'self'" to each outgoing response from the server.
See public/index.php & utilities/framekiller.php. The framekiller is included in the footer which, in turn, is included in each page. 

## CSRF
CSRF has been mititgated with the use of CSRF tokens. See views/account.php, controllers/account.php & controllers/account/destroy.php.

## Reflected XSS
Reflected XSS has been mitigated with input sanitization using the built-in php-function htmlspecialchars(). See for example controllers/account/edit.php & views/reviews.view.php.

## Session fixation 
Session fixation has been mitigated as a consequence of the use of input sanitization which mitigates reflected XSS & stored XSS (which was used to perform the session fixation attack). 

## Session hijacking
The session hijacking attack was dependent on the use of the stored XSS attack. Since the stored XSS has been mitigated so has the session hijacking attack.

## SQL injection
SQL injection has been prevented with the use of prepared statements. See db/DatabaseHandler.php.

## Stored XSS
Stored XSS has been mitigated with input sanitization using the built-in php-function htmlspecialchars(). See views/reviews.view.php.