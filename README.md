 # API	Cidadão de Olho

## Sobre o sistema...
### O projeto Cidadão de Olho visa facilitar o monitoramento público estadual de gastos em verbas indenizatórias.

Para rodar a API Cidadão de Olho é necessário um servidor apache com mysql, php, composer e laravel, além disso, após baixado o projeto e necessário ter um banco de dados local com o nome 'cidadao_de_olho', usuário 'cidadao' e senha 'zeta@1234' ou alterar as variáveis de ambiente do arquivo '.env', feito isso basta rodar as migrations para criar as respectivas tabelas do banco, entre no diretório do projeto(Cidadao_de_Olho/cidadao_de_olho/) pela linha de comando e rode o seguinte código em linha de comando:  *php artisan migrate*

Para consumir a Webservices da ALMG, a rota necessária para isso e '/bd_deputados'( http://localhost/bd_deputados).


### Recursos disponibilizados pela aplicação:

1 - Mostrar os tops 5 deputados que mais pediram reembolso de verbas indenizatórias por mês.
Para acessar esse recurso basta adicionar a rota '/cidadao_de_olho' e o parâmetro 'mes' com o mês que você planeja analisar, então a aplicação retornará em formato json os dados dos 5 deputados que mais pediram verbas neste mês. 
Para pegar os 5 deputados que mais pediram verbas durante o ano todo adicione o valor 'all' ao parâmetro 'mes'.

Exemplo para um mês especifico:
http://localhost/cidadao_de_olho?mes=1

Exemplo para o ano:
http://localhost/cidadao_de_olho?mes=all

Nota: Há a rota '/cidadao_de_olho' sem parâmetro disponível, ela foi uma interpetracão equivocada que obtive do problema, ela é responsável por gerar um json com os tops 5 deputados que mais gastaram durante o ano em verbas indenizatórias.

2 - Mostrar o ranking das redes sociais mais utilizadas dentre os deputados.
Para acessar esse recurso basta adicionar a rota '/cidadao_de_olho/redes'.

Exemplo:
http://localhost/cidadao_de_olho/redes

### Nota sobre a WebService: Ao consumir a ws de verbas indenizatórias eu achei indício de redes socias somente nas verbas para divulgacão parlarmentar, porém nem todas as empresas que são redes sociais e neste ponto eu me perguntei se estava consumindo os dados corretos para esta finalidade.


## Nota: Problemática proposta pela equipe da empresa Codificar 
