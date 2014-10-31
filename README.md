#Módulo Site


##O que é?

Um módulo para Zend Framework para facilitar o carregamento de elementos básicos para a inicialização de um projeto. Com ele o carregamento do css do bootstrap, jquery e a montagem do layout inicial com diversos elementos reutilizáveis como chamada pronta para o Google analytics dentre outras funcionalidades que podem ser adicionadas.


##O que já está pronto?

 - Carregamento do Twitter Bootstrap versão 3
 - Carregamento do jQuery
 - Carregamento da configuração para o Google analytics


##Como utilizar (descrito por funcionalidades)

###Carregamento do módulo

Em seu arquivo `config/application.config.php` adicione o nome do módulo:
```php
<?php 
return array(
    'modules' => array(
        // ...        
        'Site'
        // ...  
    ),
    'module_listener_options' => array(
        'module_paths' => array(
            // ...  
            './vendor'
        ),
    )
);
```

###Google analytics

Crie em `config/autoload` um arquivo chamado `google-analytics.php` com o seguinte conteúdo:

```php
<?php 

return array(
    'analytics_code' => 'Seu código do analytics'
);
```


##Contribuições

Podem ser realizadas contribuições através de Pull Requests e Issues.

##Report de erros

Utilize as issues.

