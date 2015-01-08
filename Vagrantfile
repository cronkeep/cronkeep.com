# vi: set ft=ruby :
#
# Copyright 2014 Bogdan Ghervan
# 
# Licensed under the Apache License, Version 2.0 (the "License");
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
#
#     http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software
# distributed under the License is distributed on an "AS IS" BASIS,
# WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
# See the License for the specific language governing permissions and
# limitations under the License.

Vagrant.configure("2") do |config|

  config.vm.define "ubuntu", primary: true do |ubuntu|
    ubuntu.vm.box = "ubuntu/trusty64"
    ubuntu.vm.network "private_network", ip: "192.168.40.10"
    ubuntu.vm.synced_folder "./", "/var/www/cronkeep.com", create: true, group: "www-data", owner: "www-data"
    ubuntu.vm.provision "shell", path: "provision/setup.sh"
    ubuntu.vm.provider "virtualbox" do |v|
      v.name = "CronKeep.com"
      v.memory = 512
    end
  end

end
