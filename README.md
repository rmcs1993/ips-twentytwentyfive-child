# IPS Twenty Twenty-Five Child

Child theme para o website da **Nutricionista Inês Pinho Santos**, baseado no tema **Twenty Twenty-Five**.

## Objetivo

Este tema contém a primeira versão do header e footer globais do site principal, alinhados com a marca:

- **Nutricionista Inês Pinho Santos**
- **Leveza com Estrutura**
- **Nutrição com estrutura, leveza e vida real**

## Estrutura incluída

```txt
style.css
functions.php
theme.json
parts/header.html
parts/footer.html
.cpanel.yml
```

## Header

Menu previsto:

- Início → `/`
- Sobre a Inês → `/sobre-a-ines/`
- Espaço → dropdown
- Acompanhamento → `/acompanhamento/`
- Gerador de Ementas → `https://gerador.inespinhosantos.pt`
- Contactos → `/contactos/`
- Marcar Consulta → `/` temporariamente

Dropdown **Espaço**:

- Conhecer o Espaço → `https://espaco.inespinhosantos.pt`
- Nutrição → `https://espaco.inespinhosantos.pt/servicos/nutricao/`
- Psicologia → `https://espaco.inespinhosantos.pt/servicos/psicologia/`
- Osteopatia → `https://espaco.inespinhosantos.pt/servicos/osteopatia/`
- Massagens → `https://espaco.inespinhosantos.pt/servicos/massagem/`

Não incluir nesta fase:

- Yoga
- Fisioterapia

## Footer

Footer minimalista com:

- assinatura da marca;
- contactos;
- redes sociais;
- Google reviews;
- Loja Amazon com indicação de link afiliado;
- botão Marcar Consulta temporariamente ligado à homepage;
- nota profissional e links legais.

## Deploy

A configuração `.cpanel.yml` está preparada para deploy no ambiente de preview:

```txt
/home/inespinh/preview.inespinhosantos.pt/wp-content/themes/ips-twentytwentyfive-child/
```

Não fazer deploy para produção sem validação visual em preview.
