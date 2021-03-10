#!/bin/bash

# Syncing Trellis & Bedrock-based WordPress environments with WP-CLI aliases
# Version 1.1.0
# Copyright (c) Ben Word
# Modifications by NeONBRAND

set -a
source ../.env
set +a

DEVDIR="web/app/uploads/"
DEVSITE="$WP_HOME"

STAGDIR="forge@$STAGING_IP:/home/forge/$STAGING_FOLDER/web/app/uploads/"
STAGSITE="$STAGING_URL"

PRODDIR="forge@$PRODUCTION_IP:/home/forge/$PRODUCTION_FOLDER/web/app/uploads/"
PRODSITE="$PRODUCTION_URL"

# Edit the wp-cli.yml file to have the "right" addresses before runtime
perl -0777pi -e "s/(^\@staging\:\n  ssh: forge)(\@)([\w\d._]*)(\:\/home\/forge\/)([\w\d._]*)(.*)/\1\@$STAGING_IP\4$STAGING_FOLDER\6/gm" ../wp-cli.yml
perl -0777pi -e "s/(^\@production\:\n  ssh: forge)(\@)([\w\d._]*)(\:\/home\/forge\/)([\w\d._]*)(.*)/\1\@$PRODUCTION_IP\4$PRODUCTION_FOLDER\6/gm" ../wp-cli.yml

FROM=$1
TO=$2

if [[ "$*" == *"--local"* ]]
then
    LOCAL=true
    echo "✅  Dev Local"
else
    LOCAL=false
    echo "❌  Dev Local"
fi

if [[ "$*" == *"--dbonly"* ]]
then
    DBONLY=true
    echo "✅  DB Only"
else
    DBONLY=false
    echo "❌  DB Only"
fi

bold=$(tput bold)
normal=$(tput sgr0)

case "$1-$2" in
  production-development) DIR="down ⬇️ "          FROMSITE=$PRODSITE; FROMDIR=$PRODDIR; TOSITE=$DEVSITE;  TODIR=$DEVDIR; ;;
  staging-development)    DIR="down ⬇️ "          FROMSITE=$STAGSITE; FROMDIR=$STAGDIR; TOSITE=$DEVSITE;  TODIR=$DEVDIR; ;;
  development-production) DIR="up ⬆️ "            FROMSITE=$DEVSITE;  FROMDIR=$DEVDIR;  TOSITE=$PRODSITE; TODIR=$PRODDIR; ;;
  development-staging)    DIR="up ⬆️ "            FROMSITE=$DEVSITE;  FROMDIR=$DEVDIR;  TOSITE=$STAGSITE; TODIR=$STAGDIR; ;;
  production-staging)     DIR="horizontally ↔️ ";  FROMSITE=$PRODSITE; FROMDIR=$PRODDIR; TOSITE=$STAGSITE; TODIR=$STAGDIR; ;;
  staging-production)     DIR="horizontally ↔️ ";  FROMSITE=$STAGSITE; FROMDIR=$STAGDIR; TOSITE=$PRODSITE; TODIR=$PRODDIR; ;;
  *) echo "usage: $0 production development | staging development | development staging | development production | staging production | production staging" && exit 1 ;;
esac

read -r -p "
🔄  Would you really like to ⚠️  ${bold}reset the $TO database${normal} ($TOSITE)
    and sync ${bold}$DIR${normal} from $FROM ($FROMSITE)? [y/N] " response

if [[ "$response" =~ ^([yY][eE][sS]|[yY])$ ]]; then
  # Change to site directory
  cd ../ &&
  echo

  # Make sure both environments are available before we continue
  availfrom() {
    local AVAILFROM

    if [[ "$LOCAL" = true && $FROM == "development" ]]; then
      AVAILFROM=$(wp db check 2>&1)
    else
      AVAILFROM=$(wp "@$FROM" db check 2>&1)
    fi
    if [[ $AVAILFROM == *"uccess"* ]]; then
      echo "✅  Able to connect to $FROM"
    else
      echo "❌  Unable to connect to $FROM"
      exit 1
    fi
  };
  availfrom

  availto() {
    local AVAILTO
    if [[ "$LOCAL" = true && $TO == "development" ]]; then
      AVAILTO=$(wp db check 2>&1)
    else
      AVAILTO=$(wp "@$TO" db check 2>&1)
    fi

    if [[ $AVAILTO == *"uccess"* ]]; then
      echo "✅  Able to connect to $TO"
    else
      echo "❌  Unable to connect to $TO"
      exit 1
    fi
  };
  availto
  echo

  # Export/import database, run search & replace
  if [[ "$LOCAL" = true && $TO == "development" ]]; then
    wp db export &&
    wp db reset --yes &&
    wp "@$FROM" db export - | wp db import - &&
    wp search-replace "$FROMSITE" "$TOSITE" --all-tables
  elif [[ "$LOCAL" = true && $FROM == "development" ]]; then
    wp "@$TO" db export &&
    wp "@$TO" db reset --yes &&
    wp db export - | wp "@$TO" db import - &&
    wp "@$TO" search-replace "$FROMSITE" "$TOSITE" --all-tables
  else
    wp "@$TO" db export &&
    wp "@$TO" db reset --yes &&
    wp "@$FROM" db export - | wp "@$TO" db import - &&
    wp "@$TO" search-replace "$FROMSITE" "$TOSITE" --all-tables
  fi


  if [[ "$DBONLY" = false ]]; then
    # Sync uploads directory
    chmod -R 755 web/app/uploads/ &&
    if [[ $DIR == "horizontally"* ]]; then
      [[ $FROMDIR =~ ^(.*): ]] && FROMHOST=${BASH_REMATCH[1]}
      [[ $FROMDIR =~ ^(.*):(.*)$ ]] && FROMDIR=${BASH_REMATCH[2]}
      [[ $TODIR =~ ^(.*): ]] && TOHOST=${BASH_REMATCH[1]}
      [[ $TODIR =~ ^(.*):(.*)$ ]] && TODIR=${BASH_REMATCH[2]}

      ssh -o ForwardAgent=yes $FROMHOST "rsync -aze 'ssh -o StrictHostKeyChecking=no' --progress $FROMDIR $TOHOST:$TODIR"
    else
      rsync -az --progress "$FROMDIR" "$TODIR"
    fi
  fi

  # Slack notification when sync direction is up or horizontal
  # if [[ $DIR != "down"* ]]; then
  #   USER="$(git config user.name)"
  #   curl -X POST -H "Content-type: application/json" --data "{\"attachments\":[{\"fallback\": \"\",\"color\":\"#36a64f\",\"text\":\"🔄 Sync from ${FROMSITE} to ${TOSITE} by ${USER} complete \"}],\"channel\":\"#site\"}" https://hooks.slack.com/services/xx/xx/xx
  # fi
  echo -e "\n\n🔄  Sync from $FROM to $TO complete.\n\n    ${bold}$TOSITE${normal}\n"
fi
