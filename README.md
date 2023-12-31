## Routes:

Спосіб управління URL додатку. Використовувати для направлення додатка до відповідного метода контролера.

## Controller:

Призначений для керування логікою вашого додатка. Ця логіка може бути обробкою форми запитів, системного вводу,
автентифікації користувачів тощо.

## Models:

В Laravel, моделі представляють структуру даних. Зазвичай, кожна таблиця в вашій базі даних матиме відповідну
модель. Вони дозволяють вам взаємодіяти з вашою базою даних, запитуючи дані, вставляючи нові записи, та інше.

## Migrations:

Міграції надають спосіб створення/модифікації структури бази даних. Вони є як контролем версій для вашої
бази даних, дозволяючи вашій команді змінювати та ділитися визначенням схеми бази даних додатка.

## Request:

Використовується для отримання та роботи з даними HTTP-запиту. З його допомогою можна легко доступитися до
даних, які надійшли від клієнта, таких як введені дані форми, заголовки, файли та інші деталі HTTP-запиту.

## Factory:

Laravel factories є способом створення фейкових даних для моделей. За допомогою
фабрик, ви можете визначити типи даних, які будуть створені для кожного з полів ваших моделей.

## Seeders:

Дозволяють застосувати Factory до бази даних тестовими значеннями із factory.

## Middleware:

Механізм фільтрації запитів до вашого додатку. Наприклад,можна створити middleware, який перевіряє, чи має
користувач необхідні права доступу до певної сторінки. Якщо у користувача немає цих прав доступу, middleware може
перенаправити його на іншу сторінку або вивести повідомлення про помилку.

Команда створення Middleware:
php artisan make:middleware IsAdminMiddleware

## Policy:

Класи, які містять бізнес-логіку, пов'язану з авторизацією. Вони використовуються для визначення, чи має
конкретний користувач право виконувати певну дію.

Команда створення Policy:
php artisan make:policy PostPolicy -m Worker

## Laravel Breeze:

Офіційний стартовий шаблон для розробки веб-додатків на основі Laravel, який надає базовий функціонал для
автентифікації,
реєстрації, скидання паролю та інших аутентифікаційних операцій.

## One to one:

Director - Film
У міграції фільма створюємо поле:  
$table->foreignId('director_id')->constrained('directors')->onDelete('cascade');  
Director model:  
public function film(): \Illuminate\Database\Eloquent\Relations\HasMany  
{  
return $this->hasOne(Film::class);  
}

## One to many:

Director - Film
У міграції фільма створюємо поле:  
$table->foreignId('director_id')->constrained('directors')->onDelete('cascade');  
Director model:  
public function films(): \Illuminate\Database\Eloquent\Relations\HasMany  
{  
return $this->hasMany(Film::class);  
}

# Laravel Start

1. Створити проєкт Laravel:  
   composer create-project laravel/laravel laravel
2. Додати Breeze:  
   composer require laravel/breeze --dev  
   php artisan breeze:install
3. Налаштування .env (всі DB_ видалити окрім):  
   DB_CONNECTION=sqlite
4. Створити модель + міграція + контроллер:  
   php artisan make:model -mrc Post
5. Роутинг web.php через 1 команду:  
   Route::resource('posts', \App\Http\Controllers\PostController::class);
6. Зробити Factory (Структура фейкових записів):  
   php artisan make:factory PostFactory
7. Додати у міграцію потрібні поля. Наприклад:  
   $table->string('title');  
   $table->text('text');  
   $table->foreignId('user_id')->constrained()->onDelete('cascade');  
   $table->softDeletes();
8. PostFactory додати поля. Наприклад:  
   'title' => $this->faker->sentence(),  
   'text' => $this->faker->paragraph(),  
   'user_id' => 1
9. DatabaseSeeder застосування Factory. Наприклад:  
   User::factory(5)->create();  
   Post::factory()->count(10)->create();
10. Перша міграція:  
    php artisan migrate
11. Чиста міграцію + застосувати всі Seeder:  
    php artisan migrate:fresh --seed
12. Створення Request:  
    php artisan make:request PostRequest
13. Запустити:  
    php artisan serve
