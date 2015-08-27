# Exceptions


Παρακάτω δίνοναι οι πιο συνηθισμένοι κωδικοί λάθους που επιτρέφει το api μαζί με την εξήγηση του καθενός.

> Παράδειγμα δημιουργίας Token για κάρτα χωρίς το όνομα του κατόχου της.

```shell
curl https://api.everypay.gr/tokens
    -u sk_chgRcz8C2UvhytYlzEcS86KpAsHenMOG: 
    -d card_number=4792730907163592 
    -d expiration_year=2017
    -d expiration_month=06
    -d cvv=160
```


>Απάντηση σε JSON


```shell
{
    "error": {
        "status": 400,
        "code": 20008,
        "message": "Card holder name is empty or too long (max. 255 chars)."
    }
}
```


**Κωδικός Λάθους** | **Εξήγηση**
---------- | -------
10000 | Please provide a valid API key.
10001 | The provided API key is not valid: \<api-key\>
10002 | The requested resource was not found.
10003 | You can only create and retrieve tokens with the public key.
10004 | Request method not supported by this resource.
20000 | Invalid card number. Please try again or use another card.
20001 | Expiration year in the past or invalid.
20002 | Expiration month in the past or invalid.
20003 | Provide a valid (3 digit) CVV code.
20004 | Card is expired or expiration date does not match.
20005 | Could not find requested card token.
20006 | Provided card token \<token\> has expired.
20007 | Provided card token \<token\> has already been used.
40001 | Invalid payment token. Must provide a card or a customer token.
40002 | The amount parameter is invalid. Min. 30 cents
40003 | Provide a valid currency for the payment.
40004 | Payment was declined by issuer bank.
40005 | Could not find payment: \<token\>
40006 | Payment \<token\> has already been fully refunded.
40007 | Refund amount of \<amount\> exceeds the remaining amount of payment \<token\>.
40013 | Gateway responded with an error.
40015 | Payment \<token\> is marked as \[FAILED/CANCELED/REFUNDED\] and cannot be refunded.
40017 | Your balance of \<amount\> is not sufficient to refund payment \<token\>.
40018 | Payment \<token\> is marked as \[CAPTURED/REFUNDED/PARTIALLY REFUNDED\] and cannot be canceled.
