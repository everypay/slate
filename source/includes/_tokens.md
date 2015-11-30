# Tokens


    Τα **Tokens** είναι προσωρινά, μοναδικά αναγνωριστικά που μπορούν να χρησιμοποιηθούν για να εκτελεστεί μια λειτουργία πληρωμής μέσω πιστωτικής κάρτας, χωρίς να χρειάζεται να μεταδωθούν τα ευαίσθητα στοιχεία της. 


    Ισχύουν μόνο για μια συναλλαγή και έχουν περιορισμένη διάρκεια ζωής (15 λεπτά), μετά την οποία απορρίπτονται. Αν θέλετε να χρεώνετε μία κάρτα επαναληπτικά (π.χ. συνδρομή), τότε μπορείτε να δημιουργήσετε ένα [αντικείμενο Πελάτη](#Πελάτες) και η χρέωση θα γίνεται με χρήση αυτού. 


## Δημιουργία Τoken


>Δημιουργία Token κάρτας με το δημόσιο κλειδί.


```shell
curl https://api.everypay.gr/tokens
  -u pk_atFzbY3VB94gFFJ3FxArEWM8DpnuA1y8:
  -d amount=1099
  -d card_number=4242424242424242
  -d expiration_year=2016
  -d expiration_month=05
  -d cvv=334
  -d holder_name="John Doe"
```


```php
<?php
require_once '../autoload.php';

use Everypay\Everypay;
use Everypay\Token;

Everypay::setApiKey('pk_atFzbY3VB94gFFJ3FxArEWM8DpnuA1y8');

$params = array(
    'amount' => 1099
    'card_number' => '4242424242424242',
    'expiration_year' => '2016',
    'expiration_month' => '05',
    'cvv' => '334',
    'holder_name'=>'John Doe'
);

$token = Token::create($params);
```


>Απάντηση σε JSON για curl ή Object για php


```shell
{
    "token": "ctn_zUOwAdOqWe9BjQ86dYTWr13I",
    "is_used": false,
    "has_expired": false,
    "amount": 1099,
    "date_created": "2015-07-24T16:36:39+0300",
    "card": {
        "expiration_month": "05",
        "expiration_year": "2016",
        "last_four": "4242",
        "type": "Visa",
        "holder_name": "John Doe",
        "supports_installments": false,
        "max_installments": 0
    }
}
```


```php
<?php
stdClass Object
(
    [token] => ctn_zUOwAdOqWe9BjQ86dYTWr13I
    [is_used] => 
    [has_expired] => 
    [amount] => 1099
    [date_created] => 2015-07-24T16:36:39+0300
    [card] => stdClass Object
        (
            [expiration_month] => 05
            [expiration_year] => 2016
            [last_four] => 4242
            [type] => Visa
            [holder_name] => John Doe
            [supports_installments] => 
            [max_installments] => 0
        )

)
```

>Δημιουργία Token κάρτας που υποστηρίζει δόσεις, με το δημόσιο κλειδί.


```shell
curl https://api.everypay.gr/tokens
  -u pk_atFzbY3VB94gFFJ3FxArEWM8DpnuA1y8:
  -d amount=10000
  -d card_number=4908440000000003
  -d expiration_year=2016
  -d expiration_month=08
  -d cvv=123
  -d holder_name="John Doe"
```


```php
<?php
require_once '../autoload.php';

use Everypay\Everypay;
use Everypay\Token;

Everypay::setApiKey('pk_atFzbY3VB94gFFJ3FxArEWM8DpnuA1y8');

$params = array(
    'amount' => 10000
    'card_number' => '4908440000000003',
    'expiration_year' => '2016',
    'expiration_month' => '08',
    'cvv' => '123',
    'holder_name'=>'John Doe'
);

$token = Token::create($params);
```


>Απάντηση σε JSON για curl ή Object για php


```shell
{
    "token": "ctn_zUOwAdOqWe9BjQ86dYTWr13I",
    "is_used": false,
    "has_expired": false,
    "amount": 10000,
    "date_created": "2015-07-24T16:36:39+0300",
    "card": {
        "expiration_month": "08",
        "expiration_year": "2016",
        "last_four": "0003",
        "type": "Visa",
        "holder_name": "John Doe",
        "supports_installments": true,
        "max_installments": 3
    }
}
```


```php
<?php
stdClass Object
(
    [token] => ctn_zUOwAdOqWe9BjQ86dYTWr13I
    [is_used] => 
    [has_expired] => 
    [amount] => 10000
    [date_created] => 2015-07-24T16:36:39+0300
    [card] => stdClass Object
        (
            [expiration_month] => 08
            [expiration_year] => 2016
            [last_four] => 0003
            [type] => Visa
            [holder_name] => John Doe
            [supports_installments] => 1
            [max_installments] => 3
        )

)
```


   &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** | https://api.everypay.gr/tokens
**Μέθοδος** | POST
**Περιγραφή** | Δημιουργία αντικειμένου **Token**, συσχετισμένο με ορισμένες πληροφορίες της κάρτας.


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
PUBLIC KEY | Ναι | string(35) | Το δημόσιο κλειδί (ή το ιδιωτικό) δίνεται σαν username για HTTP πρόσβαση.
card_number | Ναι | integer(16) | O αριθμός της κάρτας.
holder_name | Ναι | string(255) | To όνομα κατόχου της κάρτας.
expiration_year | Ναι | integer(4) | Έτος λήξης της κάρτας (4 ψηφία).
expiration_month | Ναι | integer(2) |Μήνας λήξης της κάρτας (2 ψηφία).
cvv | Ναι | integer(3) | Ο τριψήφιος κωδικός ασφαλείας στο πίσω μέρος της κάρτας.
amount | Όχι | integer | Το ποσό της χρέωσης σε cents (χωρίς σημεία στίξης π.χ. 1099 αντί 10,99). Μπορεί να προσδιοριστεί αργότερα κατά τη χρήση του token για κάποια αγορά.


## Ανάκτηση Token κάρτας.


>Ερώτημα (query) για ένα Token κάρτας που έχει ήδη δημιουργηθεί όπως παραπάνω.


```shell
curl https://api.everypay.gr/tokens/ctn_zUOwAdOqWe9BjQ86dYTWr13I 
    -u pk_atFzbY3VB94gFFJ3FxArEWM8DpnuA1y8:
```


```php
<?php
require_once '../autoload.php';

use Everypay\Everypay;
use Everypay\Token;

Everypay::setApiKey('pk_atFzbY3VB94gFFJ3FxArEWM8DpnuA1y8');

$token_id = 'ctn_zUOwAdOqWe9BjQ86dYTWr13I';

$token = Token::retrieve($token_id);
```


>Απάντηση σε JSON


```shell
{
    "token": "ctn_zUOwAdOqWe9BjQ86dYTWr13I",
    "is_used": false,
    "has_expired": false,  
    "amount": 1099,
    "date_created": "2015-07-24T16:36:39+0300",
    "card": {
        "expiration_month": "05",
        "expiration_year": "2016",
        "last_four": "4242",
        "type": "Visa",
        "holder_name": "John Doe",
        "supports_installments": false,
        "max_installments": 0
    }
}
```


```php
<?php
stdClass Object
(
    [token] => ctn_zUOwAdOqWe9BjQ86dYTWr13I
    [is_used] => 
    [has_expired] => 
    [amount] => 1099
    [date_created] => 2015-07-24T16:36:39+0300
    [card] => stdClass Object
        (
            [expiration_month] => 05
            [expiration_year] => 2016
            [last_four] => 4242
            [type] => Visa
            [holder_name] => John Doe
            [supports_installments] => 
            [max_installments] => 0
        )

)
```


   &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** | https://api.everypay.gr/tokens/{TOKEN_ID}
**Μέθοδος** | GET
**Περιγραφή** | Επιστρέφει τις πληροφορίες για ένα δεδομένο Token.


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
PUBLIC KEY | Ναι | string(35) | Το δημόσιο κλειδί (ή το ιδιωτικό) δίνεται σαν username για HTTP πρόσβαση.
{TOKEN_ID} | Ναι | string(28) | To id του token το οποίο μας ενδιαφέρει, μεταδίδεται απευθείας από τη διεύθυνση URL .


## Τα πεδία του αντικειμένου Token


**Πεδίο** | **Τύπος** | **Περιγραφή**
------|:-------------|----------
token | string(28) | To μοναδικό αναγνωριστικό (ID) του Token.
is_used | true / false | Δείκτης αν το Token αυτό έχει χρησιμοποιηθεί στο παρελθόν.
has_expired | true / false | Δείκτης αν το Token αυτό έχει ξεπεράσει το χρόνο ζωής του. Τα Tokens που τον έχουν ξεπεράσει δεν μπορούν να χρησιμοποιηθούν. 
amount | integer | Το ποσό της χρέωσης σε cents (χωρίς σημεία στίξης π.χ. 1099 αντί 10,99).
date_created | string(255) | Ημερομηνία δημιουργίας του Token.
card | json | Ένα [αντικείμενο κάρτας](#Τα-πεδία-του-αντικειμένου-κάρτας) (βλ.παρακάτω).


## Τα πεδία του αντικειμένου κάρτας


**Πεδίο** | **Τύπος** | **Περιγραφή**
------|-------------|----------
expiration_month | string(2) | Μήνας λήξης της κάρτας.
expiration_year | string(4) | Έτος λήξης της κάρτας.
last_four | string(4) | Τα τελευταία 4 ψηφία της κάρτας.
type | string(255) | Ο τύπος της κάρτας: "Visa", "Mastercard" κλπ.
holder_name | string(255) | Το όνομα κατόχου της κάρτας.
supports_installments | boolean |  Το αν υποστηρίζει ή όχι δόσεις η συγκεκριμένη κάρτα.
max_installments | integer | Ο μέγιστος αριθμός των δόσεων που υποστηρίζει η συγκεκριμένη κάρτα. Αν δεν υποστηρίζει καθόλου δόσεις ο αριθμός είναι 0.