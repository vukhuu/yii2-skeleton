Yii 2 Basic Template Skeleton
============================

As we all know, Yii offers 2 types of templates: basic and advanced.

The basic one is too ... basic, e.g., it does not support multi environment deployment which is very necessary for all kinds of projects.

The advanced one is too ... huge. Most of the time we don't care about front end and back end separately.

Besides, we need things that are specific to our needs such as base classes for rest controller, controller, model, crontab controller...

So this is why this project was built.


DIRECTORY STRUCTURE
-------------------

      assets/                               contains assets definition
      commands/                             contains console commands (controllers)
      commands/CrontabBaseController.php    base controller for all crontab
      commands/CrontabController.php        sample crontab controller
      config/                               contains application configurations
      controllers/                          contains Web controller classes
      controllers/rest                      contains REST controllers
      controllers/rest/RestController.php   base controller for all rest controllers
      controllers/Controller.php            base controller for all other controllers
      environments/                         contains 4 environments: development, testing, staging and production
      mail/                                 contains view files for e-mails
      models/                               contains model classes
      models/BaseActiveRecord.php           base class for all active record
      models/BaseModel.php                  base class for all models
      runtime/                              contains files generated during runtime
      scripts/                              build scripts and GIT hook script to force code convention
      tests/                                contains various tests for the application
      vendor/                               contains dependent 3rd-party packages
      views/                                contains view files for the Web application
      views/layouts/main.php                main layout file with Yii::t() support for javascript messages
      web/                                  contains the entry script and Web resources
      init.php                              run "php init.php" to install an environment


FEATURE HIGHLIGHTS
----------------

- Force code convention with CodeSniffer before committing code to local repository (via GIT hook)

- Auto build script and integrate with Slack after building

- Environment config

- Config for unit testing via CodeCeption

- Yii::t() ready for Javascript

- Base command for cron jobs

- Base class for active records, models, controllers and rest controllers


INSTALLATION
------------

- Run "composer install"

- Run "php init" to init environment

That's it