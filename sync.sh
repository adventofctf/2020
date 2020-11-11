#!/bin/bash

echo "=== Starting challenges ==="
for i in `find . -name 'challenge.yml' 2>/dev/null | sort`; do
    dir=$(dirname $i | cut -d '/' -f 2)
    echo " [*] Starting $dir"
    cd $dir
    ctf challenge sync
    cd -
done
