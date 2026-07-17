# IPS Twenty Twenty-Five Child

Child theme para o website da **Nutricionista Inês Pinho Santos**, baseado no tema **Twenty Twenty-Five**.

## Objetivo

Este tema contém os elementos globais e páginas editáveis do site principal, alinhados com a marca:

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
templates/front-page.html
patterns/leveza-com-estrutura.php
patterns/termos-e-condicoes.php
patterns/politica-de-privacidade.php
assets/css/home.css
assets/css/leveza-app.css
.cpanel.yml
```

## Padrões Gutenberg — Leveza com Estrutura

O tema disponibiliza três padrões editáveis:

1. **Leveza com Estrutura — Porta de entrada da app**
2. **Leveza com Estrutura — Termos e Condições**
3. **Leveza com Estrutura — Política de Privacidade**

### Como utilizar

No WordPress:

1. criar uma página nova;
2. abrir o inseridor de blocos;
3. escolher **Padrões**;
4. pesquisar por “Leveza com Estrutura”;
5. inserir o padrão correspondente;
6. guardar a página com o endereço pretendido.

Endereços recomendados:

- `/leveza-com-estrutura/`
- `/termos-e-condicoes/`
- `/politica-de-privacidade/`

Depois de inserido, cada padrão passa a ser conteúdo normal da página e pode ser alterado diretamente no Gutenberg.

O botão **Entrar na plataforma** encaminha para:

`https://leveza-estruturada-app.lovable.app`

## Header

Menu previsto:

- Início → `/`
- Sobre a Inês → `/sobre-a-ines/`
- Espaço → dropdown
- Acompanhamento → `/acompanhamento/`
- Gerador de Ementas → `https://gerador.inespinhosantos.pt`
- Contactos → `/contactos/`
- Marcar Consulta → `/contactos/`

Dropdown **Espaço**:

- Conhecer o Espaço → `https://espaco.inespinhosantos.pt`
- Nutrição → `https://espaco.inespinhosantos.pt/servicos/nutricao/`
- Psicologia → `https://espaco.inespinhosantos.pt/servicos/psicologia/`
- Osteopatia → `https://espaco.inespinhosantos.pt/servicos/osteopatia/`
- Massagens → `https://espaco.inespinhosantos.pt/servicos/massagem/`

## Footer

Footer minimalista com assinatura da marca, contactos, redes sociais, avaliações, loja afiliada e ligações legais.

## Deploy

A configuração `.cpanel.yml` está preparada para deploy no ambiente de preview:

```txt
/home/inespinh/preview.inespinhosantos.pt/wp-content/themes/ips-twentytwentyfive-child/
```

Não fazer deploy para produção sem validação visual em preview.
