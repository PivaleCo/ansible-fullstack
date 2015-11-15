### Install ansible from manager machine

sudo apt-add-repository -y ppa:ansible/ansible
sudo apt-get update
sudo apt-get install -y ansible

### Ensure the remote hosts have your local ssh key

ssh-copy-id root@HOST

### Update the hosts inventory file to point at the correct remote servers

nano hosts

### Run the playbook

ansible-playbook -i hosts -u root playbook.yml

