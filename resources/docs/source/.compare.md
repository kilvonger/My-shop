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


<!-- START_c6c5c00d6ac7f771f157dff4a2889b1a -->
## _debugbar/open
> Example request:

```bash
curl -X GET \
    -G "http://localhost/_debugbar/open" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/_debugbar/open"
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


> Example response (404):

```json
{
    "message": ""
}
```

### HTTP Request
`GET _debugbar/open`


<!-- END_c6c5c00d6ac7f771f157dff4a2889b1a -->

<!-- START_7b167949c615f4a7e7b673f8d5fdaf59 -->
## Return Clockwork output

> Example request:

```bash
curl -X GET \
    -G "http://localhost/_debugbar/clockwork/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/_debugbar/clockwork/1"
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


> Example response (404):

```json
{
    "message": ""
}
```

### HTTP Request
`GET _debugbar/clockwork/{id}`


<!-- END_7b167949c615f4a7e7b673f8d5fdaf59 -->

<!-- START_01a252c50bd17b20340dbc5a91cea4b7 -->
## _debugbar/telescope/{id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/_debugbar/telescope/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/_debugbar/telescope/1"
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


> Example response (404):

```json
{
    "message": ""
}
```

### HTTP Request
`GET _debugbar/telescope/{id}`


<!-- END_01a252c50bd17b20340dbc5a91cea4b7 -->

<!-- START_5f8a640000f5db43332951f0d77378c4 -->
## Return the stylesheets for the Debugbar

> Example request:

```bash
curl -X GET \
    -G "http://localhost/_debugbar/assets/stylesheets" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/_debugbar/assets/stylesheets"
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


> Example response (404):

```json
{
    "message": ""
}
```

### HTTP Request
`GET _debugbar/assets/stylesheets`


<!-- END_5f8a640000f5db43332951f0d77378c4 -->

<!-- START_db7a887cf930ce3c638a8708fd1a75ee -->
## Return the javascript for the Debugbar

> Example request:

```bash
curl -X GET \
    -G "http://localhost/_debugbar/assets/javascript" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/_debugbar/assets/javascript"
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


> Example response (404):

```json
{
    "message": ""
}
```

### HTTP Request
`GET _debugbar/assets/javascript`


<!-- END_db7a887cf930ce3c638a8708fd1a75ee -->

<!-- START_0973671c4f56e7409202dc85c868d442 -->
## Forget a cache key

> Example request:

```bash
curl -X DELETE \
    "http://localhost/_debugbar/cache/1/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/_debugbar/cache/1/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE _debugbar/cache/{key}/{tags?}`


<!-- END_0973671c4f56e7409202dc85c868d442 -->

<!-- START_53be1e9e10a08458929a2e0ea70ddb86 -->
## /
> Example request:

```bash
curl -X GET \
    -G "http://localhost/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/"
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
null
```

### HTTP Request
`GET /`


<!-- END_53be1e9e10a08458929a2e0ea70ddb86 -->

<!-- START_5a1fe40d14d10aaf2915c25897c72371 -->
## catalog/index
> Example request:

```bash
curl -X GET \
    -G "http://localhost/catalog/index" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/catalog/index"
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
null
```

### HTTP Request
`GET catalog/index`


<!-- END_5a1fe40d14d10aaf2915c25897c72371 -->

<!-- START_9c7f77b53aec774cd2aa7546a7f3351b -->
## catalog/category/{category}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/catalog/category/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/catalog/category/1"
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


> Example response (404):

```json
{
    "message": "No query results for model [App\\Models\\Category] 1"
}
```

### HTTP Request
`GET catalog/category/{category}`


<!-- END_9c7f77b53aec774cd2aa7546a7f3351b -->

<!-- START_02eda43183dfa0d1206581fbc2b4f41a -->
## catalog/brand/{brand}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/catalog/brand/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/catalog/brand/1"
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


> Example response (404):

```json
{
    "message": "No query results for model [App\\Models\\Brand] 1"
}
```

### HTTP Request
`GET catalog/brand/{brand}`


<!-- END_02eda43183dfa0d1206581fbc2b4f41a -->

<!-- START_63b3816f9bf577d853096c4e87767e18 -->
## catalog/product/{product}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/catalog/product/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/catalog/product/1"
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


> Example response (404):

```json
{
    "message": "No query results for model [App\\Models\\Product] 1"
}
```

### HTTP Request
`GET catalog/product/{product}`


<!-- END_63b3816f9bf577d853096c4e87767e18 -->

