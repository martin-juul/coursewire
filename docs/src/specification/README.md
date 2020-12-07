# CourseWire Specification

[TOC levels=1-3]: # "#### Table of Contents"
#### Table of Contents
- [Copyright Notice](#copyright-notice)
- [Revision](#revision)
- [Abstract](#abstract)
- [Terminology](#terminology)
- [Entity Diagram](#entity-diagram)
- [API](#api)
  - [Courses](#courses)
    - [Show Course](#show-course)
  - [Educations](#educations)
    - [Show Education](#show-education)
    - [Show Education Version](#show-education-version)
  - [Student Types](#student-types)
  - [Semesters](#semesters)
- [User interface](#user-interface)
  - [Design System](#design-system)
    - [Palette](#palette)
    - [Fonts](#fonts)
  - [Common Elements](#common-elements)
    - [Header](#header)
    - [Footer](#footer)
  - [Homepage](#homepage)
  - [Course Overview](#course-overview)
    - [Course Display](#course-display)
  - [Educations Overview](#educations-overview)
    - [Educations Display](#educations-display)
  - [Administration Dashboard](#administration-dashboard)
    - [Authentication](#authentication)
  - [Security Measures](#security-measures)
    - [Cross Site Request Forgery (CSRF)](#cross-site-request-forgery-csrf)
    - [Cross Origin Resource Sharing (CORS)](#cross-origin-resource-sharing-cors)
    - [Password Encryption](#password-encryption)
    - [TLS](#tls)
    - [Output escaping](#output-escaping)
- [Test Suite](#test-suite)
  - [Feature Testing](#feature-testing)
  - [Unit Testing](#unit-testing)
  - [Browser Testing](#browser-testing)
- [Demo](#demo)

## Copyright Notice

Copyright (C) Martin Juul (2020).  All Rights Reserved.

## Revision

| Version | Date       | Author      |
|:--------|:-----------|:------------|
| 1.0     | 16/11-2020 | Martin Juul |

## Abstract

This document describes the application _CourseWire_, a web application
meant as an aid in advertising educations. Initially built to serve this purpose
at _Syddansk Erhversskole Odense-Vejle_.

The public facing user interfaces are a Single Page Application (SPA),
which is the "public" part of the app. The other user interface is the
administration panel.

All subjects in the administration panel (courses, educations, etc.) is
available at the included HTTP API.

## Terminology

_The key words "MUST", "MUST NOT", "REQUIRED", "SHALL", "SHALL
NOT", "SHOULD", "SHOULD NOT", "RECOMMENDED",  "MAY", and
"OPTIONAL" in this document are to be interpreted as described in
[rfc2119](https://tools.ietf.org/html/rfc2119)_

The word _user_ describes either an unknown entity or a user with administrative
privileges, unless other is specified.

## Entity Diagram

<entity-diagram />

### Class diagram

```mermaid
classDiagram
  CourseSemester <|-- Course
  CourseSemester <|-- Semester
  Education <|-- EducationType
  Semester <|-- Education
  Semester <|-- StudentType
  StudentType <|-- EducationStudentType
  class Course{
    +String id
    +String course_no
    +String title
    +String slug
    +String overview
    +String about
    +TimestampTz created_at
    +TimestampTz updated_at
  }
  class CourseSemester{
    +String id
    +String course_id
    +String semester_id
    +Int duration
    +TimestampTz created_at
    +TimestampTz updated_at
  }
  class Semester{
    +String id
    +String education_id
    +String student_type_id
    +Int semester
    +TimestampTz created_at
    +TimestampTz updated_at
  }
  class Education{
    +String id
    +String slug
    +String version
    +String education_type_id
    +TimestampTz created_at
    +TimestampTz updated_at
  }
  class EducationType{
    +String id
    +String title
    +String slug
    +String short_name
    +String image_path
    +String about
    +TimestampTz created_at
    +TimestampTz updated_at
  }
  class StudentType{
    +String id
    +String title
    +String slug
    +String overview
    +String description
    +TimestampTz created_at
    +TimestampTz updated_at
  }
  class EducationStudentType{
    +String id
    +String education_id
    +String student_type_id
    +TimestampTz created_at
    +TimestampTz updated_at
  }
```

## API

The HTTP API is available at `yourdomain.tld/api` exchanging messages encoded with JSON.

### Courses

Endpoint `yourdomain.tld/api/courses`

```json
{
  "data": [
    {
      "title": "string",
      "course_no": "string",
      "overview": "string|null",
      "about": "string|null",
      "duration": "string|null"
    }
  ]
}
```

#### Show Course

Endpoint `yourdomain.tld/api/courses/:slug`

```json
{
  "data": {
    "title": "string",
    "course_no": "string",
    "overview": "string|null",
    "about": "string|null",
    "duration": "string|null"
  }
}
```

### Educations

Endpoint `yourdomain.tld/api/educations`

```json
{
  "data": [
    {
        "title": "string",
        "short_name": "string",
        "slug": "string",
        "about": "string|null",
        "blur_hash": "string|null",
        "image": "string|null",
        "created": "datetimetz",
        "updated": "datetimetz"
    }
  ]
}
```

#### Show Education

Endpoint `yourdomain.tld/api/educations/type/:slug`

```json
{
  "data": {
    "title": "string",
    "short_name": "string",
    "slug": "string",
    "about": "string|null",
    "blur_hash": "string|null",
    "image": "string|null",
    "created": "datetimetz",
    "updated": "datetimetz"
  }
}
```

#### Show Education Version

Endpoint `yourdomain.tld/api/educations/:educationTypeSlug`

```json
{
  "data": {
    "parent": "string|omitted",
    "slug": "string",
    "version": "string"
  }
}
```

#### Show Education Versions

**Query Param**

| Parameter | Value    | Example |
|:----------|:---------|:--------|
| version   | `string` | `9.1`   |

```json
{
    "data": [
      {
        "parent": "string|omitted",
        "slug": "string",
        "version": "string"
      }
    ]
}
```

### Student Types

Endpoint `yourdomain.tld/api/student-types`

```json
{
  "data": [
    {
        "title": "string",
        "slug": "string",
        "overview": "string|null",
        "description": "string|null"
    }
  ]
}
```

### Semesters

Endpoint `yourdomain.tld/api/semesters/{educationSlug}/{studentTypeSlug}`

```json
{
  "data": {
    "semester": "int",
    "courses": [
      {
        "title": "string",
        "course_no": "string",
        "overview": "string|null",
        "about": "string|null",
        "duration": "int"
      }
    ]
  }
}
```

## User interface

The following sections describe the user interfaces available to the user.

### Design System

#### Palette

| Name       | SASS Variable | Hex     |
|:-----------|:--------------|:--------|
| Background | $white        | #ffffff |
| Primary    | $blue         | #006c80 |
| Secondary  | $cyan         | #4dd0e1 |
| Accent     | $orange       | #f6831e |
| Error      | $red          | #f6831e |
| Warning    | $yellow       | #ffeb3b |
| Info       | $blue-light   | #64b5f6 |
| Success    | $green        | #4caf50 |

#### Fonts

Serif font is the [Roboto](https://fonts.google.com/specimen/Roboto) by Google.

The icons chosen is the [Material Design Icons](https://material.io/resources/icons/?style=baseline).

### Common Elements

These elements is presented on all public pages.

#### Header

    +----------+--------+--------+---------------+--------------------------------------------------------+
    |          |        |        |               |                                                        |
    |  LOGO    |  Hjem  |   Fag  | Uddannelserne |                                                        |
    |          |        |        |               |                                                        |
    +----------+--------+--------+---------------+--------------------------------------------------------+

#### Footer

    +-------------------------------------------------------------------------------------+
    |       XX  XX  XX  XX                                                                |
    |       XX  XX  XX  XX                                        Copyright Notice        |
    +-------------------------------------------------------------------------------------+

Where each block of X's represents external links to branding pages (facebook, youtube, linkedin, website).

### Homepage

The homepage features a _stepper_ where a user can select an education, student type and optionally an education version - to see the semesters for the education.

```mermaid
graph TD
    A[Start] --> B(Education)
    B --> C(IT-Suporter)
    B --> D(Datatekniker / Programmernig)
    B --> E(Datatekniker / Infrastruktur)
    C --> F(Student type)
    D --> F
    E --> F
    F --> G(EUD)
    F --> H(EUX)
    F --> I(EUV 1)
    F --> J(EUV 2)
    F --> L(EUV 3)
    G --> M(Education Version)
    H --> M
    I --> M
    J --> M
    L --> M
```

### Course Overview

A page with a table where a user can browse courses

| Course No | Title          |
|:----------|:---------------|
| `no`      | `course title` |

#### Course Display

```   
+----------------------------------+
|                                  |
|                                  |
|     title            course_no   |
|                                  |
|                                  |
|     overview                     |
|                                  |
|                                  |
|                                  |
|     description                  |
|                                  |
|                                  |
+----------------------------------+
```


__Structured Data__

To ensure the site is indexed well. The sdt definition for courses is added. An example is shown below:

```json
{
  "@context": "https://schema.org",
  "@type": "Course",
  "name": "Computerteknologi",
  "description": "Kendskab til benyttelse af og forståelse for hvad brugbar dokumentation er\rpå arbejdspladsen, vil give eleven en fordel i faget.",
  "courseCode": "6225",
  "image": "https://coursewire.test/asset/hero/Q29tcHV0ZXJ0ZWtub2xvZ2k=",
  "teaches" :"I dette fag arbejder eleverne med opsætning af et system (server med raid\ropsætning samt server-software.) Under arbejdet med opsætning fører eleverne\rdokumentation for arbejdet (UML orienteret.) Eleverne skal designe\rog benytte: User Story, arbejdslog, fejlformular, konfigurationsdokumentation,\rog Accept test. Faget omhandler i dette henseende træning i forståelse\rog benyttelse af brugbar dokumentation i arbejdssituationen.",
  "provider": {
    "@type": "EducationalOrganization",
    "name": "Syddansk Erhvervsskole",
    "alternateName": "SDE",
    "url":"https://www.sde.dk",
    "email":"sde@sde.dk",
    "telephone":"+4570109900",
    "address": {
      "@type":"PostalAddress",
      "streetAddress":"Munkebjergvej 130",
      "addressLocality":"Odense",
      "postalCode":"5230",
      "addressCountry":"DK"
    }
  }
}
```

Here's a sample from what it might look like on Google Search

![Search Docs Data Types Courses 01](https://developers.google.com/search/docs/data-types/images/courses01.png)

### Educations Overview

#### Educations Display

__Structured Data__

```json
{
  "@context": "https://schema.org",
  "@type": "WorkBasedProgram",
  "name": "IT-Supporter",
  "description": "Sørg for den bedste IT-faglige hjælp til maskiner – og menneskerDer findes stort set ikke virksomheder, der ikke er afhængige af it på den ene eller anden måde. Og det betyder samtidig, at stort set alle virksomheder har behov for nogle, der kan sikre, at systemerne virker optimalt – og en, der kan hjælpe, hvis de ikke gør.Som it-supporter skal du ikke alene kunne finde og fikse it-relaterede problemer - du skal også kunne forklare og få folk til at forstå problemet. Eller i det mindste for dem til ikke at lave den samme fejl igen – eller i så fald kunne løse problemet selv.På uddannelsen opnår du en bred viden om it, der gør dig i stand til at finde fejl og se sammenhænge mellem forskellige systemer. Du bliver også klædt på til at foretage rutinetjek i it-afdelingen.Desuden lærer du at opbygge og vedligeholde samt optimere netværksløsninger.Som uddannet it-supporter vil dine primære opgaver være at:drifte og vedligeholdelse af it-systemetfinde og fikse it-relaterede fejl og brugerfejlinstallere og konfigurere computere, programmer og øvrige it-installationervejlede brugerne og sikre hjælp-til-selvhjælptilslutte monitorer, printere, routere, servere mv.",
  "image": "https://coursewire.test/asset/hero/SVQtU3VwcG9ydGVy",
  "programType": "apprenticeship",
  "occupationalCategory": "3512",
  "timeToComplete": {
    "@type": "Duration",
    "timeToComplete": "P2Y6M"
  },
  "dayOfWeek": "Monday,Tuesday,Wednesday,Thursday,Friday",
  "programPrerequisites": {
    "@type": "EducationalOccupationalCredential",
    "credentialCategory": "HighSchool"
  },
  "occupationalCredentialAwarded": {
    "@type": "EducationalOccupationalCredential",
    "credentialCategory": "degree"
  },
  "trainingSalary": {
    "@type": "MonetaryAmountDistribution",
    "currency": "DKK",
    "median": "72.5"
  },
  "salaryUponCompletion": {
    "@type": "MonetaryAmountDistribution",
    "currency": "DKK",
    "median": "176"
  },
  "provider": {
    "@type": "EducationalOrganization",
    "name": "Syddansk Erhvervsskole",
    "alternateName": "SDE",
    "url": "https://www.sde.dk",
    "email": "sde@sde.dk",
    "telephone": "+4570109900",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "Munkebjergvej 130",
      "addressLocality": "Odense",
      "postalCode": "5230",
      "addressCountry": "DK"
    }
  }
}
```

![Job Training Example](https://developers.google.com/search/docs/data-types/images/job-training-example.png)

## Administration Dashboard

### Authentication


## Security Measures

Several technologies and web standards are enforced in the application.

### Cross Site Request Forgery (CSRF)

CSRF attacks happen due to maliciously crafted HTTP POST requests.
Thereby allowing cookies to be stolen.

Browsers have builtin security to protect against these attacks.
But are on case-by-case.

![CSRF Overview](./csrf-overview.png)

To protect against these attacks. A token is generated with each request.
The token is stored in the html body of the page. On each form request, this token is checked and validated.

This prevents these attacks. As the attacker has no way of knowing the value of the token, and is not able to inject
it in a user context.

### Cross Origin Resource Sharing (CORS)

![Cors Overview](./cors-overview.png)

### Password Encryption

Argon2 is modern ASIC-resistant and GPU-resistant secure key derivation function.
It has better password cracking resistance (when configured correctly) than PBKDF2, Bcrypt and Scrypt
(for similar configuration parameters for CPU and RAM usage).

The Internet Engineering Task Force (IETF) recommends using __Argon2id__ for new applications.
As described in [draft-irtf-cfrg-argon2-12](https://tools.ietf.org/html/draft-irtf-cfrg-argon2-12)

### TLS

All versions of SSL and TLS version 1.0 and 1.1 are __NOT__ to be used, when hosting the app.

This is due to these versions have been cracked. At minimum TLS 1.2 should be used,
and TLS 1.3 once stable.

[GlobalSign Disable TLS and All SSL versions](https://www.globalsign.com/en/blog/disable-tls-10-and-all-ssl-versions)

[PacketLabs TLS 1.1 No Longer Secure](https://www.packetlabs.net/tls-1-1-no-longer-secure/)

### Output escaping

To prevent mangling input data, a subset of html is allowed. This is escaped during the application output stage.
This way the users are protected from malicious script injections (XSS).

Removing these during input, would be a bad decision. As the HTML standard evolves, new ways to inject javascript naturally happens.
And it would encourage a bad practice. Because no matter what, we cannot entirely trust any user generated data.

Not encforcing escaping during output, would potentially expose users to risk. As in that case, the output would be "trusted".

## Test Suite

### Feature Testing

These tests features like the REST api. Expectations are tested against actual responses.

### Unit Testing

Here we test functionality of e.g. services.

### Browser Testing

[Laravel Dusk](https://laravel.com/docs/8.x/dusk) is a testing utility built on top of [ChromeDriver](https://chromedriver.chromium.org/)
and [Selenium](https://www.selenium.dev/)

It allows defining tests in code, that nullifies any reason to spend time on manual testing.
Instead we write tests for what we would confirm visually.

The HomePage test below is a good example on how easy they are to write.

```php
<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\HomePage;
use Tests\DuskTestCase;

class HomePageTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @throws \Throwable
     */
    public function testBasicElements(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new HomePage)
                ->assertSee('Bliv en af danmarks kommende talenter indenfor IT.')
                ->assertSee('IT-SUPPORTER')
                ->assertSee('DATATEKNIKER / PROGRAMMERING')
                ->assertSee('DATATEKNIKER / INFRASTRUKTUR');
        });
    }

    /**
     * Test education stepper
     *
     * @throws \Throwable
     */
    public function testStepper(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new HomePage)
                ->waitForText('IT-SUPPORTER')
                ->click('@it-supporter')
                ->waitForText('EUD')
                ->click('@eud')
                ->waitForText('Hovedforløb')
                ->assertSee('Hovedforløb 1')
                ->assertSee('Objektorienteret programmering')
                ->assertSee('Serverteknologi webserver')
                ->assertSee('Linux rettet mod server og embedded')
                ->assertSee('Script programmering')
                ->assertSee('Hovedforløb 2')
                ->assertSee('App programmering II')
                ->assertSee('Serverteknologi Linux')
                ->assertSee('IT Service-Management II');
        });
    }
}

```

## Demo

[cw-dev.endoftheweb.pw](https://cw-dev.endoftheweb.pw)

![qrcode](./qrcode_cw-dev.endoftheweb.pw.png)
