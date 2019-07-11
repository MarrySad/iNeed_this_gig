#!/bin/bash

composer update

# позже напишем Rbac. от  сюда так же будем инициировать его.
#php yii migrate --migrationPath=@yii/rbac/migrations
#php yii rbac/init

php  yii migrate