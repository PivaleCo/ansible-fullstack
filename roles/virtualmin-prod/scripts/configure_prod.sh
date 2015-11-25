#!/bin/bash

git clone git://github.com/reallifedesign/dotfiles /home/prod/.dotfiles
cd /home/prod/.dotfiles
rake -f Rakefile.auto install
exit 0
