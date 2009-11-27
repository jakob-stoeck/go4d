#bin/sh
mysqldump -u root -pholahola go4c > ./sql/dump.sql
git add .
git commit -m 'blabla'
git push origin master
