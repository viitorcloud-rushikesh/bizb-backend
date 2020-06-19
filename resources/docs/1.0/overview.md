# API Docs

---

- [Login](#login)
- [Register](#register)

<a name="login"></a>
## Login

Details for login api
##
##

####Endpoint

> {warning} Please note that the URI for this endpoint only should not include api/{$version} before 

| Method    | URI       | Headers   |
| :         |   :-      |  :        |
| POST      | `/login`  | Default   |

### URL Params

```php
None
```

### Data Params

```php
{
	"email" : "test@bizb.com",
	"password":"Test@123"
}
```

> {success} Success Response

####Code `200`
####Content
```php
{
    "token": "1|YzKlgiGDdCLyQsYBHCsXFBR6AqbyTnBi71b6hYyNvM7zoRTjstRKjs4PWvJbXisL63JIEP9gyRygAjL1",
    "user": {
        "id": 1,
        "name": "Test",
        "email": "test@bizb.com"
    }
}
```

> {danger} Unauthenticated Response

####Code `401`
####Content
```php
{
    "message": "These credentials do not match our records."
}
```

<a name="register"></a>
## Register

Details for Registration api
##
##

####Endpoint

> {warning} Please note that the URI for this endpoint only should not include api/{$version} before 

| Method    | URI           | Headers   |
| :         |   :-          |  :        |
| POST      | `/register`   | Default   |

### URL Params

```php
None
```

### Data Params

```php
{
    "name":"Bizb Test",
    "email":"test@bizb.com",
    "password":"Test@123",
    "password_confirmation":"Test@123"
}
```

> {success} Success Response

####Code `200`
####Content
```php
{
    "token": "12|ghlYcOdtcTpVPW75YuDmY7ra4lmIHe0vlRS5NApIGh62BvHA0OOhe1adBUmFTLUEcBb4bnrV6Al8AMuR",
    "user": {
        "id": 112,
        "name": "Bizb Test",
        "email": "test@bizb.com"
    },
    "message": "Registered successfully!"
}
```

> {danger} Unauthenticated Response

####Code `400`
####Content
```php
{
    "message": "Validation message will come in this"
}
```