<!-- START_e42f546adc46055ab263c8af81565e6c -->
## catalog/search
> Example request:

```bash
curl -X GET \
    -G "http://localhost/catalog/search" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/catalog/search"
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
null
```

### HTTP Request
`GET catalog/search`


<!-- END_e42f546adc46055ab263c8af81565e6c -->

<!-- START_f38263900756ab65dc2abb971a4ebc44 -->
## Показывает корзину покупателя

> Example request:

```bash
curl -X GET \
    -G "http://localhost/basket/index" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/basket/index"
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
null
```

### HTTP Request
`GET basket/index`


<!-- END_f38263900756ab65dc2abb971a4ebc44 -->

<!-- START_bbec24fe389f7e7e85e77b94293dadc5 -->
## Форма оформления заказа

> Example request:

```bash
curl -X GET \
    -G "http://localhost/basket/checkout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/basket/checkout"
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
null
```

### HTTP Request
`GET basket/checkout`


<!-- END_bbec24fe389f7e7e85e77b94293dadc5 -->

<!-- START_3488a81b94ab5dd54239a0ebfcc7e102 -->
## Возвращает профиль пользователя в формате JSON

> Example request:

```bash
curl -X POST \
    "http://localhost/basket/profile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/basket/profile"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST basket/profile`


<!-- END_3488a81b94ab5dd54239a0ebfcc7e102 -->

<!-- START_f8e4ff96c683d981b83cbdf9bbe7750a -->
## Сохранение заказа в БД

> Example request:

```bash
curl -X POST \
    "http://localhost/basket/saveorder" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/basket/saveorder"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST basket/saveorder`


<!-- END_f8e4ff96c683d981b83cbdf9bbe7750a -->

<!-- START_57d53bc99873c27778871883fd9b356e -->
## Сообщение об успешном оформлении заказа

> Example request:

```bash
curl -X GET \
    -G "http://localhost/basket/success" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/basket/success"
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


> Example response (302):

```json
null
```

### HTTP Request
`GET basket/success`


<!-- END_57d53bc99873c27778871883fd9b356e -->

<!-- START_2bc9b99ad2f7973b0e126d581a27f223 -->
## Добавляет товар с идентификатором $id в корзину

> Example request:

```bash
curl -X POST \
    "http://localhost/basket/add/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/basket/add/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST basket/add/{id}`


<!-- END_2bc9b99ad2f7973b0e126d581a27f223 -->

<!-- START_85b27e86d8fd0047331f1a0f08e05fbc -->
## Увеличивает кол-во товара $id в корзине на единицу

> Example request:

```bash
curl -X POST \
    "http://localhost/basket/plus/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/basket/plus/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST basket/plus/{id}`


<!-- END_85b27e86d8fd0047331f1a0f08e05fbc -->

<!-- START_442839cd28dfd8d62613e3ed863b7349 -->
## Уменьшает кол-во товара $id в корзине на единицу

> Example request:

```bash
curl -X POST \
    "http://localhost/basket/minus/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/basket/minus/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST basket/minus/{id}`


<!-- END_442839cd28dfd8d62613e3ed863b7349 -->

<!-- START_ef66e1beba46fed3d2fdaa8155dac8c6 -->
## Удаляет товар с идентификаторм $id из корзины

> Example request:

```bash
curl -X POST \
    "http://localhost/basket/remove/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/basket/remove/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST basket/remove/{id}`


<!-- END_ef66e1beba46fed3d2fdaa8155dac8c6 -->

<!-- START_f6823f852760e3425550afc8875f8d82 -->
## Полностью очищает содержимое корзины покупателя

> Example request:

```bash
curl -X POST \
    "http://localhost/basket/clear" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/basket/clear"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST basket/clear`


<!-- END_f6823f852760e3425550afc8875f8d82 -->

<!-- START_1646af240f3ad6fa5c2b923a7481d428 -->
## Show the application&#039;s login form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/user/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/login"
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
null
```

### HTTP Request
`GET user/login`


<!-- END_1646af240f3ad6fa5c2b923a7481d428 -->

<!-- START_e161b426684d55c90a3995ef5912168f -->
## Handle a login request to the application.

> Example request:

```bash
curl -X POST \
    "http://localhost/user/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST user/login`


<!-- END_e161b426684d55c90a3995ef5912168f -->

<!-- START_4da47a53f07b05619bb8e7a66a3d2172 -->
## Log the user out of the application.

> Example request:

