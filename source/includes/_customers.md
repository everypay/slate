# Πελάτες


    Το αντικείμενο **Πελάτη** μπορεί να χρησιμοποιηθεί για περιπτώσεις που απαιτούν αυτοματοποιημένη τιμολόγηση (π.χ. συνδρομή), χωρίς να χρειάζεται να αποθηκεύετε ευαίσθητα δεδομένα στον server της εφαρμογής σας. Δημιουργώντας ένα τέτοιο αντικείμενο θα μπορείτε να εκτελείτε τις συναλλαγές μεταδίδοντας στην υπηρεσία μας μόνο το **Token** του πελάτη. 


## Δημιουργία Πελάτη με στοιχεία κάρτας


>Δημιουργία Πελάτη με τα στοιχεία της κάρτας και το ιδιωτικό κλειδί.


```shell
curl https://api.everypay.gr/customers 
 -u sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:
 -d card_number=4242424242424242 
 -d expiration_year=2016 
 -d expiration_month=05 
 -d email='cofounder@themail.com' 
 -d cvv=334 
 -d holder_name="John Doe" 
 -d description="Club Member" 
```

```php
<?php
require_once '../autoload.php';

use Everypay\Everypay;
use Everypay\Customer;

Everypay::setApiKey('sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R');

$params = array(
    'card_number' => '4242424242424242',
    'expiration_year' => '2016',
    'expiration_month' => '05',
    'email' => 'cofounder@themail.com',
    'cvv' => '334',
    'holder_name' => 'John Doe',
    'description' => 'Club Member'
);

$customer = Customer::create($params);
```


>Απάντηση σε JSON για curl ή Object για php


```shell
{
    "description": "Club Member",
    "email": "cofounder@themail.com",
    "date_created": "2015-07-28T10:51:12+0300",
    "full_name": null,
    "token": "cus_uVMLP6Ud06CkK3ZglkhHw7IH",
    "is_active": true,
    "date_modified": "2015-07-28T10:51:12+0300",
    "card": {
        "expiration_month": "05",
        "expiration_year": "2016",
        "last_four": "4242",
        "type": "Visa",
        "holder_name": "John Doe"
    }
}
```


```php
<?php
stdClass Object
(
    [description] => Club Member
    [email] => cofounder@themail.com
    [date_created] => 2015-07-28T10:51:12+0300
    [full_name] => 
    [token] => cus_uVMLP6Ud06CkK3ZglkhHw7IH
    [is_active] => 1
    [date_modified] => 2015-07-28T10:51:12+0300
    [card] => stdClass Object
        (
            [expiration_month] => 05
            [expiration_year] => 2016
            [last_four] => 4242
            [type] => Visa
            [holder_name] => John Doe
        )
)
```


   &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** |  https://api.everypay.gr/customers
**Μέθοδος** | POST
**Περιγραφή** | Δημιουργεί ένα νέο αντικείμενο Πελάτη, συσχετισμένο με ορισμένες πληροφορίες (συμπεριλαμβανομένων των στοιχείων κάρτας). To αντικείμενο αυτό και όλες οι επόμενες κινήσεις του, θα είναι συνδεδεμένο με την εταιρεία της οποίας χρησιμοποιούμε το Ιδωτικό κλειδί.


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(35) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
card_number | Ναι | integer(16) | O αριθμός της κάρτας.
holder_name | Ναι | string(255) | To όνομα κατόχου της κάρτας.
expiration_year | Ναι |integer(4) | Έτος λήξης της κάρτας (4 ψηφία).
expiration_month | Ναι | integer(2) | Μήνας λήξης της κάρτας (2 ψηφία).
cvv | Ναι | integer(3) | Ο τριψήφιος κωδικός ασφαλείας στο πίσω μέρος της κάρτας.
description | Όχι | string(255) | Μία σύντομη περιγραφή.
email | Όχι | string(100) | H διεύθυνση email του πελάτη.
full_name | Όχι | string(255) | Το όνομα του πελάτη.



