# iTop-VM-Cost
Display a VM cost based on the VM configuration (CPU, RAM, Disk)

## Goal

The idea is to have (by organisation) a configuration panel (like the IP configuration panel from the great TeemIP extension)

In this panel, each organiztion could have a value for :

* The VM itself (a fixed base value)
* Each CPU
* The value of the gigabyte of RAM
* The value of the gygabyte of disk

These are the base value. In an idela world, it should also be possible to set sone 'software' value (cost of the OS, on the backup if activatied…) But let's start light 😉

Then, after those base values are given, a 'cost field' is computed for each Virtual Machine.