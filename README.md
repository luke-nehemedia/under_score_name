Create Under_Score_File_Names in PHP
================

This simple php class generates under_score_file_names from a given string and with a given extension.
In addition, it filters the name for allowed characters, replaces characters (e.g. ö -> oe) and removes unwanted characters (like -,_,...) from the end. It also converts the files extension to lowercase.

Requirements:
----------------
PHP Version > 5.4 (Feel free to replace the short array syntax to make it compatible with lowerearlier versions of PHP)

Usage:
----------------
This class is very simple to use:

```php
require 'helpers/UnderScoreName.php'; // or autoload
$underscorename = new UnderScoreName('This is a very Long me$ssed up)( Name','jPg');
echo $underscorename;  // Output: This_is_a_very_Long_messed_up_Name.jpg

$underscorename->setExtension('png');
echo $underscorename;  // Output: This_is_a_very_Long_messed_up_Name.png
```

Extend:
----------------
Feel free to use this class as blueprint for your own, custom classes. For example: Generate a special filename with multiple parameters:

```php
Class UniqueName extends UnderScoreName{
  // lots of code
}

$obj = new UniqueName(now(), 'Author Name','This is my Filename','jpg');
echo $obj  // Output might be: 2014_So_Author_Name_This_is_my_Filename.jpg
```

There are many more ways to extend the functionality.

API:
----------------
```php
$obj = new UnderScoreName('API');

$obj->render($filename = null, $extension = null);

// Add-Functions
$obj->addReplace($search, $replace);
$obj->addAllow($char);
$obj->addForbidAtEnd($char);

// Setter-Functions
$obj->setFilename($filename) { $this->filename = $filename; }
$obj->setExtension($extension) { $this->extension = $extension; }

// Getter-Functions
$obj->getFilename() { return $this->filename; }
$obj->getReplace($search = null) { return (isset($search)) ? $this->replace[$search] : $this->replace; }
$obj->getAllow($search = null) { return (isset($search)) ? $this->allow[$search] : $this->allow; }
$obj->getForbidAtEnd($search = null) { return (isset($search)) ? $this->forbidAtEnd[$search] : $this->forbidAtEnd; }
$obj->getExtension() { return $this->extension; }
```
