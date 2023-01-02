
Após o clone, puxe todas as branch pois a develop pode está mais atualizada.
`git fetch --all`
Acessar a develop
 `git checkout develop`

#### INSTALAÇÃO
Precisamos instalar todos os capotes com o comando
`composer install`

Pacotes do php atualizado, então precisamos atualizar os pacotes do note para uso da criação da autenticação pronta que o Laravel possui, digite o comando:
`npm install`
Usaremos o recomendado do laravel e o que está na [documentação](https://laravel.com/docs/9.x/starter-kits) do site.

#### Rodar a aplicação
Após a instalação de todos os pacotes, a pasta vendor foi criada, então para usar as imagens do docker e subir os container precisamos usar o comando do Sail
`./vendor/bin/sail up`
A conexão com o banco e outras configurações com o .env são o que está na documentação do Laravel
O Container do banco está usando o usuário com **sail** e a senha como **password** para ambiente de desenvolvimento.
Após os container estarem rodando, precisamos criar as tabelas com o comando:
`docker-compose exec php-fpm php artisan migrate`
Agora com todas as tabelas criadas precisamos criar os dados iniciais, rodando as Seed com o comando:
`docker-compose exec php-fpm php artisan db:seed`
Ainda precisamos seguir todas documentação do Laravel dando permissão para a pasta Storage
`sudo chgrp -R www-data storage bootstrap/cache
 sudo chmod -R ug+rwx storage bootstrap/cache`
#### BUG
Caso aconteça algum erro em relação as classes geradas do Beezer, vc deve trocar o namespace para  FCV, por exemplo:
`namespace  FCB\`
`use FCB\ `
Agora é só acessar http://localhost:38000/



