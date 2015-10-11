# Ειδοποιήσεις Πληρωμών


  Οι Ειδοποιήσεις Πληρωμών είναι ειδοποιήσεις που παρακινούν έναν πελάτη να πραγματοποιήσει πληρωμή προς τον έμπορο που έστειλε την ειδοποίηση.


## Ειδοποιήσεις πληρωμών με τα στοιχεία του πελάτη


>Δημιουργία ειδοποίησης πληρωμής για πελάτη, με το ιδιωτικό κλειδί του έμπορου.


```shell
curl https://api.everypay.gr/notifications
  -u sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:
  -d payee_name="John Doe" 
  -d payee_email="john.doe@themail.com"
  -d payee_phone=2106969169
  -d amount=4500
  -d description="Monthly fee #10"
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
    "token": "pnt_lmPLs5zHKCK2sa8B20wZ9xNq",
    "status": "Awaiting",
    "date_created": "2015-10-11T23:14:25+0300",
    "description": "Monthly fee #10",
    "amount": 4500,
    "payee_email": "john.doe@themail.com",
    "payee_phone": "2106969169",
    "expiration_date": null,
    "locale": "el"
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

    [installments_count] => 0
    [installments] => Array
        (
        )

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
```


   &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** |  https://api.everypay.gr/notifications
**Μέθοδος** | POST
**Περιγραφή** | Δημιουργεί ειδοποίηση πληρωμής από τον έμπορο προς συγκεκριμένο πελάτη αυτού.


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(35) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
payee_name | Ναι | string(255) | To όνομα του πελάτη που καλείται να πραγματοποιήσει την πληρωμή.
payee_email | Ναι | string(100) | H διεύθυνση email του πελάτη που καλείται να πραγματοποιήσει την πληρωμή.
payee_phone | Ναι | integer(10) | Ο αριθμός τηλεφώνου του πελάτη που καλείται να πραγματοποιήσει την πληρωμή .
amount | Ναι | integer | Το ποσό της συναλλαγής σε cents (χωρίς σημεία στίξης π.χ. 1099 αντί 10,99).
description | Ναι | string(255) | Μία σύντομη περιγραφή της επεκείμενης πληρωμής στην οποία αναφέρεται αυτή η ειδοποίηση.
expiration_date | Όχι | date | Η ημερομηνία μέχρι και την οποία είναι έγκυρη αυτή η ειδοποίηση πληρωμής.
locale | Όχι | string(2) | Η γλώσσα στην οποία θα σταλεί το email ειδοποίησης στον πελάτη.
