# Ansible + Virtualmin + Drupal Full Stack provisioning

## Summary

Created for ease of provisioning Full Stack Drupal applications.

"Full Stack" here means everything required to have a unified production, staging
and development enviroments set up for a Drupal 7 project.

### Install instructions

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

### Alter the install options file

* Edit the group_vars/all/vars.yml file as required.

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

### Copy the passwords and SSH keys to somewhere safe

* The passwords and SSH keys for the various user accounts (including root) have now been fetched to the fetched directory.
* For the SSH keys, make sure these are added to your git repositories.
* __Pro-tip: Use an encrypted password manager such as [Keepass](http://keepass.info/)__

## TODOS:
* Setup up optional nginx to fullstack role and configure as needed (via docker?)
* Apache Solr provisioning
* Set up optional installation of PHP 5.6 to fullstack role via PPA (via docker?)
* Mailcatcher on stage and dev environments
* In project vars set location of website git repo
* Set up drush scripts in ~/.drush/scripts directories for push/pull between sites
* Set up virtualmin backup configuration (new host) and provide backup options in project vars
* Add heal script to setup playbook
* Setup ufw for all hosts
* Add apt-get update/upgrade playbook
