# Lösningar på arbetsprov för Duva
https://github.com/DuvaAB/developers-developers-developers

### Skapa ett api i Python (`python_api/api.py`)

##### Använder "Flask" (http://flask.pocoo.org)!

`GET /` Visar en webbsida där alla produkter visas, samt möjligheten att lägga till egna

`GET /name/<product_name>` Skickar tillbaka första produkten i listan med samma namn som det specifierade

`GET /getall` Skickar tillbaka alla produkter i listan

`POST /new` Skapar en ny produkt baserad på datan i "requestet"

### Göra ett enkelt login system i PHP och SQlite (`php_users/index.php`)
SQlite databasen: `php_users/users.sqlite`

Sparar att användaren är inloggad i `$_SESSION` och hanterar lösenord med hjälp utav
```php
password_hash($rawpassword, PASSWORD_DEFAULT, array('cost' => HASH_COST));

// och

password_verify($rawpassword, $hashedpassword)
```

### Dra och släpp divvar (`javascript_dragndrop/index.html`)
En enkel dragndrop, som tonar ner den divven som blev släppt

### Kontakt info
Tel: -
Email: -