## Δημιουργία Πελάτη με χρήση Token


>Δημιουργία Πελάτη με χρήση Token και το ιδιωτικό κλειδί.


```shell
curl https://api.everypay.gr/customers   
  -u sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:   
  -d token=ctn_zUOwAdOqWe9BjQ86dYTWr13I  
  -d full_name="Smith Hill Co"
```



```php
<?php
require_once '../autoload.php';

use Everypay\Everypay;
use Everypay\Customer;

Everypay::setApiKey('sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R');

$params = array(
    'token' => 'ctn_zUOwAdOqWe9BjQ86dYTWr13I',
    'full_name' => 'Smith Hill Co'
);

$customer = Customer::create($params);
```

>Απάντηση σε JSON για curl ή Object για php


```shell
{
    "description": null,
    "email": null,
    "date_created": "2015-07-28T11:19:55+0300",
    "full_name": "Smith Hill Co",
    "token": "cus_b7QO01Ie4csrDAkRjXijK7aM",
    "is_active": true,
    "date_modified": "2015-07-28T11:19:55+0300",
    "card": {
        "expiration_month": "05",
        "expiration_year": "2016",
        "last_four": "4242",
        "type": "Visa",
        "holder_name": "John Doe"
    }
}
```

```php
<?php
stdClass Object
(
    [description] => 
    [email] => 
    [date_created] => 2015-07-28T11:19:55+0300
    [full_name] => Smith Hill Co
    [token] => cus_b7QO01Ie4csrDAkRjXijK7aM
    [is_active] => 1
    [date_modified] => 2015-07-28T11:19:55+0300
    [card] => stdClass Object
        (
            [expiration_month] => 05
            [expiration_year] => 2016
            [last_four] => 4242
            [type] => Visa
            [holder_name] => John Doe
        )
)
```


   &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** | https://api.everypay.gr/customers
