# Ειδοποιήσεις Πληρωμών


  Οι Ειδοποιήσεις Πληρωμών είναι ειδοποιήσεις που παρακινούν έναν πελάτη να πραγματοποιήσει πληρωμή προς τον έμπορο που έστειλε την ειδοποίηση.


## Δημιουργία ειδοποίησης πληρωμής με τα στοιχεία του πελάτη


>Δημιουργία ειδοποίησης πληρωμής με τα στοιχεία του πελάτη, με το ιδιωτικό κλειδί του έμπορου.


```shell
curl https://api.everypay.gr/notifications
  -u sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:
  -d payee_name="John Doe" 
  -d payee_email="john.doe@themail.com"
  -d payee_phone=2106969169
  -d amount=4500
  -d description="Payment for item #450"
  -d expiration_date="2015-10-19 15:52:00"
```


```php
<?php
require_once '../autoload.php';

use Everypay\Everypay;
use Everypay\PaymentNotification;

Everypay::setApiKey('sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R');

$params = array(
    'payee_name' => 'John Doe',
    'payee_email' => 'john.doe@themail.com',
    'payee_phone' => '2106969169',
    'amount' => 4500,
    'description' => 'Payment for item #450',
    'expiration_date'=>'2015-10-19 15:52:00'
);

$notification = PaymentNotification::create($params);
```


>Απάντηση σε JSON για curl ή Object για php


```shell
{
    "token": "pnt_lmPLs5zHKCK2sa8B20wZ9xNq",
    "status": "Awaiting",
    "date_created": "2015-10-11T23:14:25+0300",
    "description": "Payment for item #450",
    "amount": 4500,
    "payee_name": "John Doe",
    "payee_email": "john.doe@themail.com",
    "payee_phone": "2106969169",
    "expiration_date": "2015-10-19T15:52:00+0300",
    "locale": "el"
}
```


```php
<?php
stdClass Object
(
    [token] => pnt_lmPLs5zHKCK2sa8B20wZ9xNq
    [status] => Awaiting
    [date_created] => 2015-10-11T23:14:25+0300
    [description] => Payment for item #450
    [amount] => 4500
    [payee_name] => John Doe
    [payee_email] => john.doe@themail.com
    [payee_phone] => 2106969169
    [expiration_date] => 2015-10-19T15:52:00+0300
    [locale] => el

)
```


   &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** |  https://api.everypay.gr/notifications
**Μέθοδος** | POST
**Περιγραφή** | Δημιουργεί ειδοποίηση πληρωμής από τον έμπορο προς συγκεκριμένο πελάτη. Η ειδοποίηση δημιουργείται στη βάση ενώ ταυτόχρονα αποστέλεται και στη διεύθυνση ηλ. αλληλογραφίας του πελάτη.


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(35) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
payee_name | Ναι | string(255) | To όνομα του πελάτη που καλείται να πραγματοποιήσει την πληρωμή.
payee_email | Ναι | string(100) | H διεύθυνση email του πελάτη που καλείται να πραγματοποιήσει την πληρωμή.
payee_phone | Ναι | integer(10) | Ο αριθμός τηλεφώνου του πελάτη που καλείται να πραγματοποιήσει την πληρωμή .
amount | Ναι | integer | Το ποσό της συναλλαγής σε cents (χωρίς σημεία στίξης π.χ. 1099 αντί 10,99).
description | Ναι | string(255) | Μία σύντομη περιγραφή της επεκείμενης πληρωμής στην οποία αναφέρεται αυτή η ειδοποίηση.
expiration_date | Όχι | DateTime::ISO8601 | Η ημερομηνία μέχρι και την οποία είναι έγκυρη αυτή η ειδοποίηση πληρωμής (όχι λιγότερο από 24 ώρες από την δημιουργία της ειδοποίησης). Παράδειγμα: "2015-10-18T15:52:00+0300"
locale | Όχι | string(2) | Η γλώσσα στην οποία θα σταλεί το email ειδοποίησης στον πελάτη.


## Ανάκτηση ειδοποίησης πληρωμής


> Προβολή μιας συγκεκριμένης ειδοποίησης πληρωμής.


```shell
curl https://api.everypay.gr/notifications/pnt_ZO0maRe68evdrVnLDmdsR3xE
    -u sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:
```


```php
<?php
require_once '../autoload.php';

use Everypay\Everypay;
use Everypay\PaymentNotification;

Everypay::setApiKey('sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R');

$token = 'pnt_ZO0maRe68evdrVnLDmdsR3xE';

$notification = PaymentNotification::retrieve($token);
```


>Απάντηση σε JSON για curl ή Object για php


```shell
{
    "token": "pnt_ZO0maRe68evdrVnLDmdsR3xE",
    "status": "Awaiting",
    "date_created": "2016-01-14T13:21:29+0200",
    "description": "Δόση 1η 2016",
    "amount": 4500,
    "payee_name": "John Doe",
    "payee_email": "john.doe@gmail.com",
    "payee_phone": "2106561444",
    "expiration_date": "2016-02-25T23:59:00+0200",
    "locale": "el"
}
```


```php
<?php
(
    [token] => pnt_ZO0maRe68evdrVnLDmdsR3xE
    [status] => Awaiting
    [date_created] => 2016-01-14T13:21:29+0200
    [description] => Δόση 1η 2016
    [amount] => 4500
    [payee_email] => john.doe@gmail.com
    [payee_phone] => 2106561444
    [expiration_date] => 2016-02-25T23:59:00+0200
    [locale] => el
)
```


   &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** | https://api.everypay.gr/notifications/{NOTIFICATION_ID}
