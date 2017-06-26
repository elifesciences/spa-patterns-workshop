require 'yaml'

CURRENT_DIR = File.dirname(File.expand_path(__FILE__))
CONFIG = "#{CURRENT_DIR}/vagrant.yaml"
CONFIG_DEFAULT = "#{CURRENT_DIR}/vagrant.yaml.dist"

if File.exist?(CONFIG)
    vagrant_config = YAML.load_file(CONFIG)
else
    vagrant_config = YAML.load_file(CONFIG_DEFAULT)
end

Vagrant.configure(2) do |config|

    config.vm.box = 'bento/ubuntu-16.04'

    config.vm.network 'forwarded_port', guest: 8080, host: vagrant_config['host_pattern_lab_http_port']
    config.vm.network 'forwarded_port', guest: 8081, host: vagrant_config['host_application_http_port']

    config.vm.network 'private_network', type: 'dhcp'

    if vagrant_config['nfs_share']
        config.vm.synced_folder '.', '/vagrant', type: 'nfs'
    else
        config.vm.synced_folder '.', '/vagrant'
    end

    config.vm.provision :salt do |salt|

        salt.minion_config = "salt/etc/minion"
        salt.run_highstate = true
        salt.verbose = true

    end

    config.vm.provider 'virtualbox' do |virtualbox|
        virtualbox.customize ['modifyvm', :id, '--memory', '4096']
        virtualbox.customize ['modifyvm', :id, '--cpus', '2']
        virtualbox.customize ['modifyvm', :id, '--cpuexecutioncap', '50']
    end

end
