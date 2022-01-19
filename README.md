## BookBank - Core PHP MVC
<h3 align="center">An attempt to make a simple MVC from scratch in PHP</h3>


## Features 

- Handle get/post easily
- Model Supports - Create, Read, Update, Delete and where clause.
- Easlly load views from controller
- Light Weight
- Doesn't contain fancy features that you don't use anyways.

## How to use

### Setup
Just clone this repository
```sh

git clone https://github.com/vasudevanEP/CorePhp-MVC-Bookbank.git

```
**OR**

Download it and place it in the `htdocs` equivalent of your server.

Edit the `config/database.php` inside config folder to connect it to your sql database.



### How it works
The MVC follows a [CodeIgniter](https://codeigniter.com/) like url structure.

**For Example**
In the following url
http://localhost/Bookbank/index.php/books/getAll

- `Bookbank` is the project name
- `index.php` is compulsory for now as it is the entry point to the app
- `books` is the name of the Controller 
- `getAll` is the function you want
- rest is passed as arguments to the function

### Add / Update books through XML files
**Update XML**
Update the book XML file inside the `config/books` folder.
```xml
<?xml version="1.0" encoding="UTF-8"?>
<books>
    <book>
        <author>Holly Black</author>
        <name>The Cruel Prince</name>
    </book>
    <book>
        <author>Alex Michaelides</author>
        <name>The Silent Patient</name>
    </book>
       
</books>

```

**For Running Cron**
```sh
0 7 0 0 0 curl -s http://localhost/Bookbank/index.php/cron/getBooks
```

**Note**
As the function name is `get_get` and not `get` the \_get means that want this function to handle the get requests.


## Help Us

This framework is in the very early stages of it's development.

You can help me by posting issues.