# phpDB/API
##### php Database Scripts for API  
## File source
```
=|  + API
    =| - api.php 
    =| - phpDB.class.php
    =| - client_select.php
    =| - client_delete.php
    =| - client_insert.php
    =| - client_update.php
```
___
## API Documentation
```php
$obj=new phpDB;
```
after creating object of `phpDB` class
#### `{GET}` method  `$obj->phpDB_select($id)`
##### Response `(200 - OK)`
```json
{"status":200,"message":"Successfully Selected Data","id":1,"s1":"s1","s2":"s2","s3":"s3","s4":"s4","s5":"s5","s6":"s6"}
```
##### Response `(400 - Bad Request)`
```json
{"status":400,"message":"Not found any data","id":null,"s1":null,"s2":null,"s3":null,"s4":null,"s5":null,"s6":null}
```
#### `{PUT}` method  `$obj->phpDB_update($id,$s1,$s2,$s3,$s4,$s5,$s6)`
##### Response `(200 - OK)`
```json
{"status":200,"message":"Successfully Updated Data","id":"2","s1":"s1","s2":"s2","s3":"s3","s4":"s4","s5":"s5","s6":"s6"}
```
##### Response `(400 - Bad Request)`
```json
{"status":400,"message":"Not found any data","id":null,"s1":null,"s2":null,"s3":null,"s4":null,"s5":null,"s6":null}
```
#### `{DELETE}` method  `$obj->phpDB_delete($id)`
##### Response `(200 - OK)`
```json
{"status":200,"message":"Successfully Deleted Data","id":"1","s1":null,"s2":null,"s3":null,"s4":null,"s5":null,"s6":null}
```
##### Response `(400 - Bad Request)`
```json
{"status":400,"message":"Not found any data","id":null,"s1":null,"s2":null,"s3":null,"s4":null,"s5":null,"s6":null}
```
#### `{POST}` method  `$obj->phpDB_insert($s1,$s2,$s3,$s4,$s5,$s6)`
##### Response `(200 - OK)`
```json
{"status":200,"message":"Successfully Inserted Data","id":"2","s1":"s1","s2":"s2","s3":"s3","s4":"s4","s5":"s5","s6":"s6"}
```
### Methods key and value
#### `{GET}`
```php
$param=[
          "id"=>" "
];
```
#### `{PUT}`
```php
$param=[
          "id"=>" ",
          "s1"=>" ",
          "s2"=>" ",
          "s3"=>" ",
          "s4"=>" ",
          "s5"=>" ",
          "s6"=>" "
];
```
#### `{DELETE}`
```php
$param=[
          "id"=>" "
];
```
#### `{POST}`
```php
$param=[
          "s1"=>" ",
          "s2"=>" ",
          "s3"=>" ",
          "s4"=>" ",
          "s5"=>" ",
          "s6"=>" "
];
```
### Client Decode API
```php
$param=[];
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://127.0.0.1/API/api.php?s1=".$param['s1']."&s2=".$param['s2']."&s3=".$param['s3']."&s4=".$param['s4']."&s5=".$param['s5']."&s6=".$param['s6'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "gzip",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "{METHOD}",
));
$response = curl_exec($curl);
curl_close($curl);
$data=json_decode($response,true);
```
