#!/bin/bash

echo "=== Starting ctfd ==="
cd CTFd && docker-compose up -d > start.logs && cd ..

echo "=== Starting challenges ==="
for i in `find . -name 'challenge.yml' 2>/dev/null | sort`; do
    dir=$(dirname $i | cut -d '/' -f 2)
    echo " [*] Starting $dir"
    cd $dir
    docker-compose up -d
    cd -
done
