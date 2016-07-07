# osu leagues, an alternative ranking system for osu
Source code for ^

**Live site**: [Click me](http://osuleagues.holowinski.com.ar/)

#### Cloning the repo
Sure, why not. Make sure you [can run Laravel](https://laravel.com/docs/5.2#server-requirements) and place your osu! api key in your .env file:

```
OSU_API_KEY=yourkey
```

Migrate and seed the database:

```
php artisan migrate --seed
```

The seed contains the actual leagues used in production.