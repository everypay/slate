# Ειδοποιήσεις Πληρωμών


  Οι Ειδοποιήσεις Πληρωμών είναι ειδοποιήσεις που παρακινούν έναν πελάτη να πραγματοποιήσει πληρωμή προς τον έμπορο που έστειλε την ειδοποίηση.


## Ειδοποιήσεις πληρωμών με τα στοιχεία του πελάτη


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

$payment = PaymentNotification::create($params);
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