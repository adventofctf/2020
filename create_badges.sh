#!/usr/bin/env bash
set -euo pipefail

for i in 0*;
do
    c=$(echo $i|cut -d"-" -f1 | bc);
    flag=$(grep NOVI $i/challenge.yml | cut -d"-" -f 2 | sed -e 's/^[ \t]*//');
    md5=$(echo -n $flag | md5sum | cut -d" " -f 1)
    points=$(echo "$c*100" | bc)
    echo "\"$md5\" => [\"solve\" => $c, \"points\"=>$points],";


        # "3f12301d8715a1371d2d776d25ea6ab6" => [
        #     "solve" => 1,
        #     "points" => 100
        # ],
done
