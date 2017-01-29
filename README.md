# Storyfinder Evaluation Tools

Tools used for the evaluation of the storyfinder plugin.

## Plugin

The Firefox plugin tracks the user's actions in the webbrowser and sends log messages to the cmd.php script of the webserver.

## Webserver

The PHP scripts of the webserver are used for logging, displaying the questions and for the overview of the corpora.

* cmd.php listens for log messages and form results and stores them in the folder data.
* allgemeine-fragen.php displays the questionaire
* fragebogen.php displays the forms for answering the evaluation questions
* fragen-rotation.php displays each evaluation question for 5sec
* fragen.php contains the evaluation questions and answers
* korpus.php displays the overview of the corpora

## How to use

* The plugin can be installed in Firefox.
  * The url of the webserver can be set in the AddOn settings, e.g. http://127.0.0.1/webserver/.
  * All users are identified by an id in the form {id}-{subid}, e.g. 12-1. You can set this id in the AddOn settings.
* The webserver scripts can be served using a webserver like Apache or nginx with php support.
* The webserver stores all files in the subfolder "data" of the webserver folder. You have to create this folder and give the scripts read and write access for the folder.
* fragebogen.php expects the id of the user as query parameter "id", e.g. fragebogen.php?id=12-1
* allgemeine-fragen.php chooses the next free id of the user automatically. The id gets displayed after submitting the form.
