# Πελάτες


    Το αντικείμενο **Πελάτη** μπορεί να χρησιμοποιηθεί για περιπτώσεις που απαιτούν αυτοματοποιημένη τιμολόγηση (π.χ. συνδρομή), χωρίς να χρειάζεται να αποθηκεύετε ευαίσθητα δεδομένα στον server της εφαρμογής σας. Δημιουργώντας ένα τέτοιο αντικείμενο θα μπορείτε να εκτελείτε τις συναλλαγές μεταδίδοντας στην υπηρεσία μας μόνο το **Token** του πελάτη. 


## Δημιουργία Πελάτη με στοιχεία κάρτας


>Δημιουργία Πελάτη με τα στοιχεία της κάρτας.


```shell
curl https://api.everypay.gr/customers
  -u sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:
  -d card_number=4242424242424242
  -d expiration_year=2015
  -d expiration_month=04
  -d email='cofounder@themail.com'
  -d cvv=334
  -d full_name="John Doe"
  -d description="Club Member"
```


>Απάντηση σε JSON


```shell
{
    "description": null,
    "email": "cofounder@themail.com",
    "date_created": "06-12-2012 19:11:25",
    "full_name": "John Doe",
    "token": "cus_060e287a64410ca1e5cbccde9ad451da",
    "is_active": true,
    "date_modified": "06-12-2012 19:11:25",
    "card": {
        "expiration_month": "04",
        "expiration_year": "2015",
        "last_four": "4242",
        "type": "Visa",
        "holder_name": null
    }
}
```


   &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** |  https://api.everypay.gr/customers
**Μέθοδος** | POST
**Περιγραφή** | Δημιουργεί ένα νέο αντικείμενο Πελάτη, συσχετισμένο με ορισμένες πληροφορίες (συμπεριλαμβανομένων των στοιχείων κάρτας). To αντικείμενο αυτό και όλες οι επόμενες κινήσεις του, θα είναι συνδεδεμένο με την εταιρεία της οποίας χρησιμοποιούμε το Ιδωτικό κλειδί.


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(36) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
card_number | Ναι | integer(16) | O αριθμός της κάρτας.
holder_name | Ναι | string(255) | To όνομα κατόχου της κάρτας.
expiration_year | Ναι |integer(4) | Έτος λήξης της κάρτας (4 ψηφία).
expiration_month | Ναι | integer(2) | Μήνας λήξης της κάρτας (2 ψηφία).
cvv | Ναι | integer(3) | Ο τριψήφιος κωδικός ασφαλείας στο πίσω μέρος της κάρτας.
description | Όχι | string(255) | Μία σύντομη περιγραφή.
full_name | Ναι | string(255) | Το όνομα του πελάτη.
email | Όχι | string(100) | H διεύθυνση email του πελάτη.



## Δημιουργία Πελάτη με χρήση Token


>Δημιουργία Πελάτη με χρήση Token.


```shell
curl https://api.everypay.gr/customers
  -u sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:
  -d token=crd_bed96ed62ad862659a9379b8a7decf7c 
  -d full_name="John Doe"
```


>Απάντηση σε JSON


```shell
{
    "description": null,
    "email": "cofounder@themail.com",
    "date_created": "06-12-2012 19:11:25",
    "full_name": "John Doe",
    "token": "cus_060e287a64410ca1e5cbccde9ad451da",
    "is_active": true,
    "date_modified": "06-12-2012 19:11:25",
    "card": {
        "expiration_month": "04",
        "expiration_year": "2015",
        "last_four": "4242",
        "type": "Visa",
        "holder_name": null
    }
}
```


   &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** |     https://api.everypay.gr/customers
**Μέθοδος** | POST
**Περιγραφή** |     Δημιουργεί ένα νέο αντικείμενο Πελάτη όπως παραπάνω, με τη διαφορά οτι τα στοιχεία της κάρτας δίνονται μέσω ενός προδημιουργημένου Token.


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(36) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
token | Ναι | string(36) | To Token (αχρησιμοποίητο) που έχουμε δημιουργήσει για μία κάρτα.
description | Όχι | string(255) | Μία σύντομη περιγραφή.
full_name | Ναι | string(255) | Το όνομα του πελάτη.
email | Όχι | string(100) | H διεύθυνση email του πελάτη.


### Τα πεδία του αντικειμένου Πελάτη


