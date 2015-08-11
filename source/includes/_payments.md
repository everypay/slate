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

use 'Everypay\Everypay';

Everypay::setApiKey('sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:');

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

use 'Everypay\Everypay';

Everypay::setApiKey('sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:');

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


##Πληρωμή με χρήση Token κάρτας


>Πληρωμή με χρήση Token κάρτας, με το ιδιωτικό κλειδί.


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

use 'Everypay\Everypay';

Everypay::setApiKey('sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:');

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
