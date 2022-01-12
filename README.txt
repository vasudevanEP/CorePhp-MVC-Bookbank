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

git clone 

```
**OR**

Download it and place it in the `htdocs` equivalent of your server.

Edit the `database.php` inside config folder to connect it to your sql database.



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

**Note**
As the function name is `get_get` and not `get` the \_get means that want this function to handle the get requests.
