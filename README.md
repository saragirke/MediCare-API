# Projekt MediCare - API Skapat med Laravel
_Av Matilda Fröberg & Sara Girke_
<br>
Detta repository innehåller det API som skapats till vårt projekt MediCare. API't hanterar inloggning och utloggning till MediCare. Som inloggad går det även att läsa ut MediCares produkter i tabellerna vitamins och superfoods. Webbtjänsten är skapad med Laravel som grund.

### Länk
Publicering av Laravel-projektet har gjorts på Heroku. För att ansluta en databasserver från Heroku har vi installerat add-on JawsDB MySQL.<br>API finns tillgänglig på följande URL: https://medicareinventory.herokuapp.com/api/

### Användning Users :cat:
Nedan finns beskrivet hur man kan nå APIet Users på olika vis: 
| Metod        | Endpoint           | Beskrivning  |
| ------------- |-------------| -----|
| POST|/api/login| Loggar in användare. Kräver att email och password skickas med. |
| POST |/api/register| Registrerar ny användare. Kräver att name, email och password skickas med. |
| PUT |/api/update| Ändrar lösenord på inloggad användare. Kräver att nytt password samt inloggad användares token skickas med. |
| POST |/api/logout| Raderar inloggad användares token från databas. Kräver att inloggad användares token skickas med.|

### Användning Vitamins :pill:
Nedan finns beskrivet hur man kan nå APIet Vitamins på olika vis: 
| Metod        | Endpoint           | Beskrivning  |
| ------------- |-------------| -----|
| GET |/api/vitamins| Hämtar alla tillgängliga vitaminer. Kräver att inloggad användares token skickas med. |
| POST|/api/vitamins| Lagrar en ny vitamin. Kräver att alla fält samt inloggad användares token skickas med. |
| PUT|/api/vitamins/ID| Uppdaterar vitamin med angivet ID. Kräver att inloggad användares token skickas med.|
| DELETE |/api/vitamins/ID| Raderar vitamin med angivet ID. Kräver att inloggad användares token skickas med.|

Ett vitamin-objekt skickas som JSON med följande struktur: 

```

{
    "name": "C-vitamin",
    "productno": "123",
    "category": "Vitamin",
    "amount": 21,
    "price": 123
  }

  ```

Ett vitamin-objekt returneras som JSON med följande struktur: 

```

{
    "id": 1,
    "name": "C-vitamin",
    "productno": "123",
    "category": "Vitamin",
    "amount": 21,
    "price": 123,
    "created_at": "2022-10-23T12:53:06.000000Z",
    "updated_at": "2022-10-27T11:25:27.000000Z"
  }

  ```
  ### Användning Superfoods :herb:
Nedan finns beskrivet hur man kan nå APIet Vitamins på olika vis: 
| Metod        | Endpoint           | Beskrivning  |
| ------------- |-------------| -----|
| GET |/api/superfoods| Hämtar alla tillgängliga superfoods. Kräver att inloggad användares token skickas med. |
| POST|/api/superfoods| Lagrar en ny superfoods. Kräver att alla fält samt inloggad användares token skickas med. |
| PUT|/api/superfoods/ID| Uppdaterar superfoods med angivet ID. Kräver att inloggad användares token skickas med.|
| DELETE |/api/superfoods/ID| Raderar superfoods med angivet ID. Kräver att inloggad användares token skickas med.|

Ett superfoods-objekt skickas som JSON med följande struktur: 

```

{
    "name": "Spirulina",
    "productno": "549",
    "category": "Superfood",
    "amount": 23,
    "price": 149
  }

  ```

Ett superfoods-objekt returneras som JSON med följande struktur: 

```

 {
    "id": 1,
    "name": "Spirulina",
    "productno": "549",
    "category": "Superfood",
    "amount": 23,
    "price": 149,
    "created_at": "2022-10-24T07:13:15.000000Z",
    "updated_at": "2022-10-27T07:03:31.000000Z"
  }

  ```
  
