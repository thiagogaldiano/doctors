#API
<b>Create</b><br/><br/>
POST /api/v1/register?name=APIUSER&amp; email=api@api.com&amp; password=12345678 HTTP/1.1<br/>
Host: localhost:8000<br/>
cache-control: no-cache<br/>
Postman-Token: d657184a-b0f3-4e17-85b1-d08ded0c4554<br/>
<br/>

<b>Login</b><br/><br/>
POST /api/v1/login?email=admin@admin.com&amp; password=12345678 HTTP/1.1<br/>
Host: localhost:8000<br/>
cache-control: no-cache<br/>
Postman-Token: 17c1026e-7b0b-4b70-9d20-64a6947a7837<br/>

<b>Doctors</b><br/><br/>
GET /api/v1/doctors HTTP/1.1
Host: localhost:8000
Authorization: Bearer WHkzbFVxU2gwV3A1bjJkdE9JQzE4ZVlyRjE1d1Vsd3V0UlVIRXlxeVI0aWxORWt1bktUemt4NWhCODJl5e8f16eeb7948
cache-control: no-cache
Postman-Token: dc6e8826-ae53-4cbd-af37-418566e8bd26
