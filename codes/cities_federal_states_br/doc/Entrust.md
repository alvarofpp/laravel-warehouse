# Models configurados para biblioteca Entrust
Para quem utiliza o pacote [Entrust](https://github.com/Zizaco/entrust) v1.9.1 (e versões anteriores) para gerenciar os perfis e permissões dos usuários no sistema foi adicionado os models da biblioteca já com os relacionamentos. 

`app/Models/Permission.php` <br>
`app/Models/Role.php`

## Arquivos
```bash
.
└── app
    └── Models
        └── Permission.php
        └── Role.php
```

**OBS.:** A necessidade de adicionar esses models é pelo fato de
 que a biblioteca não fornece os mesmos, então em todos os projetos 
 é necessário a criação junto com os relacionamentos. 
