
# Cadastro de Testimonials para IntranetOne
Admin de Testimonials.
## Conteúdo
 
## Instalação

```sh
composer require agileti/iotestimonials
```
```sh
php artisan io-testimonials:install
```

- Configure o webpack conforme abaixo 
```js
...
let testimonials = require('intranetone-testimonials');
io.compile({
  services:{
    ...
    new testimonials()
    ...
  }
});

```
- Compile os assets e faça o cache
```sh
php artisan config:cache
npm run dev|prod|watch
```
