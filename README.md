**Introduction:**
This uzipoc-php-laravel-demo repository is the labs application for the uzi proof of concept environment. For additional information about the uzi project, check the coordination repo at https://github.com/minvws/nl-rdo-uzi-coordination.

**Get up and running:**
The easiest way to get the uzi project running is to run the "make setup" command from the coordination repository. This will automatically run the "make setup" of all project. You also have the option to run "make setup" command manually for each project.

Manual setup of this project
1. Set the npm token if you haven't done this already

```bash
TOKEN ?= $(shell bash -c 'read -p "github_token: " github_token; echo $$github_token')
echo "//npm.pkg.github.com/:_authToken=$(TOKEN)"  >> ~/.npmrc
```

2. Run ```make setup```
3. Run ```make run``` to start the php application
