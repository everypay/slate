# Tokens


    Τα **Tokens** είναι προσωρινά, μοναδικά αναγνωριστικά που μπορούν να χρησιμοποιηθούν για να εκτελεστεί μια λειτουργία πληρωμής μέσω πιστωτικής κάρτας, χωρίς να χρειάζεται να μεταδωθούν τα ευαίσθητα στοιχεία της. 


    Ισχύουν μόνο για μια συναλλαγή και έχουν περιορισμένη διάρκεια ζωής (περίπου 10 λεπτά), μετά την οποία απορρίπτονται. Αν θέλετε να χρεώνετε μία κάρτα επαναληπτικά (π.χ. συνδρομή), τότε μπορείτε να δημιουργήσετε ένα αντικείμενο Πελάτη και η χρέωση θα γίνεται με χρήση αυτού. 


## Δημιουργία Τoken


>Δημιουργία Token με το δημόσιο κλειδί.


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
require_once 'Everypay/Tokens.php';

Everypay\Everypay::setApiKey(pk_atFzbY3VB94gFFJ3FxArEWM8DpnuA1y8:);

$params = array(
    'amount' => 1099
    'card_number' => '4242424242424242',
    'expiration_year' => '2016',
    'expiration_month' => '05',
    'cvv' => '334',
    'holder_name'=>'John Doe'
);

$token = Everypay_Tokens::create($params);
```


>Απάντηση σε JSON / PHP Object


```shell
{
    "token": "ctn_zUOwAdOqWe9BjQ86dYTWr13I",
    "is_used": false,
    "has_expired": false,
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
PUBLIC KEY | Ναι | string(36) | Το δημόσιο κλειδί (ή το ιδιωτικό) δίνεται σαν username για HTTP πρόσβαση.
card_number | Ναι | integer(16) | O αριθμός της κάρτας.
holder_name | Ναι | string(255) | To όνομα κατόχου της κάρτας.
expiration_year | Ναι | integer(4) | Έτος λήξης της κάρτας (4 ψηφία).
expiration_month | Ναι | integer(2) |Μήνας λήξης της κάρτας (2 ψηφία).
cvv | Ναι | integer(3) | Ο τριψήφιος κωδικός ασφαλείας στο πίσω μέρος της κάρτας.
amount | Ναι | integer | Το ποσό της χρέωσης σε cents.


## Ανάκτηση Token κάρτας.


>Ερώτημα (query) για ένα Token


```shell
curl https://api.everypay.gr/tokens/crd_bed96ed62ad862659a9379b8a7decf7c 
    -u pk_atFzbY3VB94gFFJ3FxArEWM8DpnuA1y8:
```


>Απάντηση σε JSON


```shell
{
    "token": "crd_bed96ed62ad862659a9379b8a7decf7c",
    "is_used": false,
    "has_expired": true,
    "date_requested": "05-12-2012 16:54:23",
    "card": {
        "expiration_month": "12",
        "expiration_year": "2012",
        "last_four": "9011",
        "type": "Visa",
        "holder_name": null
    }
}
```

   &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** | https://api.everypay.gr/tokens/{TOKEN_ID}
**Μέθοδος** | GET
**Περιγραφή** | Επιστρέφει τις πληροφορίες για ένα δεδομένο Token.


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
PUBLIC KEY | Ναι | string(36) | Το δημόσιο κλειδί (ή το ιδιωτικό) δίνεται σαν username για HTTP πρόσβαση.
{TOKEN_ID} | Ναι | string(36) | To id του token το οποίο μας ενδιαφέρει, μεταδίδεται απευθείας από τη διεύθυνση URL .


### Τα πεδία του αντικειμένου Token


**Πεδίο** | **Τύπος** | **Περιγραφή**
------|:-------------|----------
token | string(36) | To μοναδικό αναγνωριστικό (ID) του Token.
used | true / false | Δείκτης αν το Token αυτό έχει χρησιμοποιηθεί στο παρελθόν.
has_expired | true / false | Δείκτης αν το Token αυτό έχει ξεπεράσει το χρόνο ζωής του. Τα Tokens που τον έχουν ξεπεράσει δεν μπορούν να χρησιμοποιηθούν. 
date_requested | string(255) | Ημερομηνία δημιουργίας του Token.
card | json | Ένα [αντικείμενο κάρτας](#Τα-πεδία-του-αντικειμένου-κάρτας) (βλ.παρακάτω).


### Τα πεδία του αντικειμένου κάρτας


**Πεδίο** | **Τύπος** | **Περιγραφή**
------|-------------|----------
expiration_month | string(2) | Μήνας λήξης της κάρτας.
expiration_year | string(4) | Έτος λήξης της κάρτας.
last_four | string(4) | Τα τελευταία 4 ψηφία της κάρτας.
type | string(255) | Ο τύπος της κάρτας: "Visa", "Mastercard" κλπ.
holder_name | string(255) | Το όνομα κατόχου της κάρτας.