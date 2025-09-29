## ⚙️ Setup Instructions

  1.Clone the repository

       git clone https://github.com/mahmoudabdallatief/Task-Management.git
      
       cd Task-Management
      
   2.Install dependencies

       composer install
       
       npm install
       
       npm run watch

      
   3.Environment setup

       Copy the .env.example file to .env
      
       Update your database configuration inside .env
       
   4.Generate application key

       php artisan key:generate
       
   5.Run migrations & seeders

       php artisan migrate
       
       php artisan db:seed 
       
   6.Run the server

       php artisan serve
