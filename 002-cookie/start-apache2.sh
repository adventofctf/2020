#!/bin/bash
source /etc/apache2/envvars
exec apachectl -D FOREGROUND
