SHELL := /bin/bash
CHDIR_SHELL := $(SHELL)

##### v1.1.0

##### VARIABLES
NAME = fsps
PORT = 8000
SOURCE = live

##### SETTINGS
VENV = env/bin/activate
PTYHON = env/bin/python
PIP = . $(VENV); env/bin/pip
FAB = env/bin/fab
MANAGE = @DJANGO_SETTINGS_MODULE=settings_local $(PTYHON) src/local
PROJECT_DIR = ./src

# CORE COMMANDS
run:
	$(MANAGE) runserver 0.0.0.0:$(PORT)

init:
	##### setup files
	mkdir -p tmp
	cp -f requirements_local.txt-example requirements_local.txt
	cp -f $(PROJECT_DIR)/settings_local.py-example $(PROJECT_DIR)/settings_local.py
	##### setup virtualenv
	test -d $(VENV) || virtualenv env --prompt="(`basename \`pwd\``)"
	$(PIP) install -r requirements_local.txt --allow-all-external --allow-unverified ftputil
	##### setup database
	psql -U postgres -c 'CREATE DATABASE $(NAME)_local;'
	$(MANAGE) createcachetable dbcache
	$(MANAGE) syncdb --all
	$(MANAGE) migrate --fake
	##### done

update:
	##### update git
	git pull origin $(BRANCH)
	##### pip install requirements
ifdef UPGRADE
	$(PIP) install -r requirements_local.txt --upgrade
else
	$(PIP) install -r requirements_local.txt
endif
	$(MANAGE) syncdb
	$(MANAGE) migrate
	##### done

css:
	compass watch .

data:
	##### cleanup
	rm -f ./tmp/*.sql
	rm -f ./tmp/*.sql.gz

	##### download database
	$(FAB) $(SOURCE) pg.download
	mv -f ./tmp/*.sql.gz ./tmp/backup.sql.gz
	gzip -d -f ./tmp/*.sql.gz

	#### clean database
	psql -U postgres -c 'DROP DATABASE $(NAME)_local;'
	psql -U postgres -c 'CREATE DATABASE $(NAME)_local;'

	#### load data
	$(MANAGE) dbshell < ./tmp/backup.sql
	$(MANAGE) createcachetable dbcache

	##### cleanup
	rm -f ./tmp/*.sql
	rm -f ./tmp/*.sql.gz
	#### done

# ADDITIONAL COMMANDS
makemessages:
	$(MANAGE) makemessages_unique --all --ignore=env/* --ignore=tmp/*

compilemessages:
	$(MANAGE) compilemessages
