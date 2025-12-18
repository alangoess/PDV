cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve


cd frontend
npm install
cp .env.example .env
npm run dev
