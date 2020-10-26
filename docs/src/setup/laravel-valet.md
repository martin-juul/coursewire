---
- sidebar: auto
---

# Laravel Valet

Now this is the holy grail, that binds everything together.

I recommend reading the official [documentation](https://laravel.com/docs/8.x/valet) - but i've included the install procedure here too.

Before we install valet, open up `~/.zshrc` in your editor of choice.

Add this line to it:

```bash
export PATH=$PATH:~/.composer/vendor/bin
```

This is required because otherwise we wouldn't be able to call global composer binaries.

Close your terminal/iTerm2 and open it again. Now we'll install valet:

```bash
composer global require laravel/valet
```

To verify everything went smooth, type valet in your terminal - and you should see something similar to this:

```
❯ valet
Laravel Valet 2.11.0
......
```

## Setup

Using the simple command:

```bash
valet install
```

### Trust

To make development easier, we'll add a special case valet in sudoers. To do that, enter:

```bash
valet trust
```

It will ask you for your password. It's safe to enter.

## Final steps

Now you're ready to develop on CourseWire.

Clone the project to your directory of choice _(i like using ~/dev/projects/coursewire)_

Enter the directory and run the following commands:

```bash
cd ~/dev/projects/coursewire
valet link
valet secure
docker-compose up -d
```

What you just did, was telling valet to set up a nginx host - listening on coursewire.test, and secure it with a self-signed certificate.

The docker-compose command started up all the infrastructure components.

So now, you're ready to work on the project. I hope you've learnt something.
