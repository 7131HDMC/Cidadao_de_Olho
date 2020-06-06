---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_6590b049429981bbabdb44692a71a56e -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/bd_deputados" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/bd_deputados"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET bd_deputados`


<!-- END_6590b049429981bbabdb44692a71a56e -->

<!-- START_d03d8e9cff4e33c504475d5900279cd9 -->
## Funcao retorna um arquivo json com os 5 deputados que mais pediram verbas idenizatoria durante o mes informado pelo  parametro &#039;mes&#039;

> Example request:

```bash
curl -X GET \
    -G "http://localhost/cidadao_de_olho" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/cidadao_de_olho"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "nome": "Antonio Carlos Arantes",
        "quantidade": 93
    },
    {
        "nome": "Cássio Soares",
        "quantidade": 90
    },
    {
        "nome": "Douglas Melo",
        "quantidade": 88
    },
    {
        "nome": "Marília Campos",
        "quantidade": 87
    },
    {
        "nome": "João Leite",
        "quantidade": 85
    }
]
```

### HTTP Request
`GET cidadao_de_olho`


<!-- END_d03d8e9cff4e33c504475d5900279cd9 -->

<!-- START_894e9712222cb04058170fe7d49e189a -->
## Funcao retorna um arquivo json com os meios de divulgacao masi usado pelos deputados

> Example request:

```bash
curl -X GET \
    -G "http://localhost/cidadao_de_olho/redes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/cidadao_de_olho/redes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "nomeEmpresa": "Facebook Serviços Online do Brasil Ltda.",
        "uso_para_divulgar": 90
    },
    {
        "nomeEmpresa": "Onlinesites Ltda.",
        "uso_para_divulgar": 10
    },
    {
        "nomeEmpresa": "Platy Serviços Online",
        "uso_para_divulgar": 9
    }
]
```

### HTTP Request
`GET cidadao_de_olho/redes`


<!-- END_894e9712222cb04058170fe7d49e189a -->


