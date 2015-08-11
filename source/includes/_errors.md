# Exceptions


Παρακάτω δίνοναι οι κωδικοί λάθους που επιτρέφει το api μαζί με την εξήγηση του καθενός.

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
10001 | The provided API key is not valid: %s
10002 | The requested resource was not found.
10003 | You can only create and retrieve tokens with the public key.
10004 | Request method not supported by this resource.
10005 | Account has not any credentials yet. Please contact support
10006 | Invalid callback url provided
20000 | Invalid card number. Please try again or use another card.
20001 | Expiration year in the past or invalid.
20002 | Expiration month in the past or invalid.
20003 | Provide a valid (3 digit) CVV code.
20004 | Card is expired or expiration date does not match.
20005 | Could not find requested card token.
20006 | Provided card token %s has expired.
20007 | Provided card token %s has already been used.
20008 | Card holder name is empty or too long (max. 255 chars).
20009 | Card issuing country is empty or too long (max. 255 chars).
20010 | 3D Secure process failed. Please contact support
20011 | 3D Secure enabled. Only token payments are allowed
20012 | 3D secure authentication failed. Please provide another payment card.
20013 | 3D secure accounts are not allowed for direct creation of a card token. Please use Everypay Button.
20014 | Invalid 3D secure response.
20015 | Your account is not 3D secure enabled.
20016 | Your account does not support tokenization.
30001 | Customer full name is empty or too long (max. 255 chars).
30002 | Invalid format for customer's email address.
30003 | Customer description is empty or too long (max. 255 chars).
30004 | Could not find customer: %s
40001 | Invalid payment token. Must provide a card or a customer token.
40002 | The amount parameter is invalid. Min. 50 cents
40003 | Provide a valid currency for the payment.
40004 | Payment was declined by issuer bank.
40005 | Could not find payment: %s
40006 | Payment %s has already been fully refunded.
40007 | Refund amount of %d exceeds the remaining amount of payment %s.
40008 | Payment description is empty or too long (max. 255 chars).
40009 | Refund description is empty or too long (max. 255 chars).
40010 | Some problem happened with our gateway. If the problem persists, please contact customer support.
40011 | Some problem happened with our gateway. If the problem persists, please contact customer support.
40012 | Some problem happened with our gateway. If the problem persists, please contact customer support.
40013 | Gateway responded with an error.
40014 | You cannot refund a payment that has already been deposited
40015 | Payment "%s" is marked as "%s" and cannot be refunded.
40016 | Payment %s is not settled yet and cannot be refunded
40017 | Your balance of %d is not sufficient to refund payment %s.
40018 | Payment "%s" is marked as "%s" and cannot be canceled.
40019 | Payment %s is settled and cannot be canceled.
40020 | Invalid refund action. Must be either cancel of refund.
40021 | Invalid email provided for payment
40022 | Invalid phone provided for payment
40023 | Transaction already processed and completed
40024 | Gateway is unable to proccess transactions. Communication Error.
40025 | Duplicate transaction references are not allowed
40026 | Pack is still closing
40027 | The refund amount exceeds your remaining balance amount
40028 | This refund will bring the payment amount lower than the minimum allowed
40029 | Given amount is not the same that used on token creation.
50001 | Invalid capture action. Must be capture
50002 | Invalid refund token provided.
50003 | Could not find refund: %s
50004 | Refund "%s" is marked as "%s" and cannot be captured.
70001 | The provided terminal credentials are invalid.
70002 | Could not find session token: %s
80001 | The following parameter is not supported by this resource: %s
80002 | The following parameter has an invalid value: %s
90001 | Could not generate PDF for receipt. Please contact customer support (support@everypay.gr)
90002 | Could not send receipt to customer's email address: %s
99999 | Unexpected error. We have been notified about it and will examine the issue. If the problem persists, please contact customer support.