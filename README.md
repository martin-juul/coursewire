# CourseWire

## About

CourseWire is a content management system, designed for informing the public about vocational education paths at Syddansk Erhversskole.

## Documentation

Go to the `/docs` folder

Serve it with `yarn dev`

### API

Use [Insomnia](https://insomnia.rest) to open the [insomnia.json](/insomnia.json) file.

It's kinda like postman, but better (in my holy opinion).

## Digitalocean

Everything must be created in the `ams3` zone!

### VPC

**Name** coursewire-ams3

**Floating IP** 178.128.142.240

### Droplet

Read everything below, before creating the droplet - or you'll probably screw it up.

**Standard**

+ 4vcpu
+ 8gb RAM
+ 160GB SSD

The reasoning for the size is that the iron will be running:

+ App
+ Redis server
+ Queue workers

In forge it will be called `8GB RAM - 4 CPU Cores - 160GB SSD`

Set php version to 7.4
Database to None

Enable weekly backups.

## Infrastructure

+ Postgres 12
+ Redis 6
+ SMTP
+ Digitalocean Spaces

## Monitoring

+ [Sentry](https://sentry.io/)

## Configuration

### App

| Key       | Development/Staging     | Production         |
|:----------|:------------------------|:-------------------|
| APP_ENV   | Local                   | Production         |
| APP_DEBUG | `true`                  | `false`            |
| APP_URL   | https://coursewire.test | https://itd.sde.dk |
| LOG_LEVEL | debug                   | error              |

### Database

This app is __ONLY__ compatible with PostgreSQL.

The user should have rights to

+ CREATE
+ DELETE
+ EXECUTE
+ INSERT
+ REFERENCES
+ SELECT
+ TRIGGER
+ TRUNCATE
+ UPDATE
+ USAGE

| Key           | Value                                                         |
|:--------------|:--------------------------------------------------------------|
| DB_CONNECTION | pgsql                                                         |
| DB_HOST       | hostname or IP                                                |
| DB_PORT       | 5432 is standard, but not on digitalocean/connection pooling. |
| DB_DATABASE   | Database name                                                 |
| DB_USERNAME   | Database user                                                 |
| DB_PASSWORD   | Password for the user                                         |

### Email

This is used for the dashboard. Password reset, notifications, etc.

| Key               | Value    |
|:------------------|:---------|
| MAIL_MAILER       | smtp     |
| MAIL_HOST         | hostname |
| MAIL_PORT         |          |
| MAIL_USERNAME     |          |
| MAIL_PASSWORD     |          |
| MAIL_ENCRYPTION   |          |
| MAIL_FROM_ADDRESS |          |
| MAIL_FROM_NAME    |          |

## License

CourseWire is a proprietary piece of software. The file [LICENSE](/LICENSE) contains information about the terms for using it.
