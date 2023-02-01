 

// https://laravel.com/docs/9.x/packages

https://laravel.com/docs/9.x/eloquent-resources

et

https://blog.pusher.com/build-rest-api-laravel-api-resources/




GENERATE STATIC : 

https://github.com/spatie/laravel-export

https://github.com/topics/laravel-admin-panel

"spatie/laravel-export": "^0.3.10",
"spatie/regex": "^3.1"



repetition Models:

fichiers migrations
swagger
validation rules
ressources
factory seed
model $fillable




Securing the API endpoints
Before we wrap up this tutorial, let’s secure our API endpoints using middleware. To secure the books endpoint, add the code below to app/Http/Controllers/BookController.php:

    // app/Http/Controllers/BookController.php

    public function __construct()
    {
      $this->middleware('auth:api')->except(['index', 'show']);
    }
As you can see, we are making use of the auth:api middleware. Here, we are exempting the index() and show() methods from using the middleware. That way, users will be able to see a list of all books and a particular book without needing to be authenticated.

Let’s also secure the endpoint to rate a book, add the code below to app/Http/Controllers/RatingController.php:

    // app/Http/Controllers/RatingController.php

    public function __construct()
    {
      $this->middleware('auth:api');
    }