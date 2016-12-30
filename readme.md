PL-OMB
==========
Sistema de Ouvidoria
---------
**Author:** Vitor "Pliavi" Silvério de Souza

### O que foi utilizado
- Laravel 4.2
    - Lavarel Elixir
- Node NPM (Requisito)
    - Gulp
    - Vue 2
        - Vueify
    - Bulma

### Instalação
Após clonar o projeto, apenas execute os comandos:
- Instalar dependências do Composer  
  `composer install`
- Instalar dependências do Node  
  `npm install`
- Auto compilação das tarefas do Gulp  
  `gulp watch`
- Servir o Laravel no Localhost:8000  
  `php artisan serve`


### Comandos Artisan Personalizados
- **validator:make `<name>`**  
  Faz a criação de um novo validador extendendo o [validador base][BaseValidator].

### Pastas Personalizadas (Laravel)
- **Validators**  
  Classes validadoras, claases essas unicamente responsáveis por guardar as regras para cada tipo de transação para que sejam executadas pelo [validador base][BaseValidator].  

- **Helpers**  
  Classes de utilidade, que podem ser usadas em qualquer local do código, pois a maioria de susas funções são estáticas.  

    - **Helpers Implementados:**  
        - [x] **FormatterHelper:** Responsável por formatação.  
            - **toUpperCase:** Função de alterar TODOS os valores de uma *array* (exceto chaves) para caixa alta.  
        - [x] **TranslatorHelper:** Responsável por traduções.  
            - **translateFields:** Função que traduz todos os campos marcados (entre chaves ("{}")) com base em uma array (geralmente vinda de uma requisição de formulário ou AJAX) de traduções de campos, contida em [app/lang/pt-br].  

[app/lang/pt-br]: https://gitlab.com/Pliavi/ouvidoriav2/blob/master/app/lang/pt-br/formField.php
[BaseValidator]: https://gitlab.com/Pliavi/ouvidoriav2/blob/master/app/validators/BaseValidator.php
