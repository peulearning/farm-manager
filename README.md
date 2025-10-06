1. Objetivo Utilize o PHP e preferencialmente os frameworks Symfony ou Laravel para desenvolver um sistema que auxilie no controle de uma fazenda de bovinos.

2. Requisitos Funcionais

● CRUD do veterinário, manipulando os seguintes dados: ○ Nome: nome do veterinário. ○ CRMV: código do veterinário.

● CRUD da fazenda, manipulando os seguintes dados: ○ Nome: nome da fazenda. ○ Tamanho: Tamanho da fazenda em hectares (HA). ○ Responsável: Nome do responsável pela fazenda. ○ Veterinários: Uma fazenda pode ter um ou vários veterinários (ManyToMany).

● CRUD do gado da fazenda, manipulando os seguintes dados: ○ Código: código da cabeça de gado; ○ Leite: número de litros de leite produzido por semana; ○ Ração: quantidade de alimento ingerida por semana - em quilos; ○ Peso: peso do animal em quilos; ○ Nascimento: data de nascimento do animal; ○ Fazenda: fazenda a que o gado pertence (ManyToOne).

2.2 Regras de negócio
● Pode ter apenas um veterinário com o mesmo CRMV.

● Pode ter apenas uma fazendo com o mesmo nome.

● A quantidade de animais será limitada pelo tamanho da fazenda, sendo no máximo 18 animais por hectare. ● Pode haver apenas um animal vivo com o mesmo código.

● A data de nascimento não pode ser futura.

● Listagem de animais para abate, sendo que, um animal pode ser enviado para abate quando atinge alguma das seguintes condições: ○ Possui mais de 05 anos de idade; ○ Produza menos de 40 litros de leite por semana; ○ Produza menos de 70 litros de leite por semana e ingira mais de 50 quilos de ração por dia (quantidade ingerida por semana dividido por 7); ○ Possui peso maior que 18 arrobas.

● Utilize o item anterior para mandar os animais para o abate (o sistema só permite o abate de animais que se enquadre em pelo menos uma das condições citadas no item anterior);

2.3 Relatórios
 ● Relatório de animais abatidos;
 ● Relatório da quantidade total de leite produzido por semana (Tela inicial);
 ● Relatório da quantidade total de ração necessária por semana (Tela inicial);
 ● Relatório da quantidade total de animais que tenham até 1 ano de idade e que consumam mais de 500Kg de ração por semana (Tela inicial).


 3. Requisitos de sistema
● Adicionar ao projeto, o pacote KnpLabs/KnpPaginatorBundle(https://github.com/KnpLabs/KnpPaginatorBundle), para paginação
e ordenação dos registros em tela;

● Usar as flash messages(https://symfony.com/doc/5.4/controller.html#flash-messages) do próprio framework para notificações dentro do sistema, dando um feedback das ações realizadas, melhorando a experiência
do usuário;

● Criar funções customizadas no repository(https://symfony.com/doc/current/doctrine.html#querying-with-the-query-builder) para buscas mais elaboradas no BD.

4. Pontos extras

● Bootstrap (https://getbootstrap.com/docs/3.4/)
● Responsividade
● Componentização do front. (https://symfony.com/doc/current/templates.html#template-inheritance-and-layouts)
● Padronização de commits. (https://dev.to/tadeubdev/por-que-padronizar-commits-e-algo-importante-1al)
● Docker (https://docs.docker.com/compose/)
