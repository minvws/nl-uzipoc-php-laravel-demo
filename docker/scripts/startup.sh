#!/bin/bash

set -e

APP_DIR=${APP_DIR:-/app}

# Needs to be 0.0.0.0 for Docker
ARTISAN_SERVE_HOST=0.0.0.0
# Needs to be the port that is exposed in the Dockerfile
ARTISAN_SERVE_PORT=8000
ARTISAN_SERVE_NO_RELOAD=${ARTISAN_SERVE_NO_RELOAD:-true}

cd $APP_DIR

echo "----------------------------------------------"
echo " Do not run this on a production environment! "
echo "----------------------------------------------"
echo ""
echo "This image is not suitable for: "
echo " - a production environment;"
echo " - an environment that contains sensitive information;"
echo " - an environment that should remain secure."
echo ""

_DO_NOT_USE_ON_PRODUCTION="I'm a fool if I run this application on a production environment."

if [ "$DO_NOT_USE_ON_PRODUCTION" != "$_DO_NOT_USE_ON_PRODUCTION" ]; then
  echo "If you want to continue, set the \"DO_NOT_USE_ON_PRODUCTION\" variable"
  echo " to \"$_DO_NOT_USE_ON_PRODUCTION\""
  echo ""
  exit 1
fi

# check if secrets directory exists
if [ ! -d $APP_DIR/secrets ]; then
# if not, create it
mkdir $APP_DIR/secrets
fi

# check if OIDC_DECRYPTION_KEY_CONTENT is set
if [ -n "$OIDC_DECRYPTION_KEY_CONTENT" ]; then
  # if so, write it to a file
  echo "$OIDC_DECRYPTION_KEY_CONTENT" > $APP_DIR/secrets/oidc-decryption-key.pem

  # set OIDC_DECRYPTION_KEY_PATH
  OIDC_DECRYPTION_KEY_PATH=$APP_DIR/secrets/oidc-decryption-key.pem
  export OIDC_DECRYPTION_KEY_PATH
fi

# check if OIDC_SIGNING_KEY_CONTENT is set
if [ -n "$OIDC_SIGNING_KEY_CONTENT" ]; then
  # if so, write it to a file
  echo "$OIDC_SIGNING_KEY_CONTENT" > $APP_DIR/secrets/oidc-signing-key.pem

  # set OIDC_SIGNING_PRIVATE_KEY_PATH
  OIDC_SIGNING_PRIVATE_KEY_PATH=$APP_DIR/secrets/oidc-signing-key.pem
  export OIDC_SIGNING_PRIVATE_KEY_PATH
fi

# check if .env file exists
if [ ! -f $APP_DIR/.env ]; then
    # generate APP_KEY
    APP_KEY="base64:$(openssl rand -base64 32)"
    export APP_KEY

    APP_ENV=${APP_ENV:-local}
    export APP_ENV
fi

# set no reload argument if ARTISAN_SERVE_NO_RELOAD is set to true
# with no reload the server will use all the environment variables
ARTISAN_NO_RELOAD_ARGUMENT=''
if [ "$ARTISAN_SERVE_NO_RELOAD" = "true" ]; then
  ARTISAN_NO_RELOAD_ARGUMENT='--no-reload'
fi

echo "--------------------------------------------"
echo "Starting php artisan serve"
echo "This is insecure and should not be used in production!"
echo "--------------------------------------------"

php artisan serve --host=$ARTISAN_SERVE_HOST --port=$ARTISAN_SERVE_PORT $ARTISAN_NO_RELOAD_ARGUMENT
