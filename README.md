# 🐄 Sistema de Controle de Fazenda de Bovinos

## 🎯 Objetivo
Desenvolver um sistema utilizando **PHP** e preferencialmente os frameworks **Symfony** ou **Laravel**, com o objetivo de **auxiliar no controle de uma fazenda de bovinos**.

---

## ⚙️ Requisitos Funcionais

### 👨‍⚕️ CRUD de Veterinário
Manipular os seguintes dados:
- **Nome:** nome do veterinário
- **CRMV:** código de registro do veterinário

---

### 🏡 CRUD da Fazenda
Manipular os seguintes dados:
- **Nome:** nome da fazenda
- **Tamanho:** tamanho da fazenda em hectares (HA)
- **Responsável:** nome do responsável pela fazenda
- **Veterinários:** uma fazenda pode ter um ou vários veterinários (**ManyToMany**)

---

### 🐮 CRUD do Gado
Manipular os seguintes dados:
- **Código:** código identificador do animal
- **Leite:** número de litros de leite produzidos por semana
- **Ração:** quantidade de alimento ingerida por semana (em quilos)
- **Peso:** peso do animal (em quilos)
- **Nascimento:** data de nascimento do animal
- **Fazenda:** fazenda à qual o gado pertence (**ManyToOne**)

---

## 🧩 Regras de Negócio

- Só pode existir **um veterinário com o mesmo CRMV**
- Só pode existir **uma fazenda com o mesmo nome**
- A **quantidade de animais é limitada** pelo tamanho da fazenda — máximo de **18 animais por hectare**
- Pode haver **apenas um animal vivo com o mesmo código**
- A **data de nascimento não pode ser futura**

### 🥩 Regras de Abate
Um animal pode ser enviado para abate quando atender **pelo menos uma** das condições abaixo:

1. Possui **mais de 5 anos de idade**
2. Produz **menos de 40 litros de leite por semana**
3. Produz **menos de 70 litros de leite por semana** e **ingere mais de 50 kg de ração por dia**
   - (Quantidade ingerida por semana ÷ 7 > 50)
4. Possui **peso maior que 18 arrobas**

> O sistema só permitirá o abate de animais que se enquadrem nessas condições.

---

## 📊 Relatórios

O sistema deve fornecer os seguintes relatórios:

- 📜 **Animais abatidos**
- 🥛 **Quantidade total de leite produzido por semana** *(exibido na tela inicial)*
- 🌾 **Quantidade total de ração necessária por semana** *(exibido na tela inicial)*
- 🐄 **Quantidade total de animais com até 1 ano de idade** e que **consumam mais de 500 kg de ração por semana** *(exibido na tela inicial)*

---

## 🖥️ Requisitos de Sistema

- Adicionar o pacote [`KnpLabs/KnpPaginatorBundle`](https://github.com/KnpLabs/KnpPaginatorBundle)
  → para **paginação e ordenação** dos registros em tela

- Utilizar as **[flash messages](https://symfony.com/doc/5.4/controller.html#flash-messages)** do framework
  → para **feedback visual** das ações do usuário

- Criar **funções customizadas no repository**
  → conforme a [documentação do Doctrine](https://symfony.com/doc/current/doctrine.html#querying-with-the-query-builder), para **buscas elaboradas no banco de dados**

---

## 💎 Pontos Extras

- 💄 [Bootstrap 3.4](https://getbootstrap.com/docs/3.4/)
- 📱 **Responsividade**
- 🧱 **Componentização do front-end**
  → [Template Inheritance & Layouts - Symfony](https://symfony.com/doc/current/templates.html#template-inheritance-and-layouts)
- 🧾 **Padronização de commits**
  → [Por que padronizar commits é importante?](https://dev.to/tadeubdev/por-que-padronizar-commits-e-algo-importante-1al)
- 🐳 **Uso de Docker**
  → [Documentação oficial](https://docs.docker.com/compose/)

---

## 📘 Observações
> Este projeto deve priorizar **boas práticas de desenvolvimento**, **organização do código** e **usabilidade** para o usuário final.
> Recomenda-se também o uso de **migrações**, **seeders**, e **padrões de projeto (MVC)**.

---

🧑‍💻 **Desenvolvido por:** *Pedro Henrique Araújo Mattos Ribeiro*
