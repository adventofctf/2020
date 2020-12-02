#!/usr/bin/env bash
set -euo pipefail

for i in ../../../0*;
do
    c=$(echo $i|cut -d"/" -f4 | cut -d"-" -f1 | bc);
    c=$(printf "%02d" $c)
    flag=$(grep NOVI $i/challenge.yml | cut -d"-" -f 2 | sed -e 's/^[ \t]*//');
    md5=$(echo -n $flag | md5sum | cut -d" " -f 1)

    echo cp Level$c* $md5.png
done

