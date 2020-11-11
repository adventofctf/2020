#!/bin/bash

echo "=== Stopping ctfd ==="
cd CTFd && docker-compose down >> start.logs && cd ..

echo "=== Stopping challenges ==="
for i in `find . -name 'challenge.yml' 2>/dev/null | sort`; do
    dir=$(dirname $i | cut -d '/' -f 2)
    echo " [*] Starting $dir"
    cd $dir
    docker-compose down
    cd -
done
