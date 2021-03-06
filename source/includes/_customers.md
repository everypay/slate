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
            [supports_installments] => 
            [max_installments] => 0
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
            [supports_installments] => 
            [max_installments] => 0
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

## Δημιουργία Πελάτη μέσω επιτυχής συναλλαγής.


>Δημιουργία Πελάτη μέσω επιτυχής συναλλαγής.


```shell
curl https://api.everypay.gr/payments
  -u sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:
  -d card_number=4111111111111111
  -d expiration_year=2016
  -d expiration_month=01
  -d cvv=334
  -d amount=100
  -d currency=eur
  -d description="Order #GGA-435167"
  -d holder_name="John Doe"
  -d create_customer="1"
```


```php
<?php
require_once '../autoload.php';

use Everypay\Everypay;
use Everypay\Payment;

Everypay::setApiKey('sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R');

$params = array(
    'card_number' => '4111111111111111',
    'expiration_year' => '2016',
    'expiration_month' => '01',
    'cvv' => '334',
    'amount' => 100,
    'currency' => 'eur',
    'description' => 'Order #GGA-435167',
    'holder_name' => 'John Doe',
    'create_customer' => '1'
);

$payment = Payment::create($params);
```


>Απάντηση σε JSON για curl ή Object για php


```shell
{
    "token": "pmt_RyIwmVA2r8T3UMcMIvKcbxGE"
    "date_created": "2015-08-21T17:57:02+0300",
    "description": "Order #GGA-435167",
    "currency": "EUR",
    "status": "Captured",
    "amount": 100,
    "refund_amount": 0,
    "fee_amount": 22,
    "payee_email": null,
    "payee_phone": null,
    "refunded": false,
    "refunds": [],
    "customer": {
        "card": {
            "expiration_month": "01",
            "expiration_year": "2016",
            "holder_name": "John Doe",
            "last_four": "1111",
            "type": "Visa",
            "supports_installments": false,
            "max_installments": 0
        },
        "date_created": "2015-08-21T17:57:02+0300",
        "date_modified": "2015-08-21T17:57:02+0300",
        "description": null,
        "email": null,
        "full_name": "John Doe",
        "is_active": true,
        "token": "cus_Hdv4aPIwIFfRh5Bo609HiaDo"
    }
}
```


```php
<?php

stdClass Object
(
    [token] => pmt_RyIwmVA2r8T3UMcMIvKcbxGE
    [date_created] => 2015-08-21T17:57:02+0300
    [description] => Order #GGA-435167
    [currency] => EUR
    [status] => Captured
    [amount] => 100
    [refund_amount] => 0
    [fee_amount] => 22
    [payee_email] => 
    [payee_phone] => 
    [refunded] => 
    [refunds] => Array
        (
        )

    [customer] => stdClass Object
        (
            [description] => 
            [email] => 
            [date_created] => 2015-08-21T17:57:02+0300
            [full_name] => John Doe
            [token] => cus_Hdv4aPIwIFfRh5Bo609HiaDo
            [is_active] => 1
            [date_modified] => 2015-08-21T17:57:02+0300
            [card] => stdClass Object
                (
                    [expiration_month] => 01
                    [expiration_year] => 2016
                    [last_four] => 1111
                    [type] => Visa
                    [holder_name] => John Doe
                    [supports_installments] => 
                    [max_installments] => 0
                )

        )

)
```

Η δημιουργία Πελάτη μπορεί να γίνει τόσο απο επιτυχή πληρωμή όσο και απο
πρέγκριση μιας πληρωμής.

   &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** |  https://api.everypay.gr/payments
**Μέθοδος** | POST
**Περιγραφή** | Εκτελεί χρέωση χρησιμοποιώντας τα δηλωθέντα στοιχεία μιας κάρτας και ταυτόχρονη δημιουργία Πελάτη.


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(35) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
card_number | Ναι | integer(16) | O αριθμός της κάρτας.
holder_name | Ναι | string(255) | To όνομα κατόχου της κάρτας.
expiration_year | Ναι | integer(4) | Έτος λήξης της κάρτας (4 ψηφία).
expiration_month | Ναι | integer(2) |Μήνας λήξης της κάρτας (2 ψηφία).
cvv | Ναι | integer(3) | Ο τριψήφιος κωδικός ασφαλείας στο πίσω μέρος της κάρτας.
amount | Ναι | integer | Το ποσό της συναλλαγής σε cents (χωρίς σημεία στίξης π.χ. 1099 αντί 10,99).
description | Όχι | string(255) | Μία σύντομη περιγραφή.
currency | Όχι | string(3) | Το νόμισμα της συναλλαγής (EUR)
create_customer | Όχι | integer(1) | Αν θα πρέπει να δημιουργηθεί Πελάτης (1) ή όχι (0)


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

