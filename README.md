# jamijoy-tran-app
Transaction Application

# INDEX 
http://localhost/jamijoy-tran-app/
> Response
No of transaction alive > 13 at 2023-10-12 18:19:31


# transaction-mock 
http://localhost/jamijoy-tran-app/transaction-mock
> Response
{
    "message": "Mock response for transaction api - GENERAL MESSAGE",
    "status": "accepted",
    "transaction_id": "N/A"
}


# transaction-store 
http://localhost/jamijoy-tran-app/transaction-store?amount=3292&user_id=1
> Response
{"message":"Mock response for transaction api - GENERAL MESSAGE","status":"accepted","transaction_id":"16","transaction_status":"pending"}


# transaction-store 
http://localhost/jamijoy-tran-app/transaction-update?transaction_id=9&status=failed
> Response
{"message":"Mock response for transaction api - GENERAL MESSAGE","status":"accepted","transaction_id":"9","transaction_status":"failed"}




