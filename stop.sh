#!/usr/bin/env bash
set -euo pipefail

docker-compose $(find . -name 'docker-compose*' 2>/dev/null | sed -e 's/^/-f /') down