$token = 'cus_b7QO01Ie4csrDAkRjXijK7aM';

$customer = Customer::retrieve($token);
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
            [supports_installments] => 
            [max_installments] => 0
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
        "holder_name": John Doe,
        "supports_installments": false,
        "max_installments": 0
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
            [supports_installments] => 
            [max_installments] => 0
        )

)
```

## Δημιουργία νέας κάρτας σε Πελάτη


> Επεξεργασία (ενημέρωση στοιχείων) πελάτη


```shell
curl https://api.everypay.gr/customers/cus_b7QO01Ie4csrDAkRjXijK7aM  
  -u sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:
  -X PUT
  -d token= "ctn_BPsE2ynMD2URAFlMRb90NiXk"
```


```php
<?php
require_once '../autoload.php';

use Everypay\Everypay;
use Everypay\Customer;

Everypay::setApiKey('sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R');

$token = 'cus_b7QO01Ie4csrDAkRjXijK7aM';

$params = array(
    'token' => 'ctn_BPsE2ynMD2URAFlMRb90NiXk',
    
);

$customer = Customer::update($token, $params);
```


>Απάντηση σε JSON για curl ή Object για php


```shell
{
    "description": "Club Member",
    "email": "cofounder@themail.com",
    "date_created": "2019-01-27T19:49:25+0200",
    "full_name": null,
    "token": "cus_595ilEuWYWXIORjJ3AEMyXuG",
    "is_active": true,
    "date_modified": "2019-01-28T16:12:56+0200",
    "cvv_required": true,
    "card": {
        "token": "crd_FIAoNSiXlwpnSJrfojsrPdH4",
        "expiration_month": "07",
        "expiration_year": "2023",
        "bin": "450383",
        "last_four": "1097",
        "type": "Visa",
        "holder_name": "John",
        "supports_installments": false,
        "max_installments": 0,
        "status": "valid",
        "friendly_name": "Visa •••• 1097 (07/2023)",
        "cvv_required": false,
        "tds": {
            "enrolled": null,
            "eci_flag": null,
            "auth_code": null,
            "auth_desc": null
        }
    },
    "cards": {
        "count": 3,
        "data": [
            {
                "token": "crd_HvtqkkrrX2n6LBKr0xv7Rgx1",
                "expiration_month": "12",
                "expiration_year": "2020",
                "bin": "498512",
                "last_four": "3085",
                "type": "Visa",
                "holder_name": "John",
                "supports_installments": false,
                "max_installments": 0,
                "status": "valid",
                "friendly_name": "Visa •••• 3085 (12/2020)",
                "cvv_required": false,
                "tds": {
                    "enrolled": null,
                    "eci_flag": null,
                    "auth_code": null,
                    "auth_desc": null
                }
            },
            {
                "token": "crd_FIAoNSiXlwpnSJrfojsrPdH4",
                "expiration_month": "07",
                "expiration_year": "2023",
                "bin": "450383",
                "last_four": "1097",
                "type": "Visa",
                "holder_name": "John",
                "supports_installments": false,
                "max_installments": 0,
                "status": "valid",
                "friendly_name": "Visa •••• 1097 (07/2023)",
                "cvv_required": false,
                "tds": {
                    "enrolled": null,
                    "eci_flag": null,
                    "auth_code": null,
                    "auth_desc": null
                }
            },
            {
                "token": "crd_3fkI1d1b5OM2nEjpPIceWV0K",
                "expiration_month": "12",
                "expiration_year": "2019",
                "bin": "411111",
                "last_four": "1111",
                "type": "Visa",
                "holder_name": "John Doe",
                "supports_installments": false,
                "max_installments": 0,
                "status": "valid",
                "friendly_name": "Visa •••• 1111 (12/2019)",
                "cvv_required": false,
                "tds": {
                    "enrolled": null,
                    "eci_flag": null,
                    "auth_code": null,
                    "auth_desc": null
                }
            }
        ]
    }
}
```

```php
<?php
stdClass Object
(
    [description] => Club Member
    [email] => cofounder@themail.com
    [date_created] => 2019-01-27T19:49:25+0200
    [full_name] => null
    [token] => cus_595ilEuWYWXIORjJ3AEMyXuG
    [is_active] => true
    [date_modified] => 2019-01-28T16:12:56+0200
    [card] => stdClass Object
        ( 
            [token]=>crd_FIAoNSiXlwpnSJrfojsrPdH4
            [expiration_month] => 12
            [expiration_year] => 2020
            [last_four] => 2020
            [type] => Visa
            [holder_name] => John
            [supports_installments] => false
            [max_installments] => 0
            [friendly_name] => Visa •••• 3085 (12/2020)
            [cvv_required] => false
              [tds] => stdClass Object
                 ([enrolled] => null
                 [eci_flag] => null
                 [auth_code] => null
                 [auth_desc] => null
                 )
        )

)
```
   &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** | https://api.everypay.gr/customers/{CUSTOMER_ID}
**Μέθοδος** | PUT
**Περιγραφή** | Δημιουργεί νέα κάρτα σε Πελάτη


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(35) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
{CUSTOMER_ID} | Ναι | string(28) | To id του πελάτη μεταδίδεται απευθείας από τη διεύθυνση URL.
token | Ναι | string(28) | To Token (αχρησιμοποίητο) που έχουμε δημιουργήσει για μία κάρτα.

## Αλλαγή προεπιλεγμένης κάρτας


> Επεξεργασία (ενημέρωση στοιχείων) πελάτη


```shell
curl https://api.everypay.gr/customers/cus_u47t759BnBYsCzASegVT605Q  
  -u sk_PqSohnrYrRI1GUKOZvDkK5VVWAholU3R:
  -X PUT
  -d card= "crd_0sqmEk3BSte2tYIiqqBVix02"
  -d default_card= "1"
