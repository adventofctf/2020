function startup() {
    key = localStorage.getItem('key');

    if (key === null) {
        localStorage.setItem('key', 'eyJ1c2VyaWQiOjB9.1074');
    }
}

var _0x1fde=['charCodeAt'];
(function(_0x93ff3a,_0x1fded8){
    var _0x39b47b=function(_0x54f1d3){
        while(--_0x54f1d3){
            _0x93ff3a['push'](_0x93ff3a['shift']());
        }};
    _0x39b47b(++_0x1fded8);
}(_0x1fde,0x192));
var _0x39b4=function(_0x93ff3a,_0x1fded8){
    _0x93ff3a=_0x93ff3a-0x0;
    var _0x39b47b=_0x1fde[_0x93ff3a];
    return _0x39b47b;
};
function calculate(_0x54f1d3){
    var _0x58628b=_0x39b4,_0xc289d4=0x0;
    for(let _0x19ddf3 in text){
        _0xc289d4+=text[_0x58628b('0x0')](_0x19ddf3);
    }return _0xc289d4;
}

function check() {
    key = localStorage.getItem('key');
    hash = window.location.search.split('?')[1];

    if (key !== null && hash != 'token='+key) {
        parts = key.split('.');
        text = atob(parts[0]);
        checksum = parseInt(parts[1]);

        count = calculate(text);

        if (count == checksum) {
            setTimeout(function(){
                window.location="index.php?token=" + key;
            }, 5000);
        }
    }
}



startup();
check();