**Μέθοδος** | POST
**Περιγραφή** |  Δημιουργεί ένα νέο αντικείμενο Πελάτη όπως παραπάνω, με τη διαφορά οτι τα στοιχεία της κάρτας δίνονται μέσω ενός προδημιουργημένου [Token κάρτας](#Δημιουργία-Τoken) (βλ. παραπάνω).


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(35) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
token | Ναι | string(28) | To Token (αχρησιμοποίητο) που έχουμε δημιουργήσει για μία κάρτα.
description | Όχι | string(255) | Μία σύντομη περιγραφή.
full_name | Όχι | string(255) | Το όνομα του πελάτη.
email | Όχι | string(100) | H διεύθυνση email του πελάτη.


## Τα πεδία του αντικειμένου Πελάτη


**Πεδίο** | **Τύπος** | **Περιγραφή**
------|:-------------|----------
description | string(255) / null | Η περιγραφή του πελάτη.
email | string(100) / null | To email του πελάτη.
date_created | string(255) | Η ημερομηνία δημιουργίας του πελάτη.
full_name | string(255) | Το όνομα του πελάτη.
token  | string(35) | Το μοναδικό αναγνωριστικό (ID) του πελάτη.
is_active | true / false | Δείκτης εάν ο πελάτης είναι ενεργός.
date_modified | string(255) | Η ημερομηνία στην οποία άλλαξαν τελευταία φορά κάποια στοιχεία του πελάτη.
card | json | Ένα [αντικείμενο κάρτας](#Τα-πεδία-του-αντικειμένου-κάρτας) (βλ.παραπάνω) συσχετισμένο με τον πελάτη.


## Ανάκτηση πελάτη


> Ερώτημα (query) για έναν Πελάτη


```shell
curl https://api.everypay.gr/customers/cus_b7QO01Ie4csrDAkRjXijK7aM 
    -u sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:
```


```php
<?php
require_once '../autoload.php';

use Everypay\Everypay;
use Everypay\Customer;

Everypay::setApiKey('sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R');

$params = array(
    'token' => 'cus_b7QO01Ie4csrDAkRjXijK7aM'
);

$customer = Customer::retrieve($params);
```


>Απάντηση σε JSON για curl ή Object για php


```shell
{
    "description": null,
    "email": null,
    "date_created": "2015-07-28T11:19:55+0300",
    "full_name": "Smith Hill Co",
    "token": "cus_b7QO01Ie4csrDAkRjXijK7aM",
    "is_active": true,
    "date_modified": "2015-07-28T11:19:55+0300",
    "card": {
        "expiration_month": "05",
        "expiration_year": "2016",
        "last_four": "4242",
        "type": "Visa",
        "holder_name": "John Doe"
    }
}
```


```php
<?php
stdClass Object
(
    [description] => 
    [email] => 
    [date_created] => 2015-07-28T11:19:55+0300
    [full_name] => Smith Hill Co
    [token] => cus_b7QO01Ie4csrDAkRjXijK7aM
    [is_active] => 1
    [date_modified] => 2015-07-28T11:19:55+0300
    [card] => stdClass Object
        (
            [expiration_month] => 05
            [expiration_year] => 2016
            [last_four] => 4242
            [type] => Visa
            [holder_name] => John Doe
        )
)
```


   &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** | https://api.everypay.gr/customers/{CUSTOMER_ID}
**Μέθοδος** | GET
**Περιγραφή** | Επιστρέφει τις πληροφορίες για το αντικείμενο του πελάτη.


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(35) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
{CUSTOMER_ID} | Ναι | string(28) | To id του πελάτη μεταδίδεται απευθείας από τη διεύθυνση URL.


## Επεξεργασία Πελάτη


> Επεξεργασία (ενημέρωση στοιχείων) πελάτη


```shell
curl https://api.everypay.gr/customers/cus_b7QO01Ie4csrDAkRjXijK7aM  
  -u sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:
  -X PUT
  -d email="johnDoe@gmail.com"
  -d description="Fitch LiSP customer"
```


```php
<?php
require_once '../autoload.php';

use Everypay\Everypay;
use Everypay\Customer;

Everypay::setApiKey('sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R');

$token = 'cus_b7QO01Ie4csrDAkRjXijK7aM';

$params = array(
    'email' => 'johnDoe@gmail.com',
    'description' => 'Fitch LiSP customer'
);

$customer = Customer::update($token, $params);
```


>Απάντηση σε JSON για curl ή Object για php


```shell
{
    "description": "Fitch LiSP customer",
    "email": "johnDoe@gmail.com",
    "date_created": "2015-07-28T11:19:55+0300",
    "full_name": "Smith Hill Co",
    "token": "cus_b7QO01Ie4csrDAkRjXijK7aM",
    "is_active": true,
    "date_modified": "2015-07-30T08:00:12+0300",
    "card": {
        "expiration_month": "05",
        "expiration_year": "2016",
        "last_four": "4242",
        "type": "Visa",
        "holder_name": John Doe
    }
}
```

```php
<?php
stdClass Object
(
    [description] => Fitch LiSP customer
    [email] => johnDoe@gmail.com
    [date_created] => 2015-07-28T11:19:55+0300
    [full_name] => Smith Hill Co
    [token] => cus_b7QO01Ie4csrDAkRjXijK7aM
    [is_active] => 1
    [date_modified] => 2015-07-30T08:00:12+0300
    [card] => stdClass Object
        (
            [expiration_month] => 05
            [expiration_year] => 2016
            [last_four] => 4242
            [type] => Visa
            [holder_name] => John Doe
        )

)
```


   &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** | https://api.everypay.gr/customers/{CUSTOMER_ID}
**Μέθοδος** | PUT
**Περιγραφή** | Επεξεργασία των στοιχείων ενός πελάτη.


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(35) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
card_number | Όχι | integer(16) | O αριθμός της κάρτας.
holder_name | Όχι / Ναι | string(255) |	To όνομα κατόχου της κάρτας. Υποχρεωτικό στην περίπτωση που αλλάζετε και το card_number
expiration_year | Όχι / Ναι | integer(4) |	Έτος λήξης της κάρτας (4 ψηφία). Υποχρεωτικό στην περίπτωση που αλλάζετε και το card_number.
expiration_month | Όχι / Ναι | integer(2) |	Μήνας λήξης της κάρτας (2 ψηφία). Υποχρεωτικό στην περίπτωση που αλλάζετε και το card_number.
cvv | Όχι / Ναι | integer(3) | Ο τριψήφιος κωδικός ασφαλείας στο πίσω μέρος της κάρτας. Υποχρεωτικό στην περίπτωση που αλλάζετε και το card_number.
description | Όχι | string(255) | Μία σύντομη περιγραφή.
full_name | Όχι | string(255) | Το όνομα του πελάτη.
email | Όχι | string(100) | H διεύθυνση email του πελάτη.
{CUSTOMER_ID} | Ναι | string(28) | To id του πελάτη μεταδίδεται απευθείας από τη διεύθυνση URL.


## Διαγραφή Πελάτη


> Διαγραφή Πελάτη


```shell
curl https://api.everypay.gr/customers/cus_b7QO01Ie4csrDAkRjXijK7aM
  -u sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:
  -X DELETE
```


```php
<?php
require_once '../autoload.php';

use Everypay\Everypay;
use Everypay\Customer;

Everypay::setApiKey('sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R');

$token = 'cus_b7QO01Ie4csrDAkRjXijK7aM';

$customer = Customer::delete($token);
```


>Απάντηση σε JSON για curl ή Object για php


```shell
{
    "description": "Fitch LiSP customer",
    "email": "johnDoe@gmail.com",
    "date_created": "2015-07-28T11:19:55+0300",
    "full_name": "Smith Hill Co",
    "token": "cus_b7QO01Ie4csrDAkRjXijK7aM",
    "is_active": false,
    "date_modified": "2015-07-31T10:35:47+0300"
}
```


```php
stdClass Object
(
    [description] => Fitch LiSP customer
    [email] => johnDoe@gmail.com
    [date_created] => 2015-07-28T11:19:55+0300
    [full_name] => Smith Hill Co
    [token] => cus_b7QO01Ie4csrDAkRjXijK7aM
    [is_active] => 
    [date_modified] => 2015-07-31T10:35:47+0300
)
```


   &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** | https://api.everypay.gr/customers/{CUSTOMER_ID}
**Μέθοδος** | DELETE
**Περιγραφή** |  Διαγραφή ενός αντικειμένου πελάτη. Λόγω θεμάτων ασφαλείας, το αντικείμενο ποτέ δεν διαγράφεται πραγματικά, αλλά γίνεται μόνιμα ανενεργό. Η διαδικασία αυτή είναι **ΜΗ** αναστρέψιμη.


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(35) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
{CUSTOMER_ID} | Ναι | string(28) | To id του πελάτη μεταδίδεται απευθείας από τη διεύθυνση URL.



## Λίστα Πελατών


> Λίστα Πελατών


```shell
curl https://api.everypay.gr/customers?count=2&offset=1
  -D GET
  -u sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:
```


```php
<?php
require_once '../autoload.php';

use Everypay\Everypay;
use Everypay\Customer;

Everypay::setApiKey('sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R');

$params = array(
    'count' => 2,
    'offset' => 1
);

$customer = Customer::listAll($params);
```


>Απάντηση σε JSON για curl ή Object για php
>> Εδώ υπάρχουν 6 πελάτες στη βάση αλλά ζητάμε να δούμε μόνο τους 2.


```shell
{
    "total_count": 6,
    "items": [
        {
            "description": "Fitch LiSP customer",
            "email": "johnDoe@gmail.com",
            "date_created": "2015-07-28T11:19:55+0300",
            "full_name": "Smith Hill Co",
            "token": "cus_b7QO01Ie4csrDAkRjXijK7aM",
            "is_active": true,
            "date_modified": "2015-07-30T08:00:12+0300",
            "card": {
                "expiration_month": "05",
                "expiration_year": "2016",
                "last_four": "4242",
                "type": "Visa",
                "holder_name": "John Doe"
            }
        },
        {
            "description": "Πελάτης 1",
            "email": null,
            "date_created": "2010-07-28T11:19:55+0300",
            "full_name": "Paul Graham",
            "token": "cus_17c4307c02a73f39df4f10c0",
            "is_active": true,
            "date_modified": "2010-07-28T11:19:55+0300",
            "card": {
                "expiration_month": "01",
                "expiration_year": "2016",
                "last_four": "1111",
                "type": "Visa",
                "holder_name": null
            }
        }
    ]
}
```

```php
<?php
stdClass Object
(
    [total_count] => 6
    [items] => Array
        (
            [0] => stdClass Object
                (
                    [description] => Fitch LiSP customer
                    [email] => johnDoe@gmail.com
                    [date_created] => 2015-07-28T11:19:55+0300
                    [full_name] => Smith Hill Co
                    [token] => cus_b7QO01Ie4csrDAkRjXijK7aM
                    [is_active] => 1
                    [date_modified] => 2015-07-30T08:00:12+0300
                    [card] => stdClass Object
                        (
                            [expiration_month] => 05
                            [expiration_year] => 2016
                            [last_four] => 4242
                            [type] => Visa
                            [holder_name] => John Doe
                        )

                )

            [1] => stdClass Object
                    (
                        [description] => Πελάτης 1
                        [email] => 
                        [date_created] => 2010-07-28T11:19:55+0300
                        [full_name] => Paul Graham
                        [token] => cus_17c4307c02a73f39df4f10c0
                        [is_active] => 1
                        [date_modified] => 2010-07-28T11:19:55+0300
                        [card] => stdClass Object
                            (
                                [expiration_month] => 01
                                [expiration_year] => 2016
                                [last_four] => 1111
                                [type] => Visa
                                [holder_name] => 
                            )

                    )

        )

)
```


  &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** | https://api.everypay.gr/customers/?count={int1}&offset={int2}&date_from={timestamp1}&date_to={timestamp2}
**Μέθοδος** | GET
**Περιγραφή** | Προβολή όλων των διαθέσιμων πελατών. Τα αντικείμενα προβάλλονται ταξινομημένα σύμφωνα με την ημερομηνία δημιουργίας, με πρώτο να εμφανίζεται το πιο πρόσφατα δημιουργημένο.


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(35) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
count | Όχι | integer(4) | O αριθμός των εμφανιζόμενων αποτελεσμάτων. Δίνεται σαν παράμετρος στη διέυθυνση URL. Εάν δεν ορισθεί τότε λαμβάνεται η προκαθορισμένη τιμή που είναι 10. Ανώτερη τιμή είναι το 20.
offset | Όχι | integer(4) | Ο αριθμός των πελατών μετά τους οποίους θα εμφανιστούν τα αποτελέσματα π.χ. για τους πελάτες που βρίσκονται από τη θέση 10 και μετά δηλώνουμε offset=9. Δίνεται σαν παράμετρος στη διέυθυνση URL. Η προκαθορισμένη τιμή είναι 0.
date_from | Όχι | timestamp (integer) | H ημερομηνία πέραν της οποίας ζητάμε τους πελάτες π.χ. για πελάτες που δημιουργήθηκαν μετά από τις 01/10/2013 00:00:00, δίνουμε date_from=1380585600. Δίνεται σαν παράμετρος στη διεύθυνση URL.
date_to | Όχι | timestamp (integer) | H ημερομηνία μέχρι την οποία ζητάμε τους πελάτες π.χ. για πελάτες που δημιουργήθηκαν πριν από τις 01/10/2013 00:00:00, δίνουμε date_to=1380585600. Δίνεται σαν παράμετρος στη διεύθυνση URL. 