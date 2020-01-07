# Breadcrumbs
Para realizar a criação dinâmica de breadcrumbs para as blades basta incluir essa blade no seu arquivo e passar um array de items com as rotas necessárias  para formar o breadcrumb. Esse código espera um array associativo de items em que a chave é o texto a ser apresentado no breadcrumb e o valor é a url do breadcrumb.

Exemplo de utilização:

```php
@include('caminho.breadcrumbs', [
    'items' => [
        'Home' => route('home'),
        'About' => route('about'),
    ]
])
```

## Arquivos
```bash
.
└── resource
    └── views
        └── partials.php
            └──breadcrumbs.blade.php
```
