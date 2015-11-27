# Ansible + Virtualmin + Drupal Full Stack provisioning

## Summary

Created for ease of provisioning Full Stack Drupal applications.

"Full Stack" here means everything required to have a unified production, staging
and development enviroments set up for a Drupal 7 project.

## Preparation

The Full Stack install process requires that some secure passwords are used.
Generate and prepare some secure passwords for the following:

* Root passwords:
    * root password for prod server
    * root password for dev server
* Linux user passwords:
    * password for prod user
    * password for stage user
    * password for dev user
    
__Pro-tip: Use an encrypted password manager such as [Keepass](http://keepass.info/)__

## Install instructions

### Install ansible from manager machine

```
sudo apt-add-repository -y ppa:ansible/ansible
sudo apt-get update
sudo apt-get install -y ansible
```

### Ensure the remote hosts have your local ssh key

```
ssh-copy-id root@PROD_HOST
ssh-copy-id root@DEV_HOST
```

where PROD_HOST is the hostname or IP address of the Production server
and DEV_HOST is the hostname or IP address of the Development server (which has the staging and dev versions of the website)


### Copy the `example.hosts` file and edit `hosts` file point at the correct remote servers

```
cp example.hosts hosts
nano hosts
```

### Run the setup playbook

```
ansible-playbook setup.yml
```

Check for errors in the PLAY RECAP

### Run the virtualmin post install wizard

```
https://PROD_HOST:12340
https://DEV_HOST:12340 (if set up as a separate host from prod in hosts inventory file)
```

* Set whatever parameters in the wizard you deem appropriate.
* Set the MySQL root password to the same as the server's root password.
* It's recommended to set "Password storage mode" to "Only store hashed passwords"

## TODOS:
* Update 123456789 passwords with a way to dynamically generate and store a local copy for reference
* Stored hashed passwords at top level in a project level vars file (with example and gigignore for the referenced file)
* Add docs in README.md on how to generate hashed passwords for updating that vars file
* Generate SSH keys for each enviroment and create playbook to pull copies of the keys locally so they can by copied to git configuration
* Add contrib roles for redis, git, imagemagick to all hosts (or add to fullstack role if cleaner)
* Create a project var to optionally install redis- update docs
* Add tig, rake, curl etc to all hosts (in new fullstack role)
* Setup up optional nginx to fullstack role and configure as needed (via docker?)
* Set up optional installation of PHP 5.6 to fullstack role via PPA (via docker?)
* Mailcatcher on stage and dev environments
* In project vars set location of website git repo
* Set up drush scripts in ~/.drush/scripts directories for push/pull between sites
* Set up virtualmin backup configuration (new host) and provide backup options in project vars
* Add heal script to setup playbook
* Setup ufw for all hosts
* Add apt-get update/upgrade playbook