**Μέθοδος** | GET
**Περιγραφή** | Επιστρέφει τις πληροφορίες για μια συγκεκριμένη ειδοποίηση πληρωμής.


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(35) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
{NOTIFICATION_ID} | Ναι | string(28) | To id της ειδοποίησης πληρωμής μεταδίδεται απευθείας από τη διεύθυνση URL.


## Λίστα ειδοποιήσεων πληρωμών


   &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** |  https://api.everypay.gr/notifications?count={int1}&offset={int2}
**Μέθοδος** | GET
**Περιγραφή** | Προβολή όλων των ειδοποιήσεων πληρωμών. Τα αντικείμενα προβάλλονται ταξινομημένα σύμφωνα με την ημερομηνία δημιουργίας, με πρώτο να εμφανίζεται το πιο πρόσφατα δημιουργημένο.

> Λίστα Πελατών


```shell
curl https://api.everypay.gr/customers?count=3&offset=1
  -X GET
  -u sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:
```


```php
<?php
require_once '../autoload.php';

use Everypay\Everypay;
use Everypay\PaymentNotification;

Everypay::setApiKey('sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R');

$params = array(
    'count' => 3,
    'offset' => 1
);

$notifications = PaymentNotification::listAll($params);
```


>Απάντηση σε JSON για curl ή Object για php
>> Εδώ υπάρχουν 10 ειδοποιήσεις πληρωμών στη βάση αλλά ζητάμε να δούμε μόνο τις 3 τελευταία δημιουργημένες, παρακάπτωντας την πιο πρόσφατη από όλες.


```shell
{
    "total_count": 10,
    "items": [
        {
            "token": "pnt_ZO0maRe68evdrVnLDmdsR3xE",
            "status": "Awaiting",
            "date_created": "2016-01-14T13:21:29+0200",
            "description": "Δόση 1η 2016",
            "amount": 4500,
            "payee_name": "John Doe",
            "payee_email": "john.doe@gmail.com",
            "payee_phone": "2106561444",
            "expiration_date": "2016-02-25T23:59:00+0200",
            "locale": "el"
        },
        {
            "token": "pnt_RobdUp58eeNzUQtOhaFHwxhi",
            "status": "Expired",
            "date_created": "2015-10-12T16:31:03+0300",
            "description": "Καλάθι #2199",
            "amount": 1100,
            "payee_name": "John Doe",
            "payee_email": "john.doe@gmail.com",
            "payee_phone": "2106561444",
            "expiration_date": "2015-10-22T23:59:00+0300",
            "locale": "el"
        },
        {
            "token": "pnt_UuvUZgi12l76CuqBdRv1XLbK",
            "status": "Expired",
            "date_created": "2015-10-12T16:25:10+0300",
            "description": "Δόση 12",
            "amount": 2500,
            "payee_name": "Mike Doe",
            "payee_email": "mike.doe@gmail.com",
            "payee_phone": "2106561333",
            "expiration_date": "2015-10-15T23:59:00+0300",
            "locale": "el"
        }
    ]
}

```

```php
<?php
(
    [total_count] => 10
    [items] => Array
        (
            [0] => stdClass Object
                (
                    [token] => pnt_ZO0maRe68evdrVnLDmdsR3xE
                    [status] => Awaiting
                    [date_created] => 2016-01-14T13:21:29+0200
                    [description] => Δόση 1η (2016)
                    [amount] => 4500
                    [payee_name] => John Doe
                    [payee_email] => john.doe@gmail.com
                    [payee_phone] => 2106561444
                    [expiration_date] => 2016-02-25T23:59:00+0200
                    [locale] => el
                )

            [1] => stdClass Object
                (
                    [token] => pnt_RobdUp58eeNzUQtOhaFHwxhi
                    [status] => Expired
                    [date_created] => 2015-10-12T16:31:03+0300
                    [description] => Καλάθι #2199
                    [amount] => 1100
                    [payee_name] => John Doe
                    [payee_email] => john.doe@gmail.com
                    [payee_phone] => 2106561444
                    [expiration_date] => 2015-10-22T23:59:00+0300
                    [locale] => el
                )

            [2] => stdClass Object
                (
                    [token] => pnt_UuvUZgi12l76CuqBdRv1XLbK
                    [status] => Expired
                    [date_created] => 2015-10-12T16:25:10+0300
                    [description] => Δόση 12
                    [amount] => 2500
                    [payee_name] => Mike Doe
                    [payee_email] => mike.doe@gmail.com
                    [payee_phone] => 2106561333
                    [expiration_date] => 2015-10-15T23:59:00+0300
                    [locale] => el
                )

        )

)

```


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(35) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
count | Όχι | integer(4) | O αριθμός των εμφανιζόμενων αποτελεσμάτων. Δίνεται σαν παράμετρος στη διέυθυνση URL. Εάν δεν ορισθεί τότε λαμβάνεται η προκαθορισμένη τιμή που είναι 10. Ανώτερη τιμή είναι το 20.
offset | Όχι | integer(4) | Ο αριθμός των ειδοποιήσεων μετά τις οποίες θα εμφανιστούν τα αποτελέσματα π.χ. για τις ειδοποιήσεις που βρίσκονται από τη θέση 10 και μετά δηλώνουμε offset=9. Δίνεται σαν παράμετρος στη διέυθυνση URL. Η προκαθορισμένη τιμή είναι 0.