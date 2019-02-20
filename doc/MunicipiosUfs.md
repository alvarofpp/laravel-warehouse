# Municípios e Unidades Federais
Models, Migrations e Seeder (classes e arquivos relacionados).

- No arquivo `storage/app/seed/municipios.csv` existe um total de 5570 municípios registrados, o delimitador é `,`. Os campos são:
  - Código do IBGE do município;
  - Código da UF que ele pertence;
  - Nome do município;
- No arquivo `storage/app/seed/estados.csv` existe um total de 27 unidades federais registrados, o delimitador é `,`. Os campos são:
  - Código da UF;
  - Nome da UF;
  - Sigla da UF;

## Arquivos
```bash
.
├── app
│   ├── Models
│   │   ├── Municipio.php
│   │   └── UnidadeFederal.php
├── database
│   ├── migrations
│   │   ├── 2017_11_28_000200_create_unidades_federais_table.php
│   │   └── 2017_11_28_000210_create_municipios_table.php
│   └── seeds
│       ├── MunicipioSeeder.php
│       └── UnidadeFederalSeeder.php
└── storage
    └── app
        └── seed
            ├── estados.csv
            └── municipios.csv
```
