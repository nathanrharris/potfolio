# SMD GNUMakefile
ifneq (,)
This makefile requires GNU Make.
endif

.PHONY: hello push-data push-assets 

TIMESTAMP := $(shell /bin/date "+%Y%m%d-%H%M%S")

default: hello

hello: 
	@echo "Welcome to Nathan's Makefile"

fire-it-up:
	colima stop
	colima start
	docker-compose down
	docker-compose up -d

push-data:
	echo "Data timestamp:  $(TIMESTAMP)"
	echo
	docker exec -i  db /usr/bin/mysqldump -uroot -pp@55w0rd  wordpress | gzip > docker-data/data.local.${TIMESTAMP}.sql.gz
	echo
	copy docker-data/data.local.${TIMESTAMP}.sql.gz docker-data/data.latest.sql.gz
	echo
	scp docker-data/data.local.${TIMESTAMP}.sql.gz portfolio:portfolio/docker-data/
	echo
	ssh -t portfolio 'docker exec -i  db /usr/bin/mysqldump -uroot -pp@55w0rd  wordpress | gzip > /home/ubuntu/portfolio/docker-data/data.prod.${TIMESTAMP}.sql.gz'
	echo
	ssh -t portfolio 'cp /home/ubuntu/portfolio/docker-data/data.local.${TIMESTAMP}.sql.gz /home/ubuntu/portfolio/docker-data/data.latest.sql.gz'
	echo
	ssh -t portfolio 'docker exec -i db /usr/bin/mysql -uwordpress -pp@55w0rd wordpress -e "DROP DATABASE IF EXISTS wordpress; CREATE DATABASE wordpress;"'
	echo
	ssh -t portfolio 'zcat /home/ubuntu/portfolio/docker-data/data.local.${TIMESTAMP}.sql.gz | docker exec -i  db /usr/bin/mysql -uroot -pp@55w0rd  wordpress'
	echo

push-assets:
	rsync -avzr --progress ./wordpress/wp-content/uploads/* portfolio:portfolio/wordpress/wp-content/uploads/
