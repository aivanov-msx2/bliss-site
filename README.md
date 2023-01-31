# `bliss-site`

## URL and Login Info

Stage site:

[bliss-stage-01.dreamhosters.com](http://bliss-stage-01.dreamhosters.com)

_Note: This site will be slow because it is using the dreamhosters.com domain_

#

User accounts have been setup for:

-   andrey@blisswineconcierge.com
-   equipo@agenciadwm.com

[http://bliss-stage-01.dreamhosters.com/login](http://bliss-stage-01.dreamhosters.com/login)

#

## Laravel / PHP / React / Typescript

The site uses Laravel (v.9) which is a PHP framework. I suggest doing some Laravel tutorials to get up to speed on these features:

-   routing
-   models, views, controllers
-   mysql database interaction

The views (pages) use Typescript-based React files. There is a `.tsx` file for each page of the site, located here:

`resources/js/Pages`

For CSS, we use Tailwind. It is suggested to use Tailwind's classes (use `className` in React) to control styling, instead of writing custom css styles.

#

## Content Management

The content manager uses the Nova framework (part of Laravel).

[https://nova.laravel.com/](https://nova.laravel.com/)

Add whatever email addresses you need to be able to use Nova in gate() to this file (I have already added Andrey and Gabriel):

`app/Providers/NovaServiceProvider.php`

#

## Database

The database has already been migrated and seeded. Any changes to the strucutre of the database can be performed by creating new migration files, pushing them to the server, and then running:

```
php artisan migrate
```

After you have finished getting all the content complete on the stage site, we will need to export the stage database and import it into a production database.

#

## How to make updates

First, you will need to clone the repository:

```
git clone ssh://dh_jq6dx5@bliss-stage-01.dreamhosters.com/home/dh_jq6dx5/bliss-stage-01.dreamhosters.com/git/bliss-site.git
```

There are currently 2 git branches:

-   main
-   stage

#

## `stage` branch

The `stage` branch is what should be updated first whenever making updates to the code.

Run the following commands locally to commit changes to the `stage` branch and push them to the `stage` remote respository hosted on the bliss-stage-01.dreamhosters.com server of dreamhost. You should always `git pull` changes from stage first, in case you are not the only developer working on the repo:

```
git pull stage stage
git add -A
git commit -m "Example message about changes that have been made."
git push stage stage
```

The SSH user you will need to use with git on the stage server is: `dh_jq6dx5`

#

## `main` branch

_The `prod` remote server has not been created on dreamhost yet, so don't do the following until after creation and setup. First, I suggest getting everything finished and all the content updated on `stage` first._

_The `main` branch should never been worked on directly. Only perform work on stage. Then, when you are sure the changes are good, merge them into the `main` branch and push it to the prod server._

After all work is completed and tested on `stage` branch, locally merge `stage` into `main` and push to the prod server.

```
git pull stage stage
git checkout main
git merge stage
git push prod main
```

#

## Running the site locally

1. Go into the `bliss-site` directory.
2. Run this command:

```
php artisan serve
```

3. Open another terminal window, and go into the `bliss-site` directory again.
4. Run this command:

```
npm run dev
```

5. Setup a local MySQL database and add the database settings to your local .env file.
6. You should now be able to run the site locally at `http://localhost:8000`