```


```php
<?php
require_once '../autoload.php';

use Everypay\Everypay;
use Everypay\Customer;

Everypay::setApiKey('sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R');

$token = 'cus_b7QO01Ie4csrDAkRjXijK7aM';

$params = array(
    'card' => 'crd_0sqmEk3BSte2tYIiqqBVix02',
    'default_card' => '1',
);

$customer = Customer::update($token, $params);
```


>Απάντηση σε JSON για curl ή Object για php


```shell
{
    "description": "Club Member",
    "email": "cofounder@themail.com",
    "date_created": "2019-01-27T19:49:25+0200",
    "full_name": null,
    "token": "cus_u47t759BnBYsCzASegVT605Q",
    "is_active": true,
    "date_modified": "2019-01-28T16:12:56+0200",
    "cvv_required": true,
    "card": {
        "token": "crd_FIAoNSiXlwpnSJrfojsrPdH4",
        "expiration_month": "11",
        "expiration_year": "2025",
        "bin": "450383",
        "last_four": "1097",
        "type": "Visa",
        "holder_name": "John",
        "supports_installments": false,
        "max_installments": 0,
        "status": "valid",
        "friendly_name": "Visa •••• 1097 (07/2023)",
        "cvv_required": false,
        "tds": {
            "enrolled": null,
            "eci_flag": null,
            "auth_code": null,
            "auth_desc": null
        }
    },
    "cards": {
        "count": 3,
        "data": [
            {
                "token": "crd_HvtqkkrrX2n6LBKr0xv7Rgx1",
                "expiration_month": "12",
                "expiration_year": "2020",
                "bin": "498512",
                "last_four": "3085",
                "type": "Visa",
                "holder_name": "John",
                "supports_installments": false,
                "max_installments": 0,
                "status": "valid",
                "friendly_name": "Visa •••• 3085 (12/2020)",
                "cvv_required": false,
                "tds": {
                    "enrolled": null,
                    "eci_flag": null,
                    "auth_code": null,
                    "auth_desc": null
                }
            },
            {
                "token": "crd_FIAoNSiXlwpnSJrfojsrPdH4",
                "expiration_month": "07",
                "expiration_year": "2023",
                "bin": "450383",
                "last_four": "1097",
                "type": "Visa",
                "holder_name": "John",
                "supports_installments": false,
                "max_installments": 0,
                "status": "valid",
                "friendly_name": "Visa •••• 1097 (07/2023)",
                "cvv_required": false,
                "tds": {
                    "enrolled": null,
                    "eci_flag": null,
                    "auth_code": null,
                    "auth_desc": null
                }
            },
            {
                "token": "crd_3fkI1d1b5OM2nEjpPIceWV0K",
                "expiration_month": "12",
                "expiration_year": "2019",
                "bin": "411111",
                "last_four": "1111",
                "type": "Visa",
                "holder_name": "John Doe",
                "supports_installments": false,
                "max_installments": 0,
                "status": "valid",
                "friendly_name": "Visa •••• 1111 (12/2019)",
                "cvv_required": false,
                "tds": {
                    "enrolled": null,
                    "eci_flag": null,
                    "auth_code": null,
                    "auth_desc": null
                }
            }
        ]
    }
}
```

```php
<?php
stdClass Object
(
    [description] => Club Member
    [email] => cofounder@themail.com
    [date_created] => 2019-01-27T19:49:25+0200
    [full_name] => null
    [token] => cus_595ilEuWYWXIORjJ3AEMyXuG
    [is_active] => true
    [date_modified] => 2019-01-28T16:12:56+0200
    [card] => stdClass Object
        ( 
            [token]=>crd_FIAoNSiXlwpnSJrfojsrPdH4
            [expiration_month] => 12
            [expiration_year] => 2020
            [last_four] => 2020
            [type] => Visa
            [holder_name] => John
            [supports_installments] => false
            [max_installments] => 0
            [friendly_name] => Visa •••• 3085 (12/2020)
            [cvv_required] => false
              [tds] => stdClass Object
                 ([enrolled] => null
                 [eci_flag] => null
                 [auth_code] => null
                 [auth_desc] => null
                 )
        )

)
```
   &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** | https://api.everypay.gr/customers/{CUSTOMER_ID}
**Μέθοδος** | PUT
**Περιγραφή** | Αλλαγή προεπιλεγμένης κάρτας σε Πελάτη 


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(35) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
{CUSTOMER_ID} | Ναι | string(28) | To id του πελάτη μεταδίδεται απευθείας από τη διεύθυνση URL.
card | Ναι | string(28) | To Token (αχρησιμοποίητο) που έχουμε δημιουργήσει για μία κάρτα.
default_card | Ναι | string(3) | 1:ορίζεται ως προεπιλεγμένη.


## Διαγραφή κάρτας Πελάτη


> Επεξεργασία (ενημέρωση στοιχείων) πελάτη


```shell
curl https://api.everypay.gr/customers/{CUSTOMER ID}}/card/{CARD TOKEN}
  -u sk_PqSohnrYrRI1GUKOZvDkK5VVWAholU3R:
  -X DELETE
  
```




>Απάντηση σε JSON για curl ή Object για php


```shell
{
    "description": "Club Member",
    "email": "cofounder@themail.com",
    "date_created": "2019-01-27T19:49:25+0200",
    "full_name": null,
    "token": "cus_u47t759BnBYsCzASegVT605Q",
    "is_active": true,
    "date_modified": "2019-01-28T16:12:56+0200",
    "cvv_required": true,
    "card": {
        "token": "crd_FIAoNSiXlwpnSJrfojsrPdH4",
        "expiration_month": "11",
        "expiration_year": "2025",
        "bin": "450383",
        "last_four": "1097",
        "type": "Visa",
        "holder_name": "John",
        "supports_installments": false,
        "max_installments": 0,
        "status": "valid",
        "friendly_name": "Visa •••• 1097 (07/2023)",
        "cvv_required": false,
        "tds": {
            "enrolled": null,
            "eci_flag": null,
            "auth_code": null,
            "auth_desc": null
        }
    },
    "cards": {
        "count": 1,
        "data": [
            {
                "token": "crd_HvtqkkrrX2n6LBKr0xv7Rgx1",
                "expiration_month": "12",
                "expiration_year": "2020",
                "bin": "498512",
                "last_four": "3085",
                "type": "Visa",
                "holder_name": "John",
                "supports_installments": false,
                "max_installments": 0,
                "status": "valid",
                "friendly_name": "Visa •••• 3085 (12/2020)",
                "cvv_required": false,
                "tds": {
                    "enrolled": null,
                    "eci_flag": null,
                    "auth_code": null,
                    "auth_desc": null
                }
            },
            
            
            }
        ]
    }
}

```
   &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** | https://api.everypay.gr/customers/{CUSTOMER_ID}/card/{CARD TOKEN}
**Μέθοδος** | DELETE
**Περιγραφή** | Διαγράφη κάρτας απο Πελάτη.


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(35) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
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
  -X GET
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
>> Εδώ υπάρχουν 6 πελάτες στη βάση δεδομένων αλλά ζητάμε να δούμε μόνο τους 2.


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
                "holder_name": "John Doe",
                "supports_installments": false,
                "max_installments": 0
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
                "holder_name": null,
                "supports_installments": false,
                "max_installments": 0
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
                            [supports_installments] => 
                            [max_installments] => 0
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
                                [supports_installments] => 
                                [max_installments] => 0
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
