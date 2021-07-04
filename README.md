# Welcome to Undressed MVC
## A PHP MySQLi framework
The 'Undressed MVC' framework is a PHP MVC framework buit with simplicity, speed and readibility in mind. **No ORM witchcraft**, nor any absurd stuff.

The 'Undressed MVC' is meant to be **easily understood and modified** by any PHP programmer with some understanding of the language.

There's **no obfuscation** nor any other techniques to make the framework code harder to read.

The 'Undressed MVC' **handles routing** for you (so you don't have to create your own regular expressions, however feel free to check the Router class if you would like to understand how it works), **form validation**, helps you make your **database calls** (works for mysqli, if you'd like to change that, feel free to change the DB class. There is no ORM. You just call a method from the DB class and the argument is your SQL query. This way you don't have to write the same repetatives lines of code each time you need to get some data, while not being limited by ORMs. This way you can have outer joins, unions and subqueries easily, as long as you have some SQL knowledge.) among other features.

## Requirements
PHP 7+ and MySQLi is recommended.

## License
MIT License.
Check the [license agreement](https://github.com/edluis97/undressed-mvc/blob/master/license.md)
