# Writeup

After the page reloads there will be a value in the local storage.

Base64 decode the value and it will be a json stucture with an userid. It is followed by a checksum.

The code for the checksum is obfuscated, however you can just call it from the console.


```javascript
text='{"userid":1}';
btoa(text);
calculate(text);
=> 1075
```

Update the local storage and reload the page.

```text
eyJ1c2VyaWQiOjF9.1075
```
