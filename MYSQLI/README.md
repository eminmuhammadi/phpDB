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
