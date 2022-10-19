I have used Laravel 6

The link for CMS is (http://localhost:8000/admin) where product add and product list, cart list was done.

http://localhost:8000 where we view the added products. Single product view. Add to cart. Cart page.

I have created a migration and also uploading database schema in db folder.

<i>*Please link storage with public*</i>
<b>php artisan storage:link<b>

I have also created apis to get products, add product to cart, and get cart list

1. http://localhost:8000/api/products to get products. It is an GET method

2. http://localhost:8000/api/addtocart to add product to cart. It is an POST method

3. http://localhost:8000/api/getcartdata/1 to get cart list. It is an GET method. Have to pass the userid in api url. In the above link 1 is the userid

<i><span style="color: red">Note:</span> If some error occured please use "php artisan optimize" it will clear all the caches. And refresh the page</i>
