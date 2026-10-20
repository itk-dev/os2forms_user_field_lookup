# OS2Forms User Field Lookup

Use user data in forms.

## Installation

Require it with composer:

```sh
composer require "itk-dev/os2forms_user_field_lookup"
```

Enable the module:

```sh
drush pm:enable os2forms_user_field_lookup
```

## Usage

Add a User Field Element to a form and select a user field name on the element.
When the form is displayed by an authenticated user, the field will be populated
with the value of the selected field.

### Elements

* User Field Element
* User Field Element (checkbox)

## Development

We use [DDEV Drupal Contrib](https://github.com/ddev/ddev-drupal-contrib) for development[^1].

[^1]: The DDEV environment has been created by running

      ```shell
      ddev config --project-type=drupal11 --docroot=web
      ddev dotenv set .ddev/.env.web --drupal-core '^11.4.10'
      ```

Start the show by running

```shell
task ddev:start
```

Run `task` to see other useful development tasks.```
