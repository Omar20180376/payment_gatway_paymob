## About This Repository

This repository implements Laravel and Vue.js as a product shopping cart single page application(SPA). is used as the payment gateway (Paymob) , has a authentication and authorization.

## Installation

First download this repository. Navigate to root of the project and then
<pre>
    <code>composer install</code>
    <code>npm install</code>
</pre>

copy the contents of .env.example to .env file. Fill up the database credentials(DB_DATABASE, DB_USERNAME, DB_PASSWORD) according to your database. Then put your STRIPE_KEY and STRIPE_SECRET. You can get your own <a href="https://dashboard.stripe.com/test/apikeys">here.</a>

At the root of your project run the following commands on terminal sequentially.
<pre>
     <code>php artisan migrate</code>
 </pre>
register using admin@gmail.com then run seed 
<pre>
     <code>php artisan db:seed</code>
</pre>

get this data from paymob account then past these om .env file
<pre>
    <code>
    PAYMOB_API_KEY=""
    PAYMOB_INTEGRATION_ID=""
    PAYMOB_IFRAME_ID=""
    PAYMOB_HMAC=""
    </code>
</pre>

you can't test callback from localhost so we need to use ngrok to test it

This will store all the default data into the database. Then compile the assets by

<pre>
    <code>npm run dev</code>
</pre>

Finally initiate your server and enjoy !!!
<pre>
    <code>php artisan serve</code>
</pre>
