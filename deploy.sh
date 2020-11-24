#!/usr/bin/env sh

set -e

cd ./docs

yarn build

cd src/.vuepress/dist

git init
git add -A
git commit -m 'deploy'

git push -f git@github.com:martin-juul/coursewire.git master:gh-pages

cd ../../../../
