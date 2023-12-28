
## Installation

- git clone git@hrgit.abrha.net:tests/javadi.git
- cd javadi
- git checkout dev
- cp .env.example .env
- composer i
- php artisan migrate:fresh --seed
- php artisan jwt:secret

#Commands
- for create product using this command:`php artisan product:create`

#Enviroments
- FILE_DIR = Location of file. default `/opt/myprogram/product_comments`.
- UPDATE_STRATEGY = Update Strategy. default `linux` cli.
- LIMIT_USER_COMMENT = Maximum user comment pre product. default `2` pre product.
  
  