**Πεδίο** | **Τύπος** | **Περιγραφή**
------|:-------------|----------
description | string(255) / null | Η περιγραφή του πελάτη.
email | string(255) / null | To email του πελάτη.
date_created | string(255) | Η ημερομηνία δημιουργίας του πελάτη.
full_name | string(255) | Το όνομα του πελάτη.
token  | string(36) | Το μοναδικό αναγνωριστικό (ID) του πελάτη.
is_active | true / false | Δέικτης εάν ο πελάτης είναι ενεργός.
date_modified | string(255) | Η ημερομηνία στην οποία άλλαξαν τελευταία φορά κάποια στοιχεία του πελάτη.
card | | Ένα [αντικείμενο κάρτας](#Τα-πεδία-του-αντικειμένου-κάρτας) (βλ.παραπάνω) συσχετισμένο με τον πελάτη.


## Ανάκτηση πελάτη


> Ερώτημα (query) για έναν Πελάτη


```shell
curl https://api.everypay.gr/customers/cus_060e287a64410ca1e5cbccde9ad451da 
    -u 'sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:'
```


>Απάντηση σε JSON


```shell
{
    "description": "Boss's friend, keep happy!!!",
    "email": null,
    "date_created": "06-12-2012 19:11:25",
    "full_name": "John Doe",
    "token": "cus_060e287a64410ca1e5cbccde9ad451da",
    "is_active": true,
    "date_modified": "06-12-2012 19:11:25",
    "card": {
        "expiration_month": "04",
        "expiration_year": "2015",
        "last_four": "4242",
        "type": "Visa",
        "holder_name": null
    }
}
```


   &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** | https://api.everypay.gr/customers/{CUSTOMER_ID}
**Μέθοδος** | GET
**Περιγραφή** | Επιστρέφει τις πληροφορίες για το αντικείμενο του πελάτη.


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(36) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
{CUSTOMER_ID} | Ναι | string(36) | To id του πελάτη μεταδίδεται απευθείας από τη διεύθυνση URL.


### Τα πεδία του αντικειμένου Πελάτη


**Πεδίο** | **Τύπος** | **Περιγραφή**
------|:-------------|----------
description | string(255) / null | Η περιγραφή του πελάτη.
email |	string(10) / null | To email του πελάτη
date_created | string(255) | Η ημερομηνία δημιουργίας του πελάτη
full_name | string(255) | Το όνομα του πελάτη
token |	string(36) | Το μοναδικό αναγνωριστικό (ID) του πελάτη
is_active | true / false | Δέικτης εάν ο πελάτης είναι ενεργός
date_modified | string(255) | Η ημερομηνία στην οποία άλλαξαν τελευταία φορά κάποια στοιχεία του πελάτη
card | | Ένα [αντικείμενο κάρτας](#Τα-πεδία-του-αντικειμένου-κάρτας) (βλ.παραπάνω) συσχετισμένο με τον πελάτη


## Επεξεργασία Πελάτη


> Ενημέρωση πελάτη


```shell
curl https://api.everypay.gr/customers/cus_060e287a64410ca1e5cbccde9ad451da  -u sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:
  -X PUT
  -d email="johnDoe@omail.com"
  -d description="Fitch LiSP customer"
```


>Απάντηση σε JSON


```shell
{
    "description": "Fitch LiSP customer",
    "email": "johnDoe@omail.com",
    "date_created": "06-12-2012 19:11:25",
    "full_name": "John Doe",
    "token": "cus_060e287a64410ca1e5cbccde9ad451da",
    "is_active": true,
    "date_modified": "06-12-2012 19:14:45",
    "card": {
        "expiration_month": "12",
        "expiration_year": "2012",
        "last_four": "4242",
        "type": "Visa",
        "holder_name": null
    }
}
```

   &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** | https://api.everypay.gr/customers/{CUSTOMER_ID}
**Μέθοδος** | PUT
**Περιγραφή** | Επεξεργασία των στοιχείων ενός πελάτη.


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(36) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
card_number | Όχι | integer(16) | O αριθμός της κάρτας.
holder_name | Όχι / Ναι | string(255) |	To όνομα κατόχου της κάρτας. Υποχρεωτικό στην περίπτωση που αλλάζετε και το card_number
expiration_year | Όχι / Ναι | integer(4) |	Έτος λήξης της κάρτας (4 ψηφία). Υποχρεωτικό στην περίπτωση που αλλάζετε και το card_number.
expiration_month | Όχι / Ναι | integer(2) |	Μήνας λήξης της κάρτας (2 ψηφία). Υποχρεωτικό στην περίπτωση που αλλάζετε και το card_number.
cvv | Όχι / Ναι | integer(3) | Ο τριψήφιος κωδικός ασφαλείας στο πίσω μέρος της κάρτας. Υποχρεωτικό στην περίπτωση που αλλάζετε και το card_number.
description | Όχι | string(255) | Μία σύντομη περιγραφή.
full_name | Όχι | string(255) | Το όνομα του πελάτη.
email | Όχι | string(100) | H διεύθυνση email του πελάτη.
{CUSTOMER_ID} | Ναι | string(36) | To id του πελάτη μεταδίδεται απευθείας από τη διεύθυνση URL.


## Διαγραφή Πελάτη


> Διαγραφή Πελάτη


```shell
curl https://api.everypay.gr/customers/cus_060e287a64410ca1e5cbccde9ad451da 
  -u 'sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:'
  -X DELETE
```


>Απάντηση σε JSON


```shell
{
    "description": "Fitch LiSP customer",
    "email": "johnDoe@omail.com",
    "date_created": "06-12-2012 19:11:25",
    "full_name": "John Doe",
    "token": "cus_060e287a64410ca1e5cbccde9ad451da",
    "is_active": false,
    "date_modified": "06-12-2012 19:14:50"
}
```


   &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** | https://api.everypay.gr/customers/{CUSTOMER_ID}
**Μέθοδος** | DELETE
**Περιγραφή** |     Διαγραφή ενός αντικειμένου πελάτη. Λόγω θεμάτων ασφαλείας, το αντικείμενο ποτέ δεν διαγράφεται πραγματικά, αλλά γίνεται μόνιμα ανενεργό. Η διαδικασία αυτή είναι **ΜΗ** αναστρέψιμη.


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(36) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
{CUSTOMER_ID} | Ναι | string(36) | To id του πελάτη μεταδίδεται απευθείας από τη διεύθυνση URL.



## Λίστα Πελατών


> Λίστα Πελατών


```curl
curl "https://api.everypay.gr/customers?count=2&offset=1"
  -D GET
  -u sk_PqSohnrYrRI1GUKOZvDkK5VVWAhnlU3R:
```


>Απάντηση σε JSON


```shell
{
    "description": "Fitch LiSP customer",
    "email": "johnDoe@omail.com",
    "date_created": "06-12-2012 19:10:36",
    "full_name": "John Doe",
    "token": "cus_060e287a64410ca1e5cbccde9ad451da",
    "is_active": true,
    "date_modified": "06-12-2012 19:10:36",
    "card": {
        "expiration_month": "1",
        "expiration_year": "2017",
        "last_four": "4242",
        "type": "Visa",
        "holder_name": "John Doe"
    }
},
{
    "description": "Πελάτης 1",
    "email": null,
    "date_created": "06-12-2012 19:21:08",
    "full_name": "Paul Graham",
    "token": "cus_17c4307c02a73f39df4f10c0ca706631",
    "is_active": true,
    "date_modified": "06-12-2012 19:21:08",
    "card": {
        "expiration_month": "4",
        "expiration_year": "2016",
        "last_four": "4242",
        "type": "Visa",
        "holder_name": null
    }
}
```

  &nbsp;       |     &nbsp;
--------|--------------------------------
**URL** | https://api.everypay.gr/customers/?count={int1}&offset={int2}&date_from={timestamp1}&date_to={timestamp2}
**Μέθοδος** | GET
**Περιγραφή** | Προβολή όλων των διαθέσιμων πελατών. Τα αντικείμενα προβάλλονται ταξινομημένα σύμφωνα με την ημερομηνία δημιουργίας, με πρώτο να εμφανίζεται το πιο πρόσφατα δημιουργημένο.


**Ορίσματα** 


**Πεδίο** | **Υποχρεωτικό** | **Τύπος** | **Περιγραφή**
------|-------------|----------|----------
SECRET KEY | Ναι | string(36) | Το ιδιωτικό κλειδί δίνεται σαν username για HTTP πρόσβαση.
count | Όχι | integer(4) | O αριθμός των εμφανιζόμενων αποτελεσμάτων. Δίνεται σαν παράμετρος στη διέυθυνση URL. Εάν δεν ορισθεί τότε λαμβάνεται η προκαθορισμένη τιμή που είναι 10.
offset | Όχι | integer(4) | Ο αριθμός των πελατών μετά τους οποίους θα εμφανιστούν τα αποτελέσματα π.χ. για τους πελάτες που βρίσκονται από τη θέση 10 και μετά δηλώνουμε offset=9. Δίνεται σαν παράμετρος στη διέυθυνση URL. Η προκαθορισμένη τιμή είναι 0.
date_from | Όχι | timestamp (integer) | H ημερομηνία πέραν της οποίας ζητάμε τους πελάτες π.χ. για πελάτες που δημιουργήθηκαν μετά από τις 01/10/2013 00:00:00, δίνουμε date_from=1380585600. Δίνεται σαν παράμετρος στη διεύθυνση URL.
date_to | Όχι | timestamp (integer) | H ημερομηνία μέχρι την οποία ζητάμε τους πελάτες π.χ. για πελάτες που δημιουργήθηκαν πριν από τις 01/10/2013 00:00:00, δίνουμε date_to=1380585600. Δίνεται σαν παράμετρος στη διεύθυνση URL. 