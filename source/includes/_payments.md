# Πληρωμές


  Οι Πληρωμές είναι κινήσεις χρέωσης καρτών. Μπορούν να γίνουν χρησιμοποιώντας τα στοιχεία μιας κάρτας, κάποιο προδημιουργημένο [Token](#Δημιουργία-Τoken) ή κάποιο αντικείμενο [Πελάτη](#Δημιουργία-Πελάτη-με-στοιχεία-κάρτας) (υπενθυμίζουμε οτι ο πελάτης έχει ήδη μια κάρτα συσχετισμένη).


## Πληρωμή με χρέωση Κάρτας


>Πληρωμή με χρέωση κάρτας, με το ιδιωτικό κλειδί.


```shell
curl https://api.everypay.gr/payments
  -u sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:
  -d card_number=4111111111111111  
  -d expiration_year=2016
  -d expiration_month=01
  -d cvv=334
  -d amount=1099
  -d currency=eur
  -d description="Order #GGA-435167"
  -d holder_name="John Doe"
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
    'amount' => 1099,
    'currency' => 'eur',
    'description' => 'Order #GGA-435167',
    'holder_name'=>'John Doe'
);

$payment = Payment::create($params);
```


>Απάντηση σε JSON για curl ή Object για php


```shell
{
    "token": "pmt_A71tLD12bKumsd8v3rv9BNsY",
    "date_created": "2015-08-11T11:48:15+0300",
    "description": "Order #GGA-435167",
    "currency": "EUR",
    "status": "Captured",
    "amount": 1099,
    "refund_amount": 0,
    "fee_amount": 34,
    "payee_email": null,
    "payee_phone": null,
    "refunded": false,
    "refunds": [],
    "card": {
        "expiration_month": "01",
        "expiration_year": "2016",
        "last_four": "1111",
        "type": "Visa",
        "holder_name": "John Doe"
    }
}
```


```php
<?php
stdClass Object
(
    [token] => pmt_A71tLD12bKumsd8v3rv9BNsY
    [date_created] => 2015-08-11T11:48:15+0300
    [description] => Order #GGA-435167
    [currency] => EUR
    [status] => Captured
    [amount] => 1099
    [refund_amount] => 0
    [fee_amount] => 34
    [payee_email] => 
    [payee_phone] => 
    [refunded] => 
    [refunds] => Array
        (
        )

    [card] => stdClass Object
        (
            [expiration_month] => 01
            [expiration_year] => 2016
            [last_four] => 1111
            [type] => Visa
            [holder_name] => John Doe
        )

)
```


   &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** |  https://api.everypay.gr/payments
**Μέθοδος** | POST
**Περιγραφή** | Εκτελεί χρέωση χρησιμοποιώντας τα δηλωθέντα στοιχεία μιας κάρτας.


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(35) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
card_number | Ναι | integer(16) | O αριθμός της κάρτας.
holder_name | Ναι | string(255) | To όνομα κατόχου της κάρτας.
expiration_year | Ναι | integer(4) | Έτος λήξης της κάρτας (4 ψηφία).
expiration_month | Ναι | integer(2) |Μήνας λήξης της κάρτας (2 ψηφία).
cvv | Ναι | integer(3) | Ο τριψήφιος κωδικός ασφαλείας στο πίσω μέρος της κάρτας.
description | Όχι | string(255) | Μία σύντομη περιγραφή.
amount | Ναι | integer | Το ποσό της συναλλαγής σε cents (χωρίς σημεία στίξης π.χ. 1099 αντί 10,99).
currency | Όχι | string(3) | Το νόμισμα της συναλλαγής (EUR)


##Πληρωμή με χρέωση Πελάτη


>Πληρωμή με χρέωση Πελάτη, με το ιδιωτικό κλειδί.


```shell
curl https://api.everypay.gr/payments
  -u sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:
  -d token=cus_uVMLP6Ud06CkK3ZglkhHw7IH
  -d description="Order #HLA-66632"
  -d amount=1099
```


```php
<?php
require_once '../autoload.php';

use Everypay\Everypay;
use Everypay\Payment;

Everypay::setApiKey('sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R');

$params = array(
    'token' => 'cus_uVMLP6Ud06CkK3ZglkhHw7IH',
    'description' => 'Order #HLA-66632',
    'amount' => 1099
);

$payment = Payment::create($params);
```


>Απάντηση σε JSON για curl ή Object για php


```shell
{
    "token": "pmt_jK0UUQz60ruAWApeHlInVo6E",
    "date_created": "2015-08-11T12:51:06+0300",
    "description": "Order #HLA-66632",
    "currency": "EUR",
    "status": "Captured",
    "amount": 1099,
    "refund_amount": 0,
    "fee_amount": 34,
    "payee_email": null,
    "payee_phone": null,
    "refunded": false,
    "refunds": [],
    "customer": {
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
}
```


```php
<?php
stdClass Object
(
    [token] => pmt_jK0UUQz60ruAWApeHlInVo6E
    [date_created] => 2015-08-11T12:51:06+0300
    [description] => Order #HLA-66632
    [currency] => EUR
    [status] => Captured
    [amount] => 1099
    [refund_amount] => 0
    [fee_amount] => 34
    [payee_email] => 
    [payee_phone] => 
    [refunded] => 
    [refunds] => Array
        (
        )

    [customer] => stdClass Object
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
)
```


   &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** |  https://api.everypay.gr/payments
**Μέθοδος** | POST
**Περιγραφή** | Εκτελεί χρέωση χρησιμοποιώντας ένα αντικείμενο [Πελάτη](#Πελάτες).


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(35) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
token | Ναι | string(28) | Το id του πελάτη προς χρέωση.
description | Όχι | string(255) | Μία σύντομη περιγραφή.
amount | Ναι | integer | Το ποσό της συναλλαγής σε cents (χωρίς σημεία στίξης π.χ. 1099 αντί 10,99).
currency | Όχι | string(3) | Το νόμισμα της συναλλαγής (EUR)


##Πληρωμή με χρήση Token Κάρτας


>Πληρωμή με χρήση Token Κάρτας, με το ιδιωτικό κλειδί.


```shell
curl https://api.everypay.gr/payments
  -u sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:
  -d token=ctn_7hPmP8611pqcTkVfDuCEuC2Y
  -d amount=1099
  -d description="payment for item #21"
```

```php
<?php
require_once '../autoload.php';

use Everypay\Everypay;
use Everypay\Payment;

Everypay::setApiKey('sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R');

$params = array(
    'token' => 'ctn_7hPmP8611pqcTkVfDuCEuC2Y',
    'amount' => 1099,
    'description' => 'payment for item #21'
);

$payment = Payment::create($params);
```


>Απάντηση σε JSON για curl ή Object για php


```shell
{
    "token": "pmt_E5XVLCsdOHp8kfsTky6kIwwr",
    "date_created": "2015-08-11T14:13:09+0300",
    "description": "payment for item #21",
    "currency": "EUR",
    "status": "Captured",
    "amount": 1099,
    "refund_amount": 0,
    "fee_amount": 34,
    "payee_email": null,
    "payee_phone": null,
    "refunded": false,
    "refunds": [],
    "card": {
        "expiration_month": "01",
        "expiration_year": "2016",
        "last_four": "1111",
        "type": "Visa",
        "holder_name": "John Doe"
    }
}
```


```php
<?php
stdClass Object
(
    [token] => pmt_E5XVLCsdOHp8kfsTky6kIwwr
    [date_created] => 2015-08-11T14:13:09+0300
    [description] => payment for item #21
    [currency] => EUR
    [status] => Captured
    [amount] => 1099
    [refund_amount] => 0
    [fee_amount] => 34
    [payee_email] => 
    [payee_phone] => 
    [refunded] => 
    [refunds] => Array
        (
        )

    [card] => stdClass Object
        (
            [expiration_month] => 01
            [expiration_year] => 2016
            [last_four] => 1111
            [type] => Visa
            [holder_name] => John Doe
        )

)
```


   &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** |  https://api.everypay.gr/payments
**Μέθοδος** | POST
**Περιγραφή** | Εκτελεί χρέωση χρησιμοποιώντας ένα προδημιουργημένο και αχρησιμοποίητο [Token](#Δημιουργία-Τoken) κάρτας.


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(35) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
token | Ναι | string(28) | To id του token κάρτας το οποίο μας ενδιαφέρει.
description | Όχι | string(255) | Μία σύντομη περιγραφή.
amount | Ναι | integer | Το ποσό της συναλλαγής σε cents (χωρίς σημεία στίξης π.χ. 1099 αντί 10,99).
currency | Όχι | string(3) | Το νόμισμα της συναλλαγής (EUR)


## Δέσμευση πληρωμής με χρέωση Κάρτας


>1ο Βήμα: Δέσμευση πληρωμής με χρέωση κάρτας, με το ιδιωτικό κλειδί. *(βλ. [2o Βήμα](#Έγκριση-δεσμευμένης-πληρωμής))*


```shell
curl https://api.everypay.gr/payments
  -u sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:
  -d card_number=4111111111111111  
  -d expiration_year=2016
  -d expiration_month=01
  -d cvv=334
  -d amount=1099
  -d currency=eur
  -d description="Order #GGA-435168"
  -d holder_name="John Doe"
  -d capture=0
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
    'amount' => 1099,
    'currency' => 'eur',
    'description' => 'Order #GGA-435168',
    'holder_name'=>'John Doe',
    'capture' => 0
);

$payment = Payment::create($params);
```


>Απάντηση σε JSON για curl ή Object για php. Η πληρωμή δημιουργείται με την κατάσταση προέγκρισης,
και το ποσό της συναλλαγής είναι δεσμευμένο. Σε επόμενο βήμα πρέπει η πληρωμή να
εγκριθεί από τον έμπορο.


```shell
{
    "token": "pmt_5i8KHSpex63i1cjLVfOMMhIa",
    "date_created": "2015-09-08T16:28:46+0300",
    "description": "Order #GGA-435168",
    "currency": "EUR",
    "status": "Pre authorized",
    "amount": 1099,
    "refund_amount": 0,
    "fee_amount": 46,
    "payee_email": null,
    "payee_phone": null,
    "refunded": false,
    "refunds": [],
    "card": {
        "expiration_month": "01",
        "expiration_year": "2016",
        "last_four": "1111",
        "type": "Visa",
        "holder_name": "John Doe"
    }
}
```


```php
<?php
stdClass Object
(
    [token] => pmt_5i8KHSpex63i1cjLVfOMMhIa
    [date_created] => 2015-09-08T16:28:46+0300
    [description] => Order #GGA-435168
    [currency] => EUR
    [status] => Pre authorized
    [amount] => 1099
    [refund_amount] => 0
    [fee_amount] => 46
    [payee_email] => 
    [payee_phone] => 
    [refunded] => 
    [refunds] => Array
        (
        )

    [card] => stdClass Object
        (
            [expiration_month] => 01
            [expiration_year] => 2016
            [last_four] => 1111
            [type] => Visa
            [holder_name] => John Doe
        )

)
```


   &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** |  https://api.everypay.gr/payments
**Μέθοδος** | POST
**Περιγραφή** | Εκτελεί χρέωση ως προέγκριση, με δέσμευση του ποσού, χρησιμοποιώντας τα δηλωθέντα στοιχεία μιας κάρτας. Απαιτείται η τελική έγκριση της πληρωμής (βλ. [2ο Βήμα](#Έγκριση-δεσμευμένης-πληρωμής)).


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(35) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
card_number | Ναι | integer(16) | O αριθμός της κάρτας.
holder_name | Ναι | string(255) | To όνομα κατόχου της κάρτας.
expiration_year | Ναι | integer(4) | Έτος λήξης της κάρτας (4 ψηφία).
expiration_month | Ναι | integer(2) |Μήνας λήξης της κάρτας (2 ψηφία).
cvv | Ναι | integer(3) | Ο τριψήφιος κωδικός ασφαλείας στο πίσω μέρος της κάρτας.
description | Όχι | string(255) | Μία σύντομη περιγραφή.
amount | Ναι | integer | Το ποσό της συναλλαγής σε cents (χωρίς σημεία στίξης π.χ. 1099 αντί 10,99).
currency | Όχι | string(3) | Το νόμισμα της συναλλαγής (EUR).
capture | Όχι | boolean | 1: (προεπιλογή) ολοκληρώνεται κανονικά η πληρωμή. <br/>0: γίνεται προέγκριση πληρωμής και δέσμευση του ποσού. Σε τέτοια περίπτωση πρέπει να γίνει η τελική έγκριση της πληρωμής σε δεύτερο βήμα (βλ. [Έγκριση δεσμευμένης πληρωμής](#Έγκριση-δεσμευμένης-πληρωμής)).


## Δέσμευση πληρωμής με χρέωση Πελάτη


>1ο Βήμα: Δέσμευση πληρωμής με χρέωση Πελάτη, με το ιδιωτικό κλειδί. *(βλ. [2o Βήμα](#Έγκριση-δεσμευμένης-πληρωμής))*

```shell
curl https://api.everypay.gr/payments
  -u sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:
  -d token=cus_WLACZa1ubdp86eT1uYn6GFRf
  -d description="Rent September 2015"
  -d amount=35000
  -d capture=0
```


```php
<?php
require_once '../autoload.php';

use Everypay\Everypay;
use Everypay\Payment;

Everypay::setApiKey('sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R');

$params = array(
    'token' => 'cus_WLACZa1ubdp86eT1uYn6GFRf',
    'description' => 'Rent September 2015',
    'amount' => 35000,
    'capture' => 0
);

$payment = Payment::create($params);
```


>Απάντηση σε JSON για curl ή Object για php. Η πληρωμή δημιουργείται με την κατάσταση προέγκρισης,
και το ποσό της συναλλαγής είναι δεσμευμένο. Σε επόμενο βήμα πρέπει η πληρωμή να
εγκριθεί από τον έμπορο.


```shell
{
    "token": "pmt_yOW5N9ICrB8BT8yqu6VeeiVV",
    "date_created": "2015-09-15T17:38:20+0300",
    "description": "Rent September 2015",
    "currency": "EUR",
    "status": "Pre authorized",
    "amount": 35000,
    "refund_amount": 0,
    "fee_amount": 860,
    "payee_email": null,
    "payee_phone": null,
    "refunded": false,
    "refunds": [],
    "customer": {
        "description": null,
        "email": null,
        "date_created": "2015-07-30T15:12:30+0300",
        "full_name": null,
        "token": "cus_WLACZa1ubdp86eT1uYn6GFRf",
        "is_active": true,
        "date_modified": "2015-09-15T17:38:20+0300",
        "card": {
            "expiration_month": "01",
            "expiration_year": "2016",
            "last_four": "1111",
            "type": "Visa",
            "holder_name": "Minas Kitsos"
        }
    }
}

```


```php
<?php
stdClass Object
(
    [token] => pmt_yOW5N9ICrB8BT8yqu6VeeiVV
    [date_created] => 2015-09-15T17:38:20+0300
    [description] => Rent September 2015
    [currency] => EUR
    [status] => Pre authorized
    [amount] => 35000
    [refund_amount] => 0
    [fee_amount] => 860
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
            [date_created] => 2015-07-30T15:12:30+0300
            [full_name] => 
            [token] => cus_WLACZa1ubdp86eT1uYn6GFRf
            [is_active] => 1
            [date_modified] => 2015-09-15T17:38:20+0300
            [card] => stdClass Object
                (
                    [expiration_month] => 01
                    [expiration_year] => 2016
                    [last_four] => 1111
                    [type] => Visa
                    [holder_name] => Minas Kitsos
                )

        )
)
```


   &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** |  https://api.everypay.gr/payments
**Μέθοδος** | POST
**Περιγραφή** | Εκτελεί χρέωση ως προέγκριση, με δέσμευση του ποσού, χρησιμοποιώντας ένα προδημιουργημένο αντικείμενο [Πελάτη](#Πελάτες). Απαιτείται η τελική έγκριση της πληρωμής (βλ. [2ο Βήμα](#Έγκριση-δεσμευμένης-πληρωμής)).


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(35) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
token | Ναι | string(28) |  Το id του πελάτη προς χρέωση.
description | Όχι | string(255) | Μία σύντομη περιγραφή.
amount | Ναι | integer | Το ποσό της συναλλαγής σε cents (χωρίς σημεία στίξης π.χ. 1099 αντί 10,99).
currency | Όχι | string(3) | Το νόμισμα της συναλλαγής (EUR).
capture | Όχι | boolean | 1: (προεπιλογή) ολοκληρώνεται κανονικά η πληρωμή. <br/>0: γίνεται προέγκριση πληρωμής και δέσμευση του ποσού. Σε τέτοια περίπτωση πρέπει να γίνει η τελική έγκριση της πληρωμής σε δεύτερο βήμα (βλ. [Έγκριση δεσμευμένης πληρωμής](#Έγκριση-δεσμευμένης-πληρωμής)).


## Δέσμευση πληρωμής με χρέωση Token Κάρτας


>1ο Βήμα: Δέσμευση πληρωμής με χρήση Token Κάρτας, με το ιδιωτικό κλειδί. *(βλ. [2o Βήμα](#Έγκριση-δεσμευμένης-πληρωμής))*

```shell
curl https://api.everypay.gr/payments
  -u sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:
  -d token=ctn_7hPmP8611pqcTkVfDuCEuC2Y
  -d amount=1099
  -d description="payment for item #57"
  -d capture=0
```

```php
<?php
require_once '../autoload.php';

use Everypay\Everypay;
use Everypay\Payment;

Everypay::setApiKey('sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R');

$params = array(
    'token' => 'ctn_7hPmP8611pqcTkVfDuCEuC2Y',
    'amount' => 1099,
    'description' => 'payment for item #57',
    'capture' => 0
);

$payment = Payment::create($params);
```


>Απάντηση σε JSON για curl ή Object για php. Η πληρωμή δημιουργείται με την κατάσταση προέγκρισης,
και το ποσό της συναλλαγής είναι δεσμευμένο. Σε επόμενο βήμα πρέπει η πληρωμή να
εγκριθεί από τον έμπορο.


```shell
{
    "token": "pmt_E5XVLCsdOHp8kfsTky6kIwwr",
    "date_created": "2015-08-11T14:13:09+0300",
    "description": "payment for item #57",
    "currency": "EUR",
    "status": "Pre authorized",
    "amount": 1099,
    "refund_amount": 0,
    "fee_amount": 34,
    "payee_email": null,
    "payee_phone": null,
    "refunded": false,
    "refunds": [],
    "card": {
        "expiration_month": "01",
        "expiration_year": "2016",
        "last_four": "1111",
        "type": "Visa",
        "holder_name": "John Doe"
    }
}
```


```php
<?php
stdClass Object
(
    [token] => pmt_E5XVLCsdOHp8kfsTky6kIwwr
    [date_created] => 2015-08-11T14:13:09+0300
    [description] => payment for item #57
    [currency] => EUR
    [status] => Pre authorized
    [amount] => 1099
    [refund_amount] => 0
    [fee_amount] => 34
    [payee_email] => 
    [payee_phone] => 
    [refunded] => 
    [refunds] => Array
        (
        )

    [card] => stdClass Object
        (
            [expiration_month] => 01
            [expiration_year] => 2016
            [last_four] => 1111
            [type] => Visa
            [holder_name] => John Doe
        )

)
```


   &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** |  https://api.everypay.gr/payments
**Μέθοδος** | POST
**Περιγραφή** | Εκτελεί χρέωση ως προέγκριση, με δέσμευση του ποσού, χρησιμοποιώντας ένα προδημιουργημένο και αχρησιμοποίητο [Token](#Δημιουργία-Τoken) Κάρτας. Απαιτείται η τελική έγκριση της πληρωμής (βλ. [2ο Βήμα](#Έγκριση-δεσμευμένης-πληρωμής)).


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(35) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
token | Ναι | string(28) | To id του token κάρτας το οποίο μας ενδιαφέρει.
description | Όχι | string(255) | Μία σύντομη περιγραφή.
amount | Ναι | integer | Το ποσό της συναλλαγής σε cents (χωρίς σημεία στίξης π.χ. 1099 αντί 10,99).
currency | Όχι | string(3) | Το νόμισμα της συναλλαγής (EUR).
capture | Όχι | boolean | 1: (προεπιλογή) ολοκληρώνεται κανονικά η πληρωμή. <br/>0: γίνεται προέγκριση πληρωμής και δέσμευση του ποσού. Σε τέτοια περίπτωση πρέπει να γίνει η τελική έγκριση της πληρωμής σε δεύτερο βήμα (βλ. [Έγκριση δεσμευμένης πληρωμής](#Έγκριση-δεσμευμένης-πληρωμής)).


## Έγκριση δεσμευμένης πληρωμής


>2ο Βήμα: Έγκριση δεσμευμένης πληρωμής, με το ιδιωτικό κλειδί. Είναι η ολοκλήρωση της συναλλαγής που είχε αρχίσει ως προέγκριση *(βλ. 1ο Βήμα [Κάρτα](#Δέσμευση-πληρωμής-με-χρέωση-Κάρτας) ή [Token Κάρτας](#Δέσμευση-πληρωμής-με-χρέωση-token-Κάρτας) ή [Token Πελάτη](#Δέσμευση-πληρωμής-με-χρέωση-Πελάτη))*


```shell
curl https://api.everypay.gr/payments/capture/pmt_5i8KHSpex63i1cjLVfOMMhIa
  -u sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:
  -X PUT
```

```php
<?php
require_once '../autoload.php';

use Everypay\Everypay;
use Everypay\Payment;

Everypay::setApiKey('sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R');

$token = 'pmt_5i8KHSpex63i1cjLVfOMMhIa';

$payment = Payment::capture($token);
```


>Απάντηση σε JSON για curl ή Object για php


```shell
{
    "token": "pmt_5i8KHSpex63i1cjLVfOMMhIa",
    "date_created": "2015-09-08T16:28:46+0300",
    "description": "Order #GGA-435168",
    "currency": "EUR",
    "status": "Captured",
    "amount": 1099,
    "refund_amount": 0,
    "fee_amount": 46,
    "payee_email": null,
    "payee_phone": null,
    "refunded": false,
    "refunds": [],
    "card": {
        "expiration_month": "01",
        "expiration_year": "2016",
        "last_four": "1111",
        "type": "Visa",
        "holder_name": "John Doe"
    }
}
```


```php
<?php
stdClass Object
(
    [token] => pmt_5i8KHSpex63i1cjLVfOMMhIa
    [date_created] => 2015-09-08T16:28:46+0300
    [description] => Order #GGA-435168
    [currency] => EUR
    [status] => Captured
    [amount] => 1099
    [refund_amount] => 0
    [fee_amount] => 46
    [payee_email] => 
    [payee_phone] => 
    [refunded] => 
    [refunds] => Array
        (
        )

    [card] => stdClass Object
        (
            [expiration_month] => 01
            [expiration_year] => 2016
            [last_four] => 1111
            [type] => Visa
            [holder_name] => John Doe
        )

)
```

&nbsp;       |     &nbsp;
--------|--------------------------------
**URL** |  https://api.everypay.gr/payments/capture/{PAYMENT}
**Μέθοδος** | PUT
**Περιγραφή** |  Εκτελεί έγκριση δεσμευμένης πληρωμής (με όποιο τρόπο και αν προήλθε αυτή), 
ολοκληρώνοντας τη συναλλαγή που ξεκίνησε σε προηγούμενο βήμα ως προέγκριση (βλ. 1ο Βήμα [Κάρτα](#Δέσμευση-πληρωμής-με-χρέωση-Κάρτας) 
ή [Token Κάρτας](#Δέσμευση-πληρωμής-με-χρέωση-token-Κάρτας))).

<aside class="notice" style="text-align:justify">
Σημείωση: η έγκριση δεσμευμένης πληρωμής μπορεί να γίνει μέσα σε επτά (7) ημέρες από την ημέρα της πληρωμής, αλλιώς η συναλλαγή
ακυρώνεται και το ποσό αποδεσμεύεται και επιστρέφεται στον ιδιοκτήτη.
</aside>

**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(35) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
{PAYMENT} | Ναι | string(28) | To Token (id) της πληρωμής προς επιστροφή.


## Επιστροφή πληρωμής


>Πλήρης επιστροφή πληρωμής, με το ιδιωτικό κλειδί.


```shell
curl https://api.everypay.gr/payments/refund/pmt_A71tLD12bKumsd8v3rv9BNsY 
  -u sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:
  -X PUT
```

```php
<?php
require_once '../autoload.php';

use Everypay\Everypay;
use Everypay\Payment;

Everypay::setApiKey('sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R');

$token = 'pmt_A71tLD12bKumsd8v3rv9BNsY';

$payment = Payment::refund($token);
```


>Απάντηση σε JSON για curl ή Object για php


```shell
{
    "token": "pmt_A71tLD12bKumsd8v3rv9BNsY",
    "date_created": "2015-08-11T11:54:46+0300",
    "description": "Order #GGA-435167",
    "currency": "EUR",
    "status": "Refunded",
    "amount": 1099,
    "refund_amount": 1099,
    "fee_amount": 0,
    "payee_email": null,
    "payee_phone": null,
    "refunded": true,
    "refunds": [
        {
            "token": "ref_S9alsjUsbGK3WJ2EUWhrLfhg",
            "status": "Captured",
            "date_created": "2015-08-13T12:58:07+0300",
            "amount": 1099,
            "fee_amount": 34,
            "description": null
        }
    ],
    "card": {
        "expiration_month": "01",
        "expiration_year": "2016",
        "last_four": "1111",
        "type": "Visa",
        "holder_name": "John Doe"
    }
}
```


```php
<?php
stdClass Object
(
    [token] => pmt_A71tLD12bKumsd8v3rv9BNsY
    [date_created] => 2015-08-11T11:54:46+0300
    [description] => Order #GGA-435167
    [currency] => EUR
    [status] => Refunded
    [amount] => 1099
    [refund_amount] => 1099
    [fee_amount] => 0
    [payee_email] => 
    [payee_phone] => 
    [refunded] => 1
    [refunds] => Array
        (
            [0] => stdClass Object
                (
                    [token] => ref_S9alsjUsbGK3WJ2EUWhrLfhg
                    [status] => Captured
                    [date_created] => 2015-08-13T12:58:07+0300
                    [amount] => 1099
                    [fee_amount] => 34
                    [description] => null
                )

        )

    [card] => stdClass Object
        (
            [expiration_month] => 01
            [expiration_year] => 2016
            [last_four] => 1111
            [type] => Visa
            [holder_name] => John Doe
        )

)
```


>Μερική επιστροφή πληρωμής, με το ιδιωτικό κλειδί.


```shell
curl https://api.everypay.gr/payments/refund/pmt_hpb9nbsTa30uJ0eKjMcoyj9C
  -u sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:
  -d amount=4122
  -d description="price correction"
  -X PUT
```


```php
<?php
require_once '../autoload.php';

use Everypay\Everypay;
use Everypay\Payment;

Everypay::setApiKey('sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R');

$token = 'pmt_hpb9nbsTa30uJ0eKjMcoyj9C';

$params=array(
    'amount' => 4122,
    'description' => "price correction"
);

$payment = Payment::refund($token, params);
```


>Απάντηση σε JSON για curl ή Object για php


```shell
{
    "token": "pmt_hpb9nbsTa30uJ0eKjMcoyj9C",
    "date_created": "2015-07-30T15:26:16+0300",
    "description": null,
    "currency": "EUR",
    "status": "Partially Refunded",
    "amount": 7863,
    "refund_amount": 4122,
    "fee_amount": 92,
    "payee_email": null,
    "payee_phone": null,
    "refunded": false,
    "refunds": [
        {
            "token": "ref_HW0nq1rhoTEY7NmokHU7DgmT",
            "status": "Captured",
            "date_created": "2015-08-13T13:08:33+0300",
            "amount": 4122,
            "fee_amount": 91,
            "description": "price correction"
        }
    ],
    "card": {
        "expiration_month": "01",
        "expiration_year": "2016",
        "last_four": "1111",
        "type": "Visa",
        "holder_name": "Test 1"
    }
}
```

```php
<?phpstdClass Object
(
    [token] => pmt_hpb9nbsTa30uJ0eKjMcoyj9C
    [date_created] => 2015-07-30T15:26:16+0300
    [description] => 
    [currency] => EUR
    [status] => Partially Refunded
    [amount] => 7863
    [refund_amount] => 4122
    [fee_amount] => 92
    [payee_email] => 
    [payee_phone] => 
    [refunded] => 
    [refunds] => Array
        (
            [0] => stdClass Object
                (
                    [token] => ref_HW0nq1rhoTEY7NmokHU7DgmT
                    [status] => Captured
                    [date_created] => 2015-08-13T13:08:33+0300
                    [amount] => 4122
                    [fee_amount] => 91
                    [description] => price correction
                )

        )

    [card] => stdClass Object
        (
            [expiration_month] => 01
            [expiration_year] => 2016
            [last_four] => 1111
            [type] => Visa
            [holder_name] => Test 1
        )

)
```


&nbsp;       |     &nbsp;
--------|--------------------------------
**URL** |  https://api.everypay.gr/payments/refund/{PAYMENT}
**Μέθοδος** | PUT
**Περιγραφή** |  Εκτελεί επιστροφή ενός ποσού για μία συγκεκριμένη πληρωμή. Η επιστροφή μπορεί να είναι ολική ή μερική.


<aside class="notice" style="text-align:justify">
Σημείωση: η επιστροφή πληρωμής, ολική ή μερική, μπορεί να γίνει μόνο μέσα σε εκατόν ογδόντα (180) ημέρες από την ημέρα της πληρωμής, διαφερετικά δεν
υπάρχει δυνατότητα επιστροφής.
</aside>


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(35) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
{PAYMENT} | Ναι | string(28) | To Token (id) της πληρωμής προς επιστροφή.
amount | Όχι | integer | Το ποσό της συναλλαγής σε cents (χωρίς σημεία στίξης π.χ. 1099 αντί 10,99). **Εάν το ποσό δεν οριστεί τότε πραγματοποιείται επιστροφή όλου του ποσού.**
description | Όχι | string(255) | Μία σύντομη περιγραφή.


## Ανάκτηση πληρωμής


>Ανάκτηση πληρωμής, με το ιδιωτικό κλειδί.


```shell
curl  https://api.everypay.gr/payments/pmt_CSntXIVynqIgkYicZlBVz52O
  -u sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:
```


```php
<?php
require_once '../autoload.php';

use Everypay\Everypay;
use Everypay\Payment;

Everypay::setApiKey('sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R');

$token = 'pmt_CSntXIVynqIgkYicZlBVz52O';

$payment = Payment::retrieve($token);
```


>Απάντηση σε JSON για curl ή Object για php


```shell
{
    "token": "pmt_CSntXIVynqIgkYicZlBVz52O",
    "date_created": "2015-07-30T15:27:16+0300",
    "description": null,
    "currency": "EUR",
    "status": "Captured",
    "amount": 8912,
    "refund_amount": 0,
    "fee_amount": 206,
    "payee_email": null,
    "payee_phone": null,
    "refunded": false,
    "refunds": [],
    "card": {
        "expiration_month": "01",
        "expiration_year": "2016",
        "last_four": "1111",
        "type": "Visa",
        "holder_name": "Test 1"
    }
}
```


```php
<?php
stdClass Object
(
    [token] => pmt_CSntXIVynqIgkYicZlBVz52O
    [date_created] => 2015-07-30T15:27:16+0300
    [description] => 
    [currency] => EUR
    [status] => Captured
    [amount] => 8912
    [refund_amount] => 0
    [fee_amount] => 206
    [payee_email] => 
    [payee_phone] => 
    [refunded] => 
    [refunds] => Array
        (
        )

    [card] => stdClass Object
        (
            [expiration_month] => 01
            [expiration_year] => 2016
            [last_four] => 1111
            [type] => Visa
            [holder_name] => Test 1
        )

)
```


&nbsp;       |     &nbsp;
--------|--------------------------------
**URL** |  https://api.everypay.gr/payments/{PAYMENT}
**Μέθοδος** | GET
**Περιγραφή** | Επιστρέφει πληροφορίες για μία συγκεκριμένη πληρωμή.


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(35) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
{PAYMENT} | Ναι | string(28) | To Token (id) της πληρωμής προς αναζήτηση.

