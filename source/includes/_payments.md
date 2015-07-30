# Πληρωμές


  Οι Πληρωμές είναι κινήσεις χρέωσης καρτών. Μπορούν να γίνουν χρησιμοποιώντας τα στοιχεία μιας κάρτας, κάποιο προδημιουργημένο [Token](#Δημιουργία-Τoken) ή κάποιο αντικείμενο [Πελάτη](#Δημιουργία-Πελάτη-με-στοιχεία-κάρτας) (υπενθυμίζουμε οτι ο πελάτης έχει ήδη μια κάρτα συσχετισμένη).


## Χρέωση με χρήση Κάρτας


>Δημιουργία Token κάρτας με το δημόσιο κλειδί.


```shell
curl https://api.everypay.gr/tokens
  -u pk_atFzbY3VB94gFFJ3FxArEWM8DpnuA1y8
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

use 'Everypay\Everypay';

Everypay::setApiKey('pk_atFzbY3VB94gFFJ3FxArEWM8DpnuA1y8');

$params = array(
    'amount' => 1099
    'card_number' => '4242424242424242',
    'expiration_year' => '2016',
    'expiration_month' => '05',
    'cvv' => '334',
    'holder_name'=>'John Doe'
);

$token = Everypay_Tokens::create($params);
?>
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
        "holder_name": "John Doe"
    }
}
```


```php
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
        "holder_name": "John Doe"
    }
}
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
amount | Όχι | integer | Το ποσό της χρέωσης σε cents. Μπορεί να προσδιοριστεί αργότερα κατά τη χρήση του token για κάποια αγορά.