```bash
curl -X POST \
    "http://localhost/user/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST user/logout`


<!-- END_4da47a53f07b05619bb8e7a66a3d2172 -->

<!-- START_55c2e6b10f045cd485671f8be3bf1ae7 -->
## Show the application registration form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/user/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/register"
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
null
```

### HTTP Request
`GET user/register`


<!-- END_55c2e6b10f045cd485671f8be3bf1ae7 -->

<!-- START_e64f26c2026bfa1f51f45d37b8cf1c44 -->
## Handle a registration request for the application.

> Example request:

```bash
curl -X POST \
    "http://localhost/user/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST user/register`


<!-- END_e64f26c2026bfa1f51f45d37b8cf1c44 -->

<!-- START_fa596fb1657fac8418616f7a12621aef -->
## Display the form to request a password reset link.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/user/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/password/reset"
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
null
```

### HTTP Request
`GET user/password/reset`


<!-- END_fa596fb1657fac8418616f7a12621aef -->

<!-- START_5031a9750d51ab64d87e1eb787d6f767 -->
## Send a reset link to the given user.

> Example request:

```bash
curl -X POST \
    "http://localhost/user/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/password/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST user/password/email`


<!-- END_5031a9750d51ab64d87e1eb787d6f767 -->

<!-- START_b8ea302ec1d5e18cfe03b7a1ca0caa80 -->
## Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/user/password/reset/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/password/reset/1"
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
null
```

### HTTP Request
`GET user/password/reset/{token}`


<!-- END_b8ea302ec1d5e18cfe03b7a1ca0caa80 -->

<!-- START_f09484f59546f0be4d98d5981b2744a6 -->
## Reset the given user&#039;s password.

> Example request:

```bash
curl -X POST \
    "http://localhost/user/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST user/password/reset`


<!-- END_f09484f59546f0be4d98d5981b2744a6 -->

<!-- START_af76115c65f186926d7364f2da129f51 -->
## Display the password confirmation view.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/user/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/password/confirm"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user/password/confirm`


<!-- END_af76115c65f186926d7364f2da129f51 -->

<!-- START_f017126d91f5b8df4593abd3c87765c6 -->
## Confirm the given user&#039;s password.

> Example request:

```bash
curl -X POST \
    "http://localhost/user/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST user/password/confirm`


<!-- END_f017126d91f5b8df4593abd3c87765c6 -->

<!-- START_8dd34c3cb1938e98d23f2553bdf5b351 -->
## Show the application dashboard.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/user/index" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/index"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user/index`


<!-- END_8dd34c3cb1938e98d23f2553bdf5b351 -->

<!-- START_10c700a1a5173f595c341e34abcd27fb -->
## Показывает список всех профилей

> Example request:

```bash
curl -X GET \
    -G "http://localhost/user/profile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/profile"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user/profile`


<!-- END_10c700a1a5173f595c341e34abcd27fb -->

<!-- START_c2bde60f514997a4dd7311d7ca36a640 -->
## Показывает форму для создания профиля

> Example request:

```bash
curl -X GET \
    -G "http://localhost/user/profile/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/profile/create"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user/profile/create`


<!-- END_c2bde60f514997a4dd7311d7ca36a640 -->

<!-- START_581993c9c575b7fee53e32e69c10708c -->
## Сохраняет новый профиль в базу данных

> Example request:

```bash
curl -X POST \
    "http://localhost/user/profile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/profile"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST user/profile`


<!-- END_581993c9c575b7fee53e32e69c10708c -->

<!-- START_dcdd569cf3df97a8d8cb6e651cbc69b5 -->
## Показывает информацию о профиле

> Example request:

```bash
curl -X GET \
    -G "http://localhost/user/profile/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/profile/1"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user/profile/{profile}`


<!-- END_dcdd569cf3df97a8d8cb6e651cbc69b5 -->

<!-- START_eb66f75c0746f13d05fa7fac4e80f21b -->
## Показывает форму для редактирования профиля

> Example request:

```bash
curl -X GET \
    -G "http://localhost/user/profile/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/profile/1/edit"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user/profile/{profile}/edit`


<!-- END_eb66f75c0746f13d05fa7fac4e80f21b -->

<!-- START_d2bfac1cd3aa8c4ab845574e154077ce -->
## Обновляет профиль (запись в таблице БД)

> Example request:

```bash
curl -X PUT \
    "http://localhost/user/profile/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/profile/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT user/profile/{profile}`

`PATCH user/profile/{profile}`


