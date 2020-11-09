#!/bin/bash

echo "=== Starting challenges ==="
for i in `find . -name 'challenge.yml' 2>/dev/null`; do
    dir=$(dirname $i | cut -d '/' -f 2)
    echo " [*] Starting $dir"
    cd $dir
    ctf challenge install
    cd -
done
