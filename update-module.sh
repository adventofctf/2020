#!/usr/bin/env bash
set -euo pipefail

if [[ -d $1 ]]
then
    echo "Going to update " $1
    scp -r $1 root@adventofctf.com:advent-of-ctf/
fi  
