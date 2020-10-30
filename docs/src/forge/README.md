# Laravel Forge

## Deployment script

Replace the default deployment script with this one:

__If the domain is different, then make sure to change that too__

```bash
cd /home/forge/itd.sde.dk
git pull origin master
$FORGE_COMPOSER install --no-interaction --prefer-dist --optimize-autoloader --no-dev

( flock -w 10 9 || exit 1
    echo 'Restarting FPM...'; sudo -S service $FORGE_PHP_FPM reload ) 9>/tmp/fpmlock

if [ -f artisan ]; then
    $FORGE_PHP artisan deploy:prod
else
    echo "Could not find artisan. Aborting.."
    exit 1
fi
```
