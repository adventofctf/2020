# Write-up

```
❯ echo -n "user" | sha1sum
12dea96fec20593566ab75692c9949596833adc9  -
❯ echo -n "admin" | sha1sum
d033e22ae348aeb5660fc2140aec35850c4da997  -
```

To solve, set the cookie to the Base64 of:

```
{"role":"d033e22ae348aeb5660fc2140aec35850c4da997","page":"flag"}
```
