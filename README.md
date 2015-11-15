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

### Run the playbook

```
ansible-playbook playbook.yml
```

Check for errors in the PLAY RECAP

### Run the virtualmin post install wizard

```
https://PROD_HOST:12340
https://DEV_HOST:12340
```

* Set whatever parameters in the wizard you deem appropriate.
* Set the MySQL root password to the same as the server's root password.