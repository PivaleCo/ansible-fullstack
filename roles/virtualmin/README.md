# Ansible Role: Virtualmin

Installs virtualmin and some post-install configuration on the server including:

- Creating SSH keyfile and certificate for the root user, to be used for secure webmin login
- Disables DAV, Mailman, AWStats and Webalizer plugins by default
- Changes webmin port to 12340