
# Morph Blog

simple blog project using Laravel Filamentphp and Livewire
- :fire: **Filamentphp** 
- :fire: **Livewire** 
- :fire: **TailwindCSS** 
- :fire: **User registration and authentication** 
- :fire: **Users Permissions**
- :fire: **Add, view, and comment on posts**
- :fire: **markdown support**

## Installation

1. Clone the project:

```bash
git clone git remote add origin https://github.com/anastalal/morph_blog.git
```
2. Navigate to the project directory:
```bash
cd morph_blog
```
3. Install the required dependencies:
```bash
composer install & npm install
```
4. Copy the .env file:
```bash
cp .env.example .env
```
5. Generate the application key:
```bash
php artisan key:generate
```
6. Set up the database and run migrations with seeder :
```bash
php artisan migrate --seed
```
7. Compile assets:
```bash
npm run build
```
8. Create Symbolic Link for Storage
```bash
php artisan storage:link
```
9. Start the development server:
```bash
php artisan serve
```
