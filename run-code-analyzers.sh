#!/bin/bash

PINK='\033[1;35m'
END='\033[0m'
cd project

echo -e "${PINK}\nRUNNING: cs-fixer:\n${END}"
vendor/bin/php-cs-fixer fix --diff --dry-run .

echo -e "${PINK}\nRUNNING: phpstan:\n${END}"
vendor/bin/phpstan analyze -c phpstan.neon

echo -e "${PINK}\nRUNNING: phpcpd:\n${END}"
vendor/bin/phpcpd . --fuzzy --min-lines 1 --min-tokens 20 --exclude vendor --exclude tests* --exclude config --exclude storage


