
#!/bin/bash
# 
# File:   git_deploy.sh
# Author: Elvis Fernández
#
# Created on 29/08/2016
#
# Variables:
#
# $1 = Servidor Git
# $2 = Directorio Local
# $3 = Comando git
#

servidor_git="$1"
directorio_local="$2"
nombre_proyecto="$3"

[ $# -eq 0 ] && { printf "Usage: $0 Git-Server Local-Dir Project-Name\n"; exit 1; }

proyecto_git="$directorio_local/$nombre_proyecto"
#printf "Proyecto GIT: %s " $proyecto_git
if [ -d "$proyecto_git" ]
then
  cd $proyecto_git && git pull
else
  cd $directorio_local && git clone $servidor_git  
fi