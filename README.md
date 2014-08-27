[DxBoston.com][dxboston.com]
============================

> Powered by [Genesis WordPress ~0.2.50][genesis-wordpress]

This project powers the DxBoston event site for 2014. Theme files are located in `web/wp-content/themes`. Be sure to read the instructions below for working with Grunt and the parent and child themes. 

## Getting Started with Grunt

Grunt is a great build tool and we've set it up so that you can concentrate on building your theme instead of optimizing how it's delivered. 

### Main Tasks

At it's core Grunt is extremely powerful, but most of the time we're only going to be utilizing it for a few standard tasks.

To start your new project you'll need to run the `build:dev` task. When running a project locally you want to build and concatonate your assets but not minify them (for easier debugging). This task creates a `dev` directory and runs all the tasks required to build the assets.

*Since these unminified files are only used locally, you also want to be sure not to track these files in Git. This dev directory is listed in the included gitignore file.*

```
grunt build:dev
```

After your `dev` directory is created, run the `watch` task to set Grunt to automatically build the `dev` assets and reload the browser when necessary with LiveReload.

*After running `watch` refresh the browser once to connect to LiveReload.*

```
grunt watch
```

Run the `build` command to concatonate and minify all the necessary files. These are the files used in staging and production environments.

```
grunt build
```

### Available Grunt tasks

Although `watch`, `build`, and `build:dev` should get you through 90% of your workflow there are other tasks (and subtasks) you can run in the current Grunt setup.

```
grunt clean:dev   # Removes all files from the assets/dev dir
grunt clean:dist  # Removes all files from the assets/dist dir
grunt lint        # Lints all js files (including the Gruntfile) for errors
grunt concat      # Concatonates all the separate scripts into header, footer and single source files
grunt uglify      # Minifies the concatonated scripts in the assets/dist dir
grunt sass:dist   # Compiles sass files (in expanded mode) to the assets/dev dir
grunt sass:dev    # Compiles sass files (in compressed mode) to the assets/dist dir
grunt imagemin    # Compresses images from /img/src directory to the /img/min directory
grunt colorguard  # Compares your css files for colors that are too-similar and conflict with each other
```

### Further info

For further reading on Bower and Grunt, checkout these posts

* Get Up and Running with Grunt - http://coding.smashingmagazine.com/2013/10/29/get-up-running-grunt/
* Twitter Bower & Grunt - http://gpiot.com/blog/twitter-bower-grunt-get-started-with-assets-management/


## Working with the Parent theme

The goal of the parent theme is to give a structured base for your projects but not to assume any design decisions. Making decisions in the parent theme can lead to bloat and unnecessary overrides, and we want your project to be lean and fast.

### Functions

These are functions we've found we use across all of our projects. It's not everything, since that could lead to the mentioned overrides, but it includes what we think is necessary.

### Templates

All the default templates are included. To customize a template, copy it to the child theme and make your changes there. This will automatically override the parent templates and keep your parent theme clean.

### Styling

Trick heading, there is none. There is a `style.css` file but it's only for recognizing the parent theme. All styling should be done in the child theme to avoid duplicate http requests and cascade issues.


## Working with the Child theme

The goal of the child theme is to setup project specific elements. This is where we'll include the design specific decisions (and utilize Grunt). Feel free to edit, add and remove as necessary.

### Functions

This is where we set up project specific functions and global variables; enqueue the development and distribution assets; and require any outside functions.

### Templates

There are no initial templates in the child. You should add templates as you need them and let the parent theme act as the default. For organization purposes we put any non-default WP templates (the ones you have to manually set in a page's admin) in the `/templates` dir.

### Modules

Modules are small chunks of content used throughout your project. The goal is to reuse our code and abstract out small differences.

### Styling

#### Bourbon and Neat

We use Bourbon/Neat for special functions, css3 mixins, and our grid. Bourbon has many awesome functions and mixins not included in the Sass core that make working with scss even easier (such as tint/darken, px to em, modular scale, retina images, etc). Neat makes setting up and using a grid a breeze, especially when using the included `media` mixin. Instead of filling your markup with grid hooks, all of your grid layouts reside in your layout styles where it belongs.

#### Base, Generic and Objects

Based on Inuit CSS, this is where the styling for our resets, base styles, abstractions and custom objects we take from project to project reside. Feel free to include whatever you do or don't need in the style.scss to keep your final size down.

#### Modules and Layout

Rather than mix the custom styles with those we carry from project to project, we break them up into visual styles in the modules directory and layout styles in the layout directory. We often break up the layout files based on the modules we're using, but we still want to keep visual and layout styles separate to make finding and adjusting them easier.

### Scripting

To reduce http requests we limit our scripts to where they are needed and concatonate those that are used on the same pages. First we group them in directories based on where they will be called (header, footer, single posts, etc), then we break up and group the functions into single files based on their use (inits for libraries/plugins, custom page controls, etc). Grunt automatically goes through the directories and creates a corresponding file in dev/dist directories. We then enqueue those in functions.php.

### Images

The Imagemin task will automatically compress your images during the build process. Just drop in what you need in whatever folder structure you like and link to them as you normally would. No extra work needed.

### ColorGuard

The ColorGuard task will compare the colors used in your css and alert you when two colors are nearly indistiguishable to help reduce bloat.



[dxboston.com]: http://www.dxboston.com/
[genesis-wordpress]: https://github.com/genesis/wordpress/
