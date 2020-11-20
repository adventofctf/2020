#!/bin/bash

echo "=== Building ctfd ==="
cd CTFd && docker-compose build && cd ..

echo "=== Building challenges ==="
for i in `find . -name 'challenge.yml' 2>/dev/null | sort`; do
    dir=$(dirname $i | cut -d '/' -f 2)
    echo " [*] Building $dir"
    cd $dir
    docker-compose build
    cd -
done
