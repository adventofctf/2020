# Writup

In the cookies you will find a cookie called ~authenticated~. The value is ~eyJndWVzdCI6InRydWUiLCJhZG1pbiI6ImZhbHNlIn0=~.

When you decode the cookie it will read:

```javascript
{"guest":"true","admin":"false"}
```

Change it to 

```javascript
{"guest":"false","admin":"true"}
```

The put the BASE64 of it back into the cookie.
