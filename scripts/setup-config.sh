#!/bin/bash

set -e

copy_example_config () {
  if [[ ! -f $1 ]]; then
    echo "copying $1.example to $1"
    cp "$1.example" $1
  fi
}

copy_example_config ".env"
