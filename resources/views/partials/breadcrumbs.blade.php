{{--
Estilo de breadcrumbs do bootstrap. Exemplo de utilização: 
    @include('caminho.breadcrumbs', [
        'items' => [
            'Home' => route('home'),
            'About' => route('about'),
        ]
    ])
Ao incluir essa blade no seu arquivo e passar um array de items com as rotas necessárias para
formar o breadcrumbs, ele gera o estilo de breadcrumb comum no bootrap. Esse código espera um
array associativo de items em que a chave é o texto a ser apresentado no breadcrumb e o valor
é a url do breadcrumb. O último item do array items deve ser url atual do usuário.
--}}
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    @foreach($items as $label => $url)
        @if($loop->last)
            <li class="breadcrumb-item active" aria-current="page">{{ $label }}</li>
        @else
            <li class="breadcrumb-item">
                <a href="{{ $url }}">{{ $label }}</a>
            </li>
        @endif
    @endforeach    
  </ol>
</nav>