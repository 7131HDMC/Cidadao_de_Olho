
# 		API	Cidadão de Olho
## Sobre o sistema...
###	O projeto Cidadão de Olho visa facilitar o monitoramento público estadual de gastos em verbas indenizatórias.

Para rodar a API Cidadão de Olho funciona em servidor com apache, mysql, php, composer e laravel, alem disso, apos baixado o projeto e necessario ter um banco de dados local com o nome 'cidadao_de_olho', usuario 'cidadao' e senha 'zeta@1234' ou alterar as varias de ambiente no arquivo '.env', feito isso basta rodar as migrations  para criar as respectivas tabelas do banco, entre no diretorio do projeto(Cidadao_de_Olho/cidadao_de_olho/) pela linha de comando e rode o seguinte codigo em linha de comando: php artisan migrate

Para consumir a Webservices da ALMG, a rota nescessaria para isso e '/bd_deputados'( http://localhost/bd_deputados).


### Rercursos disponibilizados pela aplicacao:

1 - Mostrar os top 5 deputados que mais pediram reembolso de verbas indenizatórias por mês. 
Para acessar esse recurso basta adicionar a rota '/cidadao_de_olho' e o parametro 'mes' com o mes que voce planeja analisar, que a aplicacao retornara em formato json os dados dos 5 deputados que mais pediram verbas neste mes, caso queira pegar durante o ano todo adicione a rota '/cidadao_de_olho?mes=all'.

Exemplo para um mes especifico:
http://localhost/cidadao_de_olho?mes=1

Exemplo para o ano:
http://localhost/cidadao_de_olho?mes=all

 Nota: Ha a rota '/cidadao_de_olho' sem parametro disponivel, ela foi uma interpetracao equivocada que obtive do problema que gera um json com os top 5 deputados que mais gastaram no ano, mas como achei interessante nao a apaguei.
 
2 - Mostrar o ranking das redes sociais mais utilizadas dentre os deputados.
Para acessar esse recurso basta adcionar a rota '/cidadao_de_olho/redes'.

Exemplo:
http://localhost/cidadao_de_olho/redes

### Nota sobre a WebService: Ao consumir a ws eu achei indicio de redes socias somente nas verbas para divulgacao que os deputados usam, porem nem todas as empresas que sao contradas sao redes sociais e neste ponto eu me perguntei se estava consumindo os dados corretos para este websevice



##	Nota: Problemática proposta pela equipe da empresa Codificar 
