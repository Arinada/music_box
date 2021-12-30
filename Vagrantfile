
Vagrant.configure("2") do |config|
  config.vm.box = "generic/ubuntu2010"
  config.vm.network "private_network", ip: "192.168.56.2"
  config.ssh.username = "vagrant"
  config.ssh.password = "vagrant"
  config.vm.provision :shell, path: "bootstrap.sh"
  config.vm.synced_folder ".", "/home/vagrant", type: "virtualbox" 
end
