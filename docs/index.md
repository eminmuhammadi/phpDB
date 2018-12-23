# Documentation for phpDB
phpDB - Database Scripts for php such as PDO , API , MYSQLI (OOP and PURE options included)
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
# phpDB/PDO
##### php Database Scripts for PDO  
## File source
```
=|  + PDO
    =| + OOP 
    =| + PURE
    =| - README.md
```
___
### Installing PDO on Unix systems
1. PDO and the PDO_SQLITE driver is enabled by default as of PHP 5.1.0. You may need to enable the PDO driver for your database of choice; consult the documentation for database-specific PDO drivers to find out more about that.
> *Note:*
When building PDO as a shared extension (not recommended) then all PDO drivers must be loaded after PDO itself.
2. When installing PDO as a shared module, the php.ini file needs to be updated so that the PDO extension will be loaded automatically when PHP runs. You will also need to enable any database specific drivers there too; make sure that they are listed after the pdo.so line, as PDO must be initialized before the database-specific extensions can be loaded. If you built PDO and the database-specific extensions statically, you can skip this step.
```
extension=pdo.so
```
### Windows users
1. PDO and all the major drivers ship with PHP as shared extensions, and simply need to be activated by editing the `php.ini` file:
```
extension=php_pdo.dll
```
>*Note:*
This step is not necessary for PHP 5.3 and above, as a DLL is no longer required for PDO.
2. Next, choose the other database-specific DLL files and either use dl() to load them at runtime, or enable them in `php.ini` below `php_pdo.dll`. For example:
```
extension=php_pdo.dll
extension=php_pdo_firebird.dll
extension=php_pdo_informix.dll
extension=php_pdo_mssql.dll
extension=php_pdo_mysql.dll
extension=php_pdo_oci.dll
extension=php_pdo_oci8.dll
extension=php_pdo_odbc.dll
extension=php_pdo_pgsql.dll
extension=php_pdo_sqlite.dll
```
These DLLs should exist in the system's _extension_dir_.
>*Note:*
Remember that after making changes to your php.ini file you will need to restart PHP for your new configuration directives to take effect.
# phpDB/MYSQLI
##### php Database Scripts for MYSQLI  
## File source
```
=|  + MYSQLI
    =| + OOP 
    =| + PURE
    =| - README.md
```
___
## Installation
The mysqli extension was introduced with PHP version 5.0.0. The MySQL Native Driver was included in PHP version 5.3.0.
## Installation on Linux
The common Unix distributions include binary versions of PHP that can be installed. Although these binary versions are typically built with support for the MySQL extensions, the extension libraries themselves may need to be installed using an additional package. Check the package manager that comes with your chosen distribution for availability.

For example, on Ubuntu the php5-mysql package installs the ext/mysql, ext/mysqli, and pdo_mysql PHP extensions. On CentOS, the php-mysql package also installs these three PHP extensions.

Alternatively, you can compile this extension yourself. Building PHP from source allows you to specify the MySQL extensions you want to use, as well as your choice of client library for each extension.

The MySQL Native Driver is the recommended client library option, as it results in improved performance and gives access to features not available when using the MySQL Client Library. Refer to What is PHP's MySQL Native Driver? for a brief overview of the advantages of MySQL Native Driver.

The /path/to/mysql_config represents the location of the mysql_config program that comes with MySQL Server.
## Installation on Windows Systems
On Windows, PHP is most commonly installed using the binary installer.
## PHP 5.3.0 and newer 
On Windows, for PHP versions 5.3 and newer, the mysqli extension is enabled and uses the MySQL Native Driver by default. This means you don't need to worry about configuring access to `libmysql.dll`.
## PHP 5.0, 5.1, 5.2
On these old unsupported PHP versions (PHP 5.2 reached EOL on '6 Jan 2011'), additional configuration procedures are required to enable mysqli and specify the client library you want it to use.

The mysqli extension is not enabled by default, so the php_mysqli.dll DLL must be enabled inside of php.ini. In order to do this you need to find the php.ini file (typically located in c:\php), and make sure you remove the comment (semi-colon) from the start of the line extension=php_mysqli.dll, in the section marked [PHP_MYSQLI].

Also, if you want to use the MySQL Client Library with mysqli, you need to make sure PHP can access the client library file. The MySQL Client Library is included as a file named libmysql.dll in the Windows PHP distribution. This file needs to be available in the Windows system's PATH environment variable, so that it can be successfully loaded. See the FAQ titled "How do I add my PHP directory to the PATH on Windows" for information on how to do this. Copying libmysql.dll to the Windows system directory (typically c:\Windows\system) also works, as the system directory is by default in the system's PATH. However, this practice is strongly discouraged.

As with enabling any PHP extension (such as php_mysqli.dll), the PHP directive extension_dir should be set to the directory where the PHP extensions are located. See also the Manual Windows Installation Instructions. An example extension_dir value for PHP 5 is c:\php\ext.
> *Note:*
If when starting the web server an error similar to the following occurs: "Unable to load dynamic library './php_mysqli.dll'", this is because php_mysqli.dll and/or libmysql.dll cannot be found by the system.
