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
###Windows users
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