<!-- END_d2bfac1cd3aa8c4ab845574e154077ce -->

<!-- START_b6648614697b94d795e7a377b044044b -->
## Удаляет профиль (запись в таблице БД)

> Example request:

```bash
curl -X DELETE \
    "http://localhost/user/profile/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/profile/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE user/profile/{profile}`


<!-- END_b6648614697b94d795e7a377b044044b -->

<!-- START_bdf4aa03f8b02624af769fe5e7e59aba -->
## user/order
> Example request:

```bash
curl -X GET \
    -G "http://localhost/user/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/order"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user/order`


<!-- END_bdf4aa03f8b02624af769fe5e7e59aba -->

<!-- START_cd012fd5c54bccbc4b13c2df2907923d -->
## user/order/{order}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/user/order/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/order/1"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user/order/{order}`


<!-- END_cd012fd5c54bccbc4b13c2df2907923d -->

<!-- START_66d0019654df7c46603b77f5ebad0c0e -->
## Handle the incoming request.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/index" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/index"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/index`


<!-- END_66d0019654df7c46603b77f5ebad0c0e -->

<!-- START_d1e9e1b95a199a4980bd4525fd0f38e3 -->
## Показывает список всех категорий

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/category" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/category"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/category`


<!-- END_d1e9e1b95a199a4980bd4525fd0f38e3 -->

<!-- START_4c15968abacedf0b67c4df455fdb7052 -->
## Показывает форму для создания категории

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/category/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/category/create"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/category/create`


<!-- END_4c15968abacedf0b67c4df455fdb7052 -->

<!-- START_d44c2e0e5b3b0d2f011efe57f2d0495f -->
## Сохраняет новую категорию в базу данных

> Example request:

```bash
curl -X POST \
    "http://localhost/admin/category" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/category"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/category`


<!-- END_d44c2e0e5b3b0d2f011efe57f2d0495f -->

<!-- START_00d0fda4f2720a4ae5a8466de7b9633f -->
## Показывает страницу категории

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/category/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/category/1"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/category/{category}`


<!-- END_00d0fda4f2720a4ae5a8466de7b9633f -->

<!-- START_10a24666bb303950e581fd3d009c6f4a -->
## Показывает форму для редактирования категории

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/category/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/category/1/edit"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/category/{category}/edit`


<!-- END_10a24666bb303950e581fd3d009c6f4a -->

<!-- START_a6f8c8beca11e2374520f9fd7baf33d9 -->
## Обновляет категорию каталога

> Example request:

```bash
curl -X PUT \
    "http://localhost/admin/category/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/category/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/category/{category}`

`PATCH admin/category/{category}`


<!-- END_a6f8c8beca11e2374520f9fd7baf33d9 -->

<!-- START_7058a7e98365361d454ac97d3d5a839c -->
## Удаляет категорию каталога

> Example request:

```bash
curl -X DELETE \
    "http://localhost/admin/category/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/category/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/category/{category}`


<!-- END_7058a7e98365361d454ac97d3d5a839c -->

<!-- START_0f4f5c34e620e5ad73cbdd32cca3316a -->
## Показывает список всех брендов

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/brand" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/brand"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/brand`


<!-- END_0f4f5c34e620e5ad73cbdd32cca3316a -->

<!-- START_35bbd0f84f34e5d89e08ed3e3bbd057e -->
## Показывает форму для создания бренда

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/brand/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/brand/create"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/brand/create`


<!-- END_35bbd0f84f34e5d89e08ed3e3bbd057e -->

<!-- START_479a74799eb9dd1c3aeafa2d2d4a428b -->
## Сохраняет новый бренд в базу данных

> Example request:

```bash
curl -X POST \
    "http://localhost/admin/brand" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/brand"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/brand`


<!-- END_479a74799eb9dd1c3aeafa2d2d4a428b -->

<!-- START_e5a4e025c40cb7874281ae876db7d7a2 -->
## Показывает страницу бренда

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/brand/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/brand/1"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/brand/{brand}`


<!-- END_e5a4e025c40cb7874281ae876db7d7a2 -->

<!-- START_d6ad0d9049638d308e49c7edafe5b468 -->
## Показывает форму для редактирования бренда

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/brand/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/brand/1/edit"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/brand/{brand}/edit`


<!-- END_d6ad0d9049638d308e49c7edafe5b468 -->

<!-- START_dad5b084548a3dd791b2337795428c44 -->
## Обновляет бренд (запись в таблице БД)

> Example request:

