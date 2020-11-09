#!/bin/bash

echo "=== Starting ctfd ==="
cd ctfd && docker-compose up -d > start.logs && cd ..

echo "=== Starting challenges ==="
for i in `find . -name 'challenge.yml' 2>/dev/null`; do
    dir=$(dirname $i | cut -d '/' -f 2)
    echo " [*] Starting $dir"
    cd $dir
    ctf challenge install
    ctf challenge sync
    docker-compose up -d
    cd -
done
