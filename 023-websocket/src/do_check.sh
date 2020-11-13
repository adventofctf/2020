#!/bin/bash
set -euo pipefail

basecmd=do_check.sh         # base command name
cmd=${0##*/}            # get command name ( basename "$0" )
subcmd=                 # no sub command yet
command=
# Now pick out the sub command from the command name,
# or from the first argument.  Then fail if unsuccessful.

# called as "process action"
# rather than as "process-action"
subcmd=$1
shift   # remove sub command from argument list

if [ -z "$subcmd" ]; then
    subcmd="echo"
fi

if [ "$#" -ge 1 ]; then
    command=$(echo $1 | base64 -d)
fi

case $subcmd in
    run)
        if [ -z "$command" ]; then
            echo "No command specified";
        else
            if [[ $command == *"rm"* ]] || [[ $command == *"nc"* ]] || [[ $command == *"sh"* ]] ; then
                echo "That is how you end up and the naughty list!"
            else
                result=$(bash -c "eval '$command'")
                echo $result
            fi
        fi
        ;;
    help)
        echo 'do_check.sh [subcommand] encoded_command'
        echo 'subcommands are:'
        echo ' help - this help'
        echo ' run - run the command'
        ;;
    *)
        if [ -z "$command" ]; then
            echo "No command specified";
        else
            echo "I would run '$command'";
        fi
        exit 1
esac