```bash
curl -X PUT \
    "http://localhost/admin/brand/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/brand/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/brand/{brand}`

`PATCH admin/brand/{brand}`


<!-- END_dad5b084548a3dd791b2337795428c44 -->

<!-- START_c12a720b980bf42b013fdad5e0787638 -->
## Удаляет бренд (запись в таблице БД)

> Example request:

```bash
curl -X DELETE \
    "http://localhost/admin/brand/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/brand/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/brand/{brand}`


<!-- END_c12a720b980bf42b013fdad5e0787638 -->

<!-- START_9a7c60de622aa327ea2ab22f57fe4f40 -->
## Показывает список всех товаров

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/product" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/product"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/product`


<!-- END_9a7c60de622aa327ea2ab22f57fe4f40 -->

<!-- START_65d613717d414dff746ae77ab547d652 -->
## Показывает форму для создания товара

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/product/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/product/create"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/product/create`


<!-- END_65d613717d414dff746ae77ab547d652 -->

<!-- START_2a50bdf6cd9fdfa165149d0dd0da7075 -->
## Сохраняет новый товар в базу данных

> Example request:

```bash
curl -X POST \
    "http://localhost/admin/product" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/product"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/product`


<!-- END_2a50bdf6cd9fdfa165149d0dd0da7075 -->

<!-- START_5929339dba9129dca1500c2f77f26fd0 -->
## Показывает страницу товара

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/product/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/product/1"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/product/{product}`


<!-- END_5929339dba9129dca1500c2f77f26fd0 -->

<!-- START_77545c4a80b5b616201d71ff305aec56 -->
## Показывает форму для редактирования товара

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/product/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/product/1/edit"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/product/{product}/edit`


<!-- END_77545c4a80b5b616201d71ff305aec56 -->

<!-- START_4c44219e0cf932208c480684f68560cf -->
## Обновляет товар каталога в базе данных

> Example request:

```bash
curl -X PUT \
    "http://localhost/admin/product/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/product/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/product/{product}`

`PATCH admin/product/{product}`


<!-- END_4c44219e0cf932208c480684f68560cf -->

<!-- START_e518c6011493b2bc2658f74ea82e639d -->
## Удаляет товар каталога из базы данных

> Example request:

```bash
curl -X DELETE \
    "http://localhost/admin/product/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/product/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE admin/product/{product}`


<!-- END_e518c6011493b2bc2658f74ea82e639d -->

<!-- START_fbe3c162af9942f355592d55b917c700 -->
## Показывает товары категории

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/product/category/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/product/category/1"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/product/category/{category}`


<!-- END_fbe3c162af9942f355592d55b917c700 -->

<!-- START_abed5cfa021d6e9a60379988984f2b8f -->
## Просмотр списка заказов

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/order" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/order"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/order`


<!-- END_abed5cfa021d6e9a60379988984f2b8f -->

<!-- START_1327948aada7da0d804cd56afdf4f867 -->
## Просмотр отдельного заказа

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/order/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/order/1"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/order/{order}`


<!-- END_1327948aada7da0d804cd56afdf4f867 -->

<!-- START_31dd299fa914303f5459f36cd02d0c10 -->
## Форма редактирования заказа

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/order/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/order/1/edit"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/order/{order}/edit`


<!-- END_31dd299fa914303f5459f36cd02d0c10 -->

<!-- START_5605f2ba8af992829813a44e61432e0e -->
## Обновляет заказ покупателя

> Example request:

```bash
curl -X PUT \
    "http://localhost/admin/order/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/order/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/order/{order}`

`PATCH admin/order/{order}`


<!-- END_5605f2ba8af992829813a44e61432e0e -->

<!-- START_bd487ab94d8034c2d13644bb1772fdfa -->
## Показывает список всех пользователей

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/user"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/user`


<!-- END_bd487ab94d8034c2d13644bb1772fdfa -->

<!-- START_8dbd3c8dace74c8cc20dbdadc3a61eed -->
## Показывает форму для редактирования пользователя

> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/user/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/user/1/edit"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/user/{user}/edit`


<!-- END_8dbd3c8dace74c8cc20dbdadc3a61eed -->

<!-- START_7bc8a51548d7c6e9ac5bc7dda1263ba7 -->
## Обновляет данные пользователя в базе данных

> Example request:

```bash
curl -X PUT \
    "http://localhost/admin/user/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/user/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT admin/user/{user}`

`PATCH admin/user/{user}`


<!-- END_7bc8a51548d7c6e9ac5bc7dda1263ba7 -->


