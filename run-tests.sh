#!/bin/bash

cd project

vendor/bin/codecept build

php artisan -q migrate:fresh

php artisan -q db:seed

mysqldump -h127.0.0.1 -u root --password=root123 test > tests_codeception/_data/dump.sql

echo -e "\nUNIT TESTS:\n\n"
php artisan test

echo -e "\n\n\nACCEPTANCE TESTS:\n\n"
vendor/bin/codecept run

