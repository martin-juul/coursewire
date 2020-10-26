---
- sidebar: auto
---

# Introduction

First of all, you must have your machine setup for development.

If you're not on macOS, skip everything below and use [Laravel Homestead](https://laravel.com/docs/8.x/homestead) - it's not as nice, but it's your only option. Sorry about that, but there's a reason we use macs.

## Local development environment

### Homebrew
If you haven't installed [homebrew](https://brew.sh/) then let's do it right now.

```bash
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install.sh)"
```

Once that's done, we'll install a few essential dependencies. This is done in multiple steps, as homebrew hard fails - should something go wrong.

```bash
brew install coreutils curl wget jq redis
```
_The redis server will not start at boot, but you'll find the redis-cli handy_

Then we'll install php & composer

```bash
brew install php composer
```

#### PHP Extensions

We need a few php extensions installed. To do that, we'll use `pecl`.

First up, igbinary - a dependency of the redis extension:

```bash
pecl install igbinary
```

Now the redis extension

```bash
pecl install redis
```

You could stop here, but i'd really recommend installing the xdebug extension, it's just as easy, and will help you **A LOT** _and it's kinda required for codecoverage in phpunit_

```bash
pecl install xdebug
```

### nvm (Node Version Manager)
Now we'll install [nvm](https://github.com/nvm-sh/nvm/blob/master/README.md)

Once that's done, and you get output similar to this:

```
$ nvm

Node Version Manager (v0.36.0)

Note: <version> refers to any version-like string nvm understands. This includes:
  - full or partial version numbers, starting with an optional "v" (0.10, v0.1.2, v1)
  - default (built-in) aliases: node, stable, unstable, iojs, system
  - custom aliases you define with `nvm alias foo`

 Any options that produce colorized output should respect the `--no-colors` option.

Usage:
  nvm --help                                  Show this message
  nvm --version                               Print out the installed version of nvm
  nvm install [-s] [<version>]                Download and install a <version>, [-s] from source. Uses .nvmrc if available
    --reinstall-packages-from=<version>       When installing, reinstall packages installed in <node|iojs|node version number>
    --lts                                     When installing, only select from LTS (long-term support) versions
    --lts=<LTS name>                          When installing, only select from versions for a specific LTS line
    --skip-default-packages                   When installing, skip the default-packages file if it exists
    --latest-npm                              After installing, attempt to upgrade to the latest working npm on the given node version
    --no-progress                             Disable the progress bar on any downloads
    --alias=<name>                            After installing, set the alias specified to the version specified. (same as: nvm alias <name> <version>)
    --default
....
```

We'll install the latest LTS release of node

```bash
nvm install --lts --with-latest-npm
```

#### Yarn

This project does not use `npm` but instead uses `yarn` for javascript package management. So let's get it installed:

```bash
npm i -g yarn
```

Easy, right? :P

### Docker

You need Docker Desktop for mac. [Follow their install instructions](https://docs.docker.com/docker-for-mac/install/)

Once you've got it installed, go to the laravel valet section of this guide.
