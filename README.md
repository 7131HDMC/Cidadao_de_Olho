
# 		API	Cidadão de Olho
## Sobre o sistema...
###	O projeto Cidadão de Olho visa facilitar o monitoramento público estadual de gastos em verbas indenizatórias.

Para rodar a API e necessario consumir a Webservices da ALMG, a rota nescessaria para isso e '/bd_deputados'( http://localhost/bd_deputados).


###Rercursos disponibilizados pela aplicacao:
####1 - Mostrar os top 5 deputados que mais pediram reembolso de verbas indenizatórias por mês. 
Para acessar esse recurso basta adcionar a rota '/cidadao_de_olho' e o parametro 'mes' com o mes que voce planeja analisar, que a aplicacao retornara em formato json os dados dos 5 deputados que mais pediram verbas neste mes.

Exemplo:
http://localhost/cidadao_de_olho?mes=1

 Nota: Ha a rota '/cidadao_de_olho' sem parametro disponivel, ela foi uma interpetracao equivocada que obtive do problema que gera um reponse com os top 5 deputados que mais gastarm no ano, mas como achei interessante nao a apaguei.
####2 - Mostrar o ranking das redes sociais mais utilizadas dentre os deputados.

Exemplo:
http://localhost/cidadao_de_olho/redes?mes=12


##	Nota: Problemática proposta pela equipe da empresa Codificar 
