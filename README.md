# `bliss-site`

Stage site:

[bliss-stage-01.dreamhosters.com](http://bliss-stage-01.dreamhosters.com)

_Note: This site will be slow because it is using the dreamhosters.com domain_

---

User accounts have been setup for:

-   andrey@blisswineconcierge.com
-   equipo@agenciadwm.com

[http://bliss-stage-01.dreamhosters.com/login](http://bliss-stage-01.dreamhosters.com/login)

You will need to use the "Forgot Password" link to reset your passwords.

---

## How to make updates/changes

There are currently 2 git branches:

-   main
-   stage

## `stage` branch

The `stage` branch is what should be updated when making updates and changes.

The following will commit changes to the `stage` branch and push them to the `stage` remote respository hosted on the bliss-stage-01.dreamhosters.com server of dreamhost. You may need to `git pull` changes from stage first, in case you are not the only developer working on the repo:

```
git pull stage stage
git add -A
git commit -m "Example message about changes that have been made."
git push stage stage
```

A production server has not yet been set up on dreamhost. First, I suggest getting everything finished and all the content updated on `stage` first.

## `main` branch

_The `prod` remote server has not been created yet, so don't do the following until after creation and setup._

After all work is completed on `stage` branch, locally merge `stage` into `main`.

```
git pull stage stage
git checkout main
git merge stage
git push prod main
```
